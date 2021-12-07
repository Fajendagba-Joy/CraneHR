@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-white" style="background-color: #50cd89; color: #d1f7be;">Purchase</div>

                <div class="card-body">     
                    <form action="{{ route('purchase.updaterecord') }}" method="post">
                    @csrf
                    
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-3" style="color: #12456a;">Update Purchase Record</h3>

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <p><strong>Opps Something went wrong</strong></p>
                                            <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger">{{session('error')}}</div>
                                    @endif

                                    @if(session('success'))
                                        <div class="alert alert-success">{{session('success')}}</div>
                                    @endif


                                    <div class="mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="grn_no" style="margin-left: 0px;">GRN NO <i class="text-danger"><i class="text-danger">*</i></i></label>
                                            <input readonly="readonly" type="text" name="grn_no" id="grn_no"
                                                class="form-control form-control-md @error('grn_no') border border-danger @enderror" 
                                                value="{{ $purchase_lists->grn_no }}"  autocomplete="grn_no">
                                            @error('grn_no')
                                                <div class="text-danger error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                        </div>
                                    </div>
                                    
                                    {{-- Come back --}}
                                    <div class="mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="vendor" style="margin-left: 0px;">Vendor <i class="text-danger"><i class="text-danger">*</i></i></label>
                                            <select name="vendor" class="form-control @error('vendor') border border-danger @enderror" id="vendor" >
                                                @if (isset($vendors))
                                                    @foreach ($vendors as $vendor)
                                                        <option value="{{$vendor->name}}" 
                                                        @if ($purchase_lists->vendor == $vendor->name)
                                                            selected                                                            
                                                        @endif >{{$vendor->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('vendor')
                                                <div class="text-danger error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                        </div>
                                    </div>

                                    <div class="mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="invoice_no" style="margin-left: 0px;">Incoice No <i class="text-danger">*</i></label>
                                            <input type="text" name="invoice_no" id="invoice_no"
                                            class="form-control form-control-md @error('invoice_no') border border-danger @enderror" 
                                            value="{{ $purchase_lists->invoice_no }}"  autocomplete="invoice_no">
                                            @error('invoice_no')
                                                <div class="text-danger error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                        </div>
                                    </div>

                                    {{-- Come back --}}
                                    <div class="mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="payment_type" style="margin-left: 0px;">Payment Type <i class="text-danger">*</i></label>
                                            <select name="payment_type" class="form-control @error('payment_type') border border-danger @enderror" id="payment_type" >
                                                <option value="Cash">Cash</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                            </select>
                                            @error('napayment_typeme')
                                                <div class="text-danger error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-lg-6 bg-indigo">
                                <div class="p-5">
                                    <h3 class="fw-normal mb-5" style="color: #12456a;"></h3>

                                    <div class="mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="purchase_date" style="margin-left: 0px;">Purchase Date <i class="text-danger">*</i></label>
                                            <input type="date" name="purchase_date" id="purchase_date" 
                                            class="form-control form-control-md @error('purchase_date') border border-danger @enderror" 
                                            value="{{ $purchase_lists-> purchase_date }}"  autocomplete="purchase_date">
                                            @error('purchase_date')
                                                <div class="text-danger error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                        </div>
                                    </div>

                                    {{-- Come back --}}
                                    <div class="mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="store" style="margin-left: 0px;">Store</label>
                                            <select name="store" class="form-control @error('store') border border-danger @enderror" id="store">
                                                @if (isset($stores))
                                                    @foreach ($stores as $store)
                                                        <option value="{{$store->name}}" 
                                                        @if ($purchase_lists->store == $store->name)
                                                            selected                                                            
                                                        @endif >{{$store->name}}</option>

                                                        {{-- <option value="{{$store->name}}">{{$store->name}}</option> --}}
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('store')
                                                <div class="text-danger error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label" for="details" style="margin-left: 0px;">Details</label>
                                        <textarea name="details" id="details" cols="17" rows="1" 
                                        class="form-control  @error('details') border border-danger @enderror"
                                        placeholder="Details of product">{{$purchase_lists->details}}</textarea>
                                        @error('details')
                                            <div class="text-danger error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> 

                                    {{-- Come back --}}
                                    <div class="mb-2 pb-2">
                                        <div class="form-outline">
                                            <label class="form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="stock" 
                                                {{ (is_array(old('stock')) && in_array(1, old('stock'))) ? ' checked' : '' }}> Is Opening Stock
                                            </label>
                                            @error('stock')
                                                <div class="text-danger error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                        </div>
                                    </div>                                      
                                </div>
                            </div> {{-- Class: col-lg-6 --}}
                            

                            <div class="container col-lg-11"> 

                                <table class="table table-bordered table-striped" id="dynamicAddRemove">
                                    <tr>
                                        <th class="" width="25%">Item Information <i class="text-danger">*</i></th>
                                        <th class="" width="15%">Stock / QTY </th>
                                        <th class="" width="15%">QTY <i class="text-danger">*</i></th>
                                        <th class="" width="20%">Rate <i class="text-danger">*</i></th>
                                        <th class="" width="20%">Total</th>
                                        <th class="" width="5%">Action</th>
                                    </tr>

                                    
                                    @forelse ($items as $value => $item)
                                        {{$item_count = count($items)}}
                                        
                                        <tr>
                                            <td class=""  width="25%">
                                            
                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <select name="record_total[{{$value}}][item_info]" class="form-control @error('record_total[0][item_info]') border border-danger @enderror" id="item_info">
                                                            @foreach ($item_list_default_record as $item_default_record)
                                                                <option value="{{$item_default_record->item_info}}" 
                                                                    @if ($item->item_info == $item_default_record->item_info)
                                                                        selected
                                                                    @endif >{{$item_default_record->item_info}}
                                                                </option>
                                                            @endforeach                                                            
                                                        </select>
                                                        @error('record_total.0.item_info')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="" width="15%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <input readonly="readonly" type="text" name="record_total[{{$value}}][stk_qty]" id="stk_qty" placeholder="0.00" 
                                                        class="text-right form-control form-control-md @error('record_total[0][stk_qty]') border border-danger @enderror" 
                                                        value="{{ old('record_total[0][stk_qty]') }}"  autocomplete="stk_qty">
                                                        @error('record_total.0.stk_qty')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="" width="15%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <input type="number" name="record_total[{{$value}}][qty]" id="qty" min="0.00" placeholder="0.00" 
                                                        class="qty text-right form-control form-control-md @error('qty') border border-danger @enderror" 
                                                        value="{{ $item->qty }}"  autocomplete="qty">
                                                        @error('record_total.0.qty')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="" width="20%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <input type="text" name="record_total[{{$value}}][rate]" id="rate" placeholder="0.00" 
                                                        class="rate text-right form-control form-control-md @error('rate') border border-danger @enderror" 
                                                        value="{{ $item->rate }}"  autocomplete="rate">
                                                        @error('record_total.0.rate')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="" width="20%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <input readonly="readonly" type="text" name="record_total[{{$value}}][total]" id="total" placeholder="0.00" 
                                                        class="record_total text-right form-control form-control-md @error('total') border border-danger @enderror" 
                                                        value="{{ $item->total }}"  autocomplete="total">
                                                        @error('record_total.0.total')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            {{-- <td class="" width="5%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <button type="button" id="dynamic-ar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>                                                    
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td> --}}
                                        </tr>

                                    @empty

                                        @if(empty($item_count))
                                            {{$item_count = 1}}
                                        @endif

                                        <tr>
                                            <td class=""  width="25%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <select name="record_total[0][item_info]" class="form-control @error('record_total[0][item_info]') border border-danger @enderror" id="item_info">
                                                            @if (isset($item_list_default_record))
                                                                @foreach ($item_list_default_record as $item)
                                                                    <option value="{{$item->item_info}}">{{$item->item_info}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('record_total.0.item_info')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="" width="15%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <input readonly="readonly" type="text" name="record_total[0][stk_qty]" id="stk_qty" placeholder="0.00" 
                                                        class="text-right form-control form-control-md @error('record_total[0][stk_qty]') border border-danger @enderror" 
                                                        value="{{ old('record_total[0][stk_qty]') }}"  autocomplete="stk_qty">
                                                        @error('record_total.0.stk_qty')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="" width="15%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <input type="number" name="record_total[0][qty]" id="qty" min="0.00" placeholder="0.00" 
                                                        class="qty text-right form-control form-control-md @error('qty') border border-danger @enderror" 
                                                        value="{{ old('qty') }}"  autocomplete="qty">
                                                        @error('record_total.0.qty')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="" width="20%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <input type="text" name="record_total[0][rate]" id="rate" placeholder="0.00" 
                                                        class="rate text-right form-control form-control-md @error('rate') border border-danger @enderror" 
                                                        value="{{ old('rate') }}"  autocomplete="rate">
                                                        @error('record_total.0.rate')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="" width="20%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <input readonly="readonly" type="text" name="record_total[0][total]" id="total" placeholder="0.00" 
                                                        class="record_total text-right form-control form-control-md @error('total') border border-danger @enderror" 
                                                        value="{{ old('record_total[0][total]') }}"  autocomplete="total">
                                                        @error('record_total.0.total')
                                                            <div class="text-danger error">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td>
                                            {{-- <td class="" width="5%">

                                                <div class="mb-2 pb-2">
                                                    <div class="form-outline">
                                                        <button type="button" id="dynamic-ar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>                                                    
                                                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                    </div>
                                                </div>

                                            </td> --}}
                                        </tr>
                                    @endforelse
                                    
                                    <tfoot>
                                        <tr>                                            
                                            <td class="text-right" colspan="4">
                                                <b>Total:</b>
                                            </td>
                                            <td class="text-right">
                                                <input readonly="readonly" type="text" name="second_total" id="second_total" placeholder="0.00" 
                                                class="total text-right form-control form-control-md @error('second_total') border border-danger @enderror" 
                                                value="{{ $purchase_lists->second_total }}"  autocomplete="second_total">
                                                @error('second_total')
                                                    <div class="text-danger error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> 
                                                
                                                <button type="button" id="dynamic-ar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button> 
                                                {{-- <button type="button" id="add_more" class="btn btn-info" name="add-row" onclick="addPurchaseOrderField1('addPurchaseItem')" tabindex="9"><i class="fa fa-plus"></i></button> --}}
                                            </td>
                                        </tr>

                                        <tr>                                        
                                            <td class="text-right" colspan="4">
                                                <b>Discount:</b>
                                            </td>
                                            <td class="text-right">
                                                <input type="text" name="discount" id="discount" placeholder="0.00" 
                                                class="text-right form-control form-control-md @error('discount') border border-danger @enderror" 
                                                value="{{ $purchase_lists->discount }}"  autocomplete="discount">
                                                @error('discount')
                                                    <div class="text-danger error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>                                            
                                            <td class="text-right" colspan="4"><b>Grand Total:</b></td>
                                            <td class="text-right">
                                                <input readonly="readonly" type="text" name="grand_total" id="grand_total" placeholder="0.00" 
                                                class="text-right form-control form-control-md @error('grand_total') border border-danger @enderror" 
                                                value="{{ $purchase_lists->grand_total }}"  autocomplete="grand_total">
                                                @error('grand_total')
                                                    <div class="text-danger error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            
                                            <td class="text-right" colspan="4"><b>Paid Amount:</b></td>
                                            <td class="text-right">
                                                <input type="text" name="paid_amount" id="paid_amount" placeholder="0.00" 
                                                class="text-right form-control form-control-md @error('paid_amount') border border-danger @enderror" 
                                                value="{{ $purchase_lists->paid_amount }}"  autocomplete="paid_amount">
                                                @error('paid_amount')
                                                    <div class="text-danger error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right">
                                                <input type="button" id="full_paid_tab" class="btn btn-warning" value="Full Paid" tabindex="16" onclick="full_paid()">
                                            </td>
                                            <td class="text-right" colspan="2"><b>Due Amount:</b></td>
                                            <td class="text-right">
                                                <input readonly="readonly" type="text" name="due_amount" id="due_amount" placeholder="0.00" 
                                                class="text-right form-control form-control-md @error('due_amount') border border-danger @enderror" 
                                                value="{{ $purchase_lists->due_amount }}"  autocomplete="due_amount">
                                                @error('due_amount')
                                                    <div class="text-danger error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>                                    
                                    
                                </table>

                                {{-- Second Table for Total sum and discount calculations 
                                <table class="table table-borderless table-striped" id="dynamicAddRemove">
                                    <tr>
                                        <th class="" width="20%">Total</th>
                                        <th class="" width="20%">Discount</th>
                                        <th class="" width="20%">Grand Total</th>
                                        <th class="" width="20%">Paid Amount</th>
                                        <th class="" width="20%">Due Amount</th>
                                    </tr>

                                    <tr>
                                        <th class="" width="20%">
                                            <div class="mb-2 pb-2">
                                                <div class="form-outline">
                                                    <input readonly="readonly" type="text" name="second_total" id="second_total" placeholder="0.00" 
                                                    class="total text-right form-control form-control-md @error('second_total') border border-danger @enderror" 
                                                    value="{{ $purchase_lists->second_total }}"  autocomplete="second_total">
                                                    @error('second_total')
                                                        <div class="text-danger error">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                </div>
                                            </div>
                                        </th>
                                        <th class="" width="20%">
                                            <div class="mb-2 pb-2">
                                                <div class="form-outline">
                                                    <input type="text" name="discount" id="discount" placeholder="0.00" 
                                                    class="text-right form-control form-control-md @error('discount') border border-danger @enderror" 
                                                    value="{{ $purchase_lists->discount }}"  autocomplete="discount">
                                                    @error('discount')
                                                        <div class="text-danger error">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                </div>
                                            </div>
                                        </th>
                                        <th class="" width="20%">
                                            <div class="mb-2 pb-2">
                                                <div class="form-outline">
                                                    <input readonly="readonly" type="text" name="grand_total" id="grand_total" placeholder="0.00" 
                                                    class="text-right form-control form-control-md @error('grand_total') border border-danger @enderror" 
                                                    value="{{ $purchase_lists->grand_total }}"  autocomplete="grand_total">
                                                    @error('grand_total')
                                                        <div class="text-danger error">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                </div>
                                            </div>
                                        </th>
                                        <th class="" width="20%">
                                            <div class="mb-2 pb-2">
                                                <div class="form-outline">
                                                    <input type="text" name="paid_amount" id="paid_amount" placeholder="0.00" 
                                                    class="text-right form-control form-control-md @error('paid_amount') border border-danger @enderror" 
                                                    value="{{ $purchase_lists->paid_amount }}"  autocomplete="paid_amount">
                                                    @error('paid_amount')
                                                        <div class="text-danger error">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                </div>
                                            </div>
                                        </th>
                                        <th class="" width="20%">
                                            <div class="mb-2 pb-2">
                                                <div class="form-outline">
                                                    <input readonly="readonly" type="text" name="due_amount" id="due_amount" placeholder="0.00" 
                                                    class="text-right form-control form-control-md @error('due_amount') border border-danger @enderror" 
                                                    value="{{ $purchase_lists->due_amount }}"  autocomplete="due_amount">
                                                    @error('due_amount')
                                                        <div class="text-danger error">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </table>
                                --}}

                            </div> 
                            
                        </div>
                        
                        <div>
                            <button type="submit" class="btn btn-primary">Update Record</button>
                        </div>
                    </form>                    
                </div> {{-- Class: card-body --}}
            </div> {{-- Class: card --}}
        </div> {{-- Class: col-md-10 --}}
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    var i = 0;
    var count = @json($item_count);

    var item_not_empty_count = @json($items);
    console.log("Print: ",item_not_empty_count);
    
    i = i += (count-1);

    /*  Function to calculate the total of all record_totals
        Using the record_total class
    */
    function cal_total() {
        var record_total = 0;
        $('.record_total').each((index, item)=>{ record_total += Number(item.value) });
        $("[name='second_total").val(record_total);
        // $("[name='second_total").val(record_total);
    }

    function calc_grand_total() {
        var discount = $("[name='discount").val();
        var record_total = $("[name='second_total").val();
        var grand_total = record_total - discount;
        $("[name='grand_total").val(grand_total);
    }

    function calc_due_amount() {
        var grand_total = $("[name='grand_total").val();
        var paid_amount = $("[name='paid_amount").val();
        var due_amount = grand_total - paid_amount;
        $("[name='due_amount").val(due_amount);
    }

    // This is for calculating grand total
    $("[name='paid_amount']").on('keyup mouseup blur',function ()
    {
        // Total - Discount = Grand Total
        calc_due_amount();
    });

    // This is for calculating grand total
    $("[name='discount']").on('keyup mouseup blur',function ()
    {
        // Total - Discount = Grand Total
        calc_grand_total();
        calc_due_amount();
    });
    
    item_not_empty_count.forEach(function (item, index) {
    
        // Click event for item and rate auto select
        $(`[name='record_total[${index}][item_info]']`).click(function ()
        {
            console.log('clicked item_info');
            var selected = $(`[name='record_total[${index}][item_info]']`).val();
            var items = @json($items);
            var default_items = @json($item_list_default_record);

            selected_rate = items.find(item => item.item_info === selected);
            default_selected_rate = default_items.find(default_item => default_item.item_info === selected);
            
            if (selected_rate) {
                $(`[name='record_total[${index}][rate]']`).val(selected_rate.rate);
                $(`[name='record_total[${index}][stk_qty]']`).val(selected_rate.stk_qty);
            } else{
                $(`[name='record_total[${index}][rate]']`).val(default_selected_rate.rate);
                $(`[name='record_total[${index}][stk_qty]']`).val(default_selected_rate.stk_qty);
            }
        });
    

        // This is for calculations before the + icon is clicked
        $(`[name='record_total[${index}][rate]']`).on('keyup mouseup blur',function ()
        {
            var total = "";
            qty = $(`[name='record_total[${index}][qty]']`).val();
            total = $(`[name='record_total[${index}][rate]']`).val();
            total = total*qty;
            $(`[name='record_total[${index}][total]']`).val(total);

            // Add second total to add all total for the first table
            cal_total();
            calc_grand_total();
            calc_due_amount();
        });
        
        $(`[name='record_total[${index}][qty]']`).on('keyup mouseup',function ()
        {
            var total = "";
            qty = $(`[name='record_total[${index}][qty]']`).val();
            total = $(`[name='record_total[${index}][rate]']`).val();
            total = total*qty;
            $(`[name='record_total[${index}][total]']`).val(total);
            
            // Add second total to add all total for the first table
            cal_total();
            calc_grand_total();
            calc_due_amount();
        });

    });

    $("#dynamic-ar").click(function () {
        ++i;
        var current_index = i;
        var total = "";
                
        $("#dynamicAddRemove").append(`
            <tr>

                <td class=""  width="25%">
                    <div class="mb-2 pb-2">
                        <div class="form-outline">
                            <select name="record_total[${current_index}][item_info]" class="form-control @error('item_info') border border-danger @enderror" id="item_info">
                                @if (isset($item_list_default_record))
                                    @foreach ($item_list_default_record as $item)                                                                    
                                        <option value="{{$item->item_info}}">{{$item->item_info}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('record_total.${current_index}.item_info')
                                <div class="text-danger error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                        </div>
                    </div>
                </td>

                <td class="" width="15%">
                    <div class="mb-2 pb-2">
                        <div class="form-outline">
                            <input readonly="readonly" type="text" name="record_total[${current_index}][stk_qty]" id="stk_qty" placeholder="0.00" 
                            class="text-right form-control form-control-md @error('stk_qty') border border-danger @enderror" 
                             autocomplete="stk_qty">
                            @error('record_total.${current_index}.stk_qty')
                                <div class="text-danger error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                        </div>
                    </div>
                </td>

                <td class="" width="15%">
                    <div class="mb-2 pb-2">
                        <div class="form-outline">
                            <input type="number" name="record_total[${current_index}][qty]" id="qty" min="0.00" placeholder="0.00" 
                            class="qty text-right form-control form-control-md @error('qty') border border-danger @enderror" 
                             autocomplete="qty">
                            @error('record_total.${current_index}.qty')
                                <div class="text-danger error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                        </div>
                    </div>
                </td>

                <td class="" width="20%">
                    <div class="mb-2 pb-2">
                        <div class="form-outline">
                            <input type="text" name="record_total[${current_index}][rate]" id="rate" placeholder="0.00" 
                            class="rate text-right form-control form-control-md @error('rate') border border-danger @enderror" 
                             autocomplete="rate">
                            @error('record_total.${current_index}.rate')
                                <div class="text-danger error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                        </div>
                    </div>
                </td>

                <td class="" width="20%">
                    <div class="mb-2 pb-2">
                        <div class="form-outline">
                            <input readonly="readonly" type="text" name="record_total[${current_index}][total]" id="total" placeholder="0.00" 
                            class="record_total text-right form-control form-control-md @error('total') border border-danger @enderror" value="${total}">
                            @error('record_total.${current_index}.total')
                            
                                <div class="text-danger error">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                        </div>
                    </div>
                </td>

                <td class="" width="5%">
                    <div class="mb-2 pb-2">
                        <div class="form-outline">
                            <button type="button" id="dynamic-ar" class="btn btn-danger remove-input-field"><i class="fa fa-trash" aria-hidden="true"></i></button>                                                    
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 53.6px;"></div><div class="form-notch-trailing"></div></div>
                        </div>
                    </div>
                </td>
            </tr>
        `);
        
        // This is for calculations once the + icon is clicked
        $(`[name='record_total[${current_index}][rate]']`).on('keyup mouseup blur',function ()
        {
            var total = "";
            qty = $(`[name='record_total[${current_index}][qty]']`).val();
            total = $(`[name='record_total[${current_index}][rate]']`).val();
            total = total*qty;
            $(`[name='record_total[${current_index}][total]']`).val(total);

            // Add second total to add all total for the first table
            cal_total();
            calc_grand_total();
            calc_due_amount();
        });

        $(`[name='record_total[${current_index}][qty]']`).on('keyup mouseup',function ()
        {
            var total = "";
            qty = $(`[name='record_total[${current_index}][qty]']`).val();
            total = $(`[name='record_total[${current_index}][rate]']`).val();
            total = total*qty;
            $(`[name='record_total[${current_index}][total]']`).val(total);

            // Add second total to add all total for the first table
            cal_total();
            calc_grand_total();
            calc_due_amount();
        });


        // Click event for item and rate auto select
        $(`[name='record_total[${current_index}][item_info]']`).click(function () {
            var selected = $(`[name='record_total[${current_index}][item_info]']`).val();
            var items = @json($items);
            var default_items = @json($item_list_default_record);

            selected_rate = items.find(item => item.item_info === selected);
            default_selected_rate = default_items.find(default_item => default_item.item_info === selected);
            
            if (selected_rate) {
                $(`[name='record_total[${current_index}][rate]']`).val(selected_rate.rate);
                $(`[name='record_total[${current_index}][stk_qty]']`).val(default_selected_rate.stk_qty);
            } else{
                $(`[name='record_total[${current_index}][rate]']`).val(default_selected_rate.rate);
                $(`[name='record_total[${current_index}][stk_qty]']`).val(default_selected_rate.stk_qty);
            }
        });


        
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
        /*  Add second total to add all total for the first table
            Also calculates total once the button is clicked
        */
        cal_total();
        calc_grand_total();
        calc_due_amount();
    });
</script>

@endsection


