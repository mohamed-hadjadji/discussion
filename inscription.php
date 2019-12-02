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
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Inscription</title>
</head>
<body class="bodyi">
    <?php  
    if (isset($_SESSION['login']) && ($_SESSION['login'] == true))
    {
    include 'barnavco.php';
}
    else
    {
        include 'barnav.php';
    }
    ?>
    <div id="formc" >
        <form class="form" method="POST" action=""> 
            <h1>Inscrivez vous pour accéder au salon de discussion</h1>
        
        
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