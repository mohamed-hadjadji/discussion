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
    ?>



    <html>
<head>
	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="index.css">
	<title>Accueil</title>
</head>
		<body id="body-index">
			<h1 id="assasin">Odyssey</h1>
			<h1 id="odd">Assasin Creed</h1>
<article id="totalindex">

	<article id="premiereindex">
	 <div class="slider"> 
   <ul id="slider-list"> 
      <li> 
          <img src="https://i.ytimg.com/vi/fFeod62gHDE/maxresdefault.jpg"> 
      </li> 
      <li> 
          <img src="https://i.ytimg.com/vi/bHCgC-g1-H0/maxresdefault.jpg"> 
      </li> 
      <li> 
          <img src="https://www.img1.psthc.fr/uploads/1544025746.jpeg"> 
      </li> 
  </ul>
 </div> 

	
<img id="alex" src="Alexios.png">
<img id="cass" src="kass2.png">
  <p class="pindex">Inscrivez vous pour recevoir les meilleurs astuces de "ASSASSIN CREED",<br>et rejoindre la "Communauté Spetial Jeux Video! <br>Faites-nous part de vos astuces et  montrez-nous vos videos.
  Dautre jeux a venir venez nombreux </p>
</article>



</article>



  <article id="troisindex">

<div id="text1index">
<iframe width="100" height="100" src="https://www.youtube.com/embed/r0pRGTksoHA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
    <div id="text2index">
      <iframe width="100" height="100" src="https://www.youtube.com/embed/RJ_N8hi06r0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
<div id="text3index">
<iframe width="100" height="100" src="https://www.youtube.com/embed/6hu9pr8fOZI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

<div id="text4index">
<iframe width="100" height="100" src="https://www.youtube.com/embed/g8iTWjzVJiU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
    </article>

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
   if (isset($_SESSION['login'])==false)
   {
  
  

    }
    elseif(isset($_SESSION['login'])==true)

    {
      $user = $_SESSION['login'];
      echo "<h3 id=\"connecte\"><b>Bonjour <u>$user,</u> vous êtes connecté</b></h3>";
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