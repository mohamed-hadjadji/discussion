<?php
session_start();
$connexion = mysqli_connect("localhost","root","","discussion");

if (isset($_POST['connexion']))
{
    if ($_POST['mdp']==$_POST['mdp2'])
    {
    $requet="SELECT* FROM utilisateurs";
    $query2=mysqli_query($connexion,$requet);
    $resultat=mysqli_fetch_all($query2);
    $trouve=false;
   foreach ($resultat as $key => $value) {
    if ($resultat[$key][1]==$_POST['login'])
    {
        echo "Login deja existant!!";
        $trouve=true;

    }
 }
    if ($trouve==false)
    {
        $sql = "INSERT INTO utilisateurs (login,password)
                VALUES ('".$_POST['login']."','".$_POST['mdp']."')";
    $query=mysqli_query($connexion,$sql);
    header('location:connexion.php');
    }

}
    else{
        echo "Les mots de passe doivent etre identique!";
    }
}


?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    <title>Inscription</title>
</head>
<body>
    <header>
        <style type="text/css">
    a:link
    {
    text-decoration:none;
    }
    </style>
            <nav class="nav2">

                <a href="connexion.php"><h3>Connexion</h3></a>
                <a href="inscription.php"><h3>Inscription</h3></a>

            </nav>
    </header>
    <div id="forminscription" >
        <h1>Inscrivez vous pour accéder au salon de discussion</h1>
        <form class="form" method="POST" action=""> 
        
            <label>Login:</label>
            <input type="text" name="login" placeholder="Entrez votre Login"><br/>
            <label>Mot de passe:</label>
            <input type="password" name="mdp" placeholder="Entrez votre mot de passe"><br/>
            <label>Confirmez Mot de passe:</label>
            <input type="password" name="mdp2" placeholder="Confirmez votre mot de passe"><br/> 
            <input align="center" type="submit" value="valider" name="connexion">
        
        </form>
    </div>

</body>
</html>