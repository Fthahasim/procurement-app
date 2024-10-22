// add supplier
$(document).ready(function(){
    $("#addSupplierModalForm").submit(function(e){
        e.preventDefault(); 
        var routeUrl = $('#addSupplierModalForm').attr('action');
        $.ajax({
            url: routeUrl,
            type: 'post',
            data:  new FormData(this),
            contentType: false,
            processData: false,
            success: function(response){
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

// edit supplier
$(document).on('click', '#editSupplierBtn', function() {
    var routeUrl = $(this).data('supplier');
    var id = $(this).data('id');
    $.ajax({
        url: routeUrl,
        type: 'get',
        data:  {id:id},
        success: function(response){
            $("#editSupplierModalForm input[name='supplier_no']").val(response.supplier_no);
            $("#editSupplierModalForm input[name='name']").val(response.supplier_name);
            $("#editSupplierModalForm input[name='tax_no']").val(response.tax_no);
            $("#editSupplierModalForm input[name='mobile_no']").val(response.mobile_no);
            $("#editSupplierModalForm input[name='address']").val(response.address);
            $("#editSupplierModalForm select[name='country']").val(response.country);
            $("#editSupplierModalForm input[name='email']").val(response.email);
            $("#editSupplierModalForm select[name='status']").val(response.status);
        },
        error: function(xhr, status, error){
            alert('Sorry,Something went wrong!')
        }
    });
});

// update supplier
$(document).ready(function(){
    $("#editSupplierModalForm").submit(function(e){
        e.preventDefault(); 
        var routeUrl = $(this).attr('action');
        console.log(routeUrl)
        $.ajax({
            url: routeUrl,
            type: 'post',
            data:  new FormData(this),
            contentType: false,
            processData: false,
            success: function(response){
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
    var result = confirm("Are you sure you want to remove the Supplier?");
    if (result) {
        return true;
    } else {
        return false;
    }
}
$(document).on('click', '#deleteSupplierBtn', function() {
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