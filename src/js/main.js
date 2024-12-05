// Cookie check
function cookieCheck() {

    $.ajax('../php/info.php/isSetCookie', {
        method: 'GET',
    }).done(function (data) {
        if (data == false)
        window.location.replace("127.0.0.1:8080/src/html/login.html");  
    });
}
