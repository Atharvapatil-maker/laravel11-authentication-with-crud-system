<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPAY</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom CSS for sidebar */
        .sidebar {
            height: 100%;
            width: 240px; /* Adjust the width as needed */
            position: fixed;
            top: 0;
            left: 0;
            background-color: #bddbfa; /* Change background color as needed */
            padding-top: 3.5rem; /* Adjust top padding to accommodate navbar */
        }

        .content {
            margin-left: auto; /* Set left margin to auto to push it to the right */
            padding: 15px;
        }

        .sidebar .nav-link {
            padding: 10px 20px;
            color: #333;
            font-weight: bold;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-link:hover {
            background-color: #a9d4ff;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .navbar {
            z-index: 1; /* Ensure navbar appears above sidebar */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-md bg-sky-blue shadow-lg bsb-navbar bsb-navbar-hover bsb-navbar-caret"
     style="background-color: rgb(199, 244, 255)">
    <div class="container">
        <a class="navbar-brand" href="#">Spay Fintech Pvt Ltd</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item dropdown">
                    <form class="form-inline">
                        <a class="btn btn-outline" href="{{route('account.login')}}"
                           style="background-color: #00008B; border-color: #00008B;  color: white;" type="button">Sign
                            In</a>
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('account.register')}}"
                           type="button">Sign Up</a>
                        <a class="btn btn-outline" href="{{ route('admin.login') }}">
                            <i class="fas fa-user"></i> admin
                        </a>
                    </form>
                    <script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="col-md-3 sidebar">
    <!-- Sidebar content goes here -->
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Members</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Transactions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Funds</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Agents</a>
        </li>
    </ul>
</div>
<div class="col-md-10 content">
    <!-- Content for the home page goes here -->
    <h1>Welcome to SPAY</h1>
    <p>This is the home page content. You can add whatever you want here to greet your users or provide information about your service.</p>
</div>
</body>
</html>
