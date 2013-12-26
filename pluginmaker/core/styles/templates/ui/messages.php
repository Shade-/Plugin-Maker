<div class="message <? echo $PM->messagequeue['type'] ?>"><?
if($PM->messagequeue['type'] == "success") {
	echo $PM->messagequeue['messages'];
} else {
	if(!is_array($PM->messagequeue['messages'])) {
		echo $PM->messagequeue['messages'];
	} else {
		echo "Some errors occured:\n";
		foreach($PM->messagequeue['messages'] as $message) {
			echo "<li>".$message."</li>";
		}
	}
	
}
?></div>