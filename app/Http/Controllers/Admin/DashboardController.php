<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Add this line for Auth facade
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class DashboardController extends Controller
{
    public function index()
    {
        $merchants = Merchant::all();
        $totalAmount = $merchants->sum('amount');
        $totalTransactions = $merchants->count();
        $totalSuccess = $merchants->where('status', 'success')->count(); // Count total successful transactions
        $uniqueMembers = $merchants->unique('member_details')->count(); // Assuming member_details is the field containing member names
        return view('admin.dashboard', compact('totalAmount', 'totalTransactions', 'totalSuccess', 'merchants', 'uniqueMembers'));
    }




    public function search1(Request $request)
    {
        $query = $request->input('query');
        $dateFilter = $request->input('date_filter');
        $paymentMethodFilter = $request->input('payment_method_filter');
        $statusFilter = $request->input('status_filter');

        $merchants = Merchant::query();

        // Apply filters
        if ($dateFilter) {
            $merchants->where('date', $dateFilter);
        }
        if ($paymentMethodFilter) {
            $merchants->where('payment_method', $paymentMethodFilter);
        }
        if ($statusFilter) {
            $merchants->where('status', $statusFilter);
        }

        // Perform search based on the query
        if ($query) {
            $merchants->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('transaction_id', 'like', '%' . $query . '%')
                    ->orWhere('merchant_txn_id', 'like', '%' . $query . '%')
                    ->orWhere('date', 'like', '%' . $query . '%')
                    ->orWhere('payment_method', 'like', '%' . $query . '%')
                    ->orWhere('amount', 'like', '%' . $query . '%')
                    ->orWhere('order_id', 'like', '%' . $query . '%')
                    ->orWhere('bank_ref_no', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%')
                    ->orWhere('member_details', 'like', '%' . $query . '%');
            });
        }

        $merchants = $merchants->get();

        // Calculate total amount and total transactions based on search results
        $totalAmount = $merchants->sum('amount');
        $totalTransactions = $merchants->count();
        $totalSuccess = $merchants->where('status', 'success')->count(); // Count total successful transactions
        $uniqueMembers = $merchants->unique('member_details')->count();

        // Return the view with updated values
        return view('admin.dashboard', compact('totalAmount', 'totalTransactions', 'totalSuccess', 'merchants', 'uniqueMembers'));
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function createMerchant()
    {
        return view('admin.merchant.create');
    }

    public function storeMerchant(Request $request)
    {
        // Validation rules for merchant creation
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required|unique:merchants,transaction_id',
            'merchant_txn_id' => 'required|unique:merchants,merchant_txn_id',
            'order_id' => 'required|unique:merchants,order_id',
            'bank_ref_no' => 'required|unique:merchants,bank_ref_no',
            // Add validation rules for other fields here
        ]);

        if ($validator->passes()) {
            // Create a new Merchant instance
            Merchant::create($request->all());

            return redirect()->route('admin.dashboard')->with('success', 'Merchant created successfully');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
    }
    }

    public function edit($transaction_id)
    {
        $merchants = Merchant::where('transaction_id', $transaction_id)->firstOrFail();
        return view('admin.merchant.edit', compact('merchants'));
    }

    public function export()
    {
        $merchants = Merchant::all();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="merchants.csv"',
        ];

        $callback = function () use ($merchants) {
            $file = fopen('php://output', 'w');

            // Write CSV header
            fputcsv($file, [
                'Transaction ID',
                'Merchant Transaction ID',
                'Date',
                'Payment Method',
                'Amount',
                'Order ID',
                'Bank Reference No',
                'Status',
                'Member Details',
            ]);

            // Write CSV data
            foreach ($merchants as $merchant) {
                fputcsv($file, [
                    $merchant->transaction_id,
                    $merchant->merchant_txn_id,
                    $merchant->date,
                    $merchant->payment_method,
                    $merchant->amount,
                    $merchant->order_id,
                    $merchant->bank_ref_no,
                    $merchant->status,
                    $merchant->member_details,
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
