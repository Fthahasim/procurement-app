// add supplier
$(document).ready(function(){
    $("#addItemsModalForm").submit(function(e){
        e.preventDefault(); 
        var routeUrl = $('#addItemsModalForm').attr('action');
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

// edit items
$(document).on('click', '#editItemBtn', function() {
    var routeUrl = $(this).data('item');
    var id = $(this).data('id');
    $.ajax({
        url: routeUrl,
        type: 'get',
        data:  {id:id},
        success: function(response){
            console.log(response.item_images)
            $("#editItemsModalForm input[name='item_no']").val(response.item_no);
            $("#editItemsModalForm input[name='name']").val(response.item_name);
            $("#editItemsModalForm input[name='location']").val(response.inventory_location);
            $("#editItemsModalForm input[name='brand']").val(response.brand);
            $("#editItemsModalForm input[name='category']").val(response.category);
            if (response.item_images && response.item_images.length > 0) {
                const fileNames = response.item_images.join(', ');
                $("#fileNamesDisplay").text(fileNames); 
            }
            $("#editItemsModalForm input[name='price']").val(response.unit_price);
            $("#editItemsModalForm select[name='supplier_id']").val(response.supplier_id);
            $("#editItemsModalForm select[name='stock_unit']").val(response.stock_unit);
            $("#editItemsModalForm select[name='status']").val(response.status);
        },
        error: function(xhr, status, error){
            alert('Sorry,Something went wrong!')
        }
    });
});

// update supplier
$(document).ready(function(){
    $("#editItemsModalForm").submit(function(e){
        e.preventDefault(); 
        var routeUrl = $('#editItemsModalForm').attr('action');
        console.log(routeUrl)
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

// delete supplier
function showConfirmation() {
    var result = confirm("Are you sure you want to delete the Item?");
    if (result) {
        return true;
    } else {
        return false;
    }
}
$(document).on('click', '#deleteItemBtn', function() {
    if (showConfirmation()) {
        var routeUrl = $(this).data('route');
        var id = $(this).data('id');
        $.ajax({
            url: routeUrl,
            type: 'POST',
            data: {
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert(response.msg);
                location.reload()   
            }
        });
    }
});