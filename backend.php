<?php require_once('connection.php'); ?>
<?php require_once('User.php'); ?>
<?php
$name       = $_POST['name'];
$email      = $_POST['email'];
$password   = $_POST['password'];

$user = new User($connection);

$user->save([
    'name' => $name,
    'email' => $email,
    'password' => $password,
]);


?>

<?php require_once('close_connection.php'); ?>