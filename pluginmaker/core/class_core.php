<?php

/**
 * This is the core of Plugin Maker. Contains simple code used to build pages, get templates, write files with ease, etc.
 */

define("PM_CORE", dirname(__FILE__));
define("PLUGINPATH", dirname(PM_CORE)."/plugins/");
define("STEPPATH", PM_CORE."/styles/templates/steps/");

class PluginMaker {

	// the inputs received
	public $input = array();

	// the action, used to build every page
	public $action = "";
	
	// the method called
	public $request_method = "";
	
	// settings stored in cache
	public $settings = "";
	
	// the file being worked on
	public $file = "";
	
	// the directory of the file being worked on
	public $filedir = "";
	
	// an array of messages to show
	public $messagequeue = "";
	
	// whether if there's an error or not
	public $error = "";
	
	// init the class
	function __construct() {
		if(!session_id()) {
			session_start();
		}
		// clear the input
		$this->parse_incoming($_GET);
		$this->parse_incoming($_POST);
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->request_method = "post";
		} else if($_SERVER['REQUEST_METHOD'] == "GET") {
			$this->request_method = "get";
		}
		// validate the page
		$this->validate_page($this->input['action']);
		// populate settings
		$this->show_settings();
		// sets the file to work on
		$this->setfile();
		// handle eventual messages to be shown
		if($_SESSION['messagequeue']) {
			$this->message($_SESSION['messagequeue']['messages'], $_SESSION['messagequeue']['type']);
			unset($_SESSION['messagequeue']);
		}
	}
	
	// parses inputs
	function parse_incoming($array) {
		if(!is_array($array)) {
			return;
		}
		foreach($array as $key => $val) {
			$this->input[$key] = $val;
		}
	}
	
	// sanitizes all inputs received escaping what should be escaped and checking if this array is void
	function clean_input() {
		global $errors;
		array_walk_recursive($this->input, function(&$value, $key) {
			global $errors;
			$value = addslashes($value);
			if(empty($value)) {
				$errors[] = $key." input has been left empty";
			}
		});
		if($errors) {
			$this->message($errors, 'error');
		}
	}
	
	// builds a page
	function build_page() {
		// header
		$this->get("header");
		// eventual messages
		if($this->messagequeue) {
			$this->get("messages");
		}
		// the actual page
		$this->get($this->action);
		// footer
		$this->get("footer");
		exit;
	}
	
	// gets a template
	function get($template) {
		global $PM;
		$file = PM_CORE."/styles/templates/ui/$template.php";
		if(file_exists($file)) {
			require_once $file;
		}
	}
	
	// echoes some page infos declared in every page such as icon class, page name, etc.
	function pageinfo($info) {
		global $page;
		if(!empty($info)) {
			echo $page[$info];
		}
	}
	
	// validates a page to output
	function validate_page($action) {
		$this->action = !empty($action) ? $action : BASENAME;
		unset($this->input['action']);
	}
	
	// sets the file we are working on in the session
	function setfile($file="") {
		$file = (string) $file;
		if(empty($file)) {
			// if there's a namespace, use it
			if(!empty($this->input['namespace'])) {
				$file = (string) strtolower(str_replace(" ", "", $this->input['namespace']));
			}
			// if there's a name, use it
			elseif(!empty($this->input['name'])) {
				$file = (string) strtolower(str_replace(" ", "", $this->input['name']));
			}
			// if we are working on a file already
			elseif(!empty($_SESSION['pluginmaker']['file'])) {
				$file = $_SESSION['pluginmaker']['file'];
			}
		}
		// we don't want empty values for $this->file
		if(!empty($file)) {
			// clean up session
			$this->clearfile();
			// set up our stuff to deal with
			$_SESSION['pluginmaker']['file'] = $this->file = $file;
			// if dirname returns ".", the file hasn't got a parent dir
			if(dirname($this->file) != ".") {
				$this->filedir = dirname($file);
			}
		}
	}
	
	// clear out the file from the session
	function clearfile() {
		unset($_SESSION['pluginmaker']['file']);
		$this->file = $this->filedir = "";
	}
	
	// writes something on a file as a "step"
	function step_add($step) {
		// create the directory if not exists
		if(!is_dir(PLUGINPATH.$this->filedir)) {
			mkdir(PLUGINPATH.$this->filedir);
		}
		// get existing data
		$content = $this->step_get("global");
		// add our data to the existing one
		$content[$step] = $this->input;
		$content = '<?php

// This is the plugin in its PluginMaker\'s early shape. It is not recommended to edit this directly.

$content = '.var_export($content, true)."

?>";
		file_put_contents(PLUGINPATH.$this->file.".php", $content);
	}
	
	// loads a step's template. global stands for whole steps
	function step_get($step) {
		include PLUGINPATH.$this->file.".php";
		if($step == "global") {
			return $content;
		}
		return $content[$step];
	}
	
	// counts total steps present in a file
	function step_count() {
		$steps = $this->step_get("global");
		return count($steps);
	}
	
	// reverts one or more steps
	function step_revert($steps) {
		$new_content = "";
		if(!empty($steps)) {
			if(!is_array($steps)) {
				$steps = array($steps);
			}
			$matches = $this->step_show();
			$toremove = array_intersect($matches[1], $steps);
			// remove the old steps
			foreach($toremove as $key => $match) {
				$new_content = str_ireplace($matches[0][$key], "", $old_content);
			}
		}
		file_put_contents(PLUGINPATH.$this->file, $new_content);
	}
	
	// caches settings
	function cache_settings() {
		$content = '<?php

// This file contains the default settings and works as a file cache. Do not edit directly.

$settings = '.var_export($this->input, true)."

?>";
		file_put_contents(PM_CORE."/settings.php", $content);
		// update on-the-fly
		$this->show_settings();
	}
	
	// shows settings stored in cache
	function show_settings() {
		include PM_CORE."/settings.php";
		$this->settings = $settings;
	}
	
	// sets one or more messages to show
	function message($messages, $type, $inline=0) {
		$this->messagequeue = $_SESSION['messagequeue'] = array(
			'messages' => $messages,
			'type' => $type
		);
		if($type == 'error') {			
			$this->error = 1;
		}
		// inline can be called directly from templates
		if($inline) {
			$this->get("messages");
			unset($_SESSION['messagequeue']);
		}
	}
	
	// gets a message out from an array of messages and their actions
	function get_message($action) {
		include PM_CORE."/lang.php";
		return $lang[$action];
	}
	
	// get a clean list of plugins in the plugins dir
	function get_plugins() {
		$files = $this->get_files();
		if(!empty($files)) {
			foreach($files as $plugin_file) {
				include PLUGINPATH.$plugin_file;
				if(!$content['info']) {
					continue;
				}
				echo $content['info']['name']."<br>";
			}
		} else {
			$this->message("There aren't any saved plugins at the moment.", "error", 1);
		}
	}
	
	// get a list of the php files which exist in the plugins directory
	function get_files() {
		$dir = @opendir(PLUGINPATH);
		if($dir) {
			while($file = readdir($dir)) {
				$ext = $this->get_extension($file);
				if($ext == "php") {
					$pluginlist[] = $file;
				}
			}
			@sort($pluginlist);
		}
		@closedir($dir);
		
		return $pluginlist;
	}
	
	// get the extension of a file
	function get_extension($file) {
		return pathinfo($file, PATHINFO_EXTENSION);
	}
	
	// debugs any data
	function debug($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		exit;
	}
}

// initialize the class
global $PM;
$PM = new PluginMaker();