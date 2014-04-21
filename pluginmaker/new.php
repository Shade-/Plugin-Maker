<?php

define(BASENAME, basename(__FILE__, '.php'));

// Require the core class
require_once "./core/class_core.php";

$page['title'] = "New plugin";
$page['class'] = "start";

// Class used for styling
if ($PM->action) {
	$page['class'] = $PM->action;
}

// Callback for success
$pages = array('info', 'pl_settings', 'pl_templates', 'functions', 'pl_stylesheets');
$key = array_search($PM->action, $pages);
$callback = $pages[$key+1];
	
if ($PM->input['skip']) {
	$PM->redirect('new.php?action='.$callback);
}

// An array of protected variables which can be empty and still bypass the emptyness check when sanitizing inputs
$PM->emptyvars = array('namespace', 'authorsite');

foreach ($PM->fields[$PM->action] as $name) {
	
	if ($PM->input[$name]) {
		$PM->values[$name] = $PM->input[$name];
	}
	else if ($PM->settings[$name]) {
		$PM->values[$name] = $PM->settings[$name];
	}
	
}

// Automatically handle all actions
if ($PM->request_method == 'post') {

	$PM->clean_input();
	
	if (!$PM->error) {
	
		$PM->add_step($PM->action);
		
		$PM->message($PM->get_message($PM->action), 'success');
		
		$PM->redirect('new.php?action='.$callback);
		
	}
	
}

// Changing name if we have one
if ($PM->file and $PM->action != 'info') {
	$page['title'] = 'Working on \'' . $PM->file . '\'';
}

// Build the page
$PM->build_page();

?>