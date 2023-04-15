@extends('backend/master_dashboard')

@section('content')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('view_warehouse') }}">view warehouse</a></li>
    </ol>


    <div class="row">
        <div class="col-md-12">


            <div class="card">
                <div class="card-header space-between align-item-center">
                    <h3>View Unit</h3>
                <a href="{{ route('add_warehouse') }}" class="btn btn-primary" >Add Warehouse</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive" >
                        <table class="table table-bordered table-hovered table-fixed" >
                            <thead >
                                <tr>
                                    <th class="th.sm">Sl</th>
                                    <th class="th.sm">Warehouse Name</th>
                                    <th class="th.sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($warehouses as $key=>$warehouse)
                                 <tr>
                                     <td>{{ $key+1 }}</td>
                                     <td>{{ $warehouse->name }}</td>

                                     <td>
                         <a href="{{ route('del_warehouse', $warehouse->id) }}" name="delete" class="btn-sm btn-danger "><i class="fa fa-trash-o" ></i></a>
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

