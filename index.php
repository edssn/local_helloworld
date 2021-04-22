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

if ($has_param) {
    echo '<ul>';
    echo '<li><a href="'.$CFG->wwwroot.'">'.get_string("site_home", "local_helloworld").'</a></li>';
    echo '<li><a href="'.$PAGE->url.'">'.get_string("plugin_home", "local_helloworld").'</a></li>';
    echo '</ul>';
} else {
    echo '<form action="'.$PAGE->url.'">';
    echo '<label for="username">'.get_string("form_input_title", "local_helloworld").'</label>';
    echo '<input type="text" id="username" name="username" placeholder="'.get_string("form_input_placeholder", "local_helloworld").'"><br>';
    echo '<input type="submit" value="'.get_string("form_input_submit", "local_helloworld").'">';
    echo '</form>';
}
echo $OUTPUT->footer();
