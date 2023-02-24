<?php
    include_once("./inc/register.php");
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
    <form action="" method="post">
        <div>
            <input type="text" name="lastname">
            <span class="error">
                <?= isset($error['lastname']) ? $error['lastname'] : "" ?>
            </span>
        </div>
        <div>
            <input type="text" name="firstname">
            <span class="error">
            <?= isset($error['firstname']) ? $error['firstname'] : "" ?>
            </span>
        </div>
        <div>
            <input type="email" name="email">
            <span class="error">
                <?= isset($error['email']) ? $error['email'] : "" ?>
            </span>
        </div>
        <div>
            <input type="password" name="pwd">
            <span class="error">
                <?= isset($error['pwd']) ? $error['pwd'] : "" ?>
            </span>
        </div>
        <div>
            <input type="password" name="pwdConfirm">
            <span class="error">
                <?= isset($error['pwdConfirm']) ? $error['pwdConfirm'] : "" ?>
            </span>
        </div>
        <div>
            <input type="submit" name="submited" value="send">
        </div>
    </form>
</body>

</html>