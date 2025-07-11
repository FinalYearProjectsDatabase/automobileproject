$(document).ready(()=>{
    // page title
    $("#page-title").html('Services')

    // alert
    $("#alert-notice").hide()

    const vendorsSelect = () =>{
        $.ajax({
            url:'../../../../models/admin/service/server/vendors-in-select.php',
            cache: false,
            success:(Response)=>{
                // console.log(Response)
                $("form").find("select[name=service_vendor]").html(Response)
            }
        })
    }
    vendorsSelect();


    // new service
    $("#new-service").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/service/server/new-service.php',
            method:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#new-service")[0]),
            success:(Response)=>{
                // console.log(Response)
                let response = JSON.parse(Response)

                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#new-service")[0].reset()
                    $("#servicesTable").DataTable().draw()
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
    let service_id = paramString.get('service_id')
    let form_view = $("#view-service")
    let form_delete = $("#delete-service")
    $.ajax({
        url:'../../../../models/admin/service/server/edit-service.php',
        method: 'GET',
        cache: false,
        data:{service_id: service_id},
        success: (Response)=>{
            let response = JSON.parse(Response)
            // console.log(response.service_vendor)
            form_view.find("textarea[name=service_description]").val(response.service_description)
            form_view.find("#show-service-img").html("<img src='../../../../service-images/"+response.service_image+"' width='150px'>")
            form_view.find("input[name=service_id]").val(service_id)
            form_view.find("input[name=fetch_service_image]").val(response.service_image)
            form_view.find("select[name=service_vendor]").val(response.service_vendor)
            form_view.find("select[name=service_type]").val(response.service_type)
            form_view.find("select[name=service_status]").val(response.service_status)
            form_view.find("input[name=service_location]").val(response.service_location)

            form_delete.find("input[name=service_id]").val(service_id)
            form_delete.find("#notice").html('Are you sure of deleting '+response.service_type+' from '+response.vendor_name+' data?')
            
        }
    })

    // update service
    $("#view-service").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/service/server/update-service.php',
            method:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#view-service")[0]),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#servicesTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/service/'
                    }, 3000)
                }
            }
        })
    })

    // delete service 
    $("#delete-service").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/service/server/delete-service.php',
            method:'POST',
            cache: false,
            data: $("#delete-service").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#servicesTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/service/'
                    }, 3000)
                }
            }
        })
    })
   
})