<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Receivable nformation</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->            
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>                                      
                                            <td width="30%">Client/Customer</td>
                                            <td><?php if(!empty($itemData->receivable->client)){ echo $itemData->receivable->client; } ?></td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Address</td>
                                            <td>@if(isset($itemData->receivable->address)){{ $itemData->receivable->address }}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>Reference</td>
                                            <td>@if(isset($itemData->receivable->reference)){{ $itemData->receivable->reference }}@endif</td>                                      
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td>@if(isset($itemData->receivable->contact)){{ $itemData->receivable->contact }}@endif</td>                                      
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Amount</td>
                                            <td>@if(isset($itemData->receivable->amount)){{ $itemData->receivable->amount }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td width="30%">Due</td>
                                            <td>@if(isset($itemData->receivable->dueDate)){{ $itemData->receivable->dueDate }}@endif</td>                                      
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td>@if(isset($itemData->receivable->type)){{ $itemData->receivable->type }}@endif</td>                                      
                                        </tr>
                                        <tr>                                      
                                            <td>Status</td>
                                            <td>@if(isset($itemData->receivable->status)){{ $itemData->receivable->status }}@endif</td>                                      
                                        </tr>                                          
                                                                              
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div><label>Comment</label></div>
                                    @if(isset($itemData->receivable->comment)){{ $itemData->receivable->comment }}@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>