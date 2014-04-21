<div class="box">
This section contains the default settings which will be applied to all your future plugins upon their creation. All the infos will be stored in the cache and will fill the respective ones in the plugin creation process, automatically. You can leave them blank.
<form action="index.php?action=settings" method="post">
<h2>Author</h2>
Your nickname. Everybody will see this in their plugins list.
<input type="text" name="author" value="<? echo $PM->settings['author'] ?>" />
<h2>Plugin version</h2>
The plugin version. Should be numeric, but can be anything.
<input type="text" name="version" value="<? echo $PM->settings['version'] ?>" />
<h2>Author website<span class="outline">Optional</span></h2>
Your website. Used to give users a reference to ask for support or similar.
<input type="text" name="authorsite" value="<? echo $PM->settings['authorsite'] ?>" />
<h2>Supported MyBB version(s)</h2>
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
<h2>PluginLibrary support?</h2>
Do you want to automatically include PluginLibrary in your plugins? This will speed up noticeably the plugin performances.
<div><label><input type="checkbox" name="pluginlibrary" value="1"<? if($PM->settings['pluginlibrary']) echo " checked" ?> /> Enable PluginLibrary</label></div>
<div class="foot">
<input type="submit" class="button" value="Save" />
</div>
</form>
</div>