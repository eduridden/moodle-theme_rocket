<?php

class theme_rocket_core_renderer extends core_renderer {

    /**
     * Renders a custom menu object (located in outputcomponents.php)
     *
     * The custom menu this method override the render_custom_menu function
     * in outputrenderers.php
     * @staticvar int $menucount
     * @param custom_menu $menu
     * @return string
     */
    protected function render_custom_menu(custom_menu $menu) {

		// Generate custom My Courses dropdown
        $mycourses = $this->page->navigation->get('mycourses');
		$mycoursetitle = $this->page->theme->settings-> mycoursetitle;

		if (isloggedin() && $mycourses && $mycourses->has_children()) {
            $branchurl   = new moodle_url('/my/index.php');
            $branchsort  = 10000;

			if ($mycoursetitle == 'module') {
				$branchlabel = get_string('mymodules', 'theme_rocket');
			} else if ($mycoursetitle == 'unit') {
				$branchlabel = get_string('myunits', 'theme_rocket');
			} else if ($mycoursetitle == 'class') {
				$branchlabel = get_string('myclasses', 'theme_rocket');
			} else {
				$branchlabel = get_string('mycourses', 'theme_rocket');
			}

			$branchtitle = $branchlabel;
 
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 
            foreach ($mycourses->children as $coursenode) {
                $branch->add($coursenode->get_content(), $coursenode->action, $coursenode->get_title());
            }

        } else {
        	if ($mycoursetitle == 'module') {
				$branchlabel = get_string('allmodules', 'theme_rocket');
			} else if ($mycoursetitle == 'unit') {
				$branchlabel = get_string('allunits', 'theme_rocket');
			} else if ($mycoursetitle == 'class') {
				$branchlabel = get_string('allclasses', 'theme_rocket');
			} else {
				$branchlabel = get_string('allcourses', 'theme_rocket');
			}

			$branchtitle = $branchlabel;
            $branchurl   = new moodle_url('/course/index.php');
            $branchsort  = 10000;
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);  
        }

		

		// If the menu has no children return an empty string
        if (!$menu->has_children()) {
            return '';
        }

        // Initialise this custom menu
        $content = html_writer::start_tag('ul', array('class'=>'dropdown dropdown-horizontal'));
        // Render each child
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item);
        }
        // Close the open tags
        $content .= html_writer::end_tag('ul');
        // Return the custom menu
        return $content;
    }

    /**
     * Renders a custom menu node as part of a submenu
     *
     * The custom menu this method override the render_custom_menu_item function
     * in outputrenderers.php
     *
     * @see render_custom_menu()
     *
     * @staticvar int $submenucount
     * @param custom_menu_item $menunode
     * @return string
     */
    protected function render_custom_menu_item(custom_menu_item $menunode) {
        // Required to ensure we get unique trackable id's
        static $submenucount = 0;
        $content = html_writer::start_tag('li');
        if ($menunode->has_children()) {
            // If the child has menus render it as a sub menu
            $submenucount++;
            if ($menunode->get_url() !== null) {
                $url = $menunode->get_url();
            } else {
                $url = '#cm_submenu_'.$submenucount;
            }
            $content .= html_writer::start_tag('span', array('class'=>'customitem'));
            $content .= html_writer::link($url, $menunode->get_text(), array('title'=>$menunode->get_title()));
            $content .= html_writer::end_tag('span');
            $content .= html_writer::start_tag('ul');
            foreach ($menunode->get_children() as $menunode) {
                $content .= $this->render_custom_menu_item($menunode);
            }
            $content .= html_writer::end_tag('ul');
        } else {
            // The node doesn't have children so produce a final menuitem

            if ($menunode->get_url() !== null) {
                $url = $menunode->get_url();
            } else {
                $url = '#';
            }
            $content .= html_writer::link($url, $menunode->get_text(), array('title'=>$menunode->get_title()));
        }
        $content .= html_writer::end_tag('li');
        // Return the sub menu
        return $content;
    }

    /**
     * Copied from core_renderer with one minor change - changed $this->output->render() call to $this->render()
     *
     * @param navigation_node $item
     * @return string
     */
    protected function render_navigation_node(navigation_node $item) {
        $content = $item->get_content();
        $title = $item->get_title();
        if ($item->icon instanceof renderable && !$item->hideicon) {
            $icon = $this->render($item->icon);
            $content = $icon.$content; // use CSS for spacing of icons
        }
        if ($item->helpbutton !== null) {
            $content = trim($item->helpbutton).html_writer::tag('span', $content, array('class'=>'clearhelpbutton'));
        }
        if ($content === '') {
            return '';
        }
        if ($item->action instanceof action_link) {
            //adds class dimmed to hidden courses and categories
            $link = $item->action;
            if ($item->hidden) {
                $link->add_class('dimmed');
            }
            $content = $this->render($link);
        } else if ($item->action instanceof moodle_url) {
            $attributes = array();
            if ($title !== '') {
                $attributes['title'] = $title;
            }
            if ($item->hidden) {
                $attributes['class'] = 'dimmed_text';
            }
            $content = html_writer::link($item->action, $content, $attributes);

        } else if (is_string($item->action) || empty($item->action)) {
            $attributes = array();
            if ($title !== '') {
                $attributes['title'] = $title;
            }
            if ($item->hidden) {
                $attributes['class'] = 'dimmed_text';
            }
            $content = html_writer::tag('span', $content, $attributes);
        }
        return $content;
    }

	/**
     * Reformat edit button to new status indicator
     */

	public function edit_button(moodle_url $url) {
		
		$edittoggle = 'enable';
        if (!empty($this->page->theme->settings->edittoggle)) {
            $edittoggle = $this->page->theme->settings->edittoggle;
        }
        if ($edittoggle == 'enable') {
			$editmode = $PAGE->theme->settings->edittoggle;
			$url->param('sesskey', sesskey());
			$formclose .='</span><div id="editmode">'.get_string('editmode', 'theme_rocket').'<div id="edittoggle">'.get_string('edittoggle', 'theme_rocket').'&nbsp;</div></div>';
       	 	if ($this->page->user_is_editing()) {
				$formopen .= '<span id="on">';
				$url->param('edit', 'off');
				$editstring = get_string('turneditingoff','theme_rocket');
        	} else {
            	$formopen .='<span id="off">';
				$url->param('edit', 'on');
            	$editstring = get_string('turneditingon','theme_rocket');
        	}
		return $formopen . $this->single_button($url, $editstring) . $formclose;

		} else {
         	$url->param('sesskey', sesskey());
        if ($this->page->user_is_editing()) {
            $url->param('edit', 'off');
            $editstring = get_string('turneditingoff');
        } else {
            $url->param('edit', 'on');
            $editstring = get_string('turneditingon');
        }

        return $this->single_button($url, $editstring);   
        }
    }

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


}