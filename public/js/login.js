const btn = document.querySelector("#btn");
const login = document.getElementById("login");
const password = document.getElementById("password");
const errorlogin = document.getElementById("errorlogin");
const errorpassword = document.getElementById("errorpassword");


//===============================================


function champ_rempli(input) {
    if (input.value !== "") {
        return true;
    }
    return false;
}

function valid_login() {
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (login.value.match(validRegex)) {
        return true;
    }
    return false;
}

function valid_password() {
    var str = password.value;
    if (str.length >=6) {
        const regex1 = /[A-Z]/;
        const regex2 = /[1-9]/;
        if (str.match(regex1) && str.match(regex2)) {
            return true;
        }
    }
    errorpassword.innerHTML = "login ou mot de passe incorect";
    return false
}

function verification(champ , funchamp) {
    let errorchamp = errorpassword;
    if (champ === login) {
        errorchamp = errorlogin;
    }
    if (champ_rempli(champ)) {
        if (funchamp()) {
            champ.style.border = "4px solid green";
            errorchamp.innerHTML = "";
            return true ;
        } else {
            champ.style.border = "4px solid red";
        }
    } else {
        champ.style.border = "4px solid red";
        errorchamp.innerHTML = "Champ Obligatoire";
    }
    return false;
}


//===========================================

btn.addEventListener('click',function (e) {
    verification(login,valid_login);
    verification(password,valid_password);
    if (!verification(login,valid_login) || !verification(password,valid_password)) {
        e.preventDefault();
    }
})
