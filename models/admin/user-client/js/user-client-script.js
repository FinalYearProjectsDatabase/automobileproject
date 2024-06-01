$(document).ready(()=>{
    // page title
    $("#page-title").html('Clients')

    // alert
    $("#alert-notice").hide()

    // method to get client data through
    // const getURI = () =>{
        
    // }

    // new client user
    $("#new-user-client").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/user-client/server/new-user.php',
            method:'POST',
            cache: false,
            data: $("#new-user-client").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#new-user-client")[0].reset()
                    $("#clientsTable").DataTable().draw()
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
    let client_id = paramString.get('user_id')
    let form_view = $("#view-user-client")
    let form_delete = $("#delete-user-client")
    $.ajax({
        url:'../../../../models/admin/user-client/server/edit-user.php',
        method: 'GET',
        cache: false,
        data:{user_id: client_id},
        success: (Response)=>{
            let response = JSON.parse(Response)
            if(response.status == 200){
                form_view.find("input[name=user_client_name]").val(response.data.client_name)
                form_view.find("input[name=user_client_username]").val(response.data.client_username)
                form_view.find("input[name=user_client_id]").val(client_id)
                form_view.find("input[name=user_client_dob]").val(response.data.client_dob)
                form_view.find("input[name=user_client_address]").val(response.data.client_address)
                form_view.find("input[name=user_client_email]").val(response.data.client_email)
                form_view.find("input[name=user_client_contact]").val(response.data.client_contact)

                form_delete.find("input[name=user_client_id]").val(client_id)
                form_delete.find("#notice").html('Are you sure of deleting '+response.data.client_name+' data?')
            }else{
                
            }
            
        }
    })

    // update client user
    $("#view-user-client").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/user-client/server/update-user.php',
            method:'POST',
            cache: false,
            data: $("#view-user-client").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#clientsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/user-client/'
                    }, 3000)
                }
            }
        })
    })

    // delete client user 
    $("#delete-user-client").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/user-client/server/delete-user.php',
            method:'POST',
            cache: false,
            data: $("#delete-user-client").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#clientsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/user-client/'
                    }, 3000)
                }
            }
        })
    })
   
})