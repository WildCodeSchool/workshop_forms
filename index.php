<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>

<body>
    <form action="thanks.php" method="post">
        <div>
            <label for="name">Nom :</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="<?= $_SESSION["name"] ?? '' ?>"
                required
            >
            <?php if (isset($_GET["name"])) : ?>
                <p>Veuillez fournir votre nom</p>
            <?php endif; ?>
        </div>
        <div>
            <label for="mail">E-mail&nbsp;:</label>
            <input 
                required 
                type="email" 
                id="mail" 
                name="mail" 
                value="<?= $_SESSION["mail"] ?? '' ?>"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            >
            <?php if (isset($_GET["mail"])) : ?>
                <p>Veuillez spécifier votre email</p>
            <?php endif; ?>
        </div>
        <div>
            <label for="phone_number">Teléphone :</label>
            <input 
                required 
                type="phone_number" 
                id="phone_number" 
                name="phone_number" 
                value="<?= $_SESSION["phone_number"] ?? '' ?>"
                pattern="^(\+33|0)[1-9][0-9]{8}"
            >
            <?php if (isset($_GET["phone_number"])) : ?>
                <p>Votre numéro de téléphone est requis</p>
            <?php endif; ?>
        </div>
        <div>
            <label for="subject">Subject</label>
            <select required name="subject" id="subject">
                <option>--Please select your subject--</option>
                <option 
                    value="option A"
                    <?php if (isset($_SESSION["subject"]) && $_SESSION["subject"] == "option A") : ?>
                        selected
                    <?php endif; ?>
                >option A</option>
                <option 
                    <?php if (isset($_SESSION["subject"]) && $_SESSION["subject"] == "option B") : ?>
                        selected
                    <?php endif; ?>
                    value="option B"
                >option B</option>
                <option
                    <?php if (isset($_SESSION["subject"]) && $_SESSION["subject"] == "option C") : ?>
                        selected
                    <?php endif; ?>
                    value="option C"
                >option C</option>
            </select>
            <?php if (isset($_GET["subject"])) : ?>
                <p>Le sujet de votre message est obligatoire</p>
            <?php endif; ?>
        </div>
        <div>
            <label for="msg">Message :</label>
            <textarea required id="msg" name="message"></textarea>
            <?php if (isset($_GET["message"])) : ?>
                <p>Veuillez expliciter votre demande</p>
            <?php endif; ?>            
        </div>
        <div class="button">
            <button type="submit">Envoyer le message</button>
        </div>
    </form>
</body>

</html>
