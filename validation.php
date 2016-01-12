<?php

// Récupération des variables nécessaires à l'activation
$n_email = $_GET['email'];
$key = $_GET['key'];
 
// Récupération de la clé correspondant au $n_email dans la base de données
$stmt = $dbh->prepare("SELECT key, validate FROM users WHERE n_email like :email ");
if($stmt->execute(array(':email' => $n_email)) && $row = $stmt->fetch())
  {
    $keybdd = $row['key'];	// Récupération de la clé
    $validate = $row['validate']; // $actif contiendra alors 0 ou 1
  }
 
 
// On teste la valeur de la variable $actif récupéré dans la BDD
if($validate == '1') // Si le compte est déjà actif on prévient
  {
     echo "Votre compte est déjà actif !";
  }
else // Si ce n'est pas le cas on passe aux comparaisons
  {
     if($key == $keybdd) // On compare nos deux clés	
       {
          // Si elles correspondent on active le compte !	
          echo "Votre compte a bien été activé !";
 
          // La requête qui va passer notre champ actif de 0 à 1
          $stmt = $dbh->prepare("UPDATE users SET validate = 1 WHERE n_email like :email ");
          $stmt->bindParam(':email', $n_email);
          $stmt->execute();
       }
     else // Si les deux clés sont différentes on provoque une erreur...
       {
          echo "Erreur ! Votre compte ne peut être activé...";
       }
  }
?>