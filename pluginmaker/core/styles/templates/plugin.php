<div class="box">
First of all, you might specify some informations about you and your plugin.
<form action="index.php?action=plugin" method="post">
<h2>Name</h2>
The plugin's name.
<input type="text" name="name" value="" />
<h2>Description</h2>
The plugin's description.
<input type="text" name="description" value="" />
<h2>Namespace<span class="outline">Optional</span></h2>
The namespace will be used to create the filename and the prefix of all the functions in the plugin. If not specified, an automatic namespace will be generated from the plugin's name.
<input type="text" name="namespace" value="" />
<h2>Plugin version</h2>
The plugin version. Should be numeric, but can be anything.
<input type="text" name="version" value="<? echo $PM->settings['version'] ?>" />
<h2>Author</h2>
Your nickname. Everybody will see this in their plugins list.
<input type="text" name="author" value="<? echo $PM->settings['author'] ?>" />
<h2>Author website</h2>
Your website. Used to give users a reference to ask for support or similar.
<input type="text" name="authorsite" value="<? echo $PM->settings['authorsite'] ?>" />
<h2>Supported MyBB version</h2>
The supported MyBB major version(s). Can be more than one. 1.6 is the latest, 1.8 is in alpha development stages.
<div><select name="compatibility[]" multiple>
	<option value=""></option>
<?

$versions = array(
	"14*" => "1.4",
	"16*" => "1.6",
	"18*" => "1.8"
);
foreach($versions as $coded => $plain) {
	$selected = $disabled = "";
	if($coded == "18*") $disabled = "disabled";
	if(in_array($coded, $PM->settings['compatibility'])) $selected = "selected";
	echo "\t<option value=\"$coded\"$disabled $selected>$plain</option>";
}

?>
</select></div>
<div class="foot">
<input type="submit" class="button" value="Save" />
</div>
</form>
</div>