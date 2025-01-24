<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Categories - TechJobs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: #fff;
        }

        .category-card {
            background: #1a1a1a;
            border-radius: 15px;
            transition: transform 0.3s, border 0.3s;
            cursor: pointer;
            padding: 30px;
            text-align: center;
        }

        .category-card:hover {
            transform: translateY(-10px);
            border: 2px solid #FF6B35;
        }

        .section-title {
            color: #FF6B35;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 40px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: #FF6B35;
        }

        .icon-large {
            font-size: 2.5rem;
            color: #FF6B35;
            margin-bottom: 15px;
        }

        .job-count {
            color: #FF6B35;
            font-weight: 600;
        }
        .nav-link {
            color: #fff !important;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #FF6B35 !important;
        }

        .btn-orange {
            background: #FF6B35;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            transition: 0.3s;
        }

        .btn-orange:hover {
            background: #FF5500;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="/">
                <h2 class="text-orange" style="color: #FF6B35; font-weight: 700;">TechJobs</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link active" href="{{ route('jobs') }}">Jobs</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('companies') }}">Companies</a>
                    </li>
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn btn-orange dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a class="btn btn-orange" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-orange ms-2" href="{{ route('register') }}">Register</a>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Job Categories Section -->
    <section class="py-5">
        <div class="container">
            <h3 class="section-title text-center">Explore Job Categories</h3>
            <div class="row g-4">
                @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="category-card">
                        <i class="{{ $category['icon'] }} icon-large"></i>
                        <h5>{{ $category['title'] }}</h5>
                        <p class="job-count">{{ $category['jobs'] }}+ Jobs Available</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h4 class="text-orange mb-4">TechJobs</h4>
                    <p>Connecting talent with opportunity</p>
                </div>
                <div class="col-md-2">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                        <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Blog</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Careers</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li>info@techjobs.com</li>
                        <li>+1 (555) 123-4567</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>