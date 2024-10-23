
// add items 
$(".addOrderItems").on('click', function() {
    addItems($(this));
});

function addItems(el) {
    var itemBox = $('.add-items-container').first().clone(); 
    itemBox.find('input, select, textarea').val('');
    itemBox.append('<button type="button" class="removeItem btn btn-danger">Remove</button>');
    el.closest(".purchase-order-data").find("#itemsContainer").append(itemBox);
}
$(document).on('click', '.removeItem', function() {
    $(this).closest('.add-items-container').remove();
});

// get total values
$(document).ready(function(){
    $("#addPurchaseOrderForm select[name='item_no']").change(function(e){
        $('.item-details').empty()
        if($("#addPurchaseOrderForm select[name='item_no']").length){
            e.preventDefault(); 
            var routeUrl = $("#addPurchaseOrderForm select[name='item_no']").data('route');
            var itemId = $("#addPurchaseOrderForm select[name='item_no']").val();
            $.ajax({
                url: routeUrl,
                type: 'get',
                data:  {id:itemId},
                success: function(response){
                    console.log(response)
                    var itemdetails = $(`<div class="border rounded p-2">
                                            <div class="d-flex">
                                                <div class="input-group pe-1">
                                                    <span class="input-group-text bg-beige">Item No.</span>
                                                    <input type="text" class="form-control shadow-none item-no" value="${response.item_no}">
                                                </div>
                                                <div class="input-group ps-1">
                                                    <span class="input-group-text bg-beige">Item Name</span>
                                                    <input type="text" class="form-control shadow-none item-name" value="${response.item_name}">
                                                </div>
                                            </div>
                                            <div class="d-flex mt-2">
                                                <div class="input-group pe-1">
                                                    <span class="input-group-text bg-beige">Stock Unit</span>
                                                    <input type="text" class="form-control shadow-none stock-unit" name="item_stockUnit" value="${response.stock_unit}">
                                                </div>
                                                <div class="input-group ps-1">
                                                    <span class="input-group-text bg-beige">Unit Price</span>
                                                    <input type="text" class="form-control shadow-none unit-price" name="item_unitPrice" value="${response.unit_price}">
                                                </div>
                                            </div>
                                        </div>`)
                    $('.item-details').append(itemdetails)
                },
            });
        }
    });
    let timeout = null;
    $("#addPurchaseOrderForm input[name='quantity'],#addPurchaseOrderForm input[name='discount']").on('keydown', function() {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            calculateTotals();
        }, 1500);
    });

    function calculateTotals() {
        let quantity = parseFloat($("#addPurchaseOrderForm input[name='quantity']").val()) || 0;
        let price = parseFloat($("#addPurchaseOrderForm input[name='item_unitPrice']").val()) || 0;
        let discount = parseFloat($("#addPurchaseOrderForm input[name='discount']").val()) || 0;

        let itemTotal = quantity * price; // item total
        let netTotal = itemTotal - discount; // net total

        $("#addPurchaseOrderForm input[name='item_amount']").val(itemTotal.toFixed(2)); 
        $("#addPurchaseOrderForm input[name='net_amount']").val(netTotal.toFixed(2)); 

        if($("#addPurchaseOrderForm input[name='item_amount']").length){
            var itemAmtval = $("#addPurchaseOrderForm input[name='item_amount']").val();
            var discountval = $("#addPurchaseOrderForm input[name='discount']").val() || 0;
          
            $("#addPurchaseOrderForm input[name='item_total']").val(itemAmtval); 
            $("#addPurchaseOrderForm input[name='discount_total']").val(discountval); 
            $("#addPurchaseOrderForm input[name='net_total']").val(itemAmtval - discountval); 
        }
    }
    // $("#addPurchaseOrderForm input[name='item_amount']").val('25');
});


// add purchase order
$(document).ready(function(){
    $("#addPurchaseOrderForm").submit(function(e){
        e.preventDefault(); 
        var routeUrl = $('#addPurchaseOrderForm').attr('action');
        $.ajax({
            url: routeUrl,
            type: 'post',
            data:  new FormData(this),
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response)
                if(response.status==200){
                    alert(response.msg);
                    location.reload()
                }else{
                    alert(response.msg);
                }
            },
        });
    });
});