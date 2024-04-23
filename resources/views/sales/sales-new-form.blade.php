<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <!-- form start -->            
                    <div class="card-body">
                        <form id="orderForm" action="<?php echo route('postNewSale'); ?>" method="post">
                            @csrf
                            <div class="row">                            
                                <div class="col-md-7">                                
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="cstName" name="cstName" placeholder="Enter customer name" value=""/>                                        
                                        </div>
                                        <div class="col-md-4">                                        
                                            <input type="text" class="form-control" id="cstPhone" name="cstPhone" placeholder="Enter customer phone" value=""/>                                        
                                        </div>
                                        <div class="col-md-4">     
                                            <h3>Total: <span class="txtOrderTotal">0</span></h3>
                                            <!-- <input type="text" class="form-control" id="ordPaid" name="ordPaid" placeholder="Paid amount">  -->
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4">                                        
                                            <input type="text" class="form-control" id="cstAddrss" name="cstAddrss" placeholder="Enter customer address">                                        
                                        </div>
                                        <div class="col-md-4">                                        
                                            <input type="text" class="form-control" id="cstReference" name="cstReference" placeholder="Enter customer reference">                                        
                                        </div>
                                        <div class="col-md-4">     
                                            
                                        </div>
                                    </div>
                                            
                                    <table id="tempInvoice" class="table table-bordered">
                                        <thead>
                                            <th style="width:5%">Sl.</th>
                                            <th>Item</th>
                                            <th width="10%">Unit.P</th>
                                            <th width="10%">Qty</th>                                        
                                            <th width="10%">Total</th>
                                        </thead>
                                        
                                        <tbody>
                                            <tr id="subtotal-row">
                                                <td colspan="4">Subtotal</td>
                                                <td><input type="text" name="subtotal" id="subtotal" class="invHiddenText form-control" value="0" readonly="readonly"/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Tax</td>
                                                <td><input type="text" readonly="readonly" name="tax" id="tax" class="invHiddenText form-control" value="0"/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Discount</td>
                                                <td id="discount"><input type="text" name="invDiscount" id="invDiscount" class="invHiddenText form-control" value="0"/></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Previous Due</td>
                                                <td id="pDue"> <input type="text" name="previousDue" id="previousDue" class="invHiddenText form-control" value="0" readonly="readonly"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Grand Total</td>
                                                <td id="grand-total">0</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div><label>Order total in text: </label></div>
                                                @if(isset($itemData->productMeta->description)){{ $itemData->productMeta->description }}@endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea class="form-control" id="ordComment" name="ordComment" placeholder="Enter order comment/note..."></textarea>
                                        </div>
                                    </div><br/>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table id="submit-form" class="table table-bordered">
                                                <tr>
                                                    <td>                                                    
                                                        <div class="row"> 
                                                            <input type="hidden" id="prdList" name="prdList" value=""/>
                                                            <input type="hidden" id="salesPoint" name="salesPoint" value=""/>
                                                            <div class="col-md-3"><label>Paid</label><input type="text" class="form-control" id="ordPaid" name="ordPaid" value="" placeholder="Paid"/></div>
                                                            <div class="col-md-3"><label>Change</label><input readonly="readonly" type="text" class="form-control" id="ordChange" name="ordChange" value="" placeholder="Change"/></div>
                                                            <div class="col-md-3"><label>Due</label><input readonly="readonly" type="text" class="form-control" id="ordDue" name="ordDue" value="" placeholder="Due"/></div>
                                                            <div class="col-md-3"><button type="button" id="btnSubmitOrder" class="btn btn-block bg-gradient-primary btn-lg">Place Order</button></div>
                                                        </div>                                                   
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>                            

                                <div class="col-md-5">
                                    <table id="items-table" class="table table-bordered table-striped">
                                        <thead>                                        
                                            <th colspan="2">Item</th>
                                            <th width="10%">Stock</th>
                                            <th width="10%">Price</th>
                                        </thead>
                                        <tbody> 
                                            @if(isset($productList))
                                                @foreach ($productList as $product)
                                                    <tr data-pid="{{ $product['pid'] }}">
                                                        <td width="3%"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></td>
                                                        <td>{{ $product['title'] }}</td>
                                                        <td>{{ $product['qty'] }}</td>
                                                        <td>{{ $product['retailPrice'] }}</td>
                                                    </tr>
                                                @endforeach  
                                            @else
                                                <tr colspan="4">No products available</tr>    
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="defaultModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>One fine body&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->