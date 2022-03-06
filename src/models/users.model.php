<?php 
function authentificate($login,$password)
{
    $data = find_data();
    $users=$data["users"];
    foreach ($users as $user) {
        if ($user['login'] == $login && $user['password'] == $password) {
            return $user;
        }
    }

}

function login_present($login)
{
    $data = find_data();
    $users=$data["users"];
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return true;
        }
    }
    return false;
}

function question_presente($question)
{
    $data = find_data();
    $questions=$data["questions"];
    foreach ($questions as $unequestion) {
        if ($unequestion['questions'] == $question) {
            return true;
        }
    }
    return false;
}

function subscribe($prenom,$nom,$login,$password,$role)
{
    $myObj = new StdClass();
    $myObj->nom = $nom;
    $myObj->prenom = $prenom;
    $myObj->login = $login;
    $myObj->password = $password;
    $myObj->role = $role;
    $myObj->score = 0;
    return save_data("users",$myObj);
}

function new_question($question,$nbrpts,$reponses,$correct = "")
{
    $myObj = new StdClass();
    $myObj->question = $question;
    $myObj->nbrpts = $nbrpts;
    $myObj->reponses = $reponses;
    $myObj->correct = $correct;
    return save_data("questions",$myObj);
}