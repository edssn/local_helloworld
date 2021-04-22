<?php
require_once(dirname(__FILE__) . '/../../config.php');

$username = optional_param('username', false, PARAM_RAW);
$username = s($username);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<?php if (isset($username) && !empty($username)) { ?>
    <h1>Hola <?php echo $username?>!</h1>
    <ul>
        <li><a href="<?php echo $CFG->wwwroot?>">Ir a la página principal del sitio</a></li>
        <li><a href="<?php echo $CFG->wwwroot?>/local/helloworld/">Ir a la página principal del plugin</a></li>
    </ul>
<?php } else { ?>
    <h1>Hola mundo!</h1>
    <form action="<?php echo $CFG->wwwroot?>/local/helloworld/">
        <label for="username">Ingresa tu nombre</label><br>
        <input type="text" id="username" name="username" placeholder="Escribe tu nombre"><br>
        <input type="submit" value="Submit">
    </form>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>