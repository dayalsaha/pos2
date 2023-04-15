@extends('backend/master_dashboard')

@section('content')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('view_unit') }}">view Unit</a></li>
    </ol>


    <div class="row">
        <div class="col-md-12">


            <div class="card">
                <div class="card-header space-between align-item-center">
                    <h3>View Unit</h3>
                <a href="{{ route('add_unit') }}" class="btn btn-primary" >Add Unit</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive" >
                        <table class="table table-bordered table-hovered table-fixed" >
                            <thead >
                                <tr>
                                    <th class="th.sm">Sl</th>
                                    <th class="th.sm">Unit Name</th>
                                    <th class="th.sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($units as $key=>$unit)
                                 <tr>
                                     <td>{{ $key+1 }}</td>
                                     <td>{{ $unit->name }}</td>

                                     <td>

                         <a href="{{ route('edit_unit', $unit->id) }}" name="edit" class="btn-sm btn-primary  "><i class="fa fa-pencil-square-o" ></i></a>
                         <a href="{{ route('del_unit', $unit->id) }}" name="delete" class="btn-sm btn-danger "><i class="fa fa-trash-o" ></i></a>
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

