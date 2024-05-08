<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;

class EditController extends Controller
{
    public function update(Request $request, $transaction_id)
    {
        $data = $request->only([
            'merchant_txn_id',
            'date',
            'payment_method',
            'amount',
            'order_id',
            'bank_ref_no',
            'status',
            'member_details',
        ]);

        Merchant::where('transaction_id', $transaction_id)->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Merchants updated successfully');
    }




    public function delete($transaction_id)
    {
        Merchant::where('transaction_id', $transaction_id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Merchant deleted successfully');
    }

}
