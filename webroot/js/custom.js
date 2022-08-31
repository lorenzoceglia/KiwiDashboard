$(document).ready(function(){
    sendTMessage();
    initTextEditor();
    sendChangelog();
})

function sendChangelog(){
    $('.Editor-editor').keyup(function(event) {
        $('.changelog-container').val($('.Editor-editor').html());
    });

    $('.t-send-button').click(function() {
        $('.changelog-form').submit();
    });

}
function initTextEditor() {
    $("#newChange").Editor();
}

function sendTMessage() {
    let send_button = $('.t-send-button');

    send_button.click(function (){
        let message = $('.t-send-text').val();
        let user_auth_code = $('.t-send-user').val();

        sendMessageTester(user_auth_code,message);
    });
}

function sendMessageTester(auth_code,t_message){

        let url = '/api/request';
        let data = {
            auth_code : auth_code,
            method : 'sendMessage',
            debug_msg : t_message
        };

        $.ajax({
            url: url,
            crossDomain: true,
            headers: {
                "accept": "application/json",
                "Access-Control-Allow-Origin":"*"
            },
            dataType: 'json',
            type: 'post',
            data: data,
            success: function( response, textStatus, jQxhr ){
                let type = response['type'];

                switch (type) {

                    case 'success' :
                        let success = $('.success').clone();
                        success.removeClass('d-none');
                        success.find('.success-alert-message').text(response['msg']);
                        success.removeClass('success');
                        $('.error-container').append(success);
                        break;

                    case 'warning' :
                        let alert = $('.warning').clone();
                        alert.removeClass('d-none');
                        alert.find('.warning-alert-message').text(response['msg']);
                        alert.removeClass('warning');
                        $('.error-container').append(alert);
                        break;

                    case 'danger' :
                        let danger = $('.danger').clone();
                        danger.removeClass('d-none');
                        danger.find('.danger-alert-message').text(response['msg']);
                        danger.removeClass('danger');
                        $('.error-container').append(danger);
                        break;

                }
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });

}
