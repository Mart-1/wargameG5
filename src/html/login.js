function login(){
    var email = $("#mailinput").val();
    let password = $("#passinput").val();
    console.log(email);
    console.log(password);

    $.ajax('../php/connect.php/login', {
        method : 'POST', data : {
            email : email,
            password : password,
        }
    }).done(function(data){
        // window.location.href = "articles.html";
    });
}
