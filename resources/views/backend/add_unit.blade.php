@extends('backend/master_dashboard')


@section('content')
<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('add_unit') }}">Add Unit</a></li>
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
                    <h3>Add Units</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('store_unit') }}" method="POST">
                            @csrf

                           <div class="row">

                            <div class="col-md-6">
                                <label class="mt-1" >Unit Name</label>
                                <input type="text" name="name" class="form-control my-1" >
                               </div>

                           </div>

                           <input type="submit" class="btn btn-primary mt-4" >


                    </form>
                </div>
            </div>
        </div>
    </div>








@endsection
