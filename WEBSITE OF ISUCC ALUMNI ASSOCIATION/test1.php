<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<label>password :
<input name="password" id="password" type="password" />
</label>
<label>confirm password:
<input type="password" name="confirm_password" id="confirm_password" onchange="check()"/> 
<span id='message'></span>
</body>
</html>
<script type="text/javascript">
	function check() {
    if(document.getElementById('password').value ===
            document.getElementById('confirm_password').value) {
        document.getElementById('message').innerHTML = "match";
    } else {
        document.getElementById('message').innerHTML = "not match";
    }
}
</script>