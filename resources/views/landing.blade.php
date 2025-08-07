<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>

    <meta charset="utf-8" />
    <title>Logistics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">


    <!-- App css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("{{ asset('images/bgs/trucking2.jpg') }}") no-repeat center center/cover;
            height: 100vh;
            min-height: 600px;
            display: flex;
            align-items: center;
        }

        .stats {
            background: linear-gradient(rgba(26, 62, 114, 0.9), rgba(26, 62, 114, 0.9)), url('https://images.unsplash.com/photo-1544620347-c4fd8a3b1193?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
        }
    </style>

</head>

<body>

    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top topbar-custom d-flex justify-content-between">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <span class="text-warning">Prime</span>Haul
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#contact">Contact</a>
                    </li>
                </ul>
                <a href="#contact" class="btn btn-warning ms-lg-3 ">Sign in</a>
            </div> --}}
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 text-white">
                    <h1 class="display-3 fw-bold mb-4">Your Trusted Trucking & Logistics Platform</h1>
                    <p class="lead mb-4">Delivering excellence in freight transportation with reliable, efficient, and
                        cost-effective solutions tailored to your business needs.</p>
                    <div class="d-flex gap-3">
                        <a href="/login" class="btn btn-warning btn-lg px-4 rounded-pill">Get Started Here</a>
                        {{-- <a href="#services" class="btn btn-outline-light btn-lg px-4">Our Services</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- Stats Section -->
    <section class="stats py-5 text-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-text">Years Experience</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">250+</div>
                        <div class="stat-text">Happy Clients</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-text">Trucks in Fleet</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">99%</div>
                        <div class="stat-text">On-Time Delivery</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5" id="services">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">Our Services</h2>
                    <p class="lead text-muted">We offer comprehensive logistics solutions to keep your business moving
                        forward.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card card shadow-sm border-0 h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <h3 class="h4 mb-3">Full Truckload</h3>
                            <p class="text-muted">Dedicated trucks for your shipments with guaranteed capacity and
                                faster transit times.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card card shadow-sm border-0 h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <h3 class="h4 mb-3">Less Than Truckload (LTL)</h3>
                            <p class="text-muted">Cost-effective solution for smaller shipments that don't require a
                                full truck.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card card shadow-sm border-0 h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h3 class="h4 mb-3">Expedited Shipping</h3>
                            <p class="text-muted">Time-sensitive deliveries with priority handling and guaranteed
                                on-time performance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card card shadow-sm border-0 h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-warehouse"></i>
                            </div>
                            <h3 class="h4 mb-3">Warehousing</h3>
                            <p class="text-muted">Secure storage solutions with inventory management and distribution
                                services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card card shadow-sm border-0 h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-train"></i>
                            </div>
                            <h3 class="h4 mb-3">Intermodal</h3>
                            <p class="text-muted">Seamless transportation combining truck, rail, and ocean for
                                long-haul efficiency.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card card shadow-sm border-0 h-100">
                        <div class="card-body text-center p-4">
                            <div class="service-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h3 class="h4 mb-3">Tracking & Visibility</h3>
                            <p class="text-muted">Real-time shipment tracking and proactive notifications for complete
                                peace of mind.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-light" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1602722053028-1c51c7c756b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="PrimeHaul Logistics Truck" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Why Choose PrimeHaul Logistics?</h2>
                    <p class="lead text-muted mb-4">With over 15 years of experience in the transportation industry,
                        we've built a reputation for reliability, safety, and customer satisfaction.</p>
                    <div class="d-flex mb-3">
                        <div class="me-4 text-secondary">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                        <div>
                            <h4 class="h5">Modern Fleet</h4>
                            <p class="text-muted mb-0">Our well-maintained trucks and experienced drivers ensure safe,
                                on-time deliveries.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="me-4 text-secondary">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                        <div>
                            <h4 class="h5">Advanced Technology</h4>
                            <p class="text-muted mb-0">Real-time tracking and efficient route planning for complete
                                visibility.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-4 text-secondary">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                        <div>
                            <h4 class="h5">Customer Focused</h4>
                            <p class="text-muted mb-0">We treat every customer like family and are committed to your
                                success.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5" id="testimonials">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">What Our Clients Say</h2>
                    <p class="lead text-muted">Don't just take our word for it - hear from our satisfied customers.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client"
                                class="testimonial-img me-3">
                            <div>
                                <h5 class="mb-0">Michael Johnson</h5>
                                <small class="text-muted">CEO, Midwest Distributors</small>
                            </div>
                        </div>
                        <p class="text-muted">"PrimeHaul has been our logistics partner for 5 years now. Their
                            reliability and customer service are unmatched in the industry."</p>
                        <div class="text-secondary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client"
                                class="testimonial-img me-3">
                            <div>
                                <h5 class="mb-0">Sarah Williams</h5>
                                <small class="text-muted">Logistics Manager, Acme Corp</small>
                            </div>
                        </div>
                        <p class="text-muted">"Their real-time tracking system gives us complete visibility of our
                            shipments. We've reduced delays by 30% since switching to PrimeHaul."</p>
                        <div class="text-secondary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client"
                                class="testimonial-img me-3">
                            <div>
                                <h5 class="mb-0">David Chen</h5>
                                <small class="text-muted">Operations Director, Global Imports</small>
                            </div>
                        </div>
                        <p class="text-muted">"The team at PrimeHaul understands our business needs and provides
                            customized solutions that have helped us grow."</p>
                        <div class="text-secondary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-4">Ready to Ship With Confidence?</h2>
                    <p class="lead mb-4">Get a free, no-obligation quote for your next shipment and experience the
                        PrimeHaul difference.</p>
                    <a href="#contact" class="btn btn-light btn-lg px-4">Request a Quote</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5" id="contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">Contact Us</h2>
                    <p class="lead text-muted">Have questions or ready to get started? Reach out to our team today.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="contact-info">
                        <h3 class="text-white mb-4">Get in Touch</h3>
                        <div class="d-flex mb-4">
                            <i class="fas fa-map-marker-alt mt-1"></i>
                            <div>
                                <h4 class="h5 text-white">Address</h4>
                                <p>1234 Logistics Way, Chicago, IL 60601</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="fas fa-phone-alt mt-1"></i>
                            <div>
                                <h4 class="h5 text-white">Phone</h4>
                                <p>(800) 555-1234</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="fas fa-envelope mt-1"></i>
                            <div>
                                <h4 class="h5 text-white">Email</h4>
                                <p>info@primehaullogistics.com</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="fas fa-clock mt-1"></i>
                            <div>
                                <h4 class="h5 text-white">Hours</h4>
                                <p>Monday - Friday: 8am - 6pm<br>Saturday: 9am - 2pm</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4 class="h5 text-white mb-3">Follow Us</h4>
                            <a href="#" class="social-icon text-white me-2"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon text-white me-2"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-icon text-white"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" id="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject">
                                    </div>
                                    <div class="col-12">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" rows="5" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-secondary">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h3 class="h4 text-secondary mb-4">PrimeHaul Logistics</h3>
                    <p>Delivering excellence in freight transportation since 2008. Your trusted partner for all your
                        logistics needs.</p>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h3 class="h5 text-secondary mb-4">Quick Links</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#home">Home</a></li>
                        <li class="mb-2"><a href="#services">Services</a></li>
                        <li class="mb-2"><a href="#about">About Us</a></li>
                        <li class="mb-2"><a href="#testimonials">Testimonials</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h3 class="h5 text-secondary mb-4">Services</h3>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Full Truckload</a></li>
                        <li class="mb-2"><a href="#">LTL Shipping</a></li>
                        <li class="mb-2"><a href="#">Expedited Shipping</a></li>
                        <li class="mb-2"><a href="#">Warehousing</a></li>
                        <li><a href="#">Intermodal</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3 class="h5 text-secondary mb-4">Newsletter</h3>
                    <p>Subscribe to our newsletter for the latest updates and logistics insights.</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your Email">
                            <button class="btn btn-secondary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 PrimeHaul Logistics. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white me-3">Privacy Policy</a>
                    <a href="#" class="text-white">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer> --}}

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
