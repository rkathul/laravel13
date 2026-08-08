<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Toggle sidebar">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen" aria-label="Toggle fullscreen">
          <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
          <i data-lte-icon="minimize" class="bi bi-fullscreen-exit d-none"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a
          class="nav-link"
          href="#"
          id="bd-theme"
          aria-label="Toggle color scheme"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="bi bi-sun-fill" data-lte-theme-icon="light"></i>
          <i class="bi bi-moon-fill d-none" data-lte-theme-icon="dark"></i>
          <i class="bi bi-circle-half d-none" data-lte-theme-icon="auto"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme" style="--bs-dropdown-min-width: 8rem">
          <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
              <i class="bi bi-sun-fill me-2"></i>
              Light
              <i class="bi bi-check-lg ms-auto d-none"></i>
            </button>
          </li>
          <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
              <i class="bi bi-moon-fill me-2"></i>
              Dark
              <i class="bi bi-check-lg ms-auto d-none"></i>
            </button>
          </li>
          <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
              <i class="bi bi-circle-half me-2"></i>
              Auto
              <i class="bi bi-check-lg ms-auto d-none"></i>
            </button>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img
            src="{{ asset('adminlte/assets/img/user2-160x160.jpg') }}"
            class="user-image rounded-circle shadow"
            alt="Admin User"
          />
          <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <li class="user-header text-bg-primary">
            <img
              src="{{ asset('adminlte/assets/img/user2-160x160.jpg') }}"
              class="rounded-circle shadow"
              alt="Admin User"
            />
            <p>
              {{ auth()->user()->name }}
              <small>{{ auth()->user()->email }}</small>
            </p>
          </li>
          <li class="user-footer">
            <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger float-end">Sign out</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
