@extends('backend/master_dashboard')



@section('content')
<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="">Edit product</a></li>
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
                    <h3>Add Product</h3>
                </div>
    <div class="card-body">
        <form action="{{ route('update_product') }}" method="POST">
                @csrf

                <div class="row">

                    <input type="hidden" name="product_id" value="{{ $product_info->id }}" >

    <div class="col-md-6">
        <label class="mt-1" >Vendor</label>
        <select name="vendor_id" class="form-control">
            <option >--select vendor--</option>
            @foreach ($vendors as $vendor)
                <option value="{{$vendor->id }}" {{ ($product_info->vendor_id == $vendor->id)?'selected':'' }} >{{ $vendor->name }}</option>
            @endforeach
        </select>
        </div>

        <div class="col-md-6">
            <label class="mt-1" >Unit</label>
            <select name="unit_id" class="form-control">
                <option >--select unit--</option>
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}" {{ ($product_info->unit_id == $unit->id)?'selected':'' }}  >{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label class="mt-1" >Category</label>
            <select name="category_id" class="form-control">
                <option >--select category--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ ($product_info->category_id == $category->id)?'selected':'' }}  >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

            <div class="col-md-6">
            <label class="mt-1">Product Name</label>
            <input type="text" name="name" value="{{ $product_info->name }}" class="form-control my-1" >
            </div>

        </div>

                <input type="submit" class="btn btn-primary mt-4" >


                </form>
            </div>
        </div>
    </div>
</div>




@endsection
