<footer class="footer-area">
    <div class="footer-widget">
        <div class="container">
            <div class="row footer-widget-wrapper pt-100 pb-70">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget-box about-us">
                        <a href="#" class="footer-logo">
                            <img src="{{ asset('storage/' . ($company->logo ?? 'assets/img/logo/logo-light.png')) }}"
                                alt="Company Logo">
                        </a>
                        <p class="mb-3">
                            {{ $company->description ?? 'We are many variations of passages available but the majority have suffered alteration in some form by injected humour words believable.' }}
                        </p>
                        <ul class="footer-contact">
                            <li>
                                <a href="tel:{{ $company->phone ?? '+21236547898' }}">
                                    <i class="far fa-phone"></i> {{ $company->phone ?? '+2 123 654 7898' }}
                                </a>
                            </li>
                            <li>
                                <i class="far fa-map-marker-alt"></i>
                                {{ $company->address ?? '25/B Milford Road, New York' }}
                            </li>
                            <li>
                                <a href="mailto:{{ $company->email ?? 'info@example.com' }}">
                                    <i class="far fa-envelope"></i> {{ $company->email ?? 'info@example.com' }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Quick Links</h4>
                        <ul class="footer-list">
                            <li><a href="#"><i class="fas fa-caret-right"></i> About Us</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Update News</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Testimonials</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Terms Of Service</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Privacy policy</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Our Dealers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Support Center</h4>
                        <ul class="footer-list">
                            <li><a href="#"><i class="fas fa-caret-right"></i> FAQ's</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Affiliates</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Booking Tips</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Sell Vehicles</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Newsletter</h4>
                        <div class="footer-newsletter">
                            <p>Subscribe Our Newsletter To Get Latest Update And News</p>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                    <button class="theme-btn" type="submit">
                                        Subscribe Now <i class="far fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>