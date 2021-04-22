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

$output = '';
if ($has_param) {

    $output .= html_writer::start_tag('ul')."\n";
    $output .= html_writer::tag('li', html_writer::link($CFG->wwwroot, get_string("site_home", "local_helloworld")))."\n";
    $output .= html_writer::tag('li', html_writer::link($PAGE->url, get_string("plugin_home", "local_helloworld")))."\n";
    $output .= html_writer::end_tag('ul');

} else {

    $output .= html_writer::start_tag('form', array('action' => $PAGE->url))."\n";
    $output .= html_writer::start_tag('label', array('for' => 'username'));
    $output .= get_string("form_input_title", "local_helloworld");
    $output .= html_writer::end_tag('label')."\n";
    $output .= html_writer::tag('input', '', array('class' => 'input_username', 'type' => 'text', 'name' => 'username','placeholder' => get_string('form_input_placeholder', 'local_helloworld')))."\n";
    $output .= html_writer::tag('input', '', array('class' => 'submit_form', 'type' => 'submit','placeholder' => get_string('form_input_submit', 'local_helloworld')))."\n";
    $output .= html_writer::end_tag('form');

}
echo $output;


//    $output .= html_writer::alist(
//        array(html_writer::link($CFG->wwwroot, get_string("site_home", "local_helloworld")),
//            html_writer::link($PAGE->url, get_string("plugin_home", "local_helloworld")))
//        )."\n";

//$out = '';
//$out .= html_writer::div('anonymous');  // <div>anonymous</div>
//$out .= html_writer::div('kermit', 'frog'); // <div class="frog">kermit</div>
//$out .= html_writer::div('Mr', 'toad', array('id' => 'tophat', 'action' => 'tophat')); // <div class="toad" id="tophat">Mr</div>
//$out .= html_writer::start_span('zombie') . 'BRAINS' . html_writer::end_span(); // <span class="zombie">BRAINS</span>
//echo $out;


$content = [
    'title' => 'Titulo de Template',
    'messages' => array('elemento 1', 'elemento 2', "elemento 3"),
    'groups' => array(
            array('title' => 'Elemento 1', 'description' => 'Descripción Elemento 1'),
            array('title' => 'Elemento 2', 'description' => 'Descripción Elemento 4'),
            array('title' => 'Elemento 3', 'description' => 'Descripción Elemento 3')
        ),
    'url' => $PAGE->url,
];

//echo $OUTPUT->render_from_template('local_helloworld/index', $content);

echo $OUTPUT->footer();
