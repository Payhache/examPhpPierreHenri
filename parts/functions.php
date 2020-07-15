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
//################################################
// Fonctions pour vérifier validité des champs inputs
//#################################################

// Vérification que tous les champs du formulaire LOGIN sont remplis :
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
// Verification des champs d'ajout de compétence :
    function valideFormComps() {
        $errors = [];
        if(empty($_POST['titre'])){
            $errors[] = 'Il faut rentrer un titre de compétence';
        }
        if(empty($_POST['note'])){
            $errors[] = 'Il faut rentrer une note';
        }
            return ['errors'=> $errors];

    }
    // Verification des champs d'ajout d'experience :
        function valideFormXp() {
            $errors = [];
            if(empty($_POST['titre'])){
                $errors[] = 'Il faut rentrer un titre de compétence';
            }
            if(empty($_POST['description'])){
                $errors[] = 'Il faut rentrer une description';
            }
            if(empty($_POST['date_debut'])){
                $errors[] = 'Il faut rentrer une date de début';
            }
                return ['errors'=> $errors];
        }
    
    // Fonction qui affiche les erreurs
function displayErrors($errors){
    if (count($errors) != 0) {
        echo(' <h5>Erreur(s) lors de la dernière soumission du formulaire : </h5>');
        foreach ($errors as $error) {
            echo('<div class="error m-2 badge badge-info">' . $error . '</div>');
        }
    }
}
//################################################
// Fonction de recherches dans la BDD
//#################################################
    // Fonction pour récuperer les différentes experiences :
    function getXp($dataBase){
        $requestXp = $dataBase->prepare('SELECT * FROM experience ');
        $requestXp->execute();
        return $requestXp;
    }
    // Fonction pour récuperer les différentes compétences :
    function getComp($dataBase){
        $requestComp = $dataBase->prepare('SELECT * FROM competence ');
        $requestComp->execute();
        return $requestComp;
    }
    // Fonction pour récuperer une compétence spécifique :
    function getCompById($dataBase, $id) {
        $requestComp = $dataBase->prepare('SELECT * FROM competence WHERE id=:id');
        $requestComp->execute([
            'id' => $id
        ]);
        return $requestComp;
    }
//################################################
// Fonction qui modifient la  BDD
//#################################################
// Ajout compétence :
function addComp($dataBase){
    $newComp = $dataBase->prepare('INSERT INTO competence(titre, note)VALUES(:titre, :note)');
    $newComp->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
    ]);
}
// Edition d'une compétence :
function editComp($dataBase, $id){
    $editedComp = $dataBase->prepare('UPDATE competence SET titre =:titre, note =:note WHERE id =:id');
    $editedComp->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
        'id' => $id
    ]);
}
// Suppression d'une compétence :
function deleteComp($dataBase, $id) {
 $res = $dataBase->prepare('DELETE FROM competence WHERE id = :id');
 $res->execute(['id'=> $id]);
}

// Ajout d'une Experience :
function addXp($dataBase){
    $newXp = $dataBase->prepare('INSERT INTO experience(titre, description, date_debut, date_fin)
                                VALUES(:titre, :description, :date_debut, :date_fin=null)');
    $newXp->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin'],
    ]);
}
// Suppression de l'xp :
function deleteXp($dataBase, $id) {
    $res = $dataBase->prepare('DELETE FROM experience WHERE id = :id');
    $res->execute(['id'=> $id]);
   }
   
// Edition d'une compétence
?>