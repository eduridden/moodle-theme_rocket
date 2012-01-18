<?php$hasheading = ($PAGE->heading);$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());$hasfooter = (empty($PAGE->layout_options['nofooter']));$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);$custommenu = $OUTPUT->custom_menu();$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));$haslogo = (!empty($PAGE->theme->settings->logo));$bodyclasses = array();if ($showsidepre && !$showsidepost) {    $bodyclasses[] = 'side-pre-only';} else if ($showsidepost && !$showsidepre) {    $bodyclasses[] = 'side-post-only';} else if (!$showsidepost && !$showsidepre) {    $bodyclasses[] = 'content-only';}if ($hascustommenu) {    $bodyclasses[] = 'has_custom_menu';}echo $OUTPUT->doctype() ?><html <?php echo $OUTPUT->htmlattributes() ?>><head>    <title><?php echo $PAGE->title ?></title>    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <link rel="apple-touch-icon" href="<?php echo $OUTPUT->pix_url('apple-touch-icon-72x72', 'theme')?>"/>    <?php echo $OUTPUT->standard_head_html() ?></head><body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>"><?php echo $OUTPUT->standard_top_of_body_html() ?><div id="page">		<div id="headerwrap">	
	<div class="headerTable">
	<?php  echo $OUTPUT->login_info(); ?>
	<div class="header_left">
		<div id="logowrap">
			<div id="logo"></div>
		</div>
		<div id="toplinks">
			<?php echo $OUTPUT->blocks_for_region('toplinks') ?>
		</div>	</div>
	<div class="header_right">
		<div id="menuwrap">		<?php 		if ($hascustommenu) { ?> 			<div id="menuitemswrap"><div id="custommenu"><?php echo $custommenu; ?></div></div>		<?php } ?>		</div>
		<div id="banner"></div>
	</div>
	</div>
	
		<div id="page-header"></div> 	<div id="contentwrapper">	<!-- start OF moodle CONTENT -->				<div id="page-content">
				<div id="headerstrip">
					<div id="searchbox"><?php echo $OUTPUT->blocks_for_region('search') ?></div>
					<?php echo $PAGE->theme->settings->sitename; ?>
				</div>
				        			<div id="region-main-box">            			<div id="region-post-box">                            				<div id="region-main-wrap">                    				<div id="region-main">                        				<div class="region-content">         								<div id="mainpadder">                            			<?php echo core_renderer::MAIN_CONTENT_TOKEN ?>                            			</div>                        				</div>                    				</div>                				</div>                                	<?php if ($hassidepre) { ?>               		<div id="region-pre" class="block-region">                    	<div class="region-content">                                                   	<?php echo $OUTPUT->blocks_for_region('side-pre') ?>                    	</div>                	</div>                	<?php } ?>                                	<?php if ($hassidepost) { ?>                 	<div id="region-post" class="block-region">                    	<div class="region-content">                                           	<?php echo $OUTPUT->blocks_for_region('side-post') ?>                    	</div>                	</div>                	<?php } ?>                            			</div>        			</div>   				 </div>    <!-- END OF CONTENT --> </div>      <br style="clear: both;"> <div id="page-footer"></div> <?php if ($hasfooter) { ?><div id="footerwrapper"><div id="footerinner">            <?php            echo $OUTPUT->standard_footer_html();            ?> 
            <div class="copyright"><?php echo $PAGE->theme->settings->copyright; ?></div>
            <?php
            echo $PAGE->theme->settings->footnote;       		?>	</div></div>  <?php } ?> </div>  		<?php echo $OUTPUT->standard_end_of_body_html() ?></body></html>