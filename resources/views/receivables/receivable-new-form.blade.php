
<form action="<?php echo route('newReceivable'); ?>" method="post" enctype="multipart/form-data">
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
                    <h3 class="card-title">Receivable information</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->            
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rcvClient">Client/Customer</label>
                                    <input required="required" type="text" class="form-control" name="rcvClient" id="rcvClient" placeholder="Enter receivable name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="rcvAddress">Address</label>
                                    <input required="required" type="text" class="form-control" name="rcvAddress" id="rcvAddress" placeholder="Enter customer address">
                                </div>

                                <div class="form-group">
                                    <label for="rcvContact">Contact</label>
                                    <input required="required" type="text" class="form-control" name="rcvContact" id="rcvContact" placeholder="Enter client contact number">
                                </div>

                                <div class="form-group">
                                    <label for="cstReference">Reference</label>
                                    <input type="text" class="form-control" name="rcvReference" id="rcvReference" placeholder="Enter reference">
                                </div>

                                <div class="form-group">
                                    <label for="rcvAmount">Amount</label>
                                    <input type="text" class="form-control" name="rcvAmount" id="rcvAmount" placeholder="Enter father's name">
                                </div>

                                <div class="form-group">
                                    <label for="rcvStatus">Status</label>
                                    <select required="required" class="select2bs4" name="rcvStatus" id="rcvStatus" data-placeholder="Select client status" style="width: 100%;">
                                        <option> -- Select status --</option>
                                        
                                        <option value="Receivable initiated">Receivable initiated</option>
                                        <option value="Overdue">Overdue</option>
                                        <option value="Partially paid">Partially paid</option>
                                        <option value="Paid">Paid/Completed</option>  
                                        <option value="Abandoned">Abandoned</option>                                      
                                        <option value="Other ...">Other ... </option>
                                    </select>
                                </div>

                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rcvDueDate">Due date</label>
                                    <input type="text" class="form-control" name="rcvDueDate" id="rcvDueDate" placeholder="Last payment date">
                                </div>

                                <div class="form-group">
                                    <label for="rcvType">Type</label>
                                    <select required="required" class="select2bs4" name="rcvType" id="rcvType" data-placeholder="Select account type" style="width: 100%;">
                                        <option> -- Select type --</option>                                        
                                        <option value="Sales invoice">Sales invoice</option>
                                        <option value="Personal loan">Personal loan</option>
                                        <option value="Product exchange">Product exchange</option>
                                        <option value="Service charge/Fee">Service charge/Fee</option>                                        
                                        <option value="Other ...">Other ... </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="rcvComment">Comment</label>
                                    <textarea rows="8" class="form-control" name="rcvComment" id="rcvComment" placeholder="Enter comment"></textarea>
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