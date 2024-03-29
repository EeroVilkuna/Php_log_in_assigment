<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Kirjaudu sisään</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/css/style.css">
  </head>
  <body>
    <?php if(!empty($user)): ?>
      <br> Tervetuloa. <?= $user['email']; ?>
      <br> Kirjautuminen onnistui!
      <a href="logout.php">
        Kirjaudu ulos
      </a>
    <?php else: ?>
      <h1>Kirjaudu sisään tai rekisteröidy</h1>

      <a href="login.php">Kirjaudu sisään</a> or
      <a href="signup.php">Rekisteröidy</a>
    <?php endif; ?>
  </body>
</html>
