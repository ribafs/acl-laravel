<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }
    public function index(Request $request)
    {
        $auth = Auth::user()->hasRole('manager', 'purchase');
        if((!$auth)){
            return view('home');
        }else{

        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $products = Product::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $products = Product::latest()->paginate($perPage);
        }

        return view('admin.products.index', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $auth = Auth::user()->hasRole('manager', 'purchase');
        if((!$auth)){
            return view('home');
        }else{

        return view('admin.products.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $auth = Auth::user()->hasRole('manager', 'purchase');
        if((!$auth)){
            return view('home');
        }else{
        
        $requestData = $request->all();
        
        Product::create($requestData);

        return redirect('admin/products')->with('flash_message', 'Product added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $auth = Auth::user()->hasRole('manager', 'purchase');
        if((!$auth)){
            return view('home');
        }else{

        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $auth = Auth::user()->hasRole('manager', 'purchase');
        if((!$auth)){
            return view('home');
        }else{

        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $auth = Auth::user()->hasRole('manager', 'purchase');
        if((!$auth)){
            return view('home');
        }else{
        
        $requestData = $request->all();
        
        $product = Product::findOrFail($id);
        $product->update($requestData);

        return redirect('admin/products')->with('flash_message', 'Product updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $auth = Auth::user()->hasRole('manager', 'purchase');
        if((!$auth)){
            return view('home');
        }else{

        Product::destroy($id);

        return redirect('admin/products')->with('flash_message', 'Product deleted!');
        }
    }
}
