// Cookie check
function cookieCheck() {

    $.ajax('../php/info.php/isSetCookie', {
        method: 'GET',
    }).done(function (data) {
        if (data == false){
            disconnect();
        }
        
    });
}


function disconnect() {
    $.ajax('../php/info.php/disconnect', {
        method: 'GET',
    }).done(function (data) {
        window.location.href = 'login.html';
    });    
}

setInterval(cookieCheck, 700);