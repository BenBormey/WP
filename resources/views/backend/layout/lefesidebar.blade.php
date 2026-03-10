<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand -->
  <a href="{{ url('/') }}" class="brand-link">
    <span class="brand-text font-weight-light">SU35-HRM</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false">

        <!-- ================= Dashboard ================= -->
        <li class="nav-item {{ request()->is('/') ? 'menu-open' : '' }}">
          <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>


        <!-- ================= Department ================= -->
        <li class="nav-item {{ request()->is('departments*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('departments*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-building"></i>
            <p>
              Department
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ url('/departments') }}"
                 class="nav-link {{ request()->is('departments') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Department List</p>
              </a>
            </li>

          </ul>
        </li>


        <!-- ================= Position ================= -->
        <li class="nav-item {{ request()->is('positions*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ request()->is('positions*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Position
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ url('/positions') }}"
                 class="nav-link {{ request()->is('positions') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Position List</p>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>
  </div>

</aside>