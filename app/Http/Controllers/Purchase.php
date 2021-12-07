<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use App\Models\PurchaseDetails;
use App\Models\RecordTotal;
use App\Models\Store;
use App\Models\Vendor;
use Illuminate\Http\Request;

class Purchase extends Controller
{
    public function __construct () {
        $this->middleware(['auth']);
    }

    public function purchase_list () {
        // $purchase_details = PurchaseDetails::where('grn_no', '23')->first();
        $purchase_lists = PurchaseDetails::orderBy('grn_no', 'asc')->get();
        return view('purchase.purchase_list', [
            'purchase_lists' => $purchase_lists,
        ]);
    }

    public function index () {
        $vendors = Vendor::orderBy('id', 'asc')->get();
        $stores = Store::orderBy('id', 'asc')->get();
        $items = ItemModel::orderBy('id', 'asc')->get();
        return view('purchase.addpurchase', [
            'vendors' => $vendors,
            'stores' => $stores,
            'items' => $items,
        ]);
    }

    public function updatepurchaseview ($id)
    {
        $purchase_lists = PurchaseDetails::where('grn_no', $id)->first();
        $items = RecordTotal::where('grn_no', $id)->get();
        
        $item_list_default_record = ItemModel::orderBy('id', 'asc')->get();
        $vendors = Vendor::orderBy('id', 'asc')->get();
        $stores = Store::orderBy('id', 'asc')->get();
        return view('purchase.updatepurchase', [
            'purchase_lists' => $purchase_lists,
            'items' => $items,
            'item_list_default_record' => $item_list_default_record,
            'vendors' => $vendors,
            'stores' => $stores,
        ]);
    }

    public function store (Request $request) {

            $this->validate($request,
            [
                // Purchase details create
                'grn_no'=> 'unique:purchase_details|required|max:15',
                'vendor'=> 'required|string',
                'invoice_no'=> 'unique:purchase_details|required',
                'payment_type'=> 'required|string',
                'purchase_date'=> 'required|string',
                'store' => ['nullable', 'string'],
                'details' => ['nullable', 'string'],
                'stock' =>'required',

                'second_total' => 'nullable',
                'discount' => 'nullable',
                'grand_total' => 'nullable',
                'paid_amount' => 'nullable',
                'due_amount' => 'nullable',

                /*  
                    Record total create
                    Comes with the grn_no
                */
                'record_total.*.item_info' => 'required',
                'record_total.*.stk_qty' => 'nullable',
                'record_total.*.qty' => 'required',
                'record_total.*.rate' => 'required',
                'record_total.*.total' => 'nullable',
            ]);

            /*  
                Record total create
                Comes with the grn_no
            */
            foreach ($request->record_total as $record) {
                RecordTotal::create([
                    'grn_no' => $request->grn_no,
                    'item_info' => $record['item_info'],
                    // 'stk_qty' => $record['stk_qty'],
                    'qty' => $record['qty'],
                    'rate' => $record['rate'],
                    'total' => $record['total'],
                ]);
            }            
            
            // Purchase details create
            PurchaseDetails::create([
                'grn_no' => $request->grn_no,
                'vendor' => $request->vendor,
                'invoice_no' => $request->invoice_no,
                'payment_type' => $request->payment_type,
                'purchase_date' => $request->purchase_date,
                'store' => $request->store,
                'details' => $request->details,
                'stock' => $request->stock,

                'second_total' => $request->second_total,
                'discount' => $request->discount,
                'grand_total' => $request->grand_total,
                'paid_amount' => $request->paid_amount,
                'due_amount' => $request->due_amount,
            ]);            
    
            return redirect()->route('purchase.add')->with('success','Record Added');
            return response()->json([
                'success' => 'Employee Added Successfully'
            ], 400);        
    } 


    public function updatepurchase (Request $request) 
    {
        // dd('Deleted');
        PurchaseDetails::where('grn_no', $request->grn_no)->delete();
        RecordTotal::where('grn_no', $request->grn_no)->delete();

        /*
            Record total create
            Comes with the grn_no
        */
        foreach ($request->record_total as $record) {
            RecordTotal::create([
                'grn_no' => $request->grn_no,
                'item_info' => $record['item_info'],
                // 'stk_qty' => $record['stk_qty'],
                'qty' => $record['qty'],
                'rate' => $record['rate'],
                'total' => $record['total'],
            ]);
        }            
        
        // Purchase details create
        PurchaseDetails::create([
            'grn_no' => $request->grn_no,
            'vendor' => $request->vendor,
            'invoice_no' => $request->invoice_no,
            'payment_type' => $request->payment_type,
            'purchase_date' => $request->purchase_date,
            'store' => $request->store,
            'details' => $request->details,
            'stock' => $request->stock,

            'second_total' => $request->second_total,
            'discount' => $request->discount,
            'grand_total' => $request->grand_total,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $request->due_amount,
        ]); 

        return redirect()->route('purchase.purchase_list')->with('success','Record Updated');
        
    }

}
