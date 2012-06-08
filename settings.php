<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

// Institution Name$name = 'theme_rocket/sitename';$title = get_string('sitename','theme_rocket');$description = get_string('sitenamedesc', 'theme_rocket');$default = 'Welcome to my site';$setting = new admin_setting_configtext($name, $title, $description, $default);$settings->add($setting);

// Set status of Autohide functionality
$name = 'theme_rocket/autohide';
$title = get_string('autohide','theme_rocket');
$description = get_string('autohidedesc', 'theme_rocket');
$default = 'enable';
$choices = array(
	'enable' => get_string('enable', 'theme_rocket'),
	'disable' => get_string('disable', 'theme_rocket')
);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Set status of Edit Toggle functionality
$name = 'theme_rocket/edittoggle';
$title = get_string('editmodetoggle','theme_rocket');
$description = get_string('edittoggledesc', 'theme_rocket');
$default = 'enable';
$choices = array(
	'enable' => get_string('enable', 'theme_rocket'),
	'disable' => get_string('disable', 'theme_rocket')
);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Set terminology for dropdown couse list
$name = 'theme_rocket/mycoursetitle';
$title = get_string('mycoursetitle','theme_rocket');
$description = get_string('mycoursetitledesc', 'theme_rocket');
$default = 'course';
$choices = array(
	'course' => get_string('mycourses', 'theme_rocket'),
	'unit' => get_string('myunits', 'theme_rocket'),
	'class' => get_string('myclasses', 'theme_rocket'),
	'module' => get_string('mymodules', 'theme_rocket')
);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);// Logo file setting$name = 'theme_rocket/logo';$title = get_string('logo','theme_rocket');$description = get_string('logodesc', 'theme_rocket');
$default = 'rocket/pix/logo/rocket.png';$setting = new admin_setting_configfile($name, $title, $description, $default);$settings->add($setting);

// Banner file setting$name = 'theme_rocket/banner';$title = get_string('banner','theme_rocket');$description = get_string('bannerdesc', 'theme_rocket');
$default = 'rocket/pix/banner/default.png';$setting = new admin_setting_configtext($name, $title, $description, $default);$settings->add($setting);

// Banner Height
$name = 'theme_rocket/bannerheight';
$title = get_string('bannerheight','theme_rocket');
$description = get_string('bannerheightdesc', 'theme_rocket');
$default = 255;
$choices = array(5=>get_string('nobanner', 'theme_rocket'), 55=>'50px', 105=>'100px',155=>'150px', 205=>'200px', 255=>'250px',  305=>'300px',355=>'350px');
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);

// Fullscreen Toggle
$name = 'theme_rocket/screenwidth';
$title = get_string('screenwidth','theme_rocket');
$description = get_string('screenwidthdesc', 'theme_rocket');
$default = 1000;
$choices = array(1000=>get_string('fixedwidth','theme_rocket'), 97=>get_string('variablewidth','theme_rocket'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$settings->add($setting);
// Main theme background colour setting$name = 'theme_rocket/themecolor';$title = get_string('themecolor','theme_rocket');$description = get_string('themecolordesc', 'theme_rocket');$default = '#a8213a';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Main theme trim colour setting$name = 'theme_rocket/themetrimcolor';$title = get_string('themetrimcolor','theme_rocket');$description = get_string('themetrimcolordesc', 'theme_rocket');$default = '#660000';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Menu colour setting$name = 'theme_rocket/menucolor';$title = get_string('menucolor','theme_rocket');$description = get_string('menucolordesc', 'theme_rocket');$default = '#76777c';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Menu hover colour setting$name = 'theme_rocket/menuhovercolor';$title = get_string('menuhovercolor','theme_rocket');$description = get_string('menuhovercolordesc', 'theme_rocket');$default = '#8a8a8a';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Menu trim colour setting$name = 'theme_rocket/menutrimcolor';$title = get_string('menutrimcolor','theme_rocket');$description = get_string('menutrimcolordesc', 'theme_rocket');$default = '#4c4c4c';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Content link colour setting$name = 'theme_rocket/contentlinkcolor';$title = get_string('contentlinkcolor','theme_rocket');$description = get_string('contentlinkcolordesc', 'theme_rocket');$default = '#006699';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Block link colour setting$name = 'theme_rocket/blocklinkcolor';$title = get_string('blocklinkcolor','theme_rocket');$description = get_string('blocklinkcolordesc', 'theme_rocket');$default = '#333333';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Menu link colour setting$name = 'theme_rocket/menulinkcolor';$title = get_string('menulinkcolor','theme_rocket');$description = get_string('menulinkcolordesc', 'theme_rocket');$default = '#ffffff';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);// Footer text or link$name = 'theme_rocket/footnote';$title = get_string('footnote','theme_rocket');$description = get_string('footnotedesc', 'theme_rocket');$default = '';$setting = new admin_setting_confightmleditor($name, $title, $description, $default);$settings->add($setting);
// Copyright Notice$name = 'theme_rocket/copyright';$title = get_string('copyright','theme_rocket');$description = get_string('copyrightdesc', 'theme_rocket');$default = '';$setting = new admin_setting_confightmleditor($name, $title, $description, $default);$settings->add($setting);

// Custom CSS file
$name = 'theme_rocket/customcss';
$title = get_string('customcss','theme_rocket');
$description = get_string('customcssdesc', 'theme_rocket');
$setting = new admin_setting_configtextarea($name, $title, $description, '');
$settings->add($setting);

}