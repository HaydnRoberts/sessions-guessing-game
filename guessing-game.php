<?php
session_start();

if (isset($_GET["clear"])) {
    if (isset($_SESSION["guess-target"])) {
        session_unset();
        session_destroy();
        header("Location: http://localhost/sessions-guessing-game/guessing-game.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sessions</title>
</head>
<body>
    
<form action="guessing-game.php" method="post">
Guess the number: <input type="text" name="guess"><br>
<input type="submit">
</form>

<?php
if( ! isset($_SESSION["guess-target"])) {

    echo "Welcome to the number guessing game!";
    echo "<br>";
    echo "Session is not set";

    $guess = rand(1,100);
    $_SESSION["guess-target"] = $guess;

} else {

    echo "Session is set!";
    //echo "<br>";
    //echo "Value is: " . $_SESSION["guess-target"];
    echo "<br>";
    echo "<a href='guessing-game.php?clear=1'>remove cookie</a>";
    echo "<br>";
};

if( isset($_POST["guess"])) {
    if( $_SESSION["guess-target"] == $_POST["guess"]) {
        echo "You guessed the number";
    } elseif( $_SESSION["guess-target"] < $_POST["guess"]) {
        echo "The number is lower than your guess";
    } else {
        echo "The number is higher than your guess";
    };
};

?>
</body>
</html>