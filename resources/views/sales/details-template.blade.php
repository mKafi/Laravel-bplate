<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">General nformation</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->            
                    <div class="card-body">
                        



                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>                                      
                                            <td width="30%">Invoice Id</td>
                                            <td><?php if(!empty($itemData->sales->invoiceCode)){ echo $itemData->sales->invoiceCode; } ?></td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Customer</td>
                                            <td><strong>@if(isset($itemData->sales->name)){{ $itemData->sales->name }}@endif</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>@if(isset($itemData->sales->address)){{ $itemData->sales->address }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Phone</td>
                                            <td>@if(isset($itemData->sales->phone)){{ $itemData->sales->phone }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Reference</td>
                                            <td>@if(isset($itemData->sales->reference)){{ $itemData->sales->reference }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Payment date</td>
                                            <td>@if(isset($itemData->sales->nextPaymentDate)){{ $itemData->sales->nextPaymentDate }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Sales point</td>
                                            <td>@if(isset($itemData->sales->salesPoint)){{ $itemData->sales->salesPoint }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Sold by</td>
                                            <td>@if(isset($itemData->sales->salesAgent)){{ $itemData->sales->salesAgent }}@endif</td>                                     
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>                                      
                                            <td width="30%">Date & Time</td>
                                            <td>@if(isset($itemData->sales->sellingDate)){{ $itemData->sales->sellingDate }}@endif</td>                                      
                                        </tr>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>@if(isset($itemData->sales->subTotal)){{ $itemData->sales->subTotal }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Tax</td>
                                            <td>@if(isset($itemData->sales->tax)){{ $itemData->sales->tax }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Previous due</td>
                                            <td>@if(isset($itemData->sales->previousDue)){{ $itemData->sales->previousDue }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Discount</td>
                                            <td>@if(isset($itemData->sales->discount)){{ $itemData->sales->discount }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Grand Total</td>
                                            <td>@if(isset($itemData->sales->grandTotal)){{ $itemData->sales->grandTotal }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Paid</td>
                                            <td>@if(isset($itemData->sales->paid)){{ $itemData->sales->paid }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Due</td>
                                            <td>@if(isset($itemData->sales->due)){{ $itemData->sales->due }}@endif</td>                                      
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>                                        
                                        <tr>                                      
                                            <td width="50%">Status</td>
                                            <td>@if(isset($itemData->sales->status)){{ $itemData->sales->status }}@endif</td>                                      
                                        </tr>                                        
                                        <tr rowspan="4">                                            
                                            <td colspan="2">
                                                <label>Comment</label>
                                                <div>{{ $itemData->sales->comment }}</div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div><label>Product description</label></div>
                                    @if(isset($itemData->sales->description)){{ $itemData->sales->description }}@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>