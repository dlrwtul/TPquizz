const listerjoueurs = document.querySelector("#listerjoueurs");
const ajouteradmin = document.querySelector("#ajouteradmin");
const listerquestions = document.querySelector("#listerquestions");
const ajouterquestions = document.querySelector("#ajouterquestions");
const defaultdiv = document.querySelector(".default");
const listejoueurs = document.querySelector(".listejoueurs");
const newadmin = document.querySelector(".newadmin");
const listequestions = document.querySelector(".listequestions");
const newquestion = document.querySelector(".newquestion");
const lesoptions = document.querySelectorAll(".choice ul div");
const lesdivs = document.querySelectorAll(".droite > div");
lesdivs.forEach(element => {
    if (element.style.backgroundColor !== "white") {
        element.style.display = "none"
    }  
});
defaultdiv.style.display = "block";



//===============================================
function affiche_hover() {
    lesoptions.forEach(element => {
        if (element.style.backgroundColor === "white") {
            element.addEventListener('mouseenter',function () {
                element.style.backgroundColor= "rgba(0, 0, 0, 0.2)";
            })
            element.addEventListener('mouseleave' ,function () {
                element.style.backgroundColor= "white";
            })
        }
        
    });
}

function select_div(click,div) {
    if (div.style.display === "none") {
        defaultdiv.style.display = "none";
        lesdivs.forEach(element => {
            if (element.style.backgroundColor !== "white") {
                element.style.display = "none"
            }  
        });
        lesoptions.forEach(element => {
            if (element.style.backgroundColor !== "white") {
                element.style.backgroundColor= "white";
                element.style.borderLeft = "1px solid white";
            }
        });
        div.style.display = "flex";
        click.style.borderLeft = "8px solid green";
        click.style.backgroundColor= "rgba(0, 0, 0, 0.2)";
    } else {
        defaultdiv.style.display = "block";
        div.style.display = "none";
        click.style.borderLeft = "1px solid white";
        click.style.backgroundColor= "white";
    }
    if (listequestions.style.display !== "none") {
        document.querySelector("#listerquestions img").src = "/TPQUIZZ/public/img/ic-liste-active.png";
    }else {
        document.querySelector("#listerquestions img").src = "/TPQUIZZ/public/img/ic-liste.png";
    }
    if (newadmin.style.display !== "none") {
        document.querySelector("#ajouteradmin img").src = "/TPQUIZZ/public/img/ic-ajout-active.png";
    }else {
        document.querySelector("#ajouteradmin img").src = "/TPQUIZZ/public/img/ic-ajout.png";
    }
    if (listejoueurs.style.display !== "none") {
        document.querySelector("#listerjoueurs img").src = "/TPQUIZZ/public/img/ic-liste-active.png";
    }else {
        document.querySelector("#listerjoueurs img").src = "/TPQUIZZ/public/img/ic-liste.png";
    }
    if (newquestion.style.display !== "none") {
        document.querySelector("#ajouterquestions img").src = "/TPQUIZZ/public/img/ic-ajout-active.png";
    }else {
        document.querySelector("#ajouterquestions img").src = "/TPQUIZZ/public/img/ic-ajout.png";
    }
    
}

//===============================================
listerquestions.addEventListener('click',function () {
    select_div(listerquestions,listequestions);
    

}) 

ajouteradmin.addEventListener('click',function () {
    select_div(ajouteradmin,newadmin);
    
}) 

listerjoueurs.addEventListener('click',function () {
    select_div(listerjoueurs,listejoueurs);
    
}) 

ajouterquestions.addEventListener('click',function () {
   select_div(ajouterquestions,newquestion);
   
}) 

