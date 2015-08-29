$(document).ready(function(){
    $('.admin-menu>.nav>li>a').click(function(){
        $(this).parent().siblings().find('.nav').slideUp();
        $(this).siblings('.nav').slideDown();
    });

    $('#collapse-menu').click(function(){
            var obj = $('.admin-menu');
            if(obj.hasClass('hidden-xs')) {
                obj.removeClass('hidden-xs hidden-sm');
                obj.hide();
                obj.addClass('coverMenu');
                obj.slideDown();
            }else{
                obj.slideUp();
                obj.removeClass('coverMenu');
                obj.addClass('hidden-xs hidden-sm');
            }
    });

    $('#check-all').click(function(){
        if($(this).prop('checked')){
            $('#check-trace .check').prop('checked', true);
        }else{
            $('#check-trace .check').prop('checked', false);
        }
    });
});
var csrf_token = $('#csrf_token').val();
function batchDel(url){
    var ids = '';
    $('#check-trace .check').each(function() {
        if ($(this).prop('checked')) {
            ids += $(this).val() + ',';
        }
    });
    if(ids == ''){
        alert('no one checked');
        return;
    }
    ids = ids.substr(0, ids.length - 1);
    url = url + '/delete';
    $.ajax({
        url: url,
        async: false,
        cache: false,
        type: 'POST',
        data: { ids: ids, _token: csrf_token },
        success: function(e){
            var re;
            try{
                re = $.parseJSON(e);
            }catch(err){
                re = null;
            }
            if(re == null || re.status == 'failed'){
                alert('failed');
            }else{
                alert('success');
            }
        },
        error: function(e,err){
            alert('request error');
        }
    });
}

function batchUpdate(sender, url){
    var key = $(sender).attr('name');
    var val = $(sender).val();
    var ids = '';
    $('#check-trace .check').each(function() {
        if ($(this).prop('checked')) {
            ids += $(this).val() + ',';
        }
    });
    if(ids == ''){
        alert('no one checked');
        return;
    }
    ids = ids.substr(0, ids.length - 1);
    $.ajax({
        url: url,
        async: false,
        cache: false,
        type: 'POST',
        data: { ids: ids, key: key, value: val, _token: csrf_token },
        success: function(e){
            var re;
            try{
                re = $.parseJSON(e);
            }catch(err){
                re = null;
            }
            if(re == null || re.status == 'failed'){
                alert('failed');
            }else{
                alert('success');
            }
        },
        error: function(e, err){
            alert('request error');
        }
    });
}
