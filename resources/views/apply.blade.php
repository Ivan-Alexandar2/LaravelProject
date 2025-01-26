<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for {{ $job->title }} - Jobe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: #fff;
        }

        .form-container {
            background: #1a1a1a;
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            margin: 50px auto;
        }

        .form-control {
            background: #333;
            border: none;
            color: #fff;
        }

        .form-control:focus {
            background: #444;
            color: #fff;
            border-color: #FF6B35;
            box-shadow: none;
        }

        .btn-orange {
            background: #FF6B35;
            color: white;
            padding: 10px 20px;
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
                <h2 class="text-orange" style="color: #FF6B35; font-weight: 700;">Jobe</h2>
            </a>
        </div>
    </nav>

    <!-- Application Form -->
    <div class="form-container">
        <h3 class="text-center mb-4">Apply for {{ $job->title }}</h3>
        <form action="{{ route('apply.submit', $job->id) }}" method="POST">
        @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}"> <!-- Скрито поле за job_id -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="motivation_letter" class="form-label">Motivation Letter</label>
                <textarea class="form-control" id="motivation_letter" name="motivation_letter" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-orange w-100">Submit Application</button>
        </form>
            @if ($errors->any()) <!-- TUKA -->
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</body>
</html>