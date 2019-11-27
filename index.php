<?php
session_start();
?>

<html>
<head>
	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="">
	<title>Accueil</title>
</head>
<body>
	<?php
   if (isset($_SESSION['login'])==false)
   {
   ?>
   <header>
      <style type="text/css">
    a:link
    {
      text-decoration:none;
    }
    </style>
        <nav class="nav">
           <ul>
              <a href="connexion.php"><h3>Connexion</h3></a>

              <a href="inscription.php"><h3>Inscription</h3></a>
           </ul>

        </nav>
    </header>
    <?php
    }
    elseif(isset($_SESSION['login'])==true)

    {
      $user = $_SESSION['login'];
      echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté</b></h3>";
    ?>
    <header>

     <style type="text/css">
       a:link
        {
        text-decoration:none;
        }
    </style>

      <nav class="nav2">

      <a href="profil.php">Modification</a>
      <a href="discussion.php">Discussion</a>
      <a href="index.php?deconnexion=true">Déconnexion</a>

      </nav>
    </header>
    <?php

    if(isset($_GET['deconnexion']))
    {
     if($_GET['deconnexion']==true)
       {
        session_unset();
        header("location:index.php");
       }
    }
    ?>
    <?php
    }
   ?>
    <?php
     $connexion = mysqli_connect("localhost","root","","discussion");

    if (isset($_POST['Modifier']))
    {


    $login = $_POST['login'];
    $passe = $_POST['mdp'];

    $requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe' WHERE login = '".$_SESSION['login']."'";
       $query2=mysqli_query($connexion,$requete2);
       session_unset();
       header("location:index.php");
    }

   ?>

</body>
</html>