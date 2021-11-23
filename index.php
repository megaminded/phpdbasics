<?php require_once('connection.php'); ?>
<?php require_once('User.php'); ?>
<?php
try {
    $user = new User($connection);
    $result = $user->find('SELECT * FROM users');
} catch (\Exception $exception) {
    $error = $exception->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 style="color:red"><?= $error ?? ''; ?></h3>
    ?>
    <?php if (isset($result)) : ?>
    <?php
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['user_name'] . "</li>";
        }
        ?>
    <?php endif ?>
    <form action="backend.php" method="post">
        <fieldset>
            <legend>Name</legend>
            <input type="text" name="name" id="">
        </fieldset>
        <fieldset>
            <legend>Email</legend>
            <input type="text" name="email" id="">
        </fieldset>
        <fieldset>
            <legend>Password</legend>
            <input type="text" name="password" id="">
        </fieldset>
        <button type="submit">Save</button>
    </form>
</body>

</html>