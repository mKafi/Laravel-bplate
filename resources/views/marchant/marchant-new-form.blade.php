
<form action="<?php echo route('newMarchant'); ?>" method="post" enctype="multipart/form-data">
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
                    <h3 class="card-title">Marchant information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->            
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marchant">Marchant owner</label>
                                    <input required="required" type="text" class="form-control" name="marchant" id="marchant" placeholder="Enter receivable name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="company">Organization/Marchant name</label>
                                    <input required="required" type="text" class="form-control" name="company" id="company" placeholder="Enter customer address">
                                </div>

                                <div class="form-group">
                                    <label for="details">Details</label>
                                    <textarea rows="8" class="form-control" name="details" id="details" placeholder="Enter comment"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select required="required" class="select2bs4" name="status" id="status" data-placeholder="Select a status" style="width: 100%;">
                                        <option> -- Select status --</option>
                                        <option value="Marchant initiated">Marchant initiated</option>                                        
                                        <option value="Regular">Regular</option>  
                                        <option value="Premium">Premium</option>                                        
                                        <option value="Withheld">Withheld</option>                                      
                                        <option value="Other ...">Other ... </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone/Contact</label>
                                    <input required="required" type="text" class="form-control" name="phone" id="phone" placeholder="Enter receivable name">
                                </div>

                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea rows="8" class="form-control" name="comment" id="comment" placeholder="Enter comment"></textarea>
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