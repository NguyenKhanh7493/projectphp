$('.delItemPro').click(function(){
    var id_img = $(this).attr('data-id');
    if (confirm('Bạn có muốn xóa' + id_img)){
        $.ajax({
            url: '/admin/module/product/del.php',
            type: 'POST',
            data: {id_img:id_img},
            success:function(data){
                console.log(data);
                // if (data == "OK"){
                //     $('#'+id).slideUp(300,function(){
                //         $(this).remove();
                //     });
                // }else{
                //     alert('xóa thât bại');
                // }
            }
        });
    }
});