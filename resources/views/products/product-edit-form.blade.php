<form action="<?php echo route('updateProduct'); ?>" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="productId" value="@if($itemData['product']->id){{ $itemData['product']->id }} @endif"/>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            
                <!-- left column -->
                <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Basic information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->            
                    <div class="card-body">
                        <div class="form-group">
                            <label for="prdTitle">Product title</label>
                            <input required="required" type="text" class="form-control" name="prdTitle" id="prdTitle" value="@if($itemData['product']->productTitle){{ $itemData['product']->productTitle }}@endif" placeholder="Enter product title">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prdModel">Model</label>
                                    <input required="required" type="text" class="form-control" name="prdModel" id="prdModel" value="@if($itemData['productMeta']->model){{ $itemData['productMeta']->model }}@endif" placeholder="Enter product model">
                                </div>

                                <div class="form-group">
                                    <label for="prdOrigin">Origin</label>
                                    <input type="text" class="form-control" name="prdOrigin" id="prdOrigin" value="@if($itemData['productMeta']->origin){{ $itemData['productMeta']->origin }}@endif" placeholder="Enter product origin">
                                </div>

                                <div class="form-group">
                                    <label for="prdCompany">Company</label>
                                    <input type="text" class="form-control" name="prdCompany" id="prdCompany" value="@if($itemData['productMeta']->company){{ $itemData['productMeta']->company }}@endif" placeholder="Enter product manufacturer company">
                                </div>

                                <div class="form-group">
                                    <label for="prdVariant">Variant</label>
                                    <input type="text" class="form-control" name="prdVariant" id="prdVariant" value="@if($itemData['productMeta']->variant){{ $itemData['productMeta']->variant }}@endif" placeholder="Enter product variant">
                                </div>

                                <div class="form-group">
                                    <label for="prdLotNumber">Lot number</label>
                                    <input type="text" class="form-control" name="prdLotNumber" id="prdLotNumber" value="@if($itemData['product']->lotNumber){{ $itemData['product']->lotNumber }}@endif" placeholder="Enter product lot number">
                                </div>

                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prdCategory">Category</label>
                                    <select class="select2bs4" name="prdCategory" id="prdCategory" multiple="multiple" data-placeholder="Select categories" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="prdComment">Comment</label>
                                    <textarea class="form-control" style="height:124px" name="prdComment" id="prdComment" placeholder="Comment...">@if($itemData['productMeta']->comment){{ $itemData['productMeta']->comment }}@endif</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="prdOther">Other</label>
                                    <textarea class="form-control" style="height:124px" name="prdOther" id="prdOther" placeholder="Other...">@if($itemData['productMeta']->otherMeta){{ $itemData['productMeta']->otherMeta }}@endif</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>            
                </div>
                <!-- /.card -->
                </div>

                <!-- right column -->
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Item price</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label for="prdRetailPrice">Retail price</label>
                                    <input type="number" class="form-control" name="prdRetailPrice" id="prdRetailPrice" value="@if($itemData['product']->retailPrice){{$itemData['product']->retailPrice}}@endif" placeholder="Retail price">
                                </div>
                                <div class="col-3">
                                    <label for="prdSpecialPrice">Special price</label>
                                    <input type="number" class="form-control" name="prdSpecialPrice" id="prdSpecialPrice" value="@if($itemData['product']->specialPrice){{$itemData['product']->specialPrice }}@endif" placeholder="Special price">
                                </div>
                                <div class="col-3">
                                    <label for="prdWholeSalePrice">Wholesale price</label>
                                    <input type="number" class="form-control" name="prdWholeSalePrice" id="prdWholeSalePrice" value="@if($itemData['product']->wholesellPrice){{$itemData['product']->wholesellPrice}}@endif" placeholder="Wholesale price">
                                </div>                            
                                <div class="col-3">
                                    <label for="prdCurrentStock">Initial stock</label>
                                    <input type="number" class="form-control" name="prdCurrentStock" id="prdCurrentStock" value="@if($itemData['product']->initialUnit){{$itemData['product']->initialUnit}}@endif" placeholder="Current stock">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    
                    <!-- Form Element sizes -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Item description</h3>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" rows="5" name="prdDescription" id="prdDescription" placeholder="Enter product description...">@if($itemData['productMeta']->description){{$itemData['productMeta']->description}}@endif</textarea>
                            <br/>
                            <div class="form-group">
                                <label for="prdTags">Tags</label>
                                <select class="select2bs4" name="prdTags" id="prdTags" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                                    <?php                                     
                                    if(!empty($itemData['product']->tags)){
                                        $itemTags = explode(",",$itemData['product']->tags);
                                    }   
                                    foreach($itemData['productTags'] as $tag){
                                        $selected = '';
                                        if(in_array(trim($tag), $itemTags)){
                                            $selected ='selected="selected"';
                                        }
                                        ?><option {{$selected}} value="{{ $tag }}">{{$tag}}</option><?php 
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->                    
                </div>
            
        </div>
        </div>
    </section>
</form>