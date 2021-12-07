@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-white" style="background-color: #50cd89; color: #d1f7be;">Purchase List</div>
                
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                
                <table class="table table-bordered table-striped" id="dynamicAddRemove">
                    <tr>
                        <th class="">SL.</th>
                        <th class="">Invoice No</th>
                        <th class="">Purchase ID</th>
                        <th class="">Vendor Name</th>
                        <th class="">Purchase Date</th>
                        <th class="">Total Amount</th>                        
                        <th class="">Action</th>
                    </tr>

                    @foreach ( $purchase_lists as $purchase_list )
                        <tr>
                            <th class="">SL.</th>
                            <th class="">{{ $purchase_list->invoice_no }}</th>
                            <th class="">{{ $purchase_list->id }}</th>
                            <th class="">{{ $purchase_list->vendor }}</th>
                            <th class="">{{ $purchase_list->purchase_date }}</th>
                            <th class="">{{ $purchase_list->grand_total }}</th>                        
                            <th class="">
                                <form action="{{ route('purchase.update', $purchase_list) }}" 
                                    method="post" class="mr-1">
                                    @csrf
                                    {{-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;" aria-hidden="true"></i> --}}
                                    <button type="submit" id="dynamic-ar" class="btn"><i class="fa fa-edit fa-2x" style="color: #50cd89;" aria-hidden="true"></i></button>
                                </form>
                            </th>
                        </tr>
                    @endforeach                    
                    
                </table>                
                
            </div> {{-- Class: card --}}
        </div> {{-- Class: col-md-10 --}}
    </div>
</div>

@endsection



