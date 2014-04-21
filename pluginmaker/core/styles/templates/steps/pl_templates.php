<div class="box">
Yoohoo. Templates time. You don't need to escape things. Plugin Maker, at its very best, will handle inputs for you, sanitizing everything.
<form action="<? echo BASENAME ?>.php?action=pl_templates" method="post">
<h2>Template #1</h2>
<input type="text" name="templates[0][title]" value="" placeholder="Title" />
<textarea name="templates[0][code]" value="" placeholder="Template" /></textarea>
<div class="foot">
<input type="submit" class="button" value="Save" />
<a class="button" href="<? echo BASENAME ?>.php?action=pl_templates&skip=true">Skip</a>
</div>
</form>
</div>