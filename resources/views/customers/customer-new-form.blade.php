
<form action="<?php echo route('newCustomer'); ?>" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Customer information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->            
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cstName">Name</label>
                                    <input required="required" type="text" class="form-control" name="cstName" id="cstName" placeholder="Enter customer name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="cstAddress">Address</label>
                                    <input required="required" type="text" class="form-control" name="cstAddress" id="cstAddress" placeholder="Enter customer address">
                                </div>

                                <div class="form-group">
                                    <label for="cstPhone">Phone</label>
                                    <input required="required" type="text" class="form-control" name="cstPhone" id="cstPhone" placeholder="Enter customer phone">
                                </div>

                                <div class="form-group">
                                    <label for="cstFather">Father's name</label>
                                    <input type="text" class="form-control" name="cstFather" id="cstFather" placeholder="Enter father's name">
                                </div>

                                <div class="form-group">
                                    <label for="cstMother">Mother's name</label>
                                    <input type="text" class="form-control" name="cstMother" id="cstMother" placeholder="Enter mother's name">
                                </div>

                                <div class="form-group">
                                    <label for="cstReference">Reference</label>
                                    <input type="text" class="form-control" name="cstReference" id="cstReference" placeholder="Enter reference number">
                                </div>

                                <div class="form-group">
                                    <label for="cstPhoto">Photo link</label>
                                    <input type="text" class="form-control" name="cstPhoto" id="cstPhoto" placeholder="Enter customer photo URL"/>
                                </div>

                                <div class="form-group">
                                    <label for="cstStatus">Status</label>
                                    <select required="required" class="select2bs4" name="cstStatus" id="cstStatus" data-placeholder="Select customer status" style="width: 100%;">
                                        <option> -- Select status --</option>
                                        <option value="Customer initiated">Customer initiated</option>
                                        <option value="Premium">Premium</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Halted">Halted</option>
                                        <option value="Banned">Banned</option>
                                        <option value="Other ...">Other ... </option>
                                    </select>
                                </div>

                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cstEmail">Email</label>
                                    <input type="email" class="form-control" name="cstEmail" id="cstEmail" placeholder="Enter email id">
                                </div>

                                <div class="form-group">
                                    <label for="cstNid">NID</label>
                                    <input type="text" class="form-control" name="cstNid" id="cstNid" placeholder="Enter NID number"/>
                                </div>

                                <div class="form-group">
                                    <label for="cstSocialLink">Social media URL (Fb. LinkedIn)</label>
                                    <input type="text" class="form-control" name="cstSocialLink" id="cstSocialLink" placeholder="Enter profile link in comma seperated"/>
                                </div>

                                <div class="form-group">
                                    <label for="cstPortfolio">Portfolio</label>
                                    <input type="text" class="form-control" name="cstPortfolio" id="cstPortfolio" placeholder="Enter portfolio link"/>
                                </div>

                                <div class="form-group">
                                    <label for="cstTags">Tags</label>
                                    <input type="text" class="form-control" name="cstTags" id="cstTags" placeholder="Enter tags"/>
                                </div>
                                                                
                                <div class="form-group">
                                    <label for="cstTags">Comment</label>
                                    <textarea rows="8" class="form-control" name="cstComment" id="cstComment" placeholder="Enter comment"></textarea>
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

                
        </div>
        </div>
    </section>
</form>