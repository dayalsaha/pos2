@extends('backend/master_dashboard')

@section('content')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('add_vendor') }}">Add Vendor</a></li>
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
                    <h3>Add Vendor</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('vendor_store') }}" method="POST">
                            @csrf

                           <div class="row">

                            <div class="col-md-6">
                                <label class="mt-1" >Vendor Name</label>
                                <input type="text" name="name" class="form-control my-1" >
                               </div>

                               <div class="col-md-6">
                                <label class="mt-1">Mobile Number</label>
                                <input type="text" name="mobile_number" class="form-control my-1" >
                               </div>

                               <div class="col-md-6">
                                <label class="mt-1">Email</label>
                                <input type="email" name="email" class="form-control my-1" >
                               </div>

                               <div class="col-md-6">
                                <label class="mt-1">Address</label>
                                <input type="text" name="address" class="form-control my-1" >
                               </div>

                           </div>

                           <input type="submit" class="btn btn-primary mt-4" >


                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

