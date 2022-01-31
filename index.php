<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilmHub</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <style>@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');</style>
</head>
<body>

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "filmhub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT idFilm, nom, duree, description FROM film";
$result = $conn->query($sql);

?>

<?php if ($result->num_rows > 0): ?>
	Il existe <?= $result->num_rows ?> films

        <?php while($row = $result->fetch_assoc()): ?>

            <div class="film_background">
            <div class ="film_name"><?php echo utf8_encode($row["nom"]); ?></div>
            </div>

        <?php endwhile ?>

<?php else: ?>
	Il n'y a aucun film
<?php endif ?>



</body>
</html>