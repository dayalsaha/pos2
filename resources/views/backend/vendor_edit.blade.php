@extends('backend/master_dashboard')

@section('content')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="">Edit Vendor</a></li>
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
                    <h3>Edit Vendor</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_vendor') }}" method="POST">
                            @csrf

                            <input type="hidden" value="{{ $vendors_info->id }}" name="vendor_id"  >

                           <div class="row">

                            <div class="col-md-6">
                                <label class="mt-1">Vendor Name</label>
                                <input type="text" value="{{ $vendors_info->name }}" name="name" class="form-control my-1" >
                               </div>

                               <div class="col-md-6">
                                <label class="mt-1">Mobile Number</label>
                                <input type="text" value="{{ $vendors_info->mobile_number }}" name="mobile_number" class="form-control my-1" >
                               </div>

                               <div class="col-md-6">
                                <label class="mt-1">Email</label>
                                <input type="email" value="{{ $vendors_info->email }}" name="email" class="form-control my-1" >
                               </div>

                               <div class="col-md-6">
                                <label class="mt-1">Address</label>
                                <input type="text" value="{{ $vendors_info->address }}" name="address" class="form-control my-1" >
                               </div>


                           </div>

                    <button type="submit" class="btn btn-primary mt-4" >Update Vendor</button>


                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

