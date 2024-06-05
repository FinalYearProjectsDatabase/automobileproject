$(document).ready(()=>{
    // page title
    $("#page-title").html('posts')

    // alert
    $("#alert-notice").hide()

    // method to get vendor data through
    // const getURI = () =>{
        
    // }

    // new post
    $("#new-post").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/post/server/new-post.php',
            method:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#new-post")[0]),
            success:(Response)=>{
                // console.log(Response)
                let response = JSON.parse(Response)

                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#new-post")[0].reset()
                    $("#postsTable").DataTable().draw()
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
    let post_id = paramString.get('post_id')
    let form_view = $("#view-post")
    let form_delete = $("#delete-post")
    $.ajax({
        url:'../../../../models/admin/post/server/edit-post.php',
        method: 'GET',
        cache: false,
        data:{post_id: post_id},
        success: (Response)=>{
            let response = JSON.parse(Response)
            if(response.status == 200){
                form_view.find("input[name=post_title]").val(response.data.post_title)
                form_view.find("textarea[name=post_description]").val(response.data.post_description)
                form_view.find("input[name=post_id]").val(post_id)
                form_view.find("input[name=post_video_link]").val(response.data.post_video_link)
                form_view.find("input[name=old_post_featured_image]").val(response.data.post_featured_image)

                form_delete.find("input[name=post_id]").val(post_id)
                form_delete.find("#notice").html('Are you sure of deleting '+response.data.post_title+' data?')
            }else{
                
            }
            
        }
    })

    // update post
    $("#view-post").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/post/server/update-post.php',
            method:'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#view-post")[0]),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#postsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/post/'
                    }, 3000)
                }
            }
        })
    })

    // delete post 
    $("#delete-post").on("submit", (e)=>{
        e.preventDefault()
        $.ajax({
            url:'../../../../models/admin/post/server/delete-post.php',
            method:'POST',
            cache: false,
            data: $("#delete-post").serialize(),
            success:(Response)=>{
                let response = JSON.parse(Response)
                if(response.status == 201){
                    $("#alert-notice").show().addClass("alert-danger").html(response.msg)
                    $("#alert-notice").removeClass("alert-success")
                    
                }else{
                    $("#alert-notice").show().addClass("alert-success").html(response.msg)
                    $("#alert-notice").removeClass("alert-danger")
                    $("#postsTable").DataTable().draw()
                    setTimeout(()=>{
                        $("#alert-notice").fadeOut();
                        window.location.href = '/dashboard/post/'
                    }, 3000)
                }
            }
        })
    })
   
})