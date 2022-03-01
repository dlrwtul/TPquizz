const listerjoueurs = document.querySelector("#listerjoueurs");
const listejoueurs = document.querySelector(".listejoueurs");
const defaultdiv = document.querySelector(".default");
listejoueurs.style.display = "none";


//=========================










//==========================

listerjoueurs.addEventListener('click',function () {
    if (listejoueurs.style.display === "none") {
        defaultdiv.style.display = "none";
        listejoueurs.style.display = "block";
        listerjoueurs.style.borderLeftColor= "#red";
        listerjoueurs.style.backgroundColor= "#17B169";
        listerjoueurs.style.color = "white";
    } else {
        defaultdiv.style.display = "block";
        listejoueurs.style.display = "none";
        listerjoueurs.style.borderLeftColor= "#17B169";
        listerjoueurs.style.backgroundColor= "white";
        listerjoueurs.style.color = "black";
    }
})

listerjoueurs.addEventListener('mouseenter',function () {
    listerjoueurs.style.borderLeftWidth= "20px";
    listerjoueurs.style.paddingLeft= "5%";
})

listerjoueurs.addEventListener('mouseleave',function () {
    listerjoueurs.style.borderLeftWidth= "8px";
    listerjoueurs.style.paddingLeft= "3%";
})