<?phpdefined('MOODLE_INTERNAL') || die;if ($ADMIN->fulltree) {// Institution Name$name = 'theme_rocket/sitename';$title = get_string('sitename','theme_rocket');$description = get_string('sitenamedesc', 'theme_rocket');$default = 'Welcome to my site';$setting = new admin_setting_configtext($name, $title, $description, $default);$settings->add($setting);// Logo file setting$name = 'theme_rocket/logo';$title = get_string('logo','theme_rocket');$description = get_string('logodesc', 'theme_rocket');
$default = 'rocket/pix/logo/rocket.png';$setting = new admin_setting_configfile($name, $title, $description, $default);$settings->add($setting);

// Banner file setting$name = 'theme_rocket/banner';$title = get_string('banner','theme_rocket');$description = get_string('bannerdesc', 'theme_rocket');
$default = 'rocket/pix/banner/default.png';$setting = new admin_setting_configtext($name, $title, $description, $default);$settings->add($setting);

// Banner Height
//$name = 'theme_rocket/bannerheight';
//$title = get_string('bannerheight','theme_rocket');
//$description = get_string('bannerheightdesc', 'theme_rocket');
//$default = 350;
//$choices = array(0=>'none', 150=>'150px', 250=>'250px', 350=>'350px');
//$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
//$settings->add($setting);// Main theme background colour setting$name = 'theme_rocket/themecolor';$title = get_string('themecolor','theme_rocket');$description = get_string('themecolordesc', 'theme_rocket');$default = '#a8213a';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Main theme trim colour setting$name = 'theme_rocket/themetrimcolor';$title = get_string('themetrimcolor','theme_rocket');$description = get_string('themetrimcolordesc', 'theme_rocket');$default = '#660000';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Menu colour setting$name = 'theme_rocket/menucolor';$title = get_string('menucolor','theme_rocket');$description = get_string('menucolordesc', 'theme_rocket');$default = '#76777c';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Menu hover colour setting$name = 'theme_rocket/menuhovercolor';$title = get_string('menuhovercolor','theme_rocket');$description = get_string('menuhovercolordesc', 'theme_rocket');$default = '#8a8a8a';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);

// Menu trim colour setting$name = 'theme_rocket/menutrimcolor';$title = get_string('menutrimcolor','theme_rocket');$description = get_string('menutrimcolordesc', 'theme_rocket');$default = '#4c4c4c';$previewconfig = NULL;$setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);$settings->add($setting);// Footer text or link$name = 'theme_rocket/footnote';$title = get_string('footnote','theme_rocket');$description = get_string('footnotedesc', 'theme_rocket');$default = '';$setting = new admin_setting_confightmleditor($name, $title, $description, $default);$settings->add($setting);
// Copyright Notice$name = 'theme_rocket/copyright';$title = get_string('copyright','theme_rocket');$description = get_string('copyrightdesc', 'theme_rocket');$default = '';$setting = new admin_setting_confightmleditor($name, $title, $description, $default);$settings->add($setting);}