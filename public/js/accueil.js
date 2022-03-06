const listerjoueurs = document.querySelector("#listerjoueurs");
const ajouteradmin = document.querySelector("#ajouteradmin");
const listerquestions = document.querySelector("#listerquestions");
const ajouterquestions = document.querySelector("#ajouterquestions");
const lesoptions = document.querySelectorAll(".choice ul li a");
//===============================================

lesoptions.forEach(element => {
    if (document.location.href === element.href) {
        element.style.borderLeft = "8px solid green";
        element.style.backgroundColor= "rgba(0, 0, 0, 0.2)";
        var enfants = element.childNodes;
        enfants.forEach(enfant => {
            if (enfant.getAttribute("src")) {
                if (element === listerjoueurs || element === listerquestions) {
                    enfant.src = "/TPQUIZZ/public/img/ic-liste-active.png";
                } else {
                    enfant.src = "/TPQUIZZ/public/img/ic-ajout-active.png";
                }
                
            }
        });
    }
});