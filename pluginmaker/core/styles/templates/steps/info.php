<div class="box">
Fill in a few informations about your plugin and yourself. Some of them are required, but others may be optional (they are marked with a badge if so).
<form action="<? echo BASENAME ?>.php?action=info" method="post">
<h2>Name</h2>
The plugin's name.
<input type="text" name="name" value="<? echo $PM->values['name'] ?>" />
<h2>Description</h2>
The plugin's description.
<input type="text" name="description" value="<? echo $PM->values['description'] ?>" />
<h2>Namespace<span class="outline">Optional</span></h2>
The namespace will be used to create the filename and the prefix of all the functions in the plugin. If not specified, an automatic namespace will be generated from the plugin's name.
<input type="text" name="namespace" value="<? echo $PM->values['namespace'] ?>" />
<h2>Plugin version</h2>
The plugin version. Should be numeric, but can be anything.
<input type="text" name="version" value="<? echo $PM->values['version'] ?>" />
<h2>Author</h2>
Your nickname. Everybody will see this in their plugins list.
<input type="text" name="author" value="<? echo $PM->values['author'] ?>" />
<h2>Author website<span class="outline">Optional</span></h2>
Your website. Used to give users a reference to ask for support or similar.
<input type="text" name="authorsite" value="<? echo $PM->values['authorsite'] ?>" />
<h2>Supported MyBB version(s)</h2>
The supported MyBB version(s). Can be more than one. 1.6 is the latest, 1.8 is in development stages. Please be aware that hooks and functions between 1.4 and 1.6 may vary. If you decide to support earlier versions of MyBB you will need to add a fix for certain hooks you choose, because PluginMaker only supports the latest version.
<div><select name="compatibility[]" multiple>
	<option value=""></option>
<?

$versions = array(
	"14*" => "1.4",
	"16*" => "1.6",
	"18*" => "1.8"
);
foreach ($versions as $coded => $plain) {

	$selected = $disabled = "";
	
	if ($coded == "18*") {
		$disabled = "disabled";
	}
	
	if (in_array($coded, $PM->values['compatibility'])) {
		$selected = "selected";
	}
	
	echo "\t<option value=\"$coded\" $disabled $selected>$plain</option>";
}

?>
</select></div>
<h2>PluginLibrary support?</h2>
Do you want to include PluginLibrary in your plugin? It's a library which speeds up and boosts plugins development.
<div><label><input type="checkbox" name="pluginlibrary" value="1"<? if ($PM->values['pluginlibrary']) echo " checked" ?> /> Enable PluginLibrary</label></div>
<div class="foot">
<input type="submit" class="button" value="Save" />
</div>
</form>
</div>