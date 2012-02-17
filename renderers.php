<?php

class theme_rocket_core_renderer extends core_renderer {

	protected function render_custom_menu(custom_menu $menu) {
 
        $mycourses = $this->page->navigation->get('mycourses');
 
        if (isloggedin() && $mycourses && $mycourses->has_children()) {
            $branchlabel = 'My Units';
            $branchurl   = new moodle_url('/my/index.php');
            $branchtitle = $branchlabel;
            $branchsort  = 10000;
 
            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
 
            foreach ($mycourses->children as $coursenode) {
                $branch->add($coursenode->get_content(), $coursenode->action, $coursenode->get_title());
            }
        } else {
        	$branchlabel = 'All Courses';
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