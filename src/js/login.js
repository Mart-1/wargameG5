function login(){
    var email = $("#mailinput").val();
    var password = $("#passinput").val();


    $.ajax('../php/connect.php/login', {
        method : 'POST', data : {
            email : email,
            password : password,
        }
    }).done(function(data){
        if (data){
            window.location.href = "articles.html";
        }
        else{
            alert("Erreur de connexion, veuillez réessayer");
        }
    });
}
