
<?php
ob_start();
session_start();
ini_set('display_errors', 1);
error_reporting(E_WARNING | E_ERROR);

// INCLUDES
include('functions.inc.php');
include('config.inc.php');




$p_login = $_POST["submit_login"];
if($p_login){
    $erreur = array();

    // nettoyage
    $password = clean($_POST["password"]);
    $n_honeypot = clean($_POST["user_email"]);

    // HONEYPOT
    if($n_honeypot != ""){
        die("SPAMMEUR!");
    }
    // validation 
    if($n_email == ""){
        $erreur["n_email"] = 'Email est obligatoire';
    }

    function is_valid_email($n_email) {
    return filter_var($n_email, FILTER_VALIDATE_EMAIL);
    }

    }

?>


<html lang="fr">
	<head>

		<title>Stress test</title>
		<meta charset="UTF-8" />
		<meta name="description" content="Description du site">
		
        <link rel="stylesheet" href="_styles/style.css">
    
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

	</head>

	<body>
        <div class="container">
            <h1>Administrateur - Connexion</h1>
            <a class="login" href="logout.php">Déconnexion</a>
                
                <form method="post">
                    <label class="user_email" for="prenom">User email</label>
                    <input class="user_email" type="text" name="user_email" id="user_email" value="<?php echo ($user_email!='') ? $user_email: '' ?>">

                    <label for="email">Email<abbr title="Champ obligatoire">*</abbr></label>
                    <input type="email" name="email" id="email" value="<?php echo ($email!='') ? $email: '' ?>" placeholder="Votre email">
                    <?php echo message_erreur($erreur, 'n_email');?> 

                    <label class="mdp" for="password">Mot de passe<abbr title="Champ obligatoire">*</abbr></label>
                    <input type="password" name="password" id="password" value="<?php echo ($password!='') ? $password: '' ?>" placeholder="Votre mot de passe">
                    <?php echo message_erreur($erreur, 'password'); ?>

                    <input type="submit" name="submit_login" value="Se connecter" id="btn">

                </form>
           </div> 

	</body>
</html>