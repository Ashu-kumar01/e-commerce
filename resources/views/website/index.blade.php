@extends('website.layout.main')
@section('websiteContent')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="" />
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">
                                    // The Best Bakery
                                </p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">
                                    We Bake With Passion
                                </h1>
                                <p class="text-light fs-5 mb-4 pb-3">
                                    Vero elitr justo clita lorem. Ipsum dolor sed stet sit diam
                                    rebum ipsum.
                                </p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="" />
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">
                                    // The Best Bakery
                                </p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">
                                    We Bake With Passion
                                </h1>
                                <p class="text-light fs-5 mb-4 pb-3">
                                    Vero elitr justo clita lorem. Ipsum dolor sed stet sit diam
                                    rebum ipsum.
                                </p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Facts Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Years Experience</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">50</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Skilled Professionals</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">175</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-bread-slice fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Total Products</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">135</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.7s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-cart-plus fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Order Everyday</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">9357</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="img/about-1.jpg" alt="" />
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="img/about-2.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">// About Us</p>
                        <h1 class="display-6 mb-4">
                            We Bake Every Item From The Core Of Our Hearts
                        </h1>
                        <p>
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,
                            sed stet lorem sit clita duo justo magna dolore erat amet
                        </p>
                        <p>
                            Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit.
                            Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,
                            sed stet lorem sit clita duo justo magna dolore erat amet
                        </p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Quality Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Custom Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Online Order
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Home Delivery
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('website.about') }}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Product Start -->
    <div class=" bg-light pt-0">
        <div class="container">
            <div class="bg-primary text-light rounded-bottom p-5 my-6 mt-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 text-light mb-0">
                            The Best Bakery In Your City
                        </h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-flex align-items-center text-start">
                            <i class="fa fa-phone-alt fa-4x flex-shrink-0"></i>
                            <div class="ms-4">
                                <p class="fs-5 fw-bold mb-0">Call Us</p>
                                <p class="fs-1 fw-bold mb-0">+012 345 6789</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="text-primary text-uppercase mb-2">// Bakery Products</p>
                <h1 class="display-6 mb-4">
                    Explore The Categories Of Our Bakery Products
                </h1>
            </div>
            <div class="product-grid" id="productGrid">
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&amp;q=80"
                            alt="Noir Obsidian" loading="lazy">
                        <span class="badge">Best Seller</span>
                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Noir Obsidian</div>
                        <div class="card-price">from ₹1,800</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-1">
                                <option>Chocolate Ganache</option>
                                <option>Dark Truffle</option>
                                <option>Espresso</option>
                            </select>
                            <select class="elegant-select" id="size-1">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(1,-1)">−</button>
                                <span class="qty-num" id="qty-1">1</span>
                                <button class="qty-btn" onclick="changeQty(1,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Noir Obsidian',1)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1535254973040-607b474cb50d?w=600&amp;q=80"
                            alt="Ivory Dream" loading="lazy">
                        <span class="badge">New</span>
                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Ivory Dream</div>
                        <div class="card-price">from ₹1,500</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-2">
                                <option>Vanilla Bean</option>
                                <option>White Chocolate</option>
                                <option>Coconut</option>
                            </select>
                            <select class="elegant-select" id="size-2">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(2,-1)">−</button>
                                <span class="qty-num" id="qty-2">1</span>
                                <button class="qty-btn" onclick="changeQty(2,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Ivory Dream',2)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1586788224331-947f68671cf1?w=600&amp;q=80"
                            alt="Crimson Velvet" loading="lazy">

                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Crimson Velvet</div>
                        <div class="card-price">from ₹1,650</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-3">
                                <option>Red Velvet</option>
                                <option>Cream Cheese</option>
                                <option>Raspberry</option>
                            </select>
                            <select class="elegant-select" id="size-3">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(3,-1)">−</button>
                                <span class="qty-num" id="qty-3">1</span>
                                <button class="qty-btn" onclick="changeQty(3,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Crimson Velvet',3)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&amp;q=80"
                            alt="Jardin d'Été" loading="lazy">
                        <span class="badge">Limited</span>
                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Jardin d'Été</div>
                        <div class="card-price">from ₹2,100</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-4">
                                <option>Summer Fruit</option>
                                <option>Lychee Rose</option>
                                <option>Mango Passionfruit</option>
                            </select>
                            <select class="elegant-select" id="size-4">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(4,-1)">−</button>
                                <span class="qty-num" id="qty-4">1</span>
                                <button class="qty-btn" onclick="changeQty(4,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Jardin d'Été',4)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-center ">
                <a class="btn btn-primary rounded-pill py-3 my-5 mx-auto px-5" href="{{ route('website.shop') }}">More
                    Products</a>

            </div>
        </div>
    </div>
    <!-- Product End -->

    <!-- Service Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="text-primary text-uppercase mb-2">// Our Services</p>
                    <h1 class="display-6 mb-4">What Do We Offer For You?</h1>
                    <p class="mb-5">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
                        diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet
                        lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <div class="row gy-5 gx-4">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-bread-slice text-white"></i>
                                </div>
                                <h5 class="mb-0">Quality Products</h5>
                            </div>
                            <span>Magna sea eos sit dolor, ipsum amet ipsum lorem diam
                                eos</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-birthday-cake text-white"></i>
                                </div>
                                <h5 class="mb-0">Custom Products</h5>
                            </div>
                            <span>Magna sea eos sit dolor, ipsum amet ipsum lorem diam
                                eos</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-cart-plus text-white"></i>
                                </div>
                                <h5 class="mb-0">Online Order</h5>
                            </div>
                            <span>Magna sea eos sit dolor, ipsum amet ipsum lorem diam
                                eos</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-truck text-white"></i>
                                </div>
                                <h5 class="mb-0">Home Delivery</h5>
                            </div>
                            <span>Magna sea eos sit dolor, ipsum amet ipsum lorem diam
                                eos</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="img/service-1.jpg" alt="" />
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="img/service-2.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Team Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="text-primary text-uppercase mb-2">// Our Team</p>
                <h1 class="display-6 mb-4">We're Super Professional At Our Skills</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="img/team-1.jpg" alt="" />
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Full Name</h5>
                                <span>Designation</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="img/team-2.jpg" alt="" />
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Full Name</h5>
                                <span>Designation</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="img/team-3.jpg" alt="" />
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Full Name</h5>
                                <span>Designation</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="img/team-4.jpg" alt="" />
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Full Name</h5>
                                <span>Designation</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="  bg-light my-6 py-6 pb-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="text-primary text-uppercase mb-2">// Client's Review</p>
                <h1 class="display-6 mb-4">More Than 20000+ Customers Trusted Us</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg"
                            alt="" />
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                        amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-2.jpg"
                            alt="" />
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                        amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-3.jpg"
                            alt="" />
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                        amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-4.jpg"
                            alt="" />
                        <div class="ms-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">
                        Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
                        amet diam et eos. Clita erat ipsum et lorem et sit.
                    </p>
                </div>
            </div>
            <div class="bg-primary text-light rounded-top p-5 my-6 mb-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="display-4 text-light mb-0">
                            Subscribe Our Newsletter
                        </h1>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="position-relative">
                            <input class="form-control bg-transparent border-light w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email" />
                            <button type="button" class="btn btn-dark py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">
                                SignUp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
