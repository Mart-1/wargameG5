function register(){
    var email = $("#mailinput").val();
    var password = $("#passinput").val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();



    $.ajax('../php/connect.php/register', {
        method : 'POST', data : {
            email : email,
            password : password,
            firstname : firstname,
            lastname : lastname
        }
    }).done(function(data){
        if (data){
            window.location.href = "login.html";
        }
    });
}