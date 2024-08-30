  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
          <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
              <img src="{{ asset('admin/assets/img/logo.png') }}" width="150px" height="" alt="logo">
          </a>
          <i class="bi bi-list toggle-sidebar-btn text-white"></i>
      </div><!-- End Logo -->

      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">
              <li class="nav-item dropdown pe-3">
                  <div class="datetime">
                      <div class="time"></div>
                      <div class="date"></div>
                  </div>
              </li>
              <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                      data-bs-toggle="dropdown">
                      <img src="{{ asset('admin/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                      <span
                          class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::guard('admin')->user()->name }}</span>
                  </a>
                  <!-- End Profile Iamge Icon -->
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                      <li class="dropdown-header">
                          <h6 class="text-success">{{ Auth::guard('admin')->user()->name }}</h6>
                          @if (Auth::guard('admin')->check())
                              @if (Auth::guard('admin')->user()->role_id == 5)
                                  <span>Super Admin</span>
                              @elseif (Auth::guard('admin')->user()->role_id == 4)
                                  <span>Admin</span>
                              @elseif (Auth::guard('admin')->user()->role_id == 2)
                                  <span>Super Master</span>
                              @elseif (Auth::guard('admin')->user()->role_id == 3)
                                  <span>Master</span>
                              @elseif (Auth::guard('admin')->user()->role_id == 1)
                                  <span>Client</span>
                              @endif
                          @endif
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.changePassword') }}">
                              <i class="bi bi-gear"></i>
                              <span>Change Password</span>
                          </a>
                      </li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li>
                          <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
                              <i class="bi bi-box-arrow-right"></i>
                              <span>Sign Out</span>
                          </a>
                      </li>
                  </ul><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->
          </ul>
      </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->
