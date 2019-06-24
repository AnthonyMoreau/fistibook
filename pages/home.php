<?php
    require "app/pdo.php";

    $_SESSION['errors'] = [];
    $pattern = "/[A-Za-zéàèçêiôûëïö0-9]+/";

    if(!empty($_POST)){

        if( !empty($_POST['name']) and 
            !empty($_POST['first_name']) and 
            !empty($_POST['age']) and 
            !empty($_POST['ville']) and 
            !empty($_POST['tel'])and 
            !empty($_POST['mail']) and 
            !empty($_POST['pass']) and 
            !empty($_POST['sexe'])){

            // on verifie les caracteres spéciaux dans les noms propres
            preg_match($pattern, $_POST['name'], $match_name);
            preg_match($pattern, $_POST['first_name'], $match_first_name);
            preg_match($pattern, $_POST['ville'], $match_ville);

            if( filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) 
                and $_POST['name'] == $match_name 
                and $_POST['first_name'] == $match_first_name 
                and $_POST['ville'] == $match_ville){

                // on entre l'utilisateur dans la base de donnée
                $req = $pdo->prepare("INSERT INTO users SET name= ?, first_name= ?, birth_date= ?, sexe= ?, city= ?, email= ?, phone= ?");
                $req->execute([$_POST['name'], $_POST['first_name'], $_POST['age'],$_POST['sexe'], $_POST['ville'],$_POST['mail'], $_POST['tel']]);
            
            } else {

                $_SESSION['errors'][] = "Votre Email ou votre nom ne semblent pas valide";
            }

        } else {

            $_SESSION['errors'][] = "Veuillez remplir tous les champs";
    
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home</title>
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="index.php?page=home">Fistibook</a></li>
            <li><a href="index.php?page=home">home</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
        </ul>
    </div>
    <div class="container">

        <h1>Je suis la home</h1>

        <h2>Inscrivez-vous !</h2>
        <p>
            <?php 
            
                foreach($_SESSION['errors'] as $error){
                    echo $error;
                }
            
            ?>
        </p>

        <div class="formulaire">

            <form action="#" method="post">
                <p>
                    <label for="name">Prénom</label>
                    <input type="text" name="name" id="name" value="<?php if(!empty($_POST['name'])){echo $_POST['name'];} ?>">
                </p>
                <p>
                    <label for="first_name">Nom</label>
                    <input type="text" name="first_name" id="first_name" value="<?php if(!empty($_POST['first_name'])){echo $_POST['first_name'];} ?>">
                </p>
                <p>
                    <label for="age">Date de naissance</label>
                    <input type="date" name="age" id="age" value="<?php if(!empty($_POST['age'])){echo $_POST['age'];} ?>">
                </p>
                <p>
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" id="ville" value="<?php if(!empty($_POST['ville'])){echo $_POST['ville'];} ?>">
                </p>
                <p>
                    <label for="tel">Téléphone</label>
                    <input type="tel" name="tel" id="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" value="<?php if(!empty($_POST['tel'])){echo $_POST['tel'];} ?>"> 
                
                    <small>exemple: 02-03-05-08-15</small>
                </p> 
                <p>

                    <label for="mail">Mail</label>
                    <input type="email" name="mail" id="mail" value="<?php if(!empty($_POST['mail'])){echo $_POST['mail'];} ?>">
                </p>
                <p>
                    <label for="pass">Mot de passe</label>
                    <input type="password" name="pass" id="pass" value="<?php if(!empty($_POST['pass'])){echo $_POST['pass'];} ?>"> 
                </p>
                <p>
                    <label for="femme">Femme</label>
                    <input type="radio" name="sexe" id="femme" value="f">
                    <label for="homme">Homme</label>
                    <input type="radio" name="sexe" id="homme" value="h">
                </p>
                <input type="submit" value="Envoyer">

            </form>

        </div>
    </div>
    

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>