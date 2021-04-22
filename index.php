<?php
require_once(dirname(__FILE__) . '/../../config.php');

global $CFG;

$username = optional_param('username', false, PARAM_RAW);
if (isset($username) && !empty($username)) {
    $username = s($username);
} else {
    $username = 'mundo';
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo get_string('pluginname', 'local_helloworld')?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<h1><?php echo get_string('hello', 'local_helloworld')?> <?php echo $username?>!</h1>
<?php if ($username != 'mundo') { ?>
    <ul>
        <li><a href="<?php echo $CFG->wwwroot?>"><?php echo get_string('site_home', 'local_helloworld')?></a></li>
        <li><a href="<?php echo $CFG->wwwroot?>/local/helloworld/"><?php echo get_string('plugin_home', 'local_helloworld')?></a></li>
    </ul>
<?php } else { ?>
    <form action="<?php echo $CFG->wwwroot?>/local/helloworld/">
        <label for="username"><?php echo get_string('form_input_title', 'local_helloworld')?></label><br>
        <input type="text" id="username" name="username" placeholder="<?php echo get_string('form_input_placeholder', 'local_helloworld')?>"><br>
        <input type="submit" value="<?php echo get_string('form_input_submit', 'local_helloworld')?>">
    </form>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>