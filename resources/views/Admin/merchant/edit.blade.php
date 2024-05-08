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
        </div>
        <div class="container">
            <div class="row justify-content-center"> <!-- Center the row -->
                <div class="col-md-10">
                    <div class="container">
                        <div class="row justify-content-center"> <!-- Center the row -->
                            <div class="col-md-10">
                                <div class="container">
                                    <h1>Edit Merchant</h1>
                                    <form action="{{ route('admin.dashboard.update', $merchants->transaction_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <!-- Include the table header for displaying data -->
                                        <table class="table">
                                            <thead class="custom-thead">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Merchant Transaction ID</th>
                                                    <th>Date</th>
                                                    <th>Payment Method</th>
                                                    <th>Amount</th>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="transaction_id" value="{{ $merchants->transaction_id }}"></td>
                                                    <td><input type="text" name="merchant_txn_id" value="{{ $merchants->merchant_txn_id }}"></td>
                                                    <td><input type="date" name="date" value="{{ $merchants->date }}"></td>
                                                    <td><input type="text" name="payment_method" value="{{ $merchants->payment_method }}"></td>
                                                    <td><input type="text" name="amount" value="{{ $merchants->amount }}"></td>
                                                </tr>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Bank Reference No</th>
                                                    <th>Status</th>
                                                    <th>Member Details</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Add text input fields to allow editing -->
                                                <tr>
                                                    <td><input type="text" name="order_id" value="{{ $merchants->order_id }}"></td>
                                                    <td><input type="text" name="bank_ref_no" value="{{ $merchants->bank_ref_no }}"></td>
                                                    <td><select name="status" class="form-select">
                                                        <option value="success" {{ $merchants->status === 'success' ? 'selected' : '' }}>Success</option>
                                                        <option value="failed" {{ $merchants->status === 'failed' ? 'selected' : '' }}>Failed</option>
                                                    </select></td>
                                                    <td><input type="text" name="member_details" value="{{ $merchants->member_details }}"></td>
                                                    <td>
                                                        <!-- Add submit button for updating -->
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>

                                    <!-- Form for deleting merchant -->
                                    <form action="{{ route('admin.dashboard.delete', $merchants->transaction_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Delete button -->
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
