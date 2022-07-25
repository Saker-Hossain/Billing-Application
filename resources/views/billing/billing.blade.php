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
        <div class="form-row ">
            <div class="col ">
                <select class="form-select mt-4 productSelect" aria-label="Default select example" id="productSelect">
                    <option selected>Add Product or Items</option>
                    @foreach ($products as $prod)
                        <option id="productName{{ $prod->id }}" value="{{ $prod->id }}">{{ $prod->name }}</option>
                        {{-- <option value="2">Two</option>
                        <option value="3">Three</option> --}}
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select class="form-select mt-4" aria-label="Default select example">
                    <option selected>Select a Customer</option>
                    @foreach ($customers as $user)
                        <option value="1">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <div class="form-group mt-4">
                    <div class='input-group date' id='datetimepicker1'>
                        <input id="datepicker" width="276" placeholder="Date" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

            </div>
        </div>


        <table class="table table-striped mt-5 " id="billTable">
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
            <tbody id="billTable-body">
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">Net Amount</div>
                <div class="input-group ">
                    <input type="text" id="net-amount" class="form-control" placeholder="Net Total" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">Discount Total</div>
                <div class="input-group ">
                    <input id="discount-total" type="text" class="form-control" placeholder="Discount Total"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">Paid Amount</div>
                <div class="input-group ">
                    <input type="text" id="paid" name="paid" onchange="checkdue(this.value)" class="form-control"
                        placeholder="Paid Amount" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0 me-2">Due Amount</div>
                <div class="input-group ">
                    <input type="text" id="due" class="form-control" placeholder="Due Amount" aria-label="Username"
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


@section('js-scripts')
    <script type="text/javascript">
        var products = <?php echo json_encode($products->toArray()); ?>;
        console.log(products);

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

        function qtyChange(val) {
            var row = $(this).closest("tr");

        }

        function checkdue(val) {
            let net_amount = $("#net-amount").val();
            let dis_amount = $("#discount-total").val();
            let due = (+net_amount - +dis_amount) - +val
            $("#due").val(due)
        }

        function getTotal() {
            var net_amount = 0;
            var discount_total = 0;
            var paid_amount = 0;

            $("#billTable-body tr").each(function(row) {
                let qty = parseFloat($(this).find(".qty").val());
                let price = parseFloat($(this).find(".price").val());
                let discount = parseFloat($(this).find(".discount").val());
                discount_total += discount;

                let total = (qty * price);

                $(this).find(".tot").html(isNaN(total) ? 0.00 : parseFloat(total).toFixed(2));

                let net_total = (qty * price) - discount;
                net_amount += net_total;

                $(this).find(".net-amount").html(isNaN(net_total) ? 0.00 : parseFloat(net_total).toFixed(2));
                $(this)
                    .find(".total").val(isNaN(net_total) ? 0 : parseFloat(net_total).toFixed(2));
            });

            $("#net-amount").val(parseFloat(net_amount).toFixed(2));
            $("#discount-total").val(parseFloat(discount_total).toFixed(2));
        }

        $(document).ready(function() {
            $("#productSelect").on("change", function() {
                let selValue = $("#productSelect").val();
                let product = products.filter(function(idx) {
                    return idx.id == selValue;
                })[0];

                let row =
                    `<tr id="` + product.id + `">
                        <input type="hidden" value="` + product.id + `" name="product_id">
                        <td>` + product.name + ` </td>
                        <td> ` + product.rate + ` </td>
                        <td>
                            <div class = "input-group mb-1">
                           <input type="number" class="form-control qty" placeholder="Qty" value="1" name="quantity" onchange="getTotal()">
                           </div></td>
                        <td class="tot"> ` + product.rate + ` </td>
                        <input type="hidden" class="price" value="` + product.rate + `" name="product_id">
                        <td>
                            <div class = "input-group mb-1">
                           <input type="number" class="discount form-control" placeholder="Discount(Amt)" value="0" name="discount" onchange="getTotal()">
                           </div></td>
                        <td class="net-amount"> ` + product.rate + ` </td>
                        <input type="hidden" class="total" value="` + product.rate + `" name="product_id">
                    </tr>`;
                $("#billTable-body").append(row);
            });
        });
    </script>
@endsection
