
window.onload = iniciar;
console.log("entra");

function iniciar(){
    var inp;
    //alert('Entra');
    inp = document.getElementsByTagName('input');
    inp[1].addEventListener('focusout', comprobarNombre);
    inp[2].addEventListener('focusout', comprobarApe);
    inp[3].addEventListener('focusout', comprobarNum);
    inp[4].addEventListener('focusout', comprobarMail);
    inp[5].addEventListener('focusout', comprobarPassword);
    inp[6].addEventListener('focusout', comprobarRepe);
    document.getElementsByTagName('button')[0].disabled = true;
    for (let index = 0; index <= inp.length; index++) {
        inp[index].addEventListener('keyup', btnAble);
        inp[index].addEventListener('keypress', btnAble);      
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
    alert('name '+ret);
    return ret;
}

function comprobarApe(){
    var ret = true;
    if (document.getElementsByTagName('input')[2].value.length < 3 ) {
        alert('Rellene el campo Apellido adecuadamente');
        ret = false;
    }
    alert('Ape '+ret);
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
    alert(ret);
    return ret;
}

function comprobarMail(){
    var numero = document.getElementsByTagName('input')[4].value;
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
            alert('taweno')
            return true;
        }else{
            alert('mail');
            return false;
        }
    }
function comprobarPassword(){
    var pass = document.getElementsByTagName('input')[5].value;
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
        alert('ta weno');
        return true;
    }else{
        //alert('rong');
        alert('pass');
        return false;
    }
}
function comprobarRepe(){
    var pass = document.getElementsByTagName('input')[6].value;
    var pass2 = document.getElementsByTagName('input')[5];

    if (pass == pass2.value) {
        alert('repe true');
        return true;
    }else{
        alert('repe')
        return false;
    }
}
    function btnAble(){
        if (comprobarNombre() == true &&
            comprobarApe() == true &&
            comprobarNum() == true &&
            comprobarMail() == true &&
            comprobarPassword() == true &&
            comprobarRepe() == true) {
            document.getElementsByTagName('button')[0].disabled = false;  
        }else{
            document.getElementsByTagName('button')[0].disabled = true;  
        }
    }

   