<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=m2l', 'root', '');

if(isset($_GET['id_user']) AND $_GET['id_user'] > 0) {
   $getid_user = intval($_GET['id_user']);
   $requser = $bdd->prepare('SELECT * FROM user WHERE id_user = ?');
   $requser->execute(array($getid_user));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>Faq</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id_user']) AND $userinfo['id_user'] == $_SESSION['id_user']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="logout.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>