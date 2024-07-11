$(document).ready(function(){
    $('#add-rating').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).attr('action');
        var Rating = $('input[name="Rating"]:checked').val();
        if(Rating == null || Rating == ''){
            swal("Vui lòng chọn số sao!", {
                icon: "warning",
            });
        }else{
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.status == 1){
                    swal(data.message, {
                        icon: "success",
                    });
                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                }else{
                    swal(data.message, {
                        icon: "error",
                    });
                }
            },
            error: function(data){
                if(data.error){
                    alert(data.error);
                }
            }
        });
    }
    });

    $('.reply-rating').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).attr('action');
        const Comment = $(this).find('input[name="Comment"]').val();
        if(Comment == null || Comment == ''){
            swal("Vui lòng nhập nội dung!", {
                icon: "warning",
            });
        }else{
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.status == 1){
                        location.reload();
                }else{
                    swal(data.message, {
                        icon: "error",
                    });
                }
            },
            error: function(data){
                if(data.error){
                    alert(data.error);
                }
            }
        });
    }
    });
});
