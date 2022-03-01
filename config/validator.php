<?php 

function champ_rempli($data):bool
{
    if (!empty($data)) {
        return true;
    }
    return false;
}

function valide_login($login):bool
{
    $regex="/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";
    if (preg_match($regex,$login)) {
        return true;
    }
    return false;
}

function size_password($password):bool
{
    if (strlen($password) >= 6) {
        return true;
    }
    return false;
}

function valide_password($password):bool
{
    if (size_password($password)) {
        $regexNbr = '/[0-9]/'; 
        $regexMaj = '/[A-Z]/'; 
        if (preg_match($regexNbr,$password) == 1 && preg_match($regexMaj,$password) == 1) {
            return true;
        }
    }
    return false;
}

function valide_confirm($password,$cpassword):bool
{
    if ($password == $cpassword) {
        return true;
    }
    return false;
}

function valid_nom($nom)
{
    $regex = "/^[a-zA-Z\ ]/";
    if (strlen($nom) >= 15 && preg_match($regex,$nom)) {
        return true;
    }
    return false;
}