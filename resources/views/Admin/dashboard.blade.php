<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPAY</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* Custom CSS for sidebar */
        .sidebar {
            height: 100%;
            width: 240px; /* Adjust the width as needed */
            position: fixed;
            top: 0;
            left: 0;
            background-color: #b8d6f5; /* Change background color as needed */
            padding-top: 3.5rem; /* Adjust top padding to accommodate navbar */
        }

        .content {
            margin-left: 10%; /* Set left margin to auto to push it to the right */
            width: 100%;
            padding: 15px; /* Ensure no margin on the right side */
        }

        .navbar {
            background-color: #a4caf3; /* Change the background color as needed */
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
        .custom-thead {
            background-color: #007bff;
            color: #fff !important;;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-white shadow-lg bsb-navbar bsb-navbar-hover bsb-navbar-caret" style="background-color: #a9d4ff">

    <div class="container">
        <a class="navbar-brand" href="#">Spay Fintech Pvt Ltd</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="!#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ Auth::guard('admin')->user()->name }}</a>
                        <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="col-md-3 sidebar">
        <!-- Sidebar content goes here -->
        <div class="col-md-3 sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Agent List</a>
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
                    <a class="nav-link" href="#">Account Statement</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center"> <!-- Center the row -->
            <div class="col-md-9"> <!-- Set the column width -->
                <div class="card border-0 shadow my-5">
                    <div class="card-body">
                        <h4 class="fw-bold text-center mb-6">Summary</h4> <!-- Center align the text -->
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="text-center">Total Amount</h5>
                                <h4 class="text-center">₹ {{ $totalAmount }}</h4>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-center">Total Transactions</h5>
                                <h4 class="text-center">{{ $totalTransactions }}</h4>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-center">Total Success</h5>
                                <h4 class="text-center">{{ $totalSuccess }}</h4>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-center">Total Member</h5>
                                <h4 class="text-center">{{ $uniqueMembers }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="col-md-4 content">
        <div class="card border-0 shadow my-5">
            <div class="card-header bg-light">
                <h3 class="h5 pt-2">Dashboard FOR Admin</h3>
            </div>
            <div class="card-header bg-light">
                <h3 class="h5 pt-2">DATA</h3>
                <form action="{{ route('admin.dashboard.search') }}" method="GET" class="d-flex mb-2">
                    <input type="text" name="query" class="form-control me-2" placeholder="Search">
                    <input type="date" name="date_filter" class="form-control me-2">
                    <select name="payment_method_filter" class="form-select me-2">
                        <option value="">Select Payment Method</option>
                        <option value="UPI">UPI</option>
                        <option value="CARD PAYMENT">Card Payment</option>
                        <option value="IMPS">IMPS</option>
                        <!-- Add more payment methods if needed -->
                    </select>
                    <select name="status_filter" class="form-select me-2">
                        <option value="">Select Status</option>
                        <option value="success">Success</option>
                        <option value="failed">Failed</option>
                        <!-- Add more statuses if needed -->
                    </select>
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Search</button>
                </form>
                <a href="{{ route('admin.dashboard.export') }}" class="btn btn-sm btn-success" download>Export</a> <!-- Add this line -->
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.merchant.create') }}" type="button">Create Merchant</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="custom-thead">
                        <tr>
                            <th>Transaction ID</th>
                            <th>Merchant Transaction ID</th>
                            <th>Date</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Order ID</th>
                            <th>Bank Reference No</th>
                            <th>Status</th>
                            <th>Member Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($merchants as $item)
                        <tr>
                            <td>{{ $item->transaction_id }}</td>
                            <td>{{ $item->merchant_txn_id }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->payment_method }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->order_id }}</td>
                            <td>{{ $item->bank_ref_no }}</td>
                            <td style="color: {{ $item->status === 'success' ? 'green' : 'red' }}">{{ $item->status }}</td>
                            <td>{{ $item->member_details }}</td>
                            <td>
                                <a href="{{ route('admin.dashboard.edit', $item->transaction_id) }}" class="btn btn-sm btn-primary">Edit</a>
                                {{-- <form action="{{ route('admin.dashboard.delete', $item->transaction_id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
