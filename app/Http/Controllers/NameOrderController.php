<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class NameOrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        return Order::all();
    }

    public function store(Request $request)
    {
        $newOrder = new Order;
        $validated = $request->validate(
            [
                'name' => 'required|unique:orders|min:3|max:11'
            ]
        );
        $newOrder->name = $request->name;
        $newOrder->save();
        return $newOrder;
    }

    public function update(Request $request, $id)
    {
        $existingOrder = Order::find($id);
        $existingOrder->message = $request->message;
        $existingOrder->status = $request->status;
        $existingOrder->save();
        return $existingOrder;
    }
}
