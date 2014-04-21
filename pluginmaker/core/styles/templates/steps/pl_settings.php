<div class="box">
You should add some settings.
<form action="<? echo BASENAME ?>.php?action=pl_settings" method="post">
<h2>Setting #1</h2>
<select name="settings[0][optionscode]">
	<option value="text">Text</option>
	<option value="yesno">Boolean checkboxes</option>
	<option value="textarea">Textarea</option>
	<option value="select" disabled>Selectbox</option>
</select>
<input type="text" name="settings[0][title]" value="" placeholder="Title" />
<input type="text" name="settings[0][description]" value="" placeholder="Description" />
<input type="text" name="settings[0][value]" value="" placeholder="Default value" />
<div class="foot">
<input type="submit" class="button" value="Save" />
<a class="button" href="<? echo BASENAME ?>.php?action=pl_settings&skip=true">Skip</a>
</div>
</form>
</div>