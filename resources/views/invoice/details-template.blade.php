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
                            <?php 
                                if(!empty($itemData)){ ?>
                            <div class="col-md-8">
                                <table id="tempInvoice" class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table class="full-width">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="txtInvoice">INVOICE</div>
                                                                <div class="invInvoiceId"><?php echo !empty($itemData->invoiceInfo->invoiceId) ? $itemData->invoiceInfo->invoiceId : '';  ?></div>
                                                                <div class="inv-selling-date"><strong>Date: </strong><?php echo !empty($itemData->invoiceInfo->sellingDate) ? $itemData->invoiceInfo->sellingDate : ''; ?></div>
                                                            
                                                            </td>
                                                            <td class="text-right">
                                                                <h4>Akash Motors</h4>
                                                                <h6>Singra Bustand</h6>
                                                                <p>Phone: 01xxx xxxx xx</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>                                                
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table id="tempInvoice" class="table table-bordered">
                                                    <thead>
                                                        <th>Sl.</th>
                                                        <th>Item</th>
                                                        <th>Unit Price</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            if(!empty($itemData->invoiceItems)){
                                                                $cnt = 1;
                                                                foreach($itemData->invoiceItems AS $item){
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $cnt; ?></td>
                                                                        <td><?php echo $item->itemTitle; ?></td>
                                                                        <td><?php echo number_format($item->unitPrice,'2','.',','); ?></td>
                                                                        <td><?php echo $item->qty; ?></td>
                                                                        <td><?php echo number_format(($item->unitPrice * $item->qty),'2','.',','); ?></td>                                                                        
                                                                    </tr>
                                                                    <?php 
                                                                    $cnt++;
                                                                }
                                                            } 
                                                        ?>
                                                        <tr>
                                                            <td colspan="4">Total</td>
                                                            <td>{{ $itemData->invoiceInfo->subTotal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">Previous Due</td>
                                                            <td>{{ $itemData->invoiceInfo->previousDue }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">Tax</td>
                                                            <td>{{ $itemData->invoiceInfo->tax }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">Discount</td>
                                                            <td>{{ $itemData->invoiceInfo->discount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">Grand Total</td>
                                                            <td>{{ $itemData->invoiceInfo->grandTotal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">&nbsp;</td>                                                            
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">Paid</td>
                                                            <td>{{ $itemData->invoiceInfo->paid }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4"><strong>Due</strong></td>
                                                            <td>{{ $itemData->invoiceInfo->due }}</td>
                                                        </tr>                                                    
                                                    </tbody>
                                                </table>
                                                <div class="txtInword"><strong>In words: </strong></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table id="tempInvoice" class="table table-bordered">
                                    <tbody>
                                        <tr><td>Status: <strong>{{ $itemData->invoiceInfo->status }}</strong></td></tr>
                                        <?php if(!empty($itemData->invoiceInfo->due)){ ?>
                                            <tr><td>Full payment date: <strong>{{ $itemData->invoiceInfo->nextPaymentDate }}</strong></td></tr>
                                        <?php } ?>
                                        <tr>
                                            <td><strong>Comment: </strong>
                                                <div class="invComment">{{ $itemData->invoiceInfo->comment }}</div>
                                            </td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>

                            <?php }else {  ?>
                                <div class="col-md-12"><h4>Invoice data is not available</h4></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>