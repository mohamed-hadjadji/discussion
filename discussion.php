<html>
<head>
	<meta sharset="utf-8">
	<link rel="stylesheet" href= "index.css">
	 <title>Salon de Discussion</title>

</head>
  <body class="bodyd">
     <?php
     session_start();
    if (isset ($_SESSION['login']) && !empty($_SESSION['login'])){ 
    if (isset($_SESSION['login']) && ($_SESSION['login'] == true))
    {
      include 'barnavco.php';
    }
    else
    {
       include 'barnav.php';
    }
    ?>

    <section>

<?php
date_default_timezone_set('europe/paris');
if (isset($_POST['submit']))
{
	if(!empty($_POST['message']))
	{
      $connexion = mysqli_connect("localhost","root","","discussion");
       if ( isset ($_POST['submit']))
       {
	    $requete3="SELECT * FROM `utilisateurs` WHERE login='".$_SESSION['login']."'";
 	    $query3 = mysqli_query( $connexion,$requete3);
  	    $resultat3= mysqli_fetch_all($query3);

  	    $requete2="INSERT INTO messages (message, id_utilisateur, date) VALUES ('".$_POST['message']."','".$resultat3[0][0]."','".date("Y-m-d H:i:s")."')";
  	     $query2 = mysqli_query( $connexion,$requete2);
       header('Location: discussion.php');
  	    }

	   }
	else{
		echo "<p id=\"vide\">le champ message est vide</p><br>";
	}
}

?>
<?php
$connexion = mysqli_connect("localhost","root","","discussion");


$requete = "SELECT login, message,date FROM utilisateurs LEFT JOIN messages ON utilisateurs.id = messages.id_utilisateur ORDER BY messages.id DESC";

$req = mysqli_query($connexion, $requete);

while($row = mysqli_fetch_assoc($req))
{
 ?>
	<div class="poster">
		<div id="user">
		   <p><b><?php echo $row['date']?></b></p>
		   <hr>
		   <h3><b><?php echo $row['login']?></b></h3>
		   
		   
		 
	    </div>
	    <div id="messag">
	    	<div class="bubble">
		 
		   <p><?php echo $row['message']?></p>
		   </div>
	   </div>
	</div>
<?php    
}
?>



</section>
<article>
        <div id="comment">
                    <?php
               if (isset($_SESSION['login'])==true){
                    ?>
                    <form method="POST" action="">
                        <label>Envoyer un message:</label>
                        <br/><br/>
                        <textarea name="message" rows="3" maxlength="50" cols="120"></textarea><br/><br/>

                        <input type="submit" name="submit" value ="Envoyer">

                    </form>

                    <?php
                     }
                  ?>
        </div>

    </article>

</body>
<?php
}
else {
    ?>
    <body class="style2">
         <?php
    echo "<p id=\"pprofil \">Pour acceder a la page il vous faut vous connecter!!</p> ";
    ?>
    <form id="profil-deco" action="index.php">
        <input type="submit" name="bouton">
    </body>
       
<?php

}
?>
