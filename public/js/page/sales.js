$( document ).ready(function() {
    function showDefaultModal(title, message){
        if($('#defaultModal').length > 0){
            $('#defaultModal h4').text(title);
            $('#defaultModal .modal-body p').text(message);
            $('#defaultModal').modal('show');
        }
    }

    function checkCustomerInfo(){
        let phone = $('#cstPhone').val();
        if(phone == '' || isNaN(phone)){
            title = 'Customer phone!';
            message = 'Please enter valid customer phone number';
            showDefaultModal(title,message);
            return false;            
        }
        else{ 
            return true; 
        }
    }

    /* Processing order after place order button click */
    function processOrder(){
        if($('.prd-total').length > 0){
            let items = Array();            
            $('.prd-total').each(function(i,obj){
                let temp = $(obj).attr('id').split('-');
                if($.isNumeric(temp[2])){
                    let qty = $('#prd-'+temp[2]).val();
                    let title = $('#title-for-'+temp[2]).text();
                    items.push(temp[2]+'|'+qty);
                }
            });
            let paid = $('#ordPaid').val();
            let change = $('#ordChange').val();
            let due = $('#ordDue').val();            
            $('#prdList').val(items.join('_'));  
            $('#orderForm').submit();                      
        }
    }

    function calculateTax(){
        let taxRate = 5;
        let tax = 0;
        let subTotal = parseFloat($("#subtotal").val());
        tax = (subTotal * (taxRate/100)).toFixed(2);
        $("input#tax").val(tax);
    }

    function calculateGrandTotal(){
        let grandTotal = 0;
        let subTotal = parseFloat($("#subtotal").val());        
        let tax = parseFloat($("#tax").val());        
        let invDiscount = parseFloat($("#invDiscount").val());
        let previousDue = parseFloat($("#previousDue").val());        
        grandTotal = ((subTotal+tax+previousDue)-invDiscount).toFixed(2);
        $("#grand-total, .txtOrderTotal").text(grandTotal);
    }
    
    function calculateSubTotal(){
        let subTotal = 0;
        $("#tempInvoice tbody tr.item-row").each(function(i,v){            
            subTotal += parseFloat($(v).find('td:last-child').text());
        });
        $("#tempInvoice tbody #subtotal").val(subTotal.toFixed(2));
        calculateTax();
    }

    function calculateItemTotal(obj){
        let qty = parseFloat(obj.val());        
        let unitPrice = parseFloat(obj.parent().parent().find('.prd-unit-price').text());        
        let itemPrice = (unitPrice * qty).toFixed(2);
        obj.parent().parent().find('.prd-total').text(itemPrice);
        calculateSubTotal();      
    }
    


    if($("#items-table tr").length > 0){        
        $(document).on("click","#items-table tr",function(){
            let pid = $(this).attr("data-pid");            
            let title = $(this).find("td:nth-child(2)").text();
            let unitPrice = parseFloat($(this).find("td:nth-child(4)").text());            

            let rows = parseInt($("#tempInvoice tr.item-row").length);
            let itemRow = '<tr class="item-row">';
                itemRow += '<td>'+(rows+1)+'</td>';
                itemRow += '<td class="prd-title" id="title-for-'+pid+'"><i class="fa fa-times-circle closeItem" aria-hidden="true"></i>'+title+'</td>';
                itemRow += '<td class="prd-unit-price">'+unitPrice.toFixed(2)+'</td>';
                itemRow += '<td><input type="number" id="prd-'+pid+'" class="prd-qty form-control" value="1"/></td>';                                      
                itemRow += '<td id="item-total-'+pid+'" class="prd-total">'+unitPrice.toFixed(2)+'</td>';
            itemRow += '</tr>';
            
            $("#tempInvoice tbody #subtotal-row").before(itemRow);
            calculateSubTotal();
            calculateGrandTotal()
        });
    }

    $(document).on('change', '#tempInvoice td .prd-qty, #invDiscount', function(){
        calculateItemTotal($(this)); 
        calculateGrandTotal();       
    });

    $(document).on('click','.closeItem',function(){
        $(this).parent().parent().remove();
        calculateItemTotal($(this)); 
        calculateGrandTotal();
    });

    $("#ordPaid").keydown(function(ev){
        if(ev. keyCode == 13) { 
            ev.preventDefault(); 
            $('#btnSubmitOrder').focus();
            return false;         
        }
    });
    $("#ordPaid").keyup(function(ev){
        if((ev.keyCode >= 96 && ev.keyCode <= 105) || (ev.keyCode >= 48 && ev.keyCode <= 57)){
            let grandTotal = parseFloat($('#grand-total').text());
            let paid = parseFloat($(this).val());
            let due = (grandTotal - paid);
            if(due > 0){
                $('#ordChange').val(0);
                $('#ordDue').val(due);
            }
            else{                
                $('#ordChange').val(due * -1);
                $('#ordDue').val(0);
            }
        }
    });
    $("#invDiscount").keyup(function(ev){
        if((ev.keyCode >= 96 && ev.keyCode <= 105) || (ev.keyCode >= 48 && ev.keyCode <= 57)){
            calculateGrandTotal();
        }
    });
    

    $("#btnSubmitOrder").click(function(){
        checkCustomerInfo();
        
        let txtOrderTotal = parseFloat($('#grand-total').text());
        let paidAmount = parseFloat($('#ordPaid').val());        
        let title = message = '';
        if(checkCustomerInfo()){
            if(txtOrderTotal <= 0){
                title = 'Empty order';
                message = 'Please choose items to fill-up order';
                showDefaultModal(title,message);
            }
            else if(isNaN(paidAmount)||paidAmount < 0){
                title = 'Invalid Paid';
                message = 'Please enter a valid paid amount';
                showDefaultModal(title,message);
            }        
            else{
                processOrder();
            }   
        }     
    });
});