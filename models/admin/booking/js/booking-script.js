$(document).ready(()=>{
    $("#alert-notice").hide()
    
    $("#service_booking").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url: "../../../models/booking/server/booking-script.php",
            method: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#service_booking")[0]),
            success: (Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#service_booking")[0].reset()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                    }, 3000)
                }
                // console.log(response)
            }
        })
    })
})