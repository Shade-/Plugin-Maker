<div class="box">
This section contains the default settings which will be applied to all your future plugins upon their creation.<br><br>
All the infos will be stored in the cache and will fill the respective ones in the plugin creation process, automatically. You can leave them blank.
<form action="index.php?action=settings" method="post">
<h2>Author</h2>
<input type="text" name="author" value="<? echo $PM->settings['author'] ?>" />
<h2>Plugin version</h2>
<input type="text" name="version" value="<? echo $PM->settings['version'] ?>" />
<h2>Author website</h2>
<input type="text" name="authorsite" value="<? echo $PM->settings['authorsite'] ?>" />
<h2>Supported MyBB version</h2>
<select name="compatibility">
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
	if($coded == $PM->settings['compatibility']) $selected = "selected";
	echo "\t<option value=\"$coded\"$disabled $selected>$plain</option>";
}

?>
</select>
<div class="foot">
<input type="submit" class="button" value="Perform changes" />
</div>
</form>
</div>