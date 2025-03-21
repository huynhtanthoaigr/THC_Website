<div class="sidebar-popup">
    <div class="sidebar-wrapper">
        <div class="sidebar-content">
            <button type="button" class="close-sidebar-popup"><i class="far fa-xmark"></i></button>
            <div class="sidebar-logo">
                <img src="{{ asset('storage/' . ($company->logo ?? 'assets/img/logo/logo.png')) }}" alt="Company Logo"
                    style="width: 150px; height: auto; border-radius: 20px;">
            </div>

            <div class="sidebar-about">
                <h4>About Us</h4>
                <p>There are many variations of passages available sure there majority have suffered alteration in
                    some form by injected humour or randomised words which don't look even slightly believable.</p>
            </div>
            <div class="sidebar-contact">
                <h4>Contact Info</h4>
                <ul>
                    <li>
                        <h6>Email</h6>
                        <a href="mailto:{{ $company->email ?? 'info@example.com' }}">
                            <i class="far fa-envelope"></i> {{ $company->email ?? 'info@example.com' }}
                        </a>
                    </li>
                    <li>
                        <h6>Phone</h6>
                        <a href="tel:{{ $company->phone ?? '+21236547898' }}">
                            <i class="far fa-phone"></i> {{ $company->phone ?? '+2 123 654 7898' }}
                        </a>
                    </li>
                    <li>
                        <h6>Address</h6>
                        <a href="#">
                            <i class="far fa-location-dot"></i> {{ $company->address ?? '25/B Milford Road, New York' }}
                        </a>
                    </li>
                </ul>
            </div>


        </div>
    </div>
</div>