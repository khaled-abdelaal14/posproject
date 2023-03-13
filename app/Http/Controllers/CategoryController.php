<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriesRequest;
use App\Models\category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
 
    public function index()
    {
        $category=category::all();
        return view('backend/categories.index',compact('category'));
    }


    public function create()
    {
        //
    }


    public function store(StoreCategoriesRequest $request)
    {
        try{
            category::create([
                'name'=>['ar'=>$request->name ,'en'=>$request->name_en],

                'notes'=>$request->notes,
                // 'name'=>$request->name,

            ]);
            session()->flash('Add','تم اضافة المنتج بنجاح');
            return redirect('categories');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error',$e->getMessage()]);

        }
    }


    public function show(category $category)
    {
        //
    }


    public function edit(category $category)
    {
        //
    }

  
    public function update(StoreCategoriesRequest $request)
    {
        try{
            $category=category::findorfail($request->id);
            $category->update([
                'name'=>['ar'=>$request->name ,'en'=>$request->name_en],

                'notes'=>$request->notes,
                // 'name'=>$request->name,

            ]);
            session()->flash('edit','تم تعديل المنتج بنجاح');
            return redirect('categories');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error',$e->getMessage()]);

        }
    }


    public function destroy($id)
    {
        try{
            // $category=category::findorfail($id);
          category::destroy($id);
            session()->flash('Deleted','تم حذف المنتج بنجاح');
            return redirect('categories');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error',$e->getMessage()]);

        }
    }
}
