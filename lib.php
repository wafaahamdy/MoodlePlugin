<?php

function local_greetings_get_greeting($user) {
    if ($user == null) {
        return get_string('greetinguser', 'local_greetings');
    }

    $country = $user->country;
    switch ($country) {
        case 'EG':
            $langstr = 'greetingusereseg';
            break;
        default:
            $langstr = 'greetingloggedinuser';
            break;
    }

    return get_string($langstr, 'local_greetings', fullname($user));
}


/**
 * Insert a link to index.php on the site front page navigation menu.
 *
 * @param navigation_node $frontpage Node representing the front page in the navigation tree.
 */

function local_greetings_extend_navigation_frontpage(navigation_node $frontpage) {
    $frontpage->add(
        get_string('pluginname', 'local_greetings'),
        new moodle_url('/local/greetings/index.php'),
        navigation_node::TYPE_CUSTOM,
    );
}
/*
function local_greetings_extend_navigation(global_navigation $root)
{
    $node = navigation_node::create(
        get_string('pluginname', 'local_greetings'),
        new moodle_url('/local/greetings/index.php')
    );

    $node->showinflatnavigation = true;
    $root->add_node($node);
}*/