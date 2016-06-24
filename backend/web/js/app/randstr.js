document.getElementById('rand').onclick=function(){
    var url = $("#url").val();
    var token = $("#token").val();
    $.ajax({
        type: 'post',
        url :  url,
        data: {
            '_csrf': token
        },
        success: function (response) {
            if (response == 'no') {
                alert('生成失败');
            } else {
                $("#appkey").val(response);
            }
        }
    });
};
