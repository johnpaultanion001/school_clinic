<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ route("admin.home") }}">
          <img src="{{URL::asset('/assets/img/logo.jpg')}}" width="90px"   alt="LOGO"> 
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            @if(Auth()->user()->role == 'admin')
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}" href="{{ route("admin.home") }}">
                  <i class="ni ni-tv-2 fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Home</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/patient_list') || request()->is('admin/patient_list/*') ? 'active' : '' }}" href="{{ route("admin.patient") }}">
                <i class="fas fa-users fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Patient List</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/appointment') || request()->is('admin/appointment/*') ? 'active' : '' }}" href="{{ route("admin.appointment.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Appointment</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/calendar') || request()->is('admin/calendar/*') ? 'active' : '' }}" href="{{ route("admin.calendar.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Calendar</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/qr') || request()->is('admin/qr/*') ? 'active' : '' }}" href="{{ route("admin.qr.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">QR HISTORY</span>
                </a>
              </li>
              @endif
          </ul>


        </div>

      </div>
    </div>
  </nav>