var url = $("#url").val();
var des = $("#descs").val();
var token = $("#token").val();

//删除ajax
function del(data) {
    if (confirm('确认要删除' + data + '号菜单嘛？')) {
        $.ajax({
            type: 'POST',
            url: url+'&id='+ data,
            data: {
                '_csrf': token
            },
            success: function (response) {
                if (response == 'ok') {
                    window.location.reload();
                } else {
                    alert('删除失败');
                }
            }
        });
    }
}

//记录排序值的修改
var data = {};
$(".tests").on('input',function(){
    var k = $(this).prop("name");
    var v = $(this).val();
    data[k] = v;
});

//刷新按钮触发
$("#refresh").click(function(){
    $.ajax({
        type: 'POST',
        url: des,
        data: {
            '_csrf': token,
            'datas': data
        },
        success: function (response) {
            console.log(response);
            data = {};
            if (response == 'ok') {
                window.location.reload();
            } else {
                alert('刷新失败');
            }
        }
    });
})