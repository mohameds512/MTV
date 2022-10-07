<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\User;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::orderBy('created_at','DESC')->get();
        return view('order.index',\compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('order.create');
    }

    public function store(Request $request)
    {

        try {
            $order = new order();
            $order->user_id = $request->user_id;
            $order->name = $request->name;
            $order->quantity = $request->quantity;
            $order->status = 'قيد الأنتظار';
            $order->save();

            $details = [
                'title' => 'تم تقديم طلبكم',
                'body' => 'طلبكم '.$order->status ,
            ];

            $user = User::find($request->user_id);

            \Mail::to($user->email)->send(new \App\Mail\DetailsMail($details));

            return \view('\home');

        } catch (\Exception $e) {
            return \redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }

    }

    public function show(order $order)
    {
        //
    }


    public function edit($id)
    {
            $order = order::findOrFail($id);
            return \view('order.edit',compact('order'));

    }

    public function update(Request $request, $id)
    {

            $order = order::findOrFail($id);
            $order->name = $request->name;
            $order->quantity = $request->quantity;
            $order->status = $request->status;
            $order->update();


            $details = [
                'title' => "حالة الطلب",
                'body' => $order->status ,
            ];

            $user = $order->user;
            \Mail::to($user->email)->send(new \App\Mail\DetailsMail($details));

            return \redirect()->route('orders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
