window.onload = iniciar;
//console.log("entra");

function iniciar(){
    //alert(document.getElementsByTagName('button')[0].textContent);
    //alert("hello");
    var inp;
    var textArea;
    //alert('Entra');
    inp = document.getElementsByTagName('input');
    //alert(inp[12].type);
    inp[1].addEventListener('focusout', comprobarNombre);
    inp[2].addEventListener('focusout', comprobarApe);
    inp[3].addEventListener('focusout', comprobarNum);
    inp[5].addEventListener('focusout', comprobarMail);
    inp[6].addEventListener('focusout', comprobarPassword);
    inp[7].addEventListener('focusout', comprobarRepe);
    inp[8].addEventListener('focusout', comprobarNombreArtista);
    inp[9].addEventListener('focusout', comprobarTipoArtista);
    inp[10].addEventListener('focusout', comprobarLink);
    inp[12].addEventListener('focusout', comprobarCiudad);
    textArea = document.getElementsByTagName('textarea')[0];
    textArea.addEventListener('focusout', comprobarBio);
    //textArea.addEventListener('keyup', comprobarBio);
    textArea.addEventListener('keyup', btnAble);

    document.getElementsByTagName('button')[0].disabled = true;
    //alert(inp.length);
    for (let index = 0; index <= inp.length; index++) {
        inp[index].addEventListener('keyup', btnAble);      
    }
    //alert(inp[1].value)
}

function comprobarNombre(){
    var ret = true;
    var comp = document.getElementsByTagName('input')[1];
    //alert(comp.value.length);
    if (comp.value.length < 3) {
        //alert('Rellene el campo nombre adecuadamente');
        ret = false;
    }
    //alert('name '+ret);
    return ret;
}

function comprobarApe(){
    var ret = true;
    if (document.getElementsByTagName('input')[2].value.length < 3 ) {
        //alert('Rellene el campo Apellido adecuadamente');
        ret = false;
    }
    //alert('Ape '+ret);
    return ret;
}

function comprobarNum(){
    var numero = document.getElementsByTagName('input')[3].value;
    var ret = true;
    //alert(numero.charAt(0));
    for (let index = 0; index < numero.length; index++) {
        if (numero.charAt(index) != 0 && 
        numero.charAt(index) != 1 &&
        numero.charAt(index) != 2 &&
        numero.charAt(index) != 3 &&
        numero.charAt(index) != 4 &&
        numero.charAt(index) != 5 &&
        numero.charAt(index) != 6 &&
        numero.charAt(index) != 7 &&
        numero.charAt(index) != 8 &&
        numero.charAt(index) != 9) {
            ret = false;
        }
    }
    //alert(ret);
    return ret;
}

function comprobarMail(){
    var numero = document.getElementsByTagName('input')[5].value;
    var ret = false;
    var mail = false;
    var pun = false;
    for (let index = 0; index < numero.length; index++) {
        if (numero.charAt(index) == "@") {
                mail = true;
            }
        if (numero.charAt(index) == ".") {
                pun = true;
            }
        }
        if (mail == true && pun == true) {
            //alert('taweno')
            return true;
        }else{
            //alert('mail');
            return false;
        }
    }
function comprobarPassword(){
    var pass = document.getElementsByTagName('input')[6].value;
    var num = false;
    var may = false;
    var long = false;
    //alert('iolo');
    if (pass.length >= 8) {
        long = true;
    }else{
        long = false;
    }
    for (let index = 0; index < pass.length; index++) {
        if (pass.charAt(index) == pass.charAt(index).toUpperCase()) {
                may = true;
            }
        if (pass.charAt(index) == 0 || 
            pass.charAt(index) == 1 ||
            pass.charAt(index) == 2 ||
            pass.charAt(index) == 3 ||
            pass.charAt(index) == 4 ||
            pass.charAt(index) == 5 ||
            pass.charAt(index) == 6 ||
            pass.charAt(index) == 7 ||
            pass.charAt(index) == 8 ||
            pass.charAt(index) == 9) {
            num = true;
        }
        
    }
    if (num == true && may == true && long == true) {
        //alert('ta weno');
        return true;
    }else{
        //alert('rong');
        //alert('pass');
        return false;
    }
}
function comprobarRepe(){
    var pass = document.getElementsByTagName('input')[7].value;
    var pass2 = document.getElementsByTagName('input')[6].value;

    if (pass == pass2) {
        //alert('repe true');
        return true;
    }else{
        //alert('repe')
        return false;
    }
}
function comprobarNombreArtista(){
    var ret = true;
    var comp = document.getElementsByTagName('input')[8];
    //alert(comp.value.length);
    if (comp.value.length < 3) {
        //alert('Rellene el campo nombre adecuadamente');
        ret = false;
    }
    //alert('name '+ret);
    return ret;
}
function comprobarTipoArtista(){
    var ret = true;
    var comp = document.getElementsByTagName('input')[9];
    //alert(comp.value.length);
    if (comp.value.length < 4) {
        //alert('Rellene el campo nombre adecuadamente');
        ret = false;
    }
    //alert('name '+ret);
    return ret;
}
function comprobarLink(){
    var link = document.getElementsByTagName('input')[10].value;
    var pun = false;
    for (let index = 0; index < link.length; index++) {
        if (link.charAt(index) == ".") {
                pun = true;
            }
        }
        return pun;
    }
    function comprobarCiudad(){
        var ret = true;
        var comp = document.getElementsByTagName('input')[12];
        //alert(comp.value.length);
        if (comp.value.length <=1) {
            //alert('Rellene el campo nombre adecuadamente');
            ret = false;
            console.log('fake');
        }
        //alert('name '+ret);
        return ret;
    }

    function comprobarBio(){
        var ret = false;
        var comp = document.getElementsByTagName('textarea')[0];
        //alert(comp.value.length);
        if (comp.value.length > 25 && comp.value.length < 150) {
            //alert('Rellene el campo nombre adecuadamente');
            ret = true;
        }
        //alert('name '+ret);
        return ret;
    }
    function btnAble(){
        if (comprobarNombre() == true &&
            comprobarApe() == true &&
            comprobarNum() == true &&
            comprobarMail() == true &&
            comprobarPassword() == true &&
            comprobarRepe() == true &&
            comprobarNombreArtista() == true &&
            comprobarTipoArtista() == true &&
            comprobarLink() == true &&
            comprobarCiudad() == true 
            && comprobarBio() == true
            ) {
            document.getElementsByTagName('button')[0].disabled = false;  
        }else{
            document.getElementsByTagName('button')[0].disabled = true;  
        }
    } 