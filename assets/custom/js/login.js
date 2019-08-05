$(document).ready(function () {
$('.login-submit').on('click',function () {
    var email  = $('input[name="email"]').val();
    var pass   = $('input[name="pass"]').val();
    var remember   = $('#remember:checked').val();
    var url    = $(this).attr('data-action');
    var tokent = $('meta[name="csrf_token"]').attr('content');

    if(remember=="on"){
        remember = true;
    }else{
        remember = false;
    }
    $('#loading').fadeIn(300);
    $.post(url,{
        _token:tokent,
        email:email,
        pass:pass,
        remember:remember,
    },function (success) {
        if(typeof success.status!="undefined" && typeof success.status_code!="undefined" && success.status_code=="200"){
            $('#pass_message').removeClass('alert-validate').attr('data-validate',"");
            window.open(success.data,'_self');

        }else{
            $('#pass_message').addClass('alert-validate').attr('data-validate',"Incorrect Password");
        }

    }).fail(function (error) {
        var json = error.responseJSON.errors;
        console.log(error);
        $('#loading').fadeOut(300);
        if(asset(json.pass)){
            $('#pass_message').addClass('alert-validate').attr('data-validate',json.pass);
        }else{
            $('#pass_message').removeClass('alert-validate').attr('data-validate',"");
        }
        if(asset(json.email)){
            $('#email_message').addClass('alert-validate').attr('data-validate',json.email);
        }else{
            $('#email_message').removeClass('alert-validate').attr('data-validate',"");
        }
        
    });
    function asset(data) {
        if(data!="" && typeof data!== "undefined"){
            return true;
        }else{
            return false;
        }

    }
});

});
