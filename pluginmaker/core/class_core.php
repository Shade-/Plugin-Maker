<?php

/**
 * This is the core of Plugin Maker. Contains simple code used to build pages, get templates, write files with ease, etc.
 */

define("PM_CORE", dirname(__FILE__));
define("PLUGINPATH", dirname(PM_CORE)."/plugins/");

class PluginMaker {

	// the inputs received
	public $input = array();

	// the action, used to build every page
	public $action = "";
	
	// the method called
	public $request_method = "";
	
	// a comma-separated list of available pages
	public $allowed_pages = "plugin,settings,pluginlist";
	
	// settings stored in cache
	public $settings = "";
	
	// the file being worked on
	public $file = "";
	
	// the directory of the file being worked on
	public $filedir = "";
	
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
	
	// sanitizes all inputs received removing slashes
	function clean_input() {
		foreach($this->input as $key => $value) {
			$this->input[$key] = str_replace("\"", "", $value);
		}
	}
	
	// builds a page
	function build_page() {
		// header
		$this->get("header");
		// the actual page
		$this->get($this->action);
		// footer
		$this->get("footer");
		exit;
	}
	
	// gets a template
	function get($template) {
		global $PM;
		$file = PM_CORE."/styles/templates/$template.php";
		if(file_exists($file)) require_once $file;
	}
	
	// echoes some page infos declared in every page such as icon class, page name, etc.
	function pageinfo($info) {
		global $page;
		if(!empty($info)) echo $page[$info];
	}
	
	// validates a page to output
	function validate_page($action) {
		$this->action = !empty($action) && in_array($action, explode(",", $this->allowed_pages)) ? $action : BASENAME;
		unset($this->input['action']);
	}
	
	// sets the file we are working on in the session
	function setfile($file="") {
		if(!session_id()) {
			session_start();
		}
		$file = (string) $file;
		if(empty($file)) {
			// if there's a namespace, use it (assuming .php as the only extension used)
			if(!empty($this->input['namespace'])) {
				$file = (string) $this->input['namespace'].".php";
			}
			// if we are working on a file already...
			elseif(!empty($_SESSION['pluginmaker']['file'])) {
				// set up our variables and stop here
				$this->file = $_SESSION['pluginmaker']['file'];
				if(dirname($file) != ".") {
					$this->filedir = dirname($file);
				}
				return;
			}
		}
		// we don't want empty values for $this->file
		if(!empty($file)) {
			// cleaning up session
			$this->clearfile();
			$_SESSION['pluginmaker']['file'] = $this->file = $file;
			// if dirname returns ".", the file hasn't got a parent dir
			if(dirname($file) != ".") {
				$this->filedir = dirname($file);
			}
		}
	}
	
	// clear out the file from the session
	function clearfile() {
		unset($_SESSION['pluginmaker']['file']);
		$this->file = $this->filedir = "";
	}
	
	// returns steps present in a file as an array of data
	function step_get() {
		$content = file_get_contents(PLUGINPATH.$this->file);
		// detect steps
		preg_match_all('#(?:/\* STEP ([0-9]*) \*/)[^/\*]*#i', $content, $matches);
		return $matches;
	}
	
	// counts total steps present in a file
	function step_count() {
		$steps = $this->step_get();
		return count($steps[0]);
	}
	
	// reverts one or more steps
	function step_revert($steps) {
		$new_content = "";
		if(!empty($steps)) {
			if(!is_array($steps)) {
				$steps = array($steps);
			}
			$matches = $this->step_get();
			$toremove = array_intersect($matches[1], $steps);
			// remove the old steps
			foreach($toremove as $key => $match) {
				$new_content = str_ireplace($matches[0][$key], "", $old_content);
			}
		}
		file_put_contents(PLUGINPATH.$this->file, $new_content);
	}
	
	// writes something on a file as a "step"
	function step_add($content, $step) {
		if(!is_dir(PLUGINPATH.$this->filedir)) {
			mkdir(PLUGINPATH.$this->filedir);
		}
		if($step == 1) {
			$start = "<?php\n\n";
		} else {
			$start = "\n\n";
		}
		$content = "$start/* STEP $step */\n\n".$content;
		file_put_contents(PLUGINPATH.$this->file, $content, FILE_APPEND);
	}
	
	// caches settings
	function cache_settings() {
		$content = '<?php

// This file contains the default settings and works as a file cache.
// It\'s better to edit this file within the interface instead of editing it directly.

$settings = '.var_export($this->input, true)."\n\n?>";
		file_put_contents(PM_CORE."/settings.php", $content);
		// update on-the-fly
		$this->show_settings();
	}
	
	// shows settings stored in cache
	function show_settings() {
		// include lets us update settings in "real time"
		include PM_CORE."/settings.php";
		$this->settings = $settings;
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