<?php
//################################################
// Fonction pour que l'utilisateur puisse se logger
//#################################################
// L'utilsateur se log ici
function logUser($dataBase){
    // selection du mot de pass et du pseudo envoyé par le formulaire dans la base de donnée
    $requestLogUser = $dataBase->prepare('SELECT * FROM user WHERE email=:email AND mot_de_passe=:mot_de_passe');
    $requestLogUser->execute([
        'email'=>$_POST['email'],
        'mot_de_passe'=>md5($_POST['mot_de_passe'])
    ]);
    // renvoi un booleen -> si vrai crée une session - Si non crée une erreure
    $logIsOk = $requestLogUser->fetch();
    if($logIsOk){
        session_start();
        $_SESSION['email'] = $logIsOk; 
    } else {
        $errors = [];
        $errors[] = "E-mail ou mot de pass incorrecte";    
    }
    return $errors;
}
// Vérification que tous les champs du formulaire sont remplis :
    function validateLogin(){
        $errors = [];
        if(empty($_POST['email'])){
            $errors[] = 'Il faut rentrer un mail';
        }
        if(empty($_POST['mot_de_passe'])){
            $errors[] = 'Il faut rentrer un mot de passe';
        }
        return ['errors'=> $errors];
    }

    // Fonction qui affiche les erreurs
    function displayErrors($errors){
    if (count($errors) != 0) {
        echo(' <h2>Erreur(s) lors de la dernière soumission du formulaire : </h2>');
        foreach ($errors as $error) {
            echo('<div class="error">' . $error . '</div>');
        }
    }
}
?>