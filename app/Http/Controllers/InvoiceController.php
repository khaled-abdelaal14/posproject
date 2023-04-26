<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\invoice;
use App\Models\invoice_details;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class InvoiceController extends Controller
{
 
    public function index()
    {
        $invoices=invoice::all();
        return view('backend.invoices.index',compact('invoices'));
    }

  
    public function create()
    {
        $categories=category::all();
        return view('backend.invoices.create', compact('categories'));
    }


    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
        $invoice=invoice::create([
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $request->invoice_date,
            'category_id' => $request->categorie_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'discount' => $request->discount,
            'tax_rate' => $request->tax_rate,
            'tax_value' => $request->tax_value,
            'total' => $request->total,
            'status' => 1,
            'notes' => $request->notes,
        ]);
        invoice_details::create([
            'invoice_id'=>$invoice->id,
            'status' => 1,
            'user_id'=>auth()->user()->id,
        ]);
        DB::commit();
        session()->flash('Add','تم اضافة الفاتورة بنجاح');
            return redirect('invoices');
    }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}


    public function show(invoice $invoice)
    {
        //
    }

  
    public function edit($id)
    {
        $invoice=invoice::findorfail($id);
        $categories=category::all();
        return view('backend.invoices.edit',compact('invoice'),compact('categories'));
    }

    public function update(Request $request, $id)
    {
        try{
            $invoice=invoice::findorfail($id);
            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'category_id' => $request->categorie_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);
            session()->flash('edit','تم تعديل الفاتورة بنجاح');
                return redirect('invoices');
        }
            catch (\Exception $e) {
                
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

   
    public function destroy(Request $request)
    {
        try{
            // $category=category::findorfail($id);
            invoice::destroy($request->invoice_id);
            session()->flash('Deleted','تم حذف الفاتورة بنجاح');
            return redirect('invoices');

        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error',$e->getMessage()]);

        }
    }
    //getproduct
    public function getproduct($id){
        $products=product::where('category_id',$id)->pluck('name','id');
        return $products;
    }
    //getproductprice
    public function getproductprice($id){
        $price=product::where('id',$id)->pluck('price');
        return $price;
    }

    //payment_statusChange
    public function payment_statusChange(Request $request)
    {
        DB::beginTransaction();
        try {

            $invoice= invoice::findorFail($request->invoice_id);
            $invoice->update([
                'status'=>$request->status,
            ]);
            // validate payment 
            // $todayDate = date('m/d/Y');
            // $this->validate($request, [

            //     'payment_date' => 'before_or_equal:'.$todayDate,
            // ]);

            // $Details = invoice_details::findOrFail($request->invoice_id);
              $Details= invoice_details::where('invoice_id',$request->invoice_id)->first();
            $Details->update([
                'invoice_id'=>$request->invoice_id,
                'status'=>$request->status,
                'payment_date'=>$request->payment_date,
                'user_id'=>auth()->user()->id,
            ]);

            DB::commit();
            session()->flash('Edit', __('backend/message.change stat invoice'));
            return redirect()->back();

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
  
}
