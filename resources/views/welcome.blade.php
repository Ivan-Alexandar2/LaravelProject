<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobe - Find Your Dream Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: #fff;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('https://images.unsplash.com/photo-1497864149936-d3163f0c0f4b?ixlib=rb-1.2.1') center/cover;
            height: 80vh;
            display: flex;
            align-items: center;
            position: relative;
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

        .category-card {
            background: #1a1a1a;
            border-radius: 15px;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-10px);
            border: 2px solid #FF6B35;
        }

        .section-title {
            color: #FF6B35;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #FF6B35;
        }

        .job-card {
            background: #1a1a1a;
            border-radius: 15px;
            transition: 0.3s;
        }

        .job-card:hover {
            box-shadow: 0 10px 30px rgba(255,107,53,0.2);
        }
        /* Дизайн за категориите */
        .category-card {
            background: #1a1a1a;
            border-radius: 15px;
            transition: transform 0.3s, border 0.3s;
            cursor: pointer;
            padding: 30px;
            text-align: center;
            color: #fff; /* Добавяме цвят на текста */
            text-decoration: none; /* Премахваме подчертаването */
            display: block; /* Правим линка да заема цялата площ */
        }

        .category-card:hover {
            transform: translateY(-10px);
            border: 2px solid #FF6B35;
            text-decoration: none; /* Премахваме подчертаването при hover */
        }

        .category-card h5 {
            color: #fff; /* Цвят на заглавието */
        }

        .category-card .text-muted {
            color: #ccc !important; /* Цвят на втория текст */
        }
        .category-card:hover h5 {
            color: #FF6B35; /* Оранжев цвят на заглавието при hover */
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2 class="text-orange" style="color: #FF6B35; font-weight: 700;">Jobe</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('jobs') }}">Jobs</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('companies') }}">Companies</a>
                    </li>
                    <li class="nav-item mx-2">
                    @if (Auth::check())
                            <!-- Ако потребителят е логнат -->
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
                            <!-- Ако потребителят не е логнат -->
                            <a class="btn btn-orange" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-orange ms-2" href="{{ route('register') }}">Register</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 mb-4">Find Your <span style="color: #FF6B35;">Dream Job</span> Now</h1>
            <p class="lead mb-5">Join thousands of companies and developers already using Jobe</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg bg-dark text-white border-dark" 
                               placeholder="Job title, keywords, or company">
                        <button class="btn btn-orange">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
    <div class="container">
        <h3 class="section-title text-center">Popular Categories</h3>
        <div class="row g-4">
            @foreach ([
                ['title' => 'Web Development', 'slug' => 'web-development', 'icon' => 'fas fa-code'],
                ['title' => 'Mobile Development', 'slug' => 'mobile-development', 'icon' => 'fas fa-mobile-alt'],
                ['title' => 'Data Science', 'slug' => 'data-science', 'icon' => 'fas fa-chart-line'],
                ['title' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'icon' => 'fas fa-palette'],
                ['title' => 'DevOps', 'slug' => 'devops', 'icon' => 'fas fa-server'],
                ['title' => 'Cybersecurity', 'slug' => 'cybersecurity', 'icon' => 'fas fa-shield-alt'],
            ] as $category)
            <div class="col-md-4">
                <a href="{{ route('category', ['category' => $category['slug']]) }}" class="text-decoration-none">
                    <div class="category-card">
                        <i class="{{ $category['icon'] }} icon-large"></i>
                        <h5>{{ $category['title'] }}</h5>
                        <p class="text-muted">300+ Jobs Available</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- Featured Jobs -->
    <section class="py-5 bg-dark">
        <div class="container">
            <h3 class="section-title mb-5">Featured Jobs</h3>
            <div class="row g-4">
                @foreach(range(1,6) as $job)
                <div class="col-md-6">
                    <div class="job-card p-4">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/lego/{{ $job }}.jpg" 
                                 class="rounded-circle me-3" width="60" alt="company">
                            <div>
                                <h5>Senior Laravel Developer</h5>
                                <div class="d-flex text-muted small mb-2">
                                    <span class="me-3"><i class="fas fa-building me-1"></i>Tech Corp</span>
                                    <span><i class="fas fa-map-marker-alt me-1"></i>Remote</span>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-orange me-2">$80k - $120k</span>
                                    <span class="badge bg-success">Full Time</span>
                                </div>
                            </div>
                        </div>
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
                    <h4 class="text-orange mb-4">Jobe</h4>
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
                        <li>info@Jobe.com</li>
                        <li>+1 (555) 123-4567</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>