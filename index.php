
<?php
ob_start();
session_start();
ini_set('display_errors', 1);
error_reporting(E_WARNING | E_ERROR);
// INCLUDES VITAUX
include('functions.inc.php');
include('config.inc.php');



//FORMULAIRE REGISTER
$p_register = $_POST["submit_register"];
if($p_register){
    $erreur = array();

    // nettoyage
    $n_email = clean($_POST["email"]);
    $n_honeypot = clean($_POST["user_email"]);

    // HONEYPOT
    if($n_honeypot != ""){
        die("SPAMMEUR!");
    }
    // validation 
    if($n_email == ""){
        $erreur["n_email"] = 'Email est obligatoire';
    }

    

    $destinataire = "aurianab@live.fr";
    $role = "reader";

    // Génération aléatoire d'une clé
    $key = md5(microtime(TRUE)*100000);

    //Envoi email de confirmation
    require 'lib/PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'alexandre@pixeline.be';                 // SMTP username
    $mail->Password = 'bDMUEuWn1H4r3FCGQjyO-g';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('from@example.com', 'Newsletter');
    $mail->addAddress($destinataire, 'Admin');     // Add a recipient
    

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Confirmation newsletter';
    $mail->Body    = 'Pour confirmer votre inscription aux newsletters, veuillez cliquer sur ce lien: http://127.0.0.1/php/stress/confirmation.php?email='.urlencode($n_email).'&key='.urlencode($key).'
';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'L\'email n\'a pas été envoyé.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'L\'email a bien été envoyé.';
    }


    // insertion
    if(empty($erreur)){
            // ajout dans la database
            $sql = 'INSERT INTO users(email, role)
            VALUES(:email, :role)';
            $preparedStatement = $connexion->prepare($sql);
            $preparedStatement->bindValue(':email', $n_email);
            $preparedStatement->bindValue(':role', $role);
            
            ($preparedStatement->execute());

            $stmt = $connexion->prepare("UPDATE users SET key=:key WHERE n_email like :email");
            $stmt->bindParam(':key', $key);
            $stmt->bindParam(':email', $n_email);
            $stmt->execute();
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
            <h1>Inscrivez-vous à notre newsletter</h1>
            <a class="login" href="admin.php">Administrateur</a>
                
                <form method="post">
                    <label class="user_email" for="prenom">User email</label>
                    <input class="user_email" type="text" name="user_email" id="user_email" value="<?php echo ($user_email!='') ? $user_email: '' ?>">

                    <label for="email">Email<abbr title="Champ obligatoire">*</abbr></label>
                    <input type="email" name="email" id="email" value="<?php echo ($email!='') ? $email: '' ?>" placeholder="Votre email">
                    <?php echo message_erreur($erreur, 'n_email'); ?>

                    <input type="submit" name="submit_register" value="S'inscrire" id="btn">

                </form>
           </div> 

	</body>
</html>
