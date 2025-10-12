<nav class="navbar navbar-expand-lg mb-3 navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Landing Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/buku">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/mahasiswa">Mahasiswa</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const locationPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        if (locationPath.includes(link.getAttribute('href')) && link.getAttribute('href') !== "/") {
            link.classList.add('active');
            link.setAttribute('aria-current', 'page');
        } if (locationPath === "/" && link.getAttribute('href') === "/") {
            link.classList.add('active');
            link.setAttribute('aria-current', 'page');
        }
    });
</script>