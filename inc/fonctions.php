<?php

/**
 * checkXSSPostValue
 * 
 * Cette fonction sert à vérifier l'intégrité de 
 * la variable post transmise (faille XSS) et retourne sa valeur une fois nettoyée.
 *
 * @param  mixed $postEntrie : entrée de formulaire à vérifier
 * @return mixed retourn une variable post nettoyée de ses tags
 */
function checkXSSPostValue($postEntrie)
{
    $postEntrie = strip_tags($postEntrie);
    return $postEntrie;
}

/**
 * checkEmptyValue
 * 
 * Cette fonction permet de vérifier si un champ obligatoire est vide
 *
 * @param  mixed $postEntrie : entrée de formulaire à vérifier
 * @param  string $key : name HTML(index post) de mon entrée
 * @param  array $error : tableau d'erreur de mon formulaire
 * @return array $error : retourne le tableau d'erreur modifier si le champ est vide 
 * @version 1.0.0
 * @author Bibi
 */
function checkEmptyValue($postEntrie, $key, $error)
{
    if (empty($postEntrie)) {
        $error[$key] = "Le champ $key est vide.";
    }
    return $error;
}
/**
 * checkEmail
 * 
 * Cette fonction permet de vérifier si le champ mail est valide.
 *
 * @param  mixed $postEntrie : entrée de formulaire à vérifier
 * @param  string $key : name HTML(index post) de mon entrée
 * @param  array $error : tableau d'erreur de mon formulaire
 * @return array $error : retourne le tableau d'erreur modifier si l'email n'est pas valide 
 * @version 1.0.0
 * @author Bibi
 */
function checkEmail($postEntrie, $key, $error)
{
    if (!filter_var($postEntrie, FILTER_VALIDATE_EMAIL)) {
        $error[$key] = "Le champ $key n'est pas valide.";
    }
    return $error;
}
/**
 * checkPwdValid
 * 
 * Cette fonction permet de vérifier la validité du mot de passe.
 *
 * @param  mixed $postEntrie : entrée de formulaire à vérifier
 * @param  string $key : name HTML(index post) de mon entrée
 * @param  array $error : tableau d'erreur de mon formulaire
 * @return array $error : retourne le tableau d'erreur modifier si le mot de passe n'est pas conform 
 * @version 1.0.0
 * @author Bibi
 */
function checkPwdValid($postEntrie, $key, $error)
{
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    if (!preg_match($password_regex, $postEntrie)) {
        $error[$key] = "Le mot de passe doit comporter au moins ...";
    }
    return $error;
}
/**
 * checkPwdConfirm
 * 
 * Cette fonction permet de vérifier la confirmation du mot de passe.
 *
 * @param  mixed $postPwd : entrée du premier champ pwd
 * @param  mixed $postPwdConfirm : entrée du pwdconfirm
 * @param  string $key : name HTML(index post) de mon entrée
 * @param  array $error : tableau d'erreur de mon formulaire
 * @return array $error : retourne le tableau d'erreur modifier si les deux mots de passe ne correspondent pas. 
 * @version 1.0.0
 * @author Bibi
 */
function checkPwdConfirm($postPwd, $postPwdConfirm, $key, $error)
{
    if ($postPwd !== $postPwdConfirm) {
        $error[$key] = "Les 2 mots de passe ne sont pas identiques.";
    }
    return $error;
}