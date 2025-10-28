<nav class="navbar navbar-expand-lg mb-3 navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Perpustakaan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    @auth
                    <div class="dropdown">
                        <img src="" alt="">
                        <button class="btn fw-bold fs-5 dropdown-toggle btn-primary" type="button" id="dropdownMenuButton">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" id="dropdownMenu" style="display: none; position: absolute; background: white; border: 1px solid #ccc; list-style: none; z-index: 1000;">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" style="background: none; border: none; width: 100%; text-align: left; cursor: pointer;">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Landing Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/buku">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/penerbit">Penerbit</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="/admin">Admin</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="/mahasiswa">Mahasiswa</a>
                </li> -->
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
        }
        if (locationPath === "/" && link.getAttribute('href') === "/") {
            link.classList.add('active');
            link.setAttribute('aria-current', 'page');
        }
    });

    const dropdownButton = document.getElementById('dropdownMenuButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    if (dropdownButton && dropdownMenu) {
        dropdownButton.addEventListener('click', function() {
            if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
                dropdownMenu.style.display = 'block';
            } else {
                dropdownMenu.style.display = 'none';
            }
        });

        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    }
</script>
