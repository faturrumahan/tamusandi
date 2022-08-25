{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/visitor') ? 'active' : ''}}" href="/dashboard/visitor">
            <span data-feather="database"></span>
            Data Pengunjung
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/account') ? 'active' : ''}}" href="/dashboard/account">
            <span data-feather="user"></span>
            Data Akun
          </a>
        </li>
      </ul>
    </div>
  </nav> --}}
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Museum Sandi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li>
                <a class="nav-link" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            @if (auth()->user()->is_admin)
                <li>
                    <a class="nav-link" href="/dashboard/visitor">
                        <span data-feather="database"></span>
                        Data Pengunjung
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="/dashboard/account">
                        <span data-feather="user"></span>
                        Data Akun
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
