const subbtn = document.querySelector("#subbtn");
const inscriptionreussie = document.querySelector(".inscriptionreussie");
const exitreussite = document.querySelector("#exitreussite");
const subprenom = document.querySelector("#subprenom");
const subnom = document.querySelector("#subnom");
const sublogin = document.querySelector("#sublogin");
const subpassword = document.querySelector("#subpassword");
const subpassword2 = document.querySelector("#subpassword2");

//==========================================================
function champ_rempli(input) {
    if (input.value !== "") {
        return true;
    }
    return false;
}

function valid_login() {
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (sublogin.value.match(validRegex)) {
        return true;
    }
    sublogin.nextElementSibling.innerHTML = "le login doit etre un email valide!";
    return false;
}

function valid_password() {
    var str = subpassword.value;
    if (str.length >=6) {
        const regex1 = /[A-Z]/;
        const regex2 = /[1-9]/;
        if (str.match(regex1) && str.match(regex2)) {
            return true;
        } else {
            subpassword.nextElementSibling.innerHTML = "le mot de passe doit contenir au moins une lettre Maj et un chiffre!";
        }
    }else {
        subpassword.nextElementSibling.innerHTML = "le mot de passe doit contenir au moins 6 carateres!";
    }
    return false
}

function valide_confirm()
{
    var str = subpassword.value;
    var str2 = subpassword2.value;
    if (str === str2) {
        return true;
    }
    subpassword2.nextElementSibling.innerHTML = "confirmation invalide!";
    return false;
}

function valid_nom(nom)
{
    var str = nom.value;
    const regex = /^[a-zA-Z\ ]/;
    if (str.length <= 15 && str.match(regex)) {
        return true;
    }
    nom.nextElementSibling.innerHTML = "veuiller entrer uniquement des caracteres alphabetique!";
    return false;
}

function verification(champ , funchamp) {
    if (champ_rempli(champ)) {
        if (funchamp) {
            champ.nextElementSibling.innerHTML = "";
            champ.style.border = "4px solid green";
            return true ;
        } else {
            champ.style.border = "4px solid red";
        }
    } else {
        champ.nextElementSibling.innerHTML = "champ obligatoire!";
        champ.style.border = "4px solid red";
    }
    return false;
}

//==========================================================
subbtn.addEventListener('click',function (e) {
    verification(subprenom,valid_nom(subprenom))
    verification(subnom,valid_nom(subnom))
    verification(sublogin,valid_login());
    verification(subpassword,valid_password());
    verification(subpassword2,valide_confirm());
    if (!verification(subprenom,valid_nom(subprenom)) || !verification(subnom,valid_nom(subnom)) || !verification(sublogin,valid_login()) || !verification(subpassword,valid_password()) || !verification(subpassword2,valide_confirm())) {
        e.preventDefault();
    }
    
})

exitreussite.addEventListener('click',function () {
    inscriptionreussie.style.visibility = "hidden";
})