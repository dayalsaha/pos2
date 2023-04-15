@extends('backend/master_dashboard')

@section('content')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="">Edit Unit</a></li>
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
                    <form action="{{ route('update_unit') }}" method="POST">
                            @csrf

                            <input type="hidden" value="{{ $unit_info->id }}" name="unit_id"  >

                           <div class="row">

                            <div class="col-md-6">
                                <label class="mt-1">Vendor Name</label>
                                <input type="text" value="{{ $unit_info->name }}" name="name" class="form-control my-1" >
                               </div>
                           </div>

                    <button type="submit" class="btn btn-primary mt-4" >Update Vendor</button>


                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

