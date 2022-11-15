<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-payment-view']);
    }


    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment', compact('payments'));
    }

    public function create()
    {
        return view('admin.payment.create');
    }

    public function created(Request $request)
    {
        $payment = new Payment();
        $payment->name = $request->input('name');
        $payment->save();
        return redirect()->route('acp.payment')->with('success', 'Created payment successfull');
    }

    public function edit($payment)
    {
        $payment = Payment::find($payment);
        return view('admin.payment.edit', compact('payment'));
    }

    public function update(Request $request, $payment)
    {
        $payment = Payment::find($payment);
        $payment->name = $request->input('name');
        $payment->update();
        return redirect()->route('acp.payment')->with('success', 'Update payment successfull');
    }

    public function delete($payment)
    {
        $payment = Payment::find($payment);
        $payment->delete();
        return redirect()->route('acp.payment')->with('success', 'Delete payment successfull');
    }
}
