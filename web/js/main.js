$(document).ready(function(){

    send();

    $('a').click(function(e){
        e.preventDefault();
    });

    function send(){
        $('.send-captcha.btn').click(function(e){
            e.preventDefault();

            var form = $('form');
            var data = form.serialize();

            var inputCode = $('.captcha-input').val();

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: data,
                success: function (response) {
                    console.log(response);
                    if(response['captcha'] === inputCode){
                        $('.captcha-img').css('display', 'none');
                        $('.captcha-input').css('display', 'none');
                        $('.get-captcha').css('display', 'block');
                    }else{
                        $('.error').css({
                            'display' : 'block',
                            'color' : 'red'
                        });
                        $('.captcha-input').css('border-color', 'red');
                    }
                }
            });
        });
    }

    $('.captcha-input').select(function(){
        $('.error').css('display', 'none');
        send();
    });
    $(document).keydown(function(e) {
        if(e.which == 8) {
            $('.error').css('display', 'none');
            send();
        }
    });


    $('.dismiss').click(function(e){

        location.reload();

    });


}); // end ready