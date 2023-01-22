<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мой блог</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="Edica">
                        </a>
                    </li>
                </ul>
            </div>
            @auth()
                <div class="col-6  d-flex justify-content-end">
                    <a href="{{ route('personal.index') }}" class="btn btn-outline-secondary">Личный кабинет</a>
                    <ul class="navbar-nav ml-1">
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" value="Выйти" class="btn btn-outline-secondary">
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest()
                <div class="col-6  d-flex justify-content-end">
                    <a href="{{ route('personal.index') }}" class="btn btn-outline-secondary">Войти</a>
                </div>
            @endguest
        </div>
    </div>
</header>

@yield('content')

<footer class="edica-footer mt-3" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="edica logo">
                <p class="contact-details">hello@edica.com</p>
                <p class="contact-details">+23 3000 000 00</p>
                <nav class="footer-social-links">
                    <a href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a href="#!"><i class="fab fa-twitter"></i></a>
                    <a href="#!"><i class="fab fa-behance"></i></a>
                    <a href="#!"><i class="fab fa-dribbble"></i></a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#!" class="nav-link">Company</a>
                    <a href="#!" class="nav-link">Android App</a>
                    <a href="#!" class="nav-link">ios App</a>
                    <a href="#!" class="nav-link">Blog</a>
                    <a href="#!" class="nav-link">Partners</a>
                    <a href="#!" class="nav-link">Careers</a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#!" class="nav-link">FAQ</a>
                    <a href="#!" class="nav-link">Reporting</a>
                    <a href="#!" class="nav-link">Block Storage</a>
                    <a href="#!" class="nav-link">Tools & Integrations</a>
                    <a href="#!" class="nav-link">API</a>
                    <a href="#!" class="nav-link">Pricing</a>
                </nav>
            </div>

        </div>
        <div class="footer-bottom-content">
            <p class="mb-0">© Edica. 2020 <a href="https://www.bootstrapdash.com" target="_blank"
                                             rel="noopener noreferrer" class="text-reset">bootstrapdash</a> . All rights
                reserved.</p>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
