@extends('backend/master_dashboard')

@section('content')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('view_product') }}">view Product</a></li>
    </ol>


    <div class="row">
        <div class="col-md-12">


            <div class="card">
                <div class="card-header space-between align-item-center">
                    <h3>View Product</h3>
                <a href="{{ route('add_product') }}" class="btn btn-primary" >Add Product</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive" >
                        <table class="table table-bordered table-hovered table-fixed" >
                            <thead >
                                <tr>
                                    <th class="th.sm">Sl</th>
                                    <th class="th.sm">Product Name</th>
                                    <th class="th.sm">Vendor</th>

                                    <th class="th.sm">category</th>
                                    <th class="th.sm">Action</th>
                                </tr>
                            </thead>
                    <tbody>
                        @foreach ($products as $key=>$product)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->rel_to_vendor->name }}</td>

                                <td>{{ $product->rel_to_category->name }}</td>

                                <td>

                        <a name="edit" href="{{ route('edit_product', $product->id ) }}"  class="btn-sm btn-primary "><i class="fa fa-pencil-square-o" ></i></a>

<a name="delete" href=" {{ route('del_product', $product->id ) }}"  class="btn-sm btn-danger "><i class="fa fa-trash-o" ></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        </div>
    </div>



@endsection

