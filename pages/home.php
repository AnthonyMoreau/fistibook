<?php 
    $db_name = "fistibook";
    $db_host = "127.0.0.1";
    $db_admin = "admin";
    $db_pass = "plop";

    $pdo = new PDO("mysql:dbname={$db_name};host={$db_host}", $db_admin, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    if(isset($_POST['name'])){
        $req = $pdo->prepare("INSERT INTO users SET name= ?, first_name= ?, birth_date= ?, sexe= ?, city= ?, email= ?, phone= ?");
        $req->execute([$_POST['name'], $_POST['first_name'], $_POST['age'],$_POST['sexe'], $_POST['ville'],$_POST['mail'], $_POST['tel']]);
        var_dump($pdo);
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

        <div class="formulaire">

            <form action="#" method="post">
                <p>
                    <label for="name">Prénom</label>
                    <input type="text" name="name" id="name">
                </p>
                <p>
                    <label for="first_name">Nom</label>
                    <input type="text" name="first_name" id="first_name">
                </p>
                <p>
                    <label for="age">Date de naissance</label>
                    <input type="date" name="age" id="age">
                </p>
                <p>
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" id="ville">
                </p>
                <p>
                    <label for="tel">Téléphone</label>
                    <input type="tel" name="tel" id="tel" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}">
                
                    <small>exemple: 02-03-05-08-15</small>
                </p> 
                <p>

                    <label for="mail">Mail</label>
                    <input type="email" name="mail" id="mail">
                </p>
                <p>
                    <label for="pass">Mot de passe</label>
                    <input type="password" name="pass" id="pass">
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