<?php

/**
 * This is the core of Plugin Maker. Contains simple code used to build pages, get templates, write files with ease, etc.
 */

define("PM_CORE", dirname(__FILE__));
define("PLUGINPATH", dirname(PM_CORE) . "/plugins/");
define("STEPPATH", PM_CORE . "/styles/templates/steps/");

class PluginMaker
{
	
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
	
	// an array of messages to show
	public $messagequeue = array();
	
	// whether there's an error or not
	public $error = "";
	
	// an array of $PM->input[variables] "protected" from being empty. Will bypass the empty() check for clean_input()
	public $emptyvars = array();
	
	public $fields = array(
		'info' => array('name', 'description', 'namespace', 'version', 'author', 'authorsite', 'compatibility', 'pluginlibrary'),
	);
	
	public $values = array();
	
	private $url = 'http://projectxmybb.altervista.org/pluginmaker';
	
	// init the class
	public function __construct()
	{
		if (!session_id()) {
			session_start();
		}
		
		// clear the input
		$this->parse_incoming($_GET);
		$this->parse_incoming($_POST);
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$this->request_method = "post";
		}
		else if ($_SERVER['REQUEST_METHOD'] == "GET") {
			$this->request_method = "get";
		}
		
		$this->validate_page($this->input['action']);
		
		$this->show_settings();
		
		// sets the file to work on
		$this->setfile();
		
		// handle eventual messages to be shown
		if ($_SESSION['messagequeue']) {
		
			$this->message($_SESSION['messagequeue']['messages'], $_SESSION['messagequeue']['type']);
			unset($_SESSION['messagequeue']);
			
		}
		
		return;
	}
	
	// parses inputs
	public function parse_incoming($array)
	{
		if (!is_array($array)) {
			return;
		}
		
		foreach ($array as $key => $val) {
			$this->input[$key] = $val;
		}
		
		return;
	}
	
	// sanitizes all inputs received escaping what should be escaped and checking if this array is void
	public function clean_input()
	{
		global $errors, $emptyvars;
		
		$emptyvars = $this->emptyvars;
		
		array_walk_recursive($this->input, function(&$value, $key) {
		
			global $errors, $emptyvars;
			
			$value = addslashes($value);
			
			if (!$value and !in_array($key, $emptyvars)) {
				$errors[] = $key . ' input has been left empty';
			}
		});
		
		if ($errors) {
			$this->message($errors, 'error');
		}
		
		return;
	}
	
	// builds a page
	public function build_page()
	{
		// header
		$this->get('header');
		
		// eventual messages
		if ($this->messagequeue) {
			$this->get('messages');
		}
		
		// the actual page
		$page = $this->get($this->action, true);
		
		if (!$page) {
			$this->get('notfound');
		}
		
		// footer
		$this->get('footer');
		
		exit;
	}
	
	// gets a template
	public function get($template, $variable = false)
	{
		// globalizing $PM will let us use it in our templates
		global $PM;
		
		$path = PM_CORE . '/styles/templates/ui/';
		
		if ($variable) {		
			$path = PM_CORE . '/styles/templates/steps/';
		}
		
		$file = $path . "/$template.php";
		$exists = file_exists($file);
		
		if ($exists) {
			require_once $file;
		}
		
		return $exists;
	}
	
	// echoes some page infos declared in every page such as icon class, page name, etc.
	public function pageinfo($info)
	{
		global $page;
		
		if ($info) {
			echo $page[$info];
		}
		
		return;
	}
	
	// validates a page to output
	public function validate_page($action)
	{
	
		$this->action = BASENAME;
		
		if ($action) {
			$this->action = $action;
		}
		
		unset($this->input['action']);
		
		return;
	}
	
	// sets the file we are working on in the session
	public function setfile($file = "")
	{
		$file = (string) $file;
		
		if (!$file) {
			
			// if there's a namespace, use it
			if ($this->input['namespace']) {
				$file = (string) strtolower(str_replace(" ", "", $this->input['namespace']));
			}
			
			// if there's a name, use it
			elseif ($this->input['name']) {
				$file = (string) strtolower(str_replace(" ", "", $this->input['name']));
			}
			// if we are working on a file already, use it
			elseif ($_SESSION['pluginmaker']['file']) {
				$file = $_SESSION['pluginmaker']['file'];
			}
		}
		
		// we don't want empty values for $this->file
		if ($file) {
			
			// clean up session
			$this->clearfile();
			
			// set up our stuff to deal with
			$_SESSION['pluginmaker']['file'] = $this->file = $file;

		}
		
		return;
	}
	
	// clear out the file from the session
	public function clearfile()
	{
		unset($_SESSION['pluginmaker']['file']);
		
		$this->file = '';
		
		return;
	}
	
	// writes something on a file as a "step"
	public function add_step($step)
	{
		// create the directory if not exists
		if (!is_dir(PLUGINPATH)) {
			mkdir(PLUGINPATH);
		}
		
		// get existing data
		$content = $this->get_step('global');
		
		// add our data to the existing one
		$content[$step] = $this->input;
		
		$content = '<?php

// This is the plugin in its PluginMaker\'s early shape. It is not recommended to edit this directly.

$content = ' . var_export($content, true) . '

?>';

		file_put_contents(PLUGINPATH . $this->file . '.php', $content);
		
		return;
	}
	
	// loads a step's template. global stands for whole steps
	public function get_step($step)
	{
		include PLUGINPATH . $this->file . ".php";
		
		if ($step == "global") {
			return $content;
		}
		
		return $content[$step];
	}
	
	public function delete_plugin($name = '', $silent = false)
	{
		if (!$name) {
			return false;
		}
		
		$delete = unlink(PLUGINPATH . $name . '.php');
		
		if ($silent) {
			return $delete;
		}
		
		if (!$delete) {
			$this->message('The plugin could not be deleted due to an unknown error (insufficient permissions maybe?).', 'error');
		}
		else {
			$this->message('The plugin has been deleted successfully.', 'success');
		}
		
		return;
	}
	
	// counts total steps present in a file
	public function count_step()
	{
		$steps = $this->get_step("global");
		
		return count($steps);
	}
	
	// caches settings
	public function cache_settings()
	{
		$content = '<?php

// This file contains the default settings and works as a file cache. Do not edit directly.

$settings = ' . var_export($this->input, true) . "

?>";
		file_put_contents(PM_CORE . "/settings.php", $content);
		
		// update on-the-fly
		$this->show_settings();
	}
	
	// shows settings stored in cache
	public function show_settings()
	{
		include PM_CORE . "/settings.php";
		
		$this->settings = $settings;
		
		return;
	}
	
	// sets one or more messages to show
	public function message($messages, $type, $inline = 0)
	{
		$this->messagequeue = $_SESSION['messagequeue'] = array(
			'messages' => $messages,
			'type' => $type
		);
		
		if ($type == 'error') {
			$this->error = 1;
		}
		
		// inline can be called directly from templates
		if ($inline) {
		
			$this->get('messages');
			unset($_SESSION['messagequeue']);
			
		}
		
		return;
	}
	
	// gets a message out from an array of messages and their actions
	public function get_message($action)
	{
		include PM_CORE . "/lang.php";
		return $lang[$action];
	}
	
	// get a clean list of plugins in the plugins dir
	public function get_plugins()
	{
		$files = $this->get_files();
		
		if ($files) {
		
			foreach ($files as $plugin_file) {
			
				include PLUGINPATH . $plugin_file;
				
				if (!$content['info']) {
					continue;
				}
				
				echo '<a href="edit.php?action=info&namespace=' . $content['info']['namespace'] . '">' . $content['info']['name'] . '</a><br>';
			}
		}
		else {
			$this->message("There aren't any saved plugins at the moment.", "error", 1);
		}
		
		return;
	}
	
	// get a list of the php files which exist in the plugins directory
	public function get_files()
	{
		$dir = @opendir(PLUGINPATH);
		
		if ($dir) {
		
			while ($file = readdir($dir)) {
			
				$ext = $this->get_extension($file);
				
				if ($ext == "php") {
					$pluginlist[] = $file;
				}
				
			}
			
			@sort($pluginlist);
			
		}
		
		@closedir($dir);
		
		return $pluginlist;
		
	}
	
	// get the extension of a file
	public function get_extension($file)
	{
		return pathinfo($file, PATHINFO_EXTENSION);
	}
	
	// redirect the user where he should go
	public function redirect($url)
	{
		header("Location: ".$url);
		exit;
	}
	
	// load scripts based on the page we're viewing
	public function load_scripts()
	{
		// an array of css => script occurencies to include in the page
		$content = array();
		
		if ($this->action) {
		
			$content[$this->url . '/core/styles/scripts/chosen/chosen.min.css'] = $this->url . '/core/styles/scripts/chosen/chosen.jquery.min.js';
			$content['plain'] = '<script type="text/javascript">
jQuery(document).ready(function($) {
	$("select").chosen();
});
</script>';
			
		}
		
		foreach ($content as $css => $script) {
			
			if ($script) {
			
				if ($css == 'plain') {
					echo $script;
				}
				else {
					
					echo "<script type='text/javascript' src='$script'></script>";
				}
			}
			
			if ($css and $css != 'plain') {
				echo "<link href='$css' rel='stylesheet' type='text/css'>";
			}
			
		}
			
		return;		
	}
	
	// load a list of hooks	
	public function load_hooks()
	{
		include PM_CORE . '/styles/templates/steps/hookslist.php';
		
		foreach ($hookslist as $hooks) {
			
			//echo "<optgroup label='$cat'>";
			
			//foreach ($hooks as $hook) {
				echo "<option value='$hooks'>$hooks</option>";
			//}
			
			//echo "</optgroup>";
			
		}
	}
	
	// debug any data
	public function debug($data)
	{
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		exit;
	}
}

// initialize the class
global $PM;
$PM = new PluginMaker();

?>