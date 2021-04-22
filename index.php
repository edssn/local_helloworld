<?php
require_once(dirname(__FILE__) . '/../../config.php');

global $CFG, $PAGE, $OUTPUT;

$username = optional_param('username', false, PARAM_RAW);
$has_param = false;
if (isset($username) && !empty($username)) {
    $username = get_string('hello_user', 'local_helloworld', s($username));
    $has_param = true;
} else {
    $username = get_string('pluginname', 'local_helloworld');
}

$PAGE->set_url(new moodle_url('/local/helloworld/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title(get_string('pluginname', 'local_helloworld'));
$PAGE->set_pagelayout('standard');
$PAGE->set_heading($username);
echo $OUTPUT->header();
?>


<?php if ($has_param) { ?>
    <ul>
        <li><a href="<?php echo $CFG->wwwroot?>"><?php echo get_string('site_home', 'local_helloworld')?></a></li>
        <li><a href="<?php echo $PAGE->url?>"><?php echo get_string('plugin_home', 'local_helloworld')?></a></li>
    </ul>
<?php } else { ?>
    <form action="<?php echo $PAGE->url?>">
        <label for="username"><?php echo get_string('form_input_title', 'local_helloworld')?></label><br>
        <input type="text" id="username" name="username" placeholder="<?php echo get_string('form_input_placeholder', 'local_helloworld')?>"><br>
        <input type="submit" value="<?php echo get_string('form_input_submit', 'local_helloworld')?>">
    </form>
<?php }
echo $OUTPUT->footer();
?>
