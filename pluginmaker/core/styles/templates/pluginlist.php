<div class="box">
<h2>Saved plugins</h2>
<?
	foreach(glob(PLUGINPATH.$PM->filedir."*.*") as $filename) {
		echo str_replace(PLUGINPATH.$PM->filedir, "", $filename)."<br>";
	}
?>
</div>