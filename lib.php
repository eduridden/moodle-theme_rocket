<?phpfunction rocket_process_css($css, $theme) {    // Set the theme background and highlites    if (!empty($theme->settings->themecolor)) {        $themecolor = $theme->settings->themecolor;    } else {        $themecolor = null;    }    $css = rocket_set_themecolor($css, $themecolor);
    
    // Set the theme trim color    if (!empty($theme->settings->themetrimcolor)) {        $themetrimcolor = $theme->settings->themetrimcolor;    } else {        $themetrimcolor = null;    }    $css = rocket_set_themetrimcolor($css, $themetrimcolor);
    
    // Set the custommenu color
    if (!empty($theme->settings->menucolor)) {        $menucolor = $theme->settings->menucolor;    } else {        $menucolor = null;    }    $css = rocket_set_menucolor($css, $menucolor);
    
    // Set the custommenu hover color
    if (!empty($theme->settings->menuhovercolor)) {        $menuhovercolor = $theme->settings->menuhovercolor;    } else {        $menuhovercolor = null;    }    $css = rocket_set_menuhovercolor($css, $menuhovercolor);
    
    // Set the custommenu trim color
    if (!empty($theme->settings->menutrimcolor)) {        $menutrimcolor = $theme->settings->menutrimcolor;    } else {        $menutrimcolor = null;    }    $css = rocket_set_menutrimcolor($css, $menutrimcolor);

	// Set the custommenu link color
    if (!empty($theme->settings->menulinkcolor)) {        $menulinkcolor = $theme->settings->menulinkcolor;    } else {        $menulinkcolor = null;    }    $css = rocket_set_menulinkcolor($css, $menulinkcolor);

	// Set the content link color
    if (!empty($theme->settings->contentlinkcolor)) {        $contentlinkcolor = $theme->settings->contentlinkcolor;    } else {        $contentlinkcolor = null;    }    $css = rocket_set_contentlinkcolor($css, $contentlinkcolor);

	// Set the block link color
    if (!empty($theme->settings->blocklinkcolor)) {        $blocklinkcolor = $theme->settings->blocklinkcolor;    } else {        $blocklinkcolor = null;    }    $css = rocket_set_blocklinkcolor($css, $blocklinkcolor);    	// Set the background image for the logo     if (!empty($theme->settings->logo)) {        $logo = $theme->settings->logo;    } else {        $logo = null;    }    $css = rocket_set_logo($css, $logo);

	// Set the banner height    if (!empty($theme->settings->bannerheight)) {       $bannerheight = $theme->settings->bannerheight;    } else {       $bannerheight = null;    }    $css = rocket_set_bannerheight($css,$bannerheight);

	// Set the screenwidth    if (!empty($theme->settings->screenwidth)) {       $screenwidth = $theme->settings->screenwidth;    } else {       $screenwidth = null;    }    $css = rocket_set_screenwidth($css,$screenwidth);

	// Toggle AutoHide functionality    if (!empty($theme->settings->autohide)) {       $autohide = $theme->settings->autohide;    } else {       $autohide = null;    }    $css = rocket_set_autohide($css,$autohide);
    
    // Set the background image for the Banner     if (!empty($theme->settings->banner)) {        $banner = $theme->settings->banner;    } else {        $banner = null;    }    $css = rocket_set_banner($css, $banner);

	// Allow for additional custom CSS from admins
	if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = rocket_set_customcss($css, $customcss);
            return $css;
}

function rocket_set_themecolor($css, $themecolor) {    $tag = '[[setting:themecolor]]';    $replacement = $themecolor;    if (is_null($replacement)) {        $replacement = '#5faff2';    }    $css = str_replace($tag, $replacement, $css);    return $css;}

function rocket_set_themetrimcolor($css, $themetrimcolor) {    $tag = '[[setting:themetrimcolor]]';    $replacement = $themetrimcolor;    if (is_null($replacement)) {        $replacement = '#660000';    }    $css = str_replace($tag, $replacement, $css);    return $css;}

function rocket_set_menucolor($css, $menucolor) {    $tag = '[[setting:menucolor]]';    $replacement = $menucolor;    if (is_null($replacement)) {        $replacement = '#76777c';    }    $css = str_replace($tag, $replacement, $css);    return $css;}

function rocket_set_menuhovercolor($css, $menuhovercolor) {    $tag = '[[setting:menuhovercolor]]';    $replacement = $menuhovercolor;    if (is_null($replacement)) {        $replacement = '#919193';    }    $css = str_replace($tag, $replacement, $css);    return $css;}

function rocket_set_menulinkcolor($css, $menulinkcolor) {    $tag = '[[setting:menulinkcolor]]';    $replacement = $menulinkcolor;    if (is_null($replacement)) {        $replacement = '#ffffff';    }    $css = str_replace($tag, $replacement, $css);    return $css;}

function rocket_set_contentlinkcolor($css, $contentlinkcolor) {    $tag = '[[setting:contentlinkcolor]]';    $replacement = $contentlinkcolor;    if (is_null($replacement)) {        $replacement = '#006699';    }    $css = str_replace($tag, $replacement, $css);    return $css;}

function rocket_set_blocklinkcolor($css, $blocklinkcolor) {    $tag = '[[setting:blocklinkcolor]]';    $replacement = $blocklinkcolor;    if (is_null($replacement)) {        $replacement = '#333333';    }    $css = str_replace($tag, $replacement, $css);    return $css;}

function rocket_set_menutrimcolor($css, $menutrimcolor) {    $tag = '[[setting:menutrimcolor]]';    $replacement = $menutrimcolor;    if (is_null($replacement)) {        $replacement = '#4c4c4c';    }    $css = str_replace($tag, $replacement, $css);    return $css;}function rocket_set_logo($css, $logo) {	global $OUTPUT;  	$tag = '[[setting:logo]]';	$replacement = $logo;	if (is_null($replacement)) {        $replacement = 'rocket/pix/logo/rocket.png';    }	$css = str_replace($tag, $replacement, $css);	return $css;}

function rocket_set_banner($css, $banner) {	global $OUTPUT;  	$tag = '[[setting:banner]]';	$replacement = $banner;	if (is_null($replacement)) { 		$replacement = 'rocket/pix/banner/default.png'; 	}	$css = str_replace($tag, $replacement, $css);	return $css;}

function rocket_set_bannerheight($css, $bannerheight) {    $tag = '[[setting:bannerheight]]';    $replacement = $bannerheight;    if (is_null($replacement)) {        $replacement = '250';    }    $css = str_replace($tag, ($replacement-5).'px', $css);    return $css;}

function rocket_set_screenwidth($css, $screenwidth) {    $tag = '[[setting:screenwidth]]';
	$breadcrumbwidth = '[[setting:breadcrumbwidth]]';
	$screenwidthmargintag = '[[setting:screenwidthmargintag]]';    $replacement = $screenwidth;    if (is_null($replacement)) {        $replacement = '1000';    }    if ( $screenwidth == "1000" ) {
		$css = str_replace($tag, $replacement.'px', $css);
		$css = str_replace($screenwidthmargintag, ($replacement+5).'px', $css);
		$css = str_replace($breadcrumbwidth, ($replacement-470).'px', $css);
	}
	if ( $replacement == "97" ) {
		$css = str_replace($tag, $replacement.'%', $css);
		$css = str_replace($breadcrumbwidth, '50%', $css);
	}    return $css;}

function rocket_set_autohide($css, $autohide) {    $tag = '[[setting:autohide]]';    $replacement = 'autohide';    if (is_null($replacement)) {        $replacement = 'autohide_enable';    }    $css = str_replace($tag, $replacement, $css);	return $css;}

function rocket_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}/**
 * get_performance_output() override get_peformance_info()
 *  in moodlelib.php. Returns a string
 * values ready for use.
 *
 * This function was created by Lei Zhang and was originally used in the decaf theme
 * @return string
 */
function rocket_performance_output($param) {
	
    $html = '<div class="performanceinfo"><ul>';
	if (isset($param['realtime'])) $html .= '<li><a class="red" href="#"><var>'.$param['realtime'].' secs</var><span>Load Time</span></a></li>';
	if (isset($param['memory_total'])) $html .= '<li><a class="orange" href="#"><var>'.display_size($param['memory_total']).'</var><span>Memory Used</span></a></li>';
    if (isset($param['includecount'])) $html .= '<li><a class="blue" href="#"><var>'.$param['includecount'].' Files </var><span>Included</span></a></li>';
    if (isset($param['dbqueries'])) $html .= '<li><a class="purple" href="#"><var>'.$param['dbqueries'].' </var><span>DB Read/Write</span></a></li>';
    $html .= '</ul></div>';

    return $html;
}
/**
 * Generate updated custommenu with enroled courses listed
 */class transmuted_custom_menu_item extends custom_menu_item {
    public function __construct(custom_menu_item $menunode) {
        parent::__construct($menunode->get_text(), $menunode->get_url(), $menunode->get_title(), $menunode->get_sort_order(), $menunode->get_parent());
        $this->children = $menunode->get_children();
 
        $matches = array();
        if (preg_match('/^\[\[([a-zA-Z0-9\-\_\:]+)\]\]$/', $this->text, $matches)) {
            try {
                $this->text = get_string($matches[1], 'theme_rocket');
            } catch (Exception $e) {
                $this->text = $matches[1];
            }
        }
 
        $matches = array();
        if (preg_match('/^\[\[([a-zA-Z0-9\-\_\:]+)\]\]$/', $this->title, $matches)) {
            try {
                $this->title = get_string($matches[1], 'theme_rocket');
            } catch (Exception $e) {
                $this->title = $matches[1];
            }
        }
    }
}