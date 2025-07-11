$(document).ready(()=>{
    // page title
    $("#page-title").html('Vendors')

    // alert
    $("#alert-notice").hide()

    // method to get vendor data through
    // const getURI = () =>{
        
    // }

    // new vendor user
    $("#new-user-vendor").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/user-vendor/server/new-vendor.php',
            method:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#new-user-vendor")[0]),
            success:(Response)=>{
                // console.log(Response)
                let response = JSON.parse(Response)

                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#new-user-vendor")[0].reset()
                    $("#vendorsTable").DataTable().draw()
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
    let vendor_id = paramString.get('user_id')
    let form_view = $("#view-user-vendor")
    let form_delete = $("#delete-user-vendor")
    $.ajax({
        url:'../../../../models/admin/user-vendor/server/edit-vendor.php',
        method: 'GET',
        cache: false,
        data:{user_id: vendor_id},
        success: (Response)=>{
            let response = JSON.parse(Response)
            if(response.status == 200){
                form_view.find("input[name=user_vendor_name]").val(response.data.vendor_name)
                form_view.find("input[name=user_vendor_username]").val(response.data.vendor_username)
                form_view.find("input[name=user_vendor_id]").val(vendor_id)
                form_view.find("input[name=user_vendor_dob]").val(response.data.vendor_dob)
                form_view.find("input[name=user_vendor_address]").val(response.data.vendor_address)
                form_view.find("input[name=user_vendor_gps_address]").val(response.data.vendor_gps_address)
                form_view.find("input[name=user_vendor_email]").val(response.data.vendor_email)
                form_view.find("input[name=user_vendor_contact]").val(response.data.vendor_contact)
                form_view.find("input[name=user_vendor_business_name]").val(response.data.vendor_business_name)
                form_view.find("input[name=user_vendor_reg_number]").val(response.data.vendor_business_id)

                form_delete.find("input[name=user_vendor_id]").val(vendor_id)
                form_delete.find("#notice").html('Are you sure of deleting '+response.data.vendor_name+' data?')
            }else{
                
            }
            
        }
    })

    // update vendor user
    $("#view-user-vendor").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/user-vendor/server/update-vendor.php',
            method:'POST',
            cache: false,
            data: $("#view-user-vendor").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#vendorsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/user-vendor/'
                    }, 3000)
                }
            }
        })
    })

    // delete vendor user 
    $("#delete-user-vendor").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/user-vendor/server/delete-vendor.php',
            method:'POST',
            cache: false,
            data: $("#delete-user-vendor").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#vendorsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/user-vendor/'
                    }, 3000)
                }
            }
        })
    })
   
})