@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>All Customer's Orders</h2>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Total Bill</th>
        <th width="280px">Action</th>
    </tr>
@dd($inventories)
    @foreach ($inventories as $inv)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $inv->customer_id }}</td>
        <td>{{ $inv->total_bill_amount }}</td>
        <td>
            <form action="{{ route('products.destroy',$inv_prod->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('products.show',$inv_prod->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('products.edit',$inv_prod->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $inventoryProducts->links() !!}

@endsection


