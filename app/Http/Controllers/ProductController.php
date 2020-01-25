<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $data = Product::orderBy('id','DESC')->paginate(10);
        return view('pages.products.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('pages.products.create',compact(''));
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
            'product_name'      => 'required',
            'product_code'      => 'required|unique:products,product_code',
            'price'             => 'required',
        ]);

        $input = $request->all();
        Product::create($input);

        return redirect()->route('products.index')
            ->with('success','Product created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.products.edit',compact('product'));
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
            'product_name'      => 'required',
            'product_code'      => 'required|unique:products,product_code,'.$id,
            'price'             => 'required',
        ]);

        $input = $request->all();
        $user = Product::find($id);
        $user->update($input);

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }

}
