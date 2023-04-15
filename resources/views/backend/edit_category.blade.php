@extends('backend/master_dashboard')



@section('content')
<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('add_category') }}">Add Category</a></li>
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
                    <h3>Add Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update_category') }}" method="POST">
                            @csrf

                            <input type="hidden" value="{{ $cat_info->id }}" name="cat_id" >

                           <div class="row">

                            <div class="col-md-6">
                                <label class="mt-1" >Category Name</label>
                                <input type="text" value="{{ $cat_info->name }}" name="name" class="form-control my-1" >
                               </div>

                           </div>

                           <button type="submit" class="btn btn-primary mt-4" >Update Category</button>


                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
