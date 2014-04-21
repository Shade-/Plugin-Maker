<?php

define(BASENAME, basename(__FILE__, '.php'));

// Require the core class
require_once "./core/class_core.php";

$page['title'] = "Edit plugin";
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
	$PM->redirect('edit.php?action='.$callback);
}

// An array of protected variables which can be empty and still bypass the emptyness check when sanitizing inputs
$PM->emptyvars = array('namespace', 'authorsite');

$PM->values = $PM->get_step($PM->action);

if ($PM->action == 'info') {
	$_SESSION['oldnamespace'] = $PM->file;
}

// Automatically handle all actions
if ($PM->request_method == 'post') {

	$PM->clean_input();
	
	if (!$PM->error) {
	
		if ($PM->action == 'info' and $PM->input['namespace'] and $PM->input['namespace'] != $_SESSION['oldnamespace']) {
		
			$PM->delete_plugin($_SESSION['oldnamespace'], true);
			unset($_SESSION['oldnamespace']);
			
		}
	
		$PM->add_step($PM->action);
		
		$PM->message($PM->get_message($PM->action), 'success');
		
		$PM->redirect('edit.php?action='.$callback);
		
	}
	
}

// Changing name if we have one
if ($PM->file) {
	$page['title'] .= ' - \'' . $PM->file . '\'';
}

// Build the page
$PM->build_page();

?>