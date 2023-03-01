//lanzo función al cargar el body

$(document).ready(function(){
    checkCookie();

$("#image-upload-form").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
        url: "subirimagen.php",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data)
        {
            $("#targetLayer").html(data);
        },
          error: function(data)
        {
            console.log("error");
          console.log(data);
        }
   });
}));

})

//funcion encargada de crear usuarios

function createUser(){

    let params = {};

    let nombre = $('#nombre').val()
    let email = $('#email').val();
    let password = $('#password').val();
    let username = $('#username').val();

    params.nombre = nombre;
    params.email = email;
    params.password = password;
    params.username = username;

    //compruebo longitud
    if(username.lenth > 30 || username.length < 10){
        alert('El username debe tener entre 10 y 30 caracteres');
        return;
    }

    //compruebo que el primer caracter no sea un numero
    if(!isNaN(username[0])){
        alert('El primer caracter no puede ser un numero');
        return;
    }

    //compruebo que contenga un caracter especial como minimo   
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

    if(!format.test(username)){
        alert('El nombre debe contener al menos un caracter especial');
        return true;
    } 

    //compruebo que la contraseña tenga al menos un numero

    var hasNumber = /\d/;   
    if(!hasNumber.test(password)){
        alert('La contraseña debe contener al menos un numero');
        return true;
    }

    //compruebo longitud
    if(password.lenth > 20 || password.length < 5){
        alert('La contraseña debe tener entre 5 y 20 caracteres');
        return;
    }
    
    //compruebo que la contraseña contenga al menos una mayuscula
    if(!password.match(/[A-Z]/)){
        alert('La contraseña debe contener al menos una mayuscula');
        return true;
    }

    //compruebo que ningun campo llegue vacio   
    if(nombre == '' || email == '' || password == ''){
        alert('Todos los campos son obligatorios');
        return true;
    }

    

    $.ajax({
        type: 'POST',
        url: 'insertUser.php',
        data: params,
        dataType: 'json',
        success: function (data) {
            if(data.status == 'ok'){
                alert('Usuario creado exitosamente');
                
                //redirijo al login
                window.location.href = './login.php';
            }
            else{
                if(data.message != null){
                    alert(data.message);
                }else{
                    alert('Error al crear usuario');
                }
            }
        }})
    
}

//funcion encargada del login
function login(){

    let params = {};

    let nombre = $('#username').val();
    let password = $('#password').val();

    params.nombre = nombre;
    params.password = password;


    //compruebo longitud
    if(nombre.lenth > 30 || nombre.length < 10){
        alert('El nombre debe tener entre 10 y 30 caracteres');
        return;
    }

    //compruebo que el primer caracter no sea un numero
    if(!isNaN(nombre[0])){
        alert('El primer caracter no puede ser un numero');
        return;
    }

    //compruebo que contenga un caracter especial como minimo   
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

    if(!format.test(nombre)){
        alert('El nombre debe contener al menos un caracter especial');
        return true;
    } 

    //compruebo que la contraseña tenga al menos un numero
    console.log(password)
    var hasNumber = /\d/;   
    if(!hasNumber.test(password)){
        alert('La contraseña debe contener al menos un numero');
        return true;
    }

    //compruebo longitud
    if(password.lenth > 20 || password.length < 5){
        alert('La contraseña debe tener entre 5 y 20 caracteres');
        return;
    }
    
    //compruebo que la contraseña contenga al menos una mayuscula
    if(!password.match(/[A-Z]/)){
        alert('La contraseña debe contener al menos una mayuscula');
        return true;
    }

    //compruebo que ningun campo llegue vacio   
    if(nombre == '' ||  password == ''){
        alert('Todos los campos son obligatorios');
        return true;
    }

    $.ajax({
        type: 'POST',
        url: './loginUser.php',
        data: params,
        dataType: 'json',
        success: function (data) {
            if(data.status == 'ok'){
                alert('Usuario logueado exitosamente');
                //redirijo al home
                window.location.href = './perfil.php';
            }   
            else{
                    if(data.message != null){
                        alert(data.message);
                    }
                    
                }
            
        }})
}

//funcion para insertar un nuevo comentario
function saveComment(idApartado){

    let params = {};

    params.idApartado = idApartado;
    
    let comentario = $('#comentario').val();
    let idUser = $('#idUser').val();

    params.comentario = comentario;
    params.idUser = idUser;
    params.img = $('#nameImg').val();

    //comprobar que el comentario no sea vacio

    if(comentario == ''){
        $('#comentario').css('border','3px solid red')
        return;
    }

    $.ajax({
        type: 'POST',
        url: 'insertComment.php',
        data: params,
        dataType: 'json',
        success: function (data) {
            if(data.status == 'ok'){
                alert('Comentario guardado exitosamente');
                window.location.href = './perfil.php';
            }
        }})


}

//function para crear un apartado
function createApart(){


    let params = {};

    let id = $('#idUser').val();
    let titulo = $('#titulo').val();
    let comentario = $('#comentario').val() ?? '';
    
    params.idUser = id;
    params.titulo = titulo;
    params.comentario = comentario;


    //ninguno puede ser vacio

    if(titulo == ''){
        $('#titulo').css('border','3px solid red')
        return;
    }


    if(comentario == '' || comentario.length == 0 || comentario.length == 1){
        $('#comentario').css('border','3px solid red')
        return;
    }

    $.ajax({
        type: 'POST',
        url: 'insertApart.php',
        data: params,
        dataType: 'json',
        success: function (data) {
            if(data.status == 'ok'){
                alert('Apartado creado exitosamente');
                window.location.href = './perfil.php';
            }
            else{
                alert('Error al crear el apartado');
            }
        }})



}

function saveCookies(){

    localStorage.setItem('cookies', 1);
    alert('Cookies guardados exitosamente');
    $('.cookie-consent').hide()

}

function checkCookie(){

    if(localStorage.getItem('cookies') == 1){
        $('.cookie-consent').hide()
    }
}

function removeApart(){

    let params = {};

    let idApart = $('#apartRemove').val();

    if(idApart == ''){
        alert('Seleccione al menos un tema');
        return;
    }

    params.idApart = idApart;

    $.ajax({
        type: 'POST',
        url: 'removeApart.php',
        data: params,
        dataType: 'json',
        success: function (data) {
            if(data.status == 'ok'){
                alert('Tema eliminado exitosamente');
                window.location.href = './perfil.php';
            }
            else{
                alert('Error al eliminar el tema');
            }
        }})

}
