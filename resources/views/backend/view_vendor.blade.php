@extends('backend/master_dashboard')

@section('content')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('view_vendor') }}">view Vendor</a></li>
    </ol>


    <div class="row">
        <div class="col-md-12">


            <div class="card">
                <div class="card-header space-between align-item-center">
                    <h3>View Vendor</h3>
                <a href="{{ route('add_vendor') }}" class="btn btn-primary" >Add Vendor</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive" >
                        <table class="table table-bordered table-hovered table-fixed" >
                            <thead >
                                <tr>
                                    <th class="th.sm">Sl</th>
                                    <th class="th.sm">Name</th>
                                    <th class="th.sm">Mobile No</th>
                                    <th class="th.sm">Email</th>

                                    <th class="th.sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($vendors as $key=>$vendor)
                                 <tr>
                                     <td>{{ $key+1 }}</td>
                                     <td>{{ $vendor->name }}</td>
                                     <td>{{ $vendor->mobile_number }}</td>
                                     <td>{{ $vendor->email }}</td>
                                     <td>

                         <a href="{{ route('edit_vendor',$vendor->id) }}" name="edit" class="btn-sm btn-primary  "><i class="fa fa-pencil-square-o" ></i></a>
                         <a href="{{ route('delete_vendor', $vendor->id) }}" name="delete" class="btn-sm btn-danger "><i class="fa fa-trash-o" ></i></a>
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

