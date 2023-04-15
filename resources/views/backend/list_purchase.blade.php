@extends('backend/master_dashboard')

@section('content')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
        <li class="breadcrumb-item" ><a href="{{ route('pos_dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item" ><a href="{{ route('list_purchase') }}">Add purchase</a></li>
    </ol>


    <div class="row">
        <div class="col-md-12">


            <div class="card">
                <div class="card-header space-between align-item-center">
                    <h3>$purchase</h3>
                <a href="{{ route('add_purchase') }}" class="btn btn-primary" >Add purchase</a>
                </div>
                <div class="card-body">

                    <div class="table-responsive" >
                        <table id="dtable" class="table table-bordered table-hovered table-fixed" >
                            <thead >
                                <tr>
                                    <th class="th.sm">Purchase</th>
                                    <th class="th.sm">Vendor</th>
                                    <th class="th.sm">Category</th>
                                    <th class="th.sm">Purchase Date</th>
                                    <th class="th.sm">Status</th>
                                    <th class="th.sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
            @foreach ($purchases as $purchase)
                <tr>
                    <td>  @if($purchase->total_amount)
                             &#2547;

                            @else
                            '';
                            @endif{{$purchase->total_amount}}
                        </td>
                    <td>{{ $purchase->rel_to_vendor->name }}</td>
                    <td>{{ $purchase->rel_to_category->name }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>{{ ($purchase->status == 1)? 'active':'inactive' }}</td>
                    <td>

        <a href="{{ route('status_purchase', $purchase->id ) }}" name="update" class="btn-sm btn-info  "><i class="fa fa-wrench" ></i></a>

        <a href="{{ route('del_purchase', $purchase->id ) }}" name="delete" class="btn-sm btn-danger "><i class="fa fa-trash-o" ></i></a>
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

@section('footer_script')

<script>
    $(document).ready( function () {
    $('#dtable').DataTable();
} );
</script>

@endsection

