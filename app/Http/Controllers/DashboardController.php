<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Merchant;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function Merchant()
    {
        return view('dashboard');
    }

    public function createmerchant()
    {
        return view('merchant/create');
    }

    public function index()
    {
        // Fetch only the transactions belonging to the currently logged-in user
        $user = Auth::user();

        $merchants = Merchant::all();
        // Calculate total amount for all transactions
        $totalAmount = $merchants->sum('amount');
        $totalTransactions = $merchants->count();
        $totalSuccess = $merchants->where('status', 'success')->count();

        return view('dashboard', compact('totalAmount', 'totalTransactions', 'totalSuccess', 'merchants'));
    }

    public function search(Request $request)
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

        // Filter transactions by the logged-in user
        $user = Auth::user();
        $merchants->where('member_details', $user->name);

        $merchants = $merchants->get();

        // Calculate total amount and total transactions based on search results
        $totalAmount = $merchants->sum('amount');
        $totalTransactions = $merchants->count();
        $totalSuccess = $merchants->where('status', 'success')->count(); // Count total successful transactions
        $uniqueMembers = $merchants->unique('member_details')->count();

        // Return the view with updated values
        return view('dashboard', compact('totalAmount', 'totalTransactions', 'totalSuccess', 'merchants', 'uniqueMembers'));
    }



    public function export(Request $request)
    {
        // Use the search method to filter data based on the request
        $filteredData = $this->search($request)->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="filtered_merchants.csv"',
        ];

        $callback = function () use ($filteredData) {
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
            foreach ($filteredData as $merchant) {
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

        // Return the streamed response
        return response()->stream($callback, 200, $headers);
    }


}
