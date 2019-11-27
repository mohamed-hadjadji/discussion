<html>
<head>
	<meta sharset="utf-8">
	<link rel="stylesheet" href= "">
	 <title>Salon de Discussion</title>

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

        <a href="profil.php">Modification</a>
        <a href="discussion.php">Discussion</a>
        <a href="index.php?deconnexion=true">Déconnexion</a>

     </nav>
    </header>
    <section>
 <?php
session_start();
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
		echo "le champ message est vide<br>";
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
		 
		   <p><?php echo $row['message']?></p>
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
                        <textarea name="message" rows="6" maxlength="50" cols="50"></textarea><br/><br/>

                        <input type="submit" name="submit" value ="Poster">

                    </form>

                    <?php
                     }
                  ?>
        </div>

    </article>

</body>
