@extends('backend/master_dashboard')



@section('content')
<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="">Edit purchase</a></li>
    </ol>


    <div class="row">
        <div class="col-md-12">
            {{-- @if('ad_vendor')
            <div class="alert alert-primary">
                <p>{{ session('ad_vendor') }}</p>
            </div>
            @endif --}}

            <div class="card">
                <div class="card-header">
                    <h3>Add Purchase</h3>
                </div>
    <div class="card-body">

        @php
            $purchase_no = '#'.uniqid();
        @endphp

        <form action="{{ route('store_purchase') }}" method="POST" >
            @csrf
            <div class="row">

                <div class="col-md-4">
                    <label class="mt-2" >Vendor</label>
                    <select name="vendor_id" id="vendor_id" class="form-control">
                        <option >--select vendor--</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{$vendor->id }}"  >{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                    </div>

            <div class="col-md-4">
                <label class="mt-2" >Category</label>
                <select name="category_id" id="category_id" class="form-control">
                            <option >--select category--</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id }}" >{{$category->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="mt-2" >Warehouse</label>
                        <select name="warehouse_id" id="warehouse_id" class="form-control">
                                    <option >--select category--</option>
                                    @foreach ($warehouses as $warehouse)
                                    <option value="{{$category->id }}" >{{$warehouse->name }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="mt-2" >Product</label>
                                <select name="product_id" id="product_id" class="form-control">
                                            <option >--select product--</option>
                                            @foreach ($products as $product)
                                            <option value="{{$category->id }}" >{{$product->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>

                    <div class="col-md-4">
                        <label class="mt-2" >Date</label>
                            <input type="date" name="date" class="form-control" placeholder="YYYY-DD-MM" >
                        </div>

                        <div class="col-md-4">
                            <label class="mt-2" >Purchase No</label>
                            <input type="text" value="{{ $purchase_no }}" name="purchase_no" id="purchase_no" class="form-control" readonly >
                            </div>


                        <div class="col-md-4">
                            <label class="mt-2" >Price</label>
                        <input type="number" name="price" placeholder="ট" class="form-control" >
                            </div>

                        <div class="col-md-4">
                            <label class="mt-2" >Quantity</label>
                        <input type="number" name="qty"   class="form-control" >
                            </div>

                        <div class="col-md-4">
                            <label class="mt-2" >Discount</label>
                        <input type="number" name="discount" placeholder="ট" class="form-control" >
                            </div>

                            <div class="col-md-12">
                                <label class="mt-2" >Description</label>
                            <textarea name="description" class="form-control"  cols="30" rows="4"></textarea>

                            <button class="btn btn-primary mt-3" type="submit" >Create Purchase</button>
                                </div>



                    </div>



                </div>
            </div>
        </div>



        </form>

</div>


@endsection
