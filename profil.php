<html>
    <head>
        <title>Modifier Profil</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href= "">
        
    </head>
    <body class="bgprofil">

   <?php
    session_start();
    $connexion = mysqli_connect("localhost","root","","discussion");
    $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);
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
            <a href="commentaire.php">Discussion</a>
            <a href="index.php?deconnexion=true">Déconnexion</a>

        </nav>
      </header>



                <div id="profilform">
                    <h1>Modifiez votre profil</h1><br>

                    <form method="post" action="index.php">


                        <label>Nouveaux login:</label>
                        <input type="text" value="<?php echo $data['login']?>" placeholder="Nouvel identifiant" name="login"></input><br><br/>

                        <label>Nouveau Password:</label>
                        <input type="password" value="<?php echo $data['password']?>" placeholder="nouveau mot de passe" name="mdp"></input><br><br/>

                        <input type="submit" name="Modifier" value ="Valider">


                    </form><br>

                </div>


  </body>
</html>
