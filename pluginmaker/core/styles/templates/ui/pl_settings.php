<div class="box">
You should add some settings.
<form action="plugin.php?action=pl_templates" method="post">
<h2>Setting #1</h2>
<input type="text" name="settings[0][title]" value="" placeholder="Title" />
<input type="text" name="settings[0][description]" value="" placeholder="Description" />
<input type="text" name="settings[0][value]" value="" placeholder="Default value" />
Type
<select name="settings[0][optionscode]">
	<option value="text">Text</option>
	<option value="yesno">Boolean checkboxes</option>
	<option value="textarea">Textarea</option>
	<option value="select" disabled>Selectbox</option>
</select>
<div class="foot">
<input type="submit" class="button" value="Save" />
</div>
</form>
</div>