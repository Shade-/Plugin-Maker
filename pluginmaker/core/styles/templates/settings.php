<div class="box">
This section contains the default settings which will be applied to all your future plugins upon their creation.<br><br>
All the infos will be stored in the cache and will fill the respective ones in the plugin creation process, automatically. You can leave them blank.
<form action="index.php" method="post">
<h2>Author</h2>
<input type="text" class="text" name="author" value="<? $PM->cache['author'] ?>" />
<h2>Plugin version</h2>
<input type="text" class="text" name="version" value="<? $PM->cache['version'] ?>" />
<h2>Supported MyBB version</h2>
<select name="compatibility">
	<option value=""></option>
	<option value="14*">1.4</option>
	<option value="16*">1.6</option>
	<option value="18*" disabled>1.8</option>
</select>
<div class="foot">
<input type="submit" class="button" value="Perform changes" />
</div>
</form>
</div>