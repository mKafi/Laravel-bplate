<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Customer nformation</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->            
                    <div class="card-body">
                        



                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>                                      
                                            <td width="30%">Name</td>
                                            <td><?php if(!empty($itemData->customer->name)){ echo $itemData->customer->name; } ?></td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Address</td>
                                            <td>@if(isset($itemData->customer->address)){{ $itemData->customer->address }}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>@if(isset($itemData->customer->phone)){{ $itemData->customer->phone }}@endif</td>                                      
                                        </tr>
                                        <tr>
                                            <td>Link</td>
                                            <td>
                                                <?php if(!empty($itemData->customer->mediaLink)){ ?>
                                                    <a href="<?php echo $itemData->customer->mediaLink; ?>" target="_blank"><?php echo $itemData->customer->mediaLink; ?></a> 
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>                                      
                                            <td width="30%">Father's name</td>
                                            <td>@if(isset($itemData->customer->father)){{ $itemData->customer->father }}@endif</td>                                      
                                        </tr>
                                        <tr>
                                            <td>Mother's name</td>
                                            <td>@if(isset($itemData->customer->mother)){{ $itemData->customer->mother }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Reference</td>
                                            <td>@if(isset($itemData->customer->reference)){{ $itemData->customer->reference }}@endif</td>                                      
                                        </tr>                                          
                                        <tr>                                      
                                            <td>Portfolio</td>
                                            <td>
                                                <?php if(!empty($itemData->customer->portfolio)){ ?>
                                                    <a href="<?php echo $itemData->customer->portfolio; ?>" target="_blank"><?php echo $itemData->customer->portfolio; ?></a> 
                                                <?php } ?>
                                            </td>                                      
                                        </tr>                                       
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tbody>                                        
                                        <tr>                                      
                                            <td width="50%">Status</td>
                                            <td>@if(isset($itemData->customer->status)){{ $itemData->customer->status }}@endif</td>                                      
                                        </tr> 
                                        <tr>                                      
                                            <td width="50%">Email</td>
                                            <td>@if(isset($itemData->customer->email)){{ $itemData->customer->email }}@endif</td>                                      
                                        </tr> 
                                        <tr>                                      
                                            <td width="50%">NID</td>
                                            <td>@if(isset($itemData->customer->nid)){{ $itemData->customer->nid }}@endif</td>                                      
                                        </tr> 
                                        <tr>                                      
                                            <td width="50%">Tags</td>
                                            <td>@if(isset($itemData->customer->tags)){{ $itemData->customer->tags }}@endif</td>                                      
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div><label>Comment</label></div>
                                    @if(isset($itemData->customer->comment)){{ $itemData->customer->comment }}@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>