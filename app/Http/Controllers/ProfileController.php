<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Profile;
use App\Models\User;
use App\Models\Notification_preferences;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        // dd($admin);
        $profile_details = Profile::where('user_id', $admin->id)->first();
        $notification = Notification_preferences::where('user_id', $admin->id)->first();
        return view('admin.profile', compact('admin', 'profile_details', 'notification'));
    }


    public function edit(Request $request)
    {
        $admin = $request->user();

        return view('admin.profile', compact('admin'));
    }


    public function update(Request $request)
    {

        // dd($request);
        // $request->validate([
        //     'first_name' => 'required',
        //     'email' => 'required|email',
        //     'avatar' => 'nullable|image'
        // ]);


        $adminId = $request->user()->id;

        $profile = Profile::where('user_id', $adminId)->first();
        $avatarName = $profile->avatar ?? null;

        $path = public_path('uploads/profile');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // dd($request->image);

        // upload new image
        if ($request->hasFile('image')) {

            if ($profile && $profile->avatar && File::exists($path . '/' . $profile->avatar)) {
                File::delete($path . '/' . $profile->avatar);
            }

            $avatarName = time() . '.' . $request->image->extension();
            // $request->avatar->move($path, $avatarName);
            $request->image->move($path, $avatarName);
        }
        // dd($avatarName);

        // update or create profile
        Profile::updateOrCreate(
            ['id' => $adminId],
            [
                'user_id' => $request->user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'website' => $request->website,
                'bio' => $request->bio,

                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,

                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'github' => $request->github,
                'instagram' => $request->instagram,

                'avatar' => $avatarName,
            ]
        );

        return back()->with('success', 'Profile updated successfully');
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5|confirmed',
        ]);


        $user = Auth::guard('admin')->user();
        if (!$user) {
            return back()->withErrors(['error' => 'User not authenticated']);
        }
        // dd($userx);
        $current_password = $request->current_password;
        // dd([
        //     'input' => $current_password,
        //     'db' => $user->password,
        //     'match' => Hash::check($request->current_password, $user->password)
        // ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }


        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully');
    }

    public function notification(Request $request)
    {
        $request->validate([
            'email_notification' => 'nullable|boolean',
            'sms_alert' => 'nullable|boolean',
            'push_alerts' => 'nullable|boolean',

            'new_order' => 'nullable|boolean',
            'order_status' => 'nullable|boolean',
            'low_stock' => 'nullable|boolean',
            'customer_reviews' => 'nullable|boolean',
            'weekly_analytics' => 'nullable|boolean',
            'marketing_promotion' => 'nullable|boolean',
        ]);


        $adminUser = Auth::guard('admin')->id();
        // dd($adminUser);
        $data = [
            'email_notification',
            'sms_alert',
            'push_alerts',
            'new_order',
            'order_status',
            'low_stock',
            'customer_reviews',
            'weekly_analytics',
            'marketing_promotion'
        ];

        $values = [];

        foreach ($data as $field) {
            $values[$field] = $request->has($field);
        }

        Notification_preferences::updateOrCreate(
            ['user_id' => $adminUser],
            $values
        );
        return back()->with('success', 'Notification is updated successfully');
    }
}
