<?php

defined('MOODLE_INTERNAL') || die;
/**
 * Add link to index.php into navigation drawer.
 *
 * @param global_navigation $root Node representing the global navigation tree.
 */
function local_helloworld_extend_navigation(global_navigation $navigation) {
    global $PAGE, $COURSE;
    if (isset($COURSE) && $COURSE->id <= 1 ) {
        return null;
    }

    $showinflatnavigation = false;
    if (get_config('local_helloworld', 'showinflatnavigation')) {
        $showinflatnavigation = true;
    }

    $title = get_string('pluginname', 'local_helloworld');

    // Flat navigation
    $node = navigation_node::create(
        $title,
        new moodle_url('/local/helloworld/index.php', array('courseid' => $COURSE->id)),
        navigation_node::TYPE_CUSTOM,
        null,
        null,
        new pix_icon('t/addcontact', '')
    );
    $node->showinflatnavigation = $showinflatnavigation;
    $navigation->add_node($node, 'mycourses');
    $node->add_class('mail_root');


    // navigation block
    $parent = navigation_node::create($title, null, navigation_node::TYPE_COURSE);

    $main_node = $navigation->add_node($parent);
    $main_node->nodetype = 1;
    $main_node->collapse = true;
    $main_node->forceopen = true;
    $main_node->isexpandable = true;
    $main_node->showinflatnavigation = false;

    $course_node = $main_node->add('Tab 1', new moodle_url('/local/helloworld/index.php', array('courseid' => $COURSE->id)));
    $course_node->set_parent($main_node);
    $course_node->showinflatnavigation = false;

    $user_node = $main_node->add('Tab 2', new moodle_url('/local/helloworld/index.php', array('courseid' => $COURSE->id)));
    $user_node->set_parent($main_node);
    $user_node->showinflatnavigation = false;
}

function local_helloworld_extend_settings_navigation($settingsnav, $context) {
    global $CFG, $PAGE;

    // Only add this settings item on non-site course pages.
    if (!$PAGE->course or $PAGE->course->id == 1) {
        return;
    }

    if ($settingnode = $settingsnav->find('courseadmin', navigation_node::TYPE_COURSE)) {
        $strfoo = get_string('pluginname', 'local_helloworld');
        $url = new moodle_url('/local/helloworld/index.php', array('id' => $PAGE->course->id));
        $foonode = navigation_node::create(
            $strfoo,
            $url,
            navigation_node::NODETYPE_LEAF,
            'myplugin',
            'myplugin',
            new pix_icon('t/addcontact', $strfoo)
        );
        if ($PAGE->url->compare($url, URL_MATCH_BASE)) {
            $foonode->make_active();
        }
        $settingnode->add_node($foonode);
    }
}

