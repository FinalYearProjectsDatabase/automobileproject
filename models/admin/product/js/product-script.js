$(document).ready(()=>{
    // page title
    $("#page-title").html('Products')

    // alert
    $("#alert-notice").hide()

    const vendorsSelect = () =>{
        $.ajax({
            url:'../../../../models/admin/product/server/vendors-in-select.php',
            cache: false,
            success:(Response)=>{
                // console.log(Response)
                $("form").find("select[name=product_vendor]").html(Response)
            }
        })
    }
    vendorsSelect();


    // new product
    $("#new-product").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/product/server/new-product.php',
            method:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#new-product")[0]),
            success:(Response)=>{
                // console.log(Response)
                let response = JSON.parse(Response)

                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#new-product")[0].reset()
                    $("#productsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                    }, 3000)
                }
                // console.log(response)
            }
        })
    })

    let url = window.location.search
    let paramString = new URLSearchParams(url)
    let product_id = paramString.get('product_id')
    let form_view = $("#view-product")
    let form_delete = $("#delete-product")
    $.ajax({
        url:'../../../../models/admin/product/server/edit-product.php',
        method: 'GET',
        cache: false,
        data:{product_id: product_id},
        success: (Response)=>{
            let response = JSON.parse(Response)
            // console.log(response.product_vendor)
            form_view.find("input[name=product_name]").val(response.product_name)
            form_view.find("textarea[name=product_description]").val(response.product_description)
            form_view.find("#show-product-img").html("<img src='../../../../product-images/"+response.product_image+"' width='150px'>")
            form_view.find("input[name=product_id]").val(product_id)
            form_view.find("input[name=fetch_product_image]").val(response.product_image)
            form_view.find("select[name=product_vendor]").val(response.product_vendor)
            form_view.find("select[name=product_type]").val(response.product_type)
            form_view.find("select[name=product_status]").val(response.product_status)
            form_view.find("input[name=product_price]").val(response.product_price)

            form_delete.find("input[name=product_id]").val(product_id)
            form_delete.find("#notice").html('Are you sure of deleting '+response.product_name+' data?')
            
        }
    })

    // update product
    $("#view-product").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/product/server/update-product.php',
            method:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#view-product")[0]),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#productsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/product/'
                    }, 3000)
                }
            }
        })
    })

    // delete product 
    $("#delete-product").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/product/server/delete-product.php',
            method:'POST',
            cache: false,
            data: $("#delete-product").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#productsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/product/'
                    }, 3000)
                }
            }
        })
    })
   
})