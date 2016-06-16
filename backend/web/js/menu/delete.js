function del(data) {
    if (confirm('确认要删除' + data + '号菜单嘛？')) {
        var url = $("#url").val();
        var token = $("#token").val();
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