<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="{{ route('admin.dashboard') }}" class="logo">
       <img src="{{ asset('storage/' . ($company->logo ?? 'default-logo.png')) }}" 
     alt="Company Logo" 
     class="navbar-brand" 
     height="40">

      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>

    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Components</h4>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#base">
            <i class="fas fa-layer-group"></i>
            <p>Manager Products</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="base">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('admin.categories.index') }}">
                  <span class="sub-item">Car Categories</span>
                </a>
              </li>
              <li>
                <a href="{{ route('admin.cars.index') }}">
                  <span class="sub-item">Cars</span>
                </a>
              </li>
              <li>
                <a href="{{ route('admin.car_images.index') }}">
                  <span class="sub-item">Images Car</span>
                </a>
              </li>
              <li>
                <a href="{{ route('admin.car_details.index') }}">
                  <span class="sub-item">Details Car</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#brand">
            <i class="fas fa-trademark"></i>
            <p>Manager Brand</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="brand">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('admin.brands.index') }}">
                  <span class="sub-item">Brands Cars</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#order">
            <i class="fas fa-trademark"></i>
            <p>Manager Orders</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="order">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('admin.orders.index') }}">
                  <span class="sub-item">Orders</span>
                </a>
              </li>
            </ul>

          </div>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Manager Information</h4>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Blogs">
            <i class="fas fa-trademark"></i>
            <p>Manager Blogs</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="Blogs">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('admin.blog_categories.index') }}">
                  <span class="sub-item">Categories Blogs</span>
                </a>

              </li>
              <li>
                <a href="{{ route('admin.blogs.index') }}">
                  <span class="sub-item">Blogs</span>
                </a>

              </li>
            </ul>

          </div>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Settings</h4>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#Company">
            <i class="fas fa-trademark"></i>
            <p>Settings System</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="Company">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('admin.company.index') }}">
                  <span class="sub-item">Company Information</span>
                </a>
                <a href="{{ route('admin.about.index') }}">
                  <span class="sub-item">Abouts</span>
                </a>
                <a href="{{ route('admin.sliders.index') }}">
                  <span class="sub-item">Slider</span>
                </a>
                <a href="{{ route('admin.breadcrumbs.index') }}">
                  <span class="sub-item">breadcrumbs</span>
                </a>

              </li>
            </ul>
          </div>

        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Managers Messages </h4>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#manager">
            <i class="fas fa-trademark"></i>
            <p>Messages</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="manager">
            <ul class="nav nav-collapse">
              <li>
                <a href="{{ route('admin.messages') }}">
                  <span class="sub-item">Messages Contact</span>
                </a>
              </li>
            </ul>
          </div>

        </li>
      </ul>
    </div>
  </div>
</div>