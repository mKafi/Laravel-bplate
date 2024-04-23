<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Basic information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->            
                    <div class="card-body">
                        



                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>                                      
                                            <td width="30%">Title</td>
                                            <td>@if(isset($itemData->product->productTitle)){{ $itemData->product->productTitle }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Retail price</td>
                                            <td><strong>@if(isset($itemData->product->retailPrice)){{ $itemData->product->retailPrice }}@endif</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Special price</td>
                                            <td>@if(isset($itemData->product->specialPrice)){{ $itemData->product->specialPrice }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Wholesell price</td>
                                            <td>@if(isset($itemData->product->wholesellPrice)){{ $itemData->product->wholesellPrice }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Comment</td>
                                            <td>@if(isset($itemData->productMeta->comment)){{ $itemData->productMeta->comment }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Status</td>
                                            <td>@if(isset($itemData->productMeta->status)){{ $itemData->productMeta->status }}@endif</td>                                     
                                        </tr>
                                        <tr>                                      
                                            <td>Lot no.</td>
                                            <td>@if(isset($itemData->product->lot_id)){{ $itemData->product->lot_id }}@endif</td>                                      
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>                                      
                                            <td width="30%">Model</td>
                                            <td>@if(isset($itemData->productMeta->model)){{ $itemData->productMeta->model }}@endif</td>                                      
                                        </tr>
                                        <tr>
                                            <td>Variant</td>
                                            <td>@if(isset($itemData->productMeta->variant)){{ $itemData->productMeta->variant }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Company</td>
                                            <td>@if(isset($itemData->productMeta->company)){{ $itemData->productMeta->company }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Origin/Country</td>
                                            <td>@if(isset($itemData->productMeta->origin)){{ $itemData->productMeta->origin }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Other information</td>
                                            <td>@if(isset($itemData->productMeta->otherMeta)){{ $itemData->productMeta->otherMeta }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Tags</td>
                                            <td rowspan="2">@if(isset($itemData->product->tags)){{ $itemData->product->tags }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>&nbsp;</td>                                            
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>                                        
                                        <tr>                                      
                                            <td width="50%">Sold today: 0</td>
                                            <td></td>                                      
                                        </tr>
                                        <tr>
                                            <td>Today's stock: &nbsp; <strong>@if(isset($itemData->product->unit)){{ $itemData->product->unit }}@endif</strong></td> 
                                            <td rowspan="3"></td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Yesterday's stock: <strong>0</strong></td>
                                            
                                        </tr>
                                        <tr>                                      
                                            <td>Stock at 10 April 2023: <strong>0</strong></td>
                                                                             
                                        </tr>
                                        <tr>                                      
                                            <td width="50%">Stock threshold</td>
                                            <td>50</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td width="50%">&nbsp;</td>
                                            <td></td>
                                        </tr>
                                        <tr>                                      
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>                                   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div><label>Product description</label></div>
                                    @if(isset($itemData->productMeta->description)){{ $itemData->productMeta->description }}@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>