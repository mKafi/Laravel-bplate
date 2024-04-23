<form action="<?php echo route('newProduct'); ?> " method="post" enctype="multipart/form-data">
    @csrf
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Bulk upload</h3>
                        </div>
                        <!-- /.card-header -->
                    
                        <div class="card-body">                            
                            <div class="form-group">
                                <label for="prdBulkUpload">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="prdBulkUpload" id="prdBulkUpload">
                                        <label class="custom-file-label" for="prdBulkUpload">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <input type="submit" class="input-group-text" value="Upload"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<form action="<?php echo route('newProduct'); ?>" method="post" enctype="multipart/form-data">
    @csrf
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
                            <label for="prdTitle">Product title<span class="required">*</span></label>
                            <input required="required" type="text" class="form-control" name="prdTitle" id="prdTitle" placeholder="Enter product title">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prdModel">Model</label>
                                    <input required="required" type="text" class="form-control" name="prdModel" id="prdModel" placeholder="Enter product model">
                                </div>

                                <div class="form-group">
                                    <label for="prdOrigin">Origin</label>
                                    <input type="text" class="form-control" name="prdOrigin" id="prdOrigin" placeholder="Enter product origin">
                                </div>

                                <div class="form-group">
                                    <label for="prdCompany">Company</label>
                                    <input type="text" class="form-control" name="prdCompany" id="prdCompany" placeholder="Enter product manufacturer company">
                                </div>

                                <div class="form-group">
                                    <label for="prdVariant">Variant</label>
                                    <input type="text" class="form-control" name="prdVariant" id="prdVariant" placeholder="Enter product variant">
                                </div>

                                <div class="form-group">
                                    <label for="prdLotNumber">Lot number</label>
                                    <input type="text" class="form-control" name="prdLotNumber" id="prdLotNumber" placeholder="Enter product lot number">
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prdCategory">Category  <sup><a href="/product/categories">List</a></sup></label>
                                    <select class="select2bs4" name="prdCategory" id="prdCategory" multiple="multiple" data-placeholder="Select categories" style="width: 100%;">
                                        @foreach ($itemData['categories'] as $key => $category)
                                            <option value="{{ $key }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="prdComment">Comment</label>
                                    <textarea class="form-control" style="height:124px" name="prdComment" id="prdComment" placeholder="Comment..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="prdOther">Other</label>
                                    <textarea class="form-control" style="height:124px" name="prdOther" id="prdOther" placeholder="Other..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                                    <label for="prdRetailPrice">Unit price<span class="required">*</span>&nbsp;&nbsp;<sup>Retail</sup></label>
                                    <input type="number" class="form-control" required="required" name="prdRetailPrice" id="prdRetailPrice" placeholder="Retail price">
                                </div>
                                <div class="col-3">
                                    <label for="prdSpecialPrice">Special price</label>
                                    <input type="number" class="form-control" name="prdSpecialPrice" id="prdSpecialPrice" placeholder="Special price">
                                </div>
                                <div class="col-3">
                                    <label for="prdWholeSalePrice">Wholesale price</label>
                                    <input type="number" class="form-control" name="prdWholeSalePrice" id="prdWholeSalePrice" placeholder="Wholesale price">
                                </div>                            
                                <div class="col-3">
                                    <label for="prdCurrentStock">Initial stock</label>
                                    <input type="number" class="form-control" name="prdCurrentStock" id="prdCurrentStock" placeholder="Current stock">
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
                            <textarea class="form-control" rows="5" name="prdDescription" id="prdDescription" placeholder="Enter product description..."></textarea>
                            <br/>
                            <div class="form-group">
                                <label for="prdTags">Tags</label>
                                <select class="select2bs4" name="prdTags" id="prdTags" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">                                    
                                    @foreach ($itemData['prdTags'] as $key => $prdTags)
                                        <option value="{{ $key }}">{{ $prdTags }}</option>
                                    @endforeach
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