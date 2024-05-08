<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>SPAY</title>
      <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   </head>
   <body class="bg-light">
        <nav class="navbar navbar-expand-md bg-sky-blue shadow-lg bsb-navbar bsb-navbar-hover bsb-navbar-caret" style="background-color: rgb(199, 244, 255)";>
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
                            <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ Auth::guard('admin')->user()->name }}</a>
                            <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </nav>
        <div class="container">
           <div class="card border-0 shadow my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <div class="card border border-light-subtle rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <h4 class="text-center">Create the Merchant Data</h4>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('admin.merchant.store') }}" method="POST">
                                    @csrf
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" value="{{ old('transaction_id') }}" class="form-control @error('transaction_id') is-invalid @enderror" name="transaction_id" id="transaction_id" placeholder="Transaction ID">
                                                        <label for="transaction_id" class="form-label">Transaction ID</label>
                                                        @error('transaction_id')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" value="{{ old('merchant_txn_id') }}" class="form-control @error('merchant_txn_id') is-invalid @enderror" name="merchant_txn_id" id="merchant_txn_id" placeholder="Merchant Transaction ID">
                                                        <label for="merchant_txn_id" class="form-label">Merchant Transaction ID</label>
                                                        @error('merchant_txn_id')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror" name="date" id="date">
                                                        <label for="date" class="form-label">Date</label>
                                                        @error('date')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" value="{{ old('payment_method') }}" class="form-control @error('payment_method') is-invalid @enderror" name="payment_method" id="payment_method" placeholder="Payment Method">
                                                        <label for="payment_method" class="form-label">Payment Method</label>
                                                        @error('payment_method')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" value="{{ old('amount') }}" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" placeholder="Amount">
                                                        <label for="amount" class="form-label">Amount</label>
                                                        @error('amount')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" value="{{ old('order_id') }}" class="form-control @error('order_id') is-invalid @enderror" name="order_id" id="order_id" placeholder="Order ID">
                                                        <label for="order_id" class="form-label">Order ID</label>
                                                        @error('order_id')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" value="{{ old('bank_ref_no') }}" class="form-control @error('bank_ref_no') is-invalid @enderror" name="bank_ref_no" id="bank_ref_no" placeholder="Bank Reference No">
                                                        <label for="bank_ref_no" class="form-label">Bank Reference No</label>
                                                        @error('bank_ref_no')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" value="{{ old('status') }}" class="form-control @error('status') is-invalid @enderror" name="status" id="status" placeholder="Status">
                                                        <label for="status" class="form-label">Status</label>
                                                        @error('status')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" value="{{ old('member_details') }}" class="form-control @error('member_details') is-invalid @enderror" name="member_details" id="member_details" placeholder="Member Details">
                                                        <label for="member_details" class="form-label">Member Details</label>
                                                        @error('member_details')
                                                            <p class="invalid-feedback">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Submit Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </div>
        </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>
