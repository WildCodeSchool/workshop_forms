<?php
  session_start();

  function sanitizeInput($inserted_input)
  {
    return htmlspecialchars(trim(stripslashes($inserted_input)));
  }

  $name = $email = $subjects = $phone = $message = "";

  $errors = [];
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $_SESSION = $_POST;
      // nettoyage et validation des données soumises via le formulaire 
      if(!isset($_POST['name']) || trim($_POST['name']) === '') 
        $errors[] = "name=1";
      if(
        !isset($_POST['mail']) 
        || trim($_POST['mail']) === ''
        || !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)
      )
        $errors[] = "mail=1";
      if(!isset(
        $_POST['subject']) 
        || trim($_POST['subject']) === '' 
        || $_POST["subject"] === "--Please select your subject--"
      ) 
        $errors[] = "subject=1";
      if(!isset($_POST['phone_number']) || trim($_POST['phone_number']) === '') 
        $errors[] = "phone_number=1";
      if(!isset($_POST['message']) || trim($_POST['message']) === '') 
        $errors[] = "message=1";
      if(!empty($errors)) {
          // traitement du formulaire
          // puis redirection
          $errorsJoined = join('&', $errors);
          header("Location: index.php?".$errorsJoined);
      }
    }

    // TODO validate input furthermore

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanks</title>
</head>
<body>
  <div>
    <p>Merci <?= $_POST['name'] ?> de nous avoir contacté à propos de <?= $_POST['subject'] ?>.
    Un de nos conseiller analysera votre demande à l’adresse <?= $_POST['mail'] ?>
    ou par téléphone au <?= $_POST['phone_number'] ?> dans les plus brefs délais pour traiter votre demande :
    <?= $_POST['message'] ?></p>
  </div>
</body>
</html>