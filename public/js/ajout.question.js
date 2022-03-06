const questions = document.querySelector("#questions");
const nbrpts = document.querySelector("#nbrpts");
const quest = document.querySelector("#quest");
const typerep = document.querySelector("#typerep");
const btntyperep = document.querySelector("#btntyperep");
const questbtn = document.querySelector("#questbtn");
const errorquestion = document.querySelector("#errorquestion");
const errornbrpts = document.querySelector("#errornbrpts");
var numRep = 0;
const alphabet = ["","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];


//========================================

function champ_rempli(input) {
    if (input.value !== "") {
        return true;
    }
    return false;
}

function champ_rempli_questions() {
    if (champ_rempli(questions)) {
        questions.style.border = "4px solid green";
        errorquestion.innerHTML = "";
        return true;
    } else {
        questions.style.border = "4px solid red";
        errorquestion.innerHTML = "champ obligatoire";
        return false;
    }
}

function champ_rempli_nbrpts() {
    if (champ_rempli(nbrpts)) {
        nbrpts.style.border = "4px solid green";
        errornbrpts.innerHTML = "";
        return true;
    } else {
        nbrpts.style.border = "4px solid red";
        errornbrpts.innerHTML = "champ obligatoire";
        return false;
    }
}

function build() {
    numRep++;
    const reponsediv = document.createElement("div");
    reponsediv.className = "lesreponses";

    const labelreponse = document.createElement("label");
    labelreponse.setAttribute("for",alphabet[numRep]);
    labelreponse.innerHTML = "reponse " + numRep; 

    reponsediv.appendChild(labelreponse);

    const reponsetext = document.createElement("input");
    reponsetext.setAttribute("type","text");

    reponsediv.appendChild(reponsetext)

    const correct = document.createElement("input");
    correct.id = alphabet[numRep];
    correct.name = "reponse";


    switch (typerep.value) {
        case "radio":
            correct.setAttribute("type","radio");
            break;
        case "text":
            reponsetext.remove();
            correct.setAttribute("type","text");
            break;
        default:
            correct.name = alphabet[numRep];
            correct.setAttribute("type","checkbox");
            break;
    }

    reponsediv.appendChild(correct);

    const spanrep = document.createElement("span");
    const imgspanrep = document.createElement("img");
    imgspanrep.className = "supic" ;
    imgspanrep.src = "/TPQUIZZ/public/img/ic-supprimer.png";
    imgspanrep.addEventListener('click',function () {
        reponsediv.remove();
        numRep = numRep-1;
    })
    spanrep.appendChild(imgspanrep);

    reponsediv.appendChild(spanrep);

    quest.appendChild(reponsediv);
    console.log(numRep);
}




//========================================

questbtn.addEventListener('click',function (e) {
    champ_rempli_questions() ;
    champ_rempli_nbrpts() ;
    if(!champ_rempli_questions() || !champ_rempli_nbrpts()){
        e.preventDefault();
    }
})

btntyperep.addEventListener('click',function () {
    switch (typerep.value) {
        case "radio":
            if (numRep <= 3) {
                build();
            }
            break;
        case "text":
            if (numRep <= 0) {
                build();
            }
            break;
        default:
            if (numRep <= 3) {
                build();
            }
            break;
    }
})