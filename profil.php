<html>
    <head>
        <title>Modifier Profil</title>
        <meta sharset="utf-8">
        <link rel="stylesheet" href= "profil.css">
        
    </head>
    <body class="bgprofil">

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

    $connexion = mysqli_connect("localhost","root","","discussion");
    $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);

   
   ?>




                <div id="formc">
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
