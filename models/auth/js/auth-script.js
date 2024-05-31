$(document).ready(()=>{
    // alert notice
    $("#alert-notice").hide()
    // login
    $("#auth_form").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../models/auth/server/auth-server.php',
            method:'POST',
            cache: false,
            data: $("#auth_form").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    setTimeout(()=>{
                        window.location.href = response.url
                    }, 3000)
                }
            }
        })
    })
})