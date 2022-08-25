@if ($title !== 'Login')
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Buku Tamu</a>
            @auth
                <a href="/dashboard" class="btn btn-primary"><i class="bi bi-person-circle"></i></a>
            @else
                <a href="/login" class="btn btn-primary"><i class="bi bi-person-circle"></i></a>
            @endauth
        </div>
    </nav>
@endif
