<?php
/**
 * Created by PhpStorm.
 * User: Dimitry
 * Date: 07.12.2017
 * Time: 11:24
 */

require_once("db_config.php");

$dbhandler = mysqli_connect($host, $user, $passwrd, $dbname);

if (!$dbhandler) {
    exit("Can't connect to DB!");
}

    $result = mysqli_query($dbhandler, "SELECT * FROM messages");
//    var_dump($result);

    $messages = array();

    if ($result) {
        while ($message = mysqli_fetch_array($result)) {
            $messages[] = $message;
        }
//        echo "<pre>";
//        var_dump($messages);
//        echo "<pre>";
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Chat</title>

    <link href="styles/main.css" rel="stylesheet" media="all">
</head>
<body>
<div class="messages" id="block">
    <?php
    foreach ($messages as $message) {
    ?>
    <div class="message">
        <p class="mes-head"><b><?= $message['nickname']?></b> (<?= date("d F Y", $message['date'])?>)</p>
        <p class="mes-text"><?= $message['message']?></p>
    </div>
    <?php
    }
    ?>
</div>
<div>
<form action="form_handler.php" method="post">
    <fieldset>
        <legend> Enter Your nickname and message</legend>

        <div class="pair">
            <p>Nickname:</p>
            <input name="nickname" value="" type="text" placeholder="Anonymous" required>
        </div>
        <div class="pair">
            <p>Message:</p>
            <textarea name="message" rows="4" placeholder="We are Anonymous. We are Legion. We do not forgive. We do not forget. Expect us." required></textarea>
        </div>
    </fieldset>
    <input name="submit" type="submit" value="Send">
</form>
</div>

<div class="link">
    <a href="https://github.com/Rykehuss/gcw/tree/master/php_1">Source code</a>
</div>

<script type="text/javascript">
    var block = document.getElementById("block");
    block.scrollTop = block.scrollHeight;
</script>

</body>
</html>

