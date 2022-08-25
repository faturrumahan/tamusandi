<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    {{-- <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Museum Sandi</a> --}}
    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
        aria-controls="offcanvasWithBothOptions"><i class="bi bi-list"></i></button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 btn">Logout</button>
            </form>
            {{-- <a class="nav-link px-3" href="#">Logout</a> --}}
        </div>
    </div>
</header>
