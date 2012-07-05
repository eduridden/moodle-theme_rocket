<?php

$THEME->name = 'rocket';

$THEME->parents = array('base');

$THEME->sheets = array(
    'rocket_layout',   /** Must come first: Page layout **/
    'rocket_styles',   /** Must come second: default styles **/
    'rocket_menu',
    'rocket_blocks',
    'rocket_mod',
    'rocket_calendar',
    'rocket_dock',
    'rocket_settings',
    'rtl'
);

$THEME->parents_exclude_sheets = array(
    'base'=>array(
        'pagelayout',
        'dock'
    ),
);
$THEME->editor_sheets = array('editor');

$THEME->layouts = array(
    // Most backwards compatible layout without the blocks - this is the layout used by default
    'base' => array(
        'file' => 'general.php',
        'regions' => array('search'),
    ),
    // Standard layout with blocks, this is recommended for most pages with default information
    'standard' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post','search'),
        'defaultregion' => 'side-pre',
    ),
    // Main course page
    'course' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post','search'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu'=>true),
    ),
    'coursecategory' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post','search'),
        'defaultregion' => 'side-pre',
    ),
    // part of course, typical for modules - default page layout if $cm specified in require_login()
    'incourse' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post','search'),
        'defaultregion' => 'side-pre',
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => array('side-pre','search','toplinks','homeblock'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu'=>true),
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','search'),
        'defaultregion' => 'side-pre',
    ),
    // My dashboard page
    'mydashboard' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post', 'search'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu'=>true),
    ),
    // My public page
    'mypublic' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','search'),
        'defaultregion' => 'side-pre',
    ),
    'login' => array(
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
    ),

    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => array(
        'file' => 'general.php',
        'regions' => array('search'),
        'options' => array('nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true, 'nologininfo'=>true),
    ),
    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => array(
        'file' => 'general.php',
        'regions' => array('search'),
        'options' => array('nofooter'=>true),
    ),
    // Embedded pages, like iframe/object embeded in moodleform - it needs as much space as possible
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array('search')
    ),
    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, and it is good idea if it does not have links to
    // other places - for example there should not be a home link in the footer...
    'maintenance' => array(
        'file' => 'general.php',
        'regions' => array('search'),
        'options' => array('noblocks'=>true, 'nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true),
    ),
    // Should display the content and basic headers only.
    'print' => array(
        'file' => 'general.php',
        'regions' => array('search'),
        'options' => array('noblocks'=>true, 'nofooter'=>true, 'nonavbar'=>false, 'nocustommenu'=>true),
    ),
    // The pagelayout used when a redirection is occuring.
    'redirect' => array(
        'file' => 'embedded.php',
        'regions' => array()
    ),
    // The pagelayout used for reports
    'report' => array(
        'file' => 'general.php',
        'regions' => array('side-pre','search'),
        'defaultregion' => 'side-pre',
    ),
);

///////////////////////////////////////////////////////////////
// These are all of the possible layouts in Moodle. The
// simplest way to do this is to keep the theme and file
// variables the same for every layout. Including them
// all in this way allows some flexibility down the road
// if you want to add a different layout template to a
// specific page.
///////////////////////////////////////////////////////////////

$THEME->csspostprocess = 'rocket_process_css';
	
////////////////////////////////////////////////////
// An array of stylesheets not to inherit from the
// themes parents
////////////////////////////////////////////////////

$THEME->enable_dock = true;

////////////////////////////////////////////////////
// Allows the user to provide the name of a function 
// that all CSS should be passed to before being 
// delivered.
////////////////////////////////////////////////////

// $THEME->filter_mediaplugin_colors

////////////////////////////////////////////////////
// Used to control the colours used in the small 
// media player for the filters
////////////////////////////////////////////////////

//  $THEME->javascripts

////////////////////////////////////////////////////
// An array containing the names of JavaScript files
// located in /javascript/ to include in the theme. 
// (gets included in the head)
////////////////////////////////////////////////////

// $THEME->javascripts_footer

////////////////////////////////////////////////////
// As above but will be included in the page footer.
////////////////////////////////////////////////////

$THEME->larrow = "<";	

////////////////////////////////////////////////////
// Overrides the left arrow image used throughout 
// Moodle
////////////////////////////////////////////////////

 $THEME->rarrow = ">";

////////////////////////////////////////////////////
// Overrides the right arrow image used throughout Moodle
////////////////////////////////////////////////////

// $THEME->layouts	

////////////////////////////////////////////////////
// An array setting the layouts for the theme
////////////////////////////////////////////////////

// $THEME->parents_exclude_javascripts

////////////////////////////////////////////////////
// An array of JavaScript files NOT to inherit from
// the themes parents
////////////////////////////////////////////////////

// $THEME->parents_exclude_sheets	

////////////////////////////////////////////////////
// An array of stylesheets not to inherit from the
// themes parents
////////////////////////////////////////////////////

// $THEME->plugins_exclude_sheets

////////////////////////////////////////////////////
// An array of plugin sheets to ignore and not 
// include.
////////////////////////////////////////////////////

$THEME->rendererfactory = 'theme_overridden_renderer_factory';

////////////////////////////////////////////////////
// Sets a custom render factory to use with the 
// theme, used when working with custom renderers.
////////////////////////////////////////////////////

// $THEME->resource_mp3player_colors

////////////////////////////////////////////////////
// Controls the colours for the MP3 player 	
////////////////////////////////////////////////////