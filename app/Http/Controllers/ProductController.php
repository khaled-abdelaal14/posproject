<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
        $products=product::all();
        return view('backend.products.index',compact('products'));
    }

  
    public function create()
    {
        $categories=category::all();
        return view('backend.products.create',compact('categories'));
    }

 
    public function store(StoreProductsRequest $request)
    {
        try{
            product::create([
                'name'=>['ar'=>$request->name ,'en'=>$request->name_en],
                'price'=>$request->price,
                'category_id'=>$request->categorie_id,

                'notes'=>$request->notes,
                // 'name'=>$request->name,

            ]);
            session()->flash('Add','تم اضافة المنتج بنجاح');
            return redirect()->back();

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error',$e->getMessage()]);

        }
    }

   
    public function show(product $product)
    {
        //
    }

   
    public function edit($id)
    {
        $product=product::findorfail($id);
        $categories=category::all();

        return view('backend.products.edit',compact('product'),compact('categories'));
    }

 
    public function update(StoreProductsRequest $request)
    {
        try{
            $product=product::findorfail($request->id);
            $product->update([
                'name'=>['ar'=>$request->name ,'en'=>$request->name_en],
                'price'=>$request->price,
                'category_id'=>$request->categorie_id,

                'notes'=>$request->notes,
                // 'name'=>$request->name,

            ]);
            session()->flash('edit','تم تعديل المنتج بنجاح');
            return redirect('products');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error',$e->getMessage()]);

        }
    }

 
    public function destroy(Request $request)
    {
        
        try{
            // $category=category::findorfail($id);
            product::destroy($request->pro_id);
            session()->flash('Deleted','تم حذف المنتج بنجاح');
            return redirect('products');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error',$e->getMessage()]);

        }
    }
}
