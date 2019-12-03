<?php
    session_start();
    if (isset($_SESSION['login']) && ($_SESSION['login'] == true))
    {
    include 'barnavco.php';
}
    else
    {
        include 'barnav.php';
    }

if(isset($_POST['login']) && isset($_POST['password']))
{

    $connexion = mysqli_connect ("localhost", "root", "", "discussion");


    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $login = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['login']));
    $password = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['password']));

    if($login !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateurs where
        login = '".$login."' ";
        $exec_requete = mysqli_query($connexion,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];

        $requete4 = "SELECT * FROM utilisateurs WHERE login='".$login."'";
        $exec_requete4 = mysqli_query($connexion,$requete4);
        $reponse4 = mysqli_fetch_array($exec_requete4);

        if( $count!=0 && $_SESSION['login'] == "" && password_verify($password, $reponse4[2]) )
        {

            $_SESSION['login'] = $login;
            $user = $_SESSION['login'];
            header('Location: connexion.php');
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }

   }
}

?>

<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="index.css">
    <title>Connexion</title>
</head>
<body id="bodyco">

    <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:#6E0C06'><b>Utilisateur ou mot de passe incorrect</b></p>";
                }
                ?>
        <div id="formc">
          <h1>Connexion</h1>


              <form action="" method="post">
              

                  <label><b>LOGIN</b></label>
                  <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

                  <label><b>PASSWORD</b></label>
                  <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                  
                  <input type="submit" id='submit' value='LOGIN' >
                </form>
        </div>
        <img id="stats" src="stats.png">
        <img id="lance" src="lance.png">
        <img id="arc" src="arc.png">
        <img id="epee" src="epee.png">
        <img id="cheval" src="cheval.png">
    </body>
</html>



