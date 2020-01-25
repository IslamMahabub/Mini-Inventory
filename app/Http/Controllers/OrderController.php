<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if( $user->user_type == 'admin' )
            $data = Order::orderBy('id','DESC')->paginate(10);
        else
            $data = Order::where( 'supplier_id', $user->id )->orderBy('id','DESC')->paginate(10);
        return view('pages.orders.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $products   = Product::pluck('product_name', 'id')->toArray();
        $user       = Auth::user();
        $user_type  = $user->user_type;
        if( $user->user_type == 'admin' )
            $suppliers = User::where('user_type', 'supplier')->orderBy('name')->pluck('name', 'id')->toArray();
        else
            $suppliers = User::where( ['user_type' => 'supplier', 'id' => $user->id] )->orderBy('name')->pluck('name', 'id')->toArray();

        return view('pages.orders.create',compact('products', 'suppliers', 'user_type'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id'      => 'required',
            'supplier_id'     => 'required',
            'quantity'        => 'required',
        ]);

        $input = $request->all();
        Order::create($input);

        return redirect()->route('orders.index')
            ->with('success','Order created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $order      = Order::find($id);
        $products   = Product::pluck('product_name', 'id')->toArray();
        $user       = Auth::user();
        $user_type  = $user->user_type;
        if( $user->user_type == 'admin' )
            $suppliers = User::where('user_type', 'supplier')->orderBy('name')->pluck('name', 'id')->toArray();
        else
            $suppliers = User::where( ['user_type' => 'supplier', 'id' => $user->id] )->orderBy('name')->pluck('name', 'id')->toArray();

        return view('pages.orders.edit',compact('order', 'products', 'suppliers', 'user_type'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_id'      => 'required',
            'supplier_id'     => 'required',
            'quantity'        => 'required',
        ]);

        $input = $request->all();
        $user = Order::find($id);
        $user->update($input);

        return redirect()->route('orders.index')
            ->with('success','Order updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('orders.index')
            ->with('success','Order deleted successfully');
    }
}
