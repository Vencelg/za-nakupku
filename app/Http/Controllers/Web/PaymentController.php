<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('main.payment.list', [
            'payments' => Payment::withTrashed()->get()->sortBy('id')
        ]);
    }

    public function show(
        int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $payment = Payment::withTrashed()->whereId($id)->first();
        if (!($payment instanceof Payment)) {
            throw new ControllerException('Payment with id: ' . $id . ' not found', 400);
        }

        return view('main.payment.detail', [
            'payment' => $payment,
        ]);
    }

    public function create()
    {
        return view('main.payment.create');
    }

    public function store(StorePaymentRequest $request)
    {
        $newPayment = new Payment([
            'user_id' => $request->input('user_id'),
            'listing_id' => $request->input('listing_id'),
            'amount' => $request->input('amount')
        ]);
        $newPayment->save();

        return redirect()->route('payment.detail', ['id' => $newPayment->id]);
    }

    public function update(int $id, UpdatePaymentRequest $request)
    {
        $payment = Payment::withTrashed()->whereId($id)->first();
        if (!($payment instanceof Payment)) {
            throw new ControllerException('Payment with id: ' . $id . ' not found', 400);
        }

        $payment->update($request->all());
        $payment->save();

        return redirect()->back()->with('success', 'Model successfully updated');
    }

    public function restore(int $id)
    {
        $payment = Payment::withTrashed()->whereId($id)->first();
        if (!($payment instanceof Payment)) {
            throw new ControllerException('Payment with id: ' . $id . ' not found', 400);
        }

        $payment->setAttribute('deleted_at', null);
        $payment->save();

        return redirect()->back()->with('success', 'Model successfully restored');
    }

    public function softDelete(int $id)
    {
        $payment = Payment::withTrashed()->whereId($id)->first();
        if (!($payment instanceof Payment)) {
            throw new ControllerException('Payment with id: ' . $id . ' not found', 400);
        }

        $payment->delete();

        return redirect()->back()->with('success', 'Model successfully deleted');
    }

    public function delete(int $id)
    {
        $payment = Payment::withTrashed()->whereId($id)->first();
        if (!($payment instanceof Payment)) {
            throw new ControllerException('Payment with id: ' . $id . ' not found', 400);
        }

        $payment->forceDelete();

        return redirect()->route('payment');
    }
}
