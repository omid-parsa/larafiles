<?php

namespace App\Http\Controllers\admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments=Payment::all();
        return view('admin.payment.index', compact('payments'))->with('panel_title', 'Payments List');
    }
}
