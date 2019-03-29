$(document).ready(function(){


    $('a').click(function(e){
        e.preventDefault();
    });

    $('.send-captcha').click(function(e){
        e.preventDefault();

        var form = $('.send-captcha');
        var data = form.serialize();

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: data,
            success: function (response) {
                $('.captcha-img').css('display', 'none');
                $('.captcha-input').css('display', 'none');
                $('.get-captcha').css('display', 'block');
            }
        });
    });

    $('.dismiss').click(function(e){

        location.reload();

    });


}); // end ready