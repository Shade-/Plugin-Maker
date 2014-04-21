<div class="box">
<h2>Hooking</h2>
Choose an hook to inject your code into a function and start writing down it. At this point, hooks are not categorized but they will be in the future. Don't write the initial "function ($args)" part as it will be generated automatically. Just write down the actual code inside your function. Hooks marked with an asterisk (<b>*</b>) have an argument available (use $this to handle it).
<form action="<? echo BASENAME ?>.php?action=functions" method="post">
<h2>Function #1</h2>
<select name="functions[0][hook]" data-placeholder="Select a hook">
	<option value=''></option>
	<? $PM->load_hooks(); ?>
</select>
<textarea name="functions[0][code]" value="" placeholder="PHP code" /></textarea>
<div class="foot">
<input type="submit" class="button" value="Save" />
<a class="button" href="<? echo BASENAME ?>.php?action=functions&skip=true">Skip</a>
</div>
</form>
</div>