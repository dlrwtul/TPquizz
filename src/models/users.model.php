<?php 
function authentificate($login,$password)
{
    $users=find_data("users");
    foreach ($users as $user) {
        if ($user['login'] == $login && $user['password'] == $password) {
            return $user;
        }
    }

}

function subscribe_user($prenom,$nom,$login,$password)
{
    $myObj = new StdClass();
    $myObj->nom = $nom;
    $myObj->prenom = $prenom;
    $myObj->login = $login;
    $myObj->password = $password;
    $myObj->role = "JOUEUR";
    $myObj->score = 0;
    return save_data("users",$myObj);
}