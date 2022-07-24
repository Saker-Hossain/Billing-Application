@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Input Form</h2>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group mx-sm-3 mb-2">
                <input type="text" class="form-control " placeholder="Bill NO">
                <button class="btn btn-primary" type="button">Find</button>
            </div>
        </div>

        {{-- <form> --}}
        <div class="form-row">
            <div class="col">
                <select class="form-select mt-4" aria-label="Default select example">
                    <option selected>Add Product or Items</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select mt-4" aria-label="Default select example">
                    <option selected>Select a Customer</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col">
                <div class="form-group mt-4">
                    <div class='input-group date' id='datetimepicker1'>
                        {{-- <input type='text' class="form-control" /> --}}
                        <input id="datepicker" width="276" placeholder="Date"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

            </div>
        </div>
        {{-- </form> --}}
        {{-- <form action="">
            <div class="container">
                <div class="card shadow">
                    <div class="row">
                        <div class="col-md-2 my-auto bg-secondary text-white">
                            Product
                        </div>
                        <div class="col-md-2 my-auto bg-success text-white">
                            Rate
                        </div>
                        <div class="col-md-2 my-auto bg-secondary text-white">
                            Qty
                        </div>
                        <div class="col-md-2 my-auto bg-success text-white">
                            Total Amount
                        </div>
                        <div class="col-md-2 my-auto bg-secondary text-white">
                            Discount(Amt)
                        </div>
                        <div class="col-md-2 my-auto bg-success text-white">
                            Net Amount
                        </div>
                    </div>
                </div>
            </div>
        </form> --}}


        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Rate</th>
                    <th>Qty</th>
                    <th>Total Amount</th>
                    <th>Discount (Amt)</th>
                    <th>Net Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Energy Lamp 50wt </td>
                    <td> 500.00 </td>
                    <td>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Qty" >
                        </div>
                    </td>
                    <td>

                    </td>
                    <td>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Discount(Amt)" >
                        </div>
                    </td>
                    <td>

                    </td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">Net Amount</div>
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Net Total" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">Discount Total</div>
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Discount Total" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">Paid Amount</div>
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Paid Amount" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">Due Amount</div>
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Due Amount" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    {{-- <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker();
        });
    </script> --}}
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endsection
