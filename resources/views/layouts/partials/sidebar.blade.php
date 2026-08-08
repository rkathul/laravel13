<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img
        src="{{ asset('adminlte/assets/img/AdminLTELogo.png') }}"
        alt="Logo"
        class="brand-image opacity-75 shadow"
      />
      <span class="brand-text fw-light">{{ config('app.name', 'L13') }}</span>
    </a>
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2" aria-label="Main navigation">
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        data-accordion="false"
        id="navigation"
      >
        <li class="nav-item">
          <a
            href="{{ route('admin.dashboard') }}"
            class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
          >
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-header">SAMPLE</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-file-earmark"></i>
            <p>Starter Page</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.login') }}" class="nav-link">
            <i class="nav-icon bi bi-box-arrow-in-right"></i>
            <p>Login Page</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
