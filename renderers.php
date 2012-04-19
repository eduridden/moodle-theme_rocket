<?php

class theme_rocket_core_renderer extends core_renderer {

	/**
     * Outputs the page's footer
     * @return string HTML fragment
     */
    public function footer() {
        global $CFG, $DB;

        $output = $this->container_end_all(true);

        $footer = $this->opencontainers->pop('header/footer');

        if (debugging() and $DB and $DB->is_transaction_started()) {
            // TODO: MDL-20625 print warning - transaction will be rolled back
        }

        // Provide some performance info if required
        $performanceinfo = '';
        if (defined('MDL_PERF') || (!empty($CFG->perfdebug) and $CFG->perfdebug > 7)) {
            $perf = get_performance_info();
            if (defined('MDL_PERFTOLOG') && !function_exists('register_shutdown_function')) {
                error_log("PERF: " . $perf['txt']);
            }
            if (defined('MDL_PERFTOFOOT') || debugging() || $CFG->perfdebug > 7) {
                $performanceinfo = rocket_performance_output($perf);
            }
        }

        $perftoken = (property_exists($this, "unique_performance_info_token"))?$this->unique_performance_info_token:self::PERFORMANCE_INFO_TOKEN;
        $endhtmltoken = (property_exists($this, "unique_end_html_token"))?$this->unique_end_html_token:self::END_HTML_TOKEN;

        $footer = str_replace($perftoken, $performanceinfo, $footer);

        $footer = str_replace($endhtmltoken, $this->page->requires->get_end_code(), $footer);

        $this->page->set_state(moodle_page::STATE_DONE);

        return $output . $footer;
    }

        /**
     * The standard tags (typically performance information and validation links,
     * if we are in developer debug mode) that should be output in the footer area
     * of the page. Designed to be called in theme layout.php files.
     * @return string HTML fragment.
     */
    public function standard_footer_html() {
        global $CFG;

        // This function is normally called from a layout.php file in {@link header()}
        // but some of the content won't be known until later, so we return a placeholder
        // for now. This will be replaced with the real content in {@link footer()}.
        $output = (property_exists($this, "unique_performance_info_token"))?$this->unique_performance_info_token:self::PERFORMANCE_INFO_TOKEN;
        // Moodle 2.1 uses a magic accessor for $this->page->devicetypeinuse so we need to
        // check for the existence of the function that uses as
        // isset($this->page->devicetypeinuse) returns false
        if (function_exists('get_user_device_type')?($this->page->devicetypeinuse=='legacy'):$this->page->legacythemeinuse) {
            // The legacy theme is in use print the notification
            $output .= html_writer::tag('div', get_string('legacythemeinuse'), array('class'=>'legacythemeinuse'));
        }

        // Get links to switch device types (only shown for users not on a default device)
        if(method_exists($this, 'theme_switch_links')) {
            $output .= $this->theme_switch_links();
        }
        
       // if (!empty($CFG->debugpageinfo)) {
       //     $output .= '<div class="performanceinfo">This page is: ' . $this->page->debug_summary() . '</div>';
       // }
        if (debugging(null, DEBUG_DEVELOPER)) {  // Only in developer mode
            $output .= '<div class="purgecaches"><a href="'.$CFG->wwwroot.'/admin/purgecaches.php?confirm=1&amp;sesskey='.sesskey().'">'.get_string('purgecaches', 'admin').'</a></div>';
        }
        if (!empty($CFG->debugvalidators)) {
            $output .= '<div class="validators"><ul>
              <li><a href="http://validator.w3.org/check?verbose=1&amp;ss=1&amp;uri=' . urlencode(qualified_me()) . '">Validate HTML</a></li>
              <li><a href="http://www.contentquality.com/mynewtester/cynthia.exe?rptmode=-1&amp;url1=' . urlencode(qualified_me()) . '">Section 508 Check</a></li>
              <li><a href="http://www.contentquality.com/mynewtester/cynthia.exe?rptmode=0&amp;warnp2n3e=1&amp;url1=' . urlencode(qualified_me()) . '">WCAG 1 (2,3) Check</a></li>
            </ul></div>';
        }
        if (!empty($CFG->additionalhtmlfooter)) {
            $output .= "\n".$CFG->additionalhtmlfooter;
        }
        return $output;
    }

	public function edit_button(moodle_url $url) {

		$url->param('sesskey', sesskey());
		$formclose .='</span>';
        if ($this->page->user_is_editing()) {
            $formopen .='<span id="on">';
			$url->param('edit', 'off');
            $editstring = get_string('turneditingoff','theme_rocket');
        } else {
            $formopen .='<span id="off">';
			$url->param('edit', 'on');
            $editstring = get_string('turneditingon','theme_rocket');
        }
		return $formopen . $this->single_button($url, $editstring) . $formclose;
    }

	protected function render_custom_menu(custom_menu $menu) {
 
        $mycourses = $this->page->navigation->get('mycourses');
 
        if (isloggedin() && $mycourses && $mycourses->has_children()) {
            $branchlabel = get_string('mycourses', 'theme_rocket');
            $branchurl   = new moodle_url('/my/index.php');
            $branchtitle = $branchlabel;
            $branchsort  = 10000;
 
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 
            foreach ($mycourses->children as $coursenode) {
                $branch->add($coursenode->get_content(), $coursenode->action, $coursenode->get_title());
            }
        } else {
        	$branchlabel = get_string('mycourses', 'theme_rocket');
            $branchurl   = new moodle_url('/course/index.php');
            $branchtitle = $branchlabel;
            $branchsort  = 10000;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 
           
        }
 
        return parent::render_custom_menu($menu);
	}
 
    protected function render_custom_menu_item(custom_menu_item $menunode) {
        $transmutedmenunode = new transmuted_custom_menu_item($menunode);
        return parent::render_custom_menu_item($transmutedmenunode);
    }       
}
?>