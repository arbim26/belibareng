<?php

namespace App\Http\Controllers;

use App\Models\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('dashboards.admins.orders.index', compact('orders'));
    }
}
