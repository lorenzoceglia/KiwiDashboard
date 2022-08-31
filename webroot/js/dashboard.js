$(document).ready(function(){
    initStats();
    cleanStats();
    if (window.jQuery) {
        // jQuery is available.

        // Print the jQuery version, e.g. "1.0.0":
        console.log(window.jQuery.fn.jquery);
    }
})

function cleanStats(){
    $('.clean-stats-button').click(function (){
        const url = 'api/request';
        let data = {
            auth_code : 'always',
            method : 'resetStats'
        };

        $.ajax({
            url: url,
            dataType: 'json',
            headers: {
                "accept": "application/json"
            },
            type: 'post',
            data: data,
            success: function( response, textStatus, jQxhr ){
            },
            error: function( jqXhr, textStatus, errorThrown ){
                //console.log( textStatus );
            }
        });
    });
}

function initStats(){
    setInterval(updateStats, 3000);
}

function updateStats(){
        const url = 'api/request';
        let data = {
            auth_code : 'always',
            method : 'getStats'
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
                $('.messages-sent').text(response['msg']['messages_sent']);
                $('.visits').text(response['msg']['visits']);
                $('.telegram-login').text(response['msg']['telegram_login']);
                $('.telegram-logouts').text(response['msg']['telegram_logouts']);
                $('.terms-and-condition-clicks').text(response['msg']['terms_and_condition_clicks']);
                //$('.telegram-login-clicks').text(response['msg']['telegram_login_clicks']);
                $('.code-copy-click').text(response['msg']['code_copy_click']);
                $('.qr-code-click').text(response['msg']['qr_code_click']);
                $('.test-count').text(response['msg']['test_count']);
                $('.github-click').text(response['msg']['github_click']);
                $('.linkedin-count').text(response['msg']['linkedin_click']);
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });
}
