<DOCTYPE html>
<script type="text/javascript">
	function changing(){
    document.getElementById('checkpic').src="verification.php?"+Math.random();
} 
</script>
<html>
	<head>
		<meta charset="UTF-8">
		<title>upload</title>
	</head>
	<body>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="file" id="file"><br />
			<input type="text" name="check1" id="text">
			<img id="checkpic" onclick="changing();" src="verification.php" /><br />
			<input type="submit" name="submit" id="submit">
		</form>
		<br />
	</body>
</html>