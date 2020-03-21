<!DOCTYPE html>
<html>
	<head>
		<title>Formular</title>
        <link rel="stylesheet" type="text/css" href="form.css" />
<!--        <script src="form.js"></script>-->
		<script src="js-library.js"></script>
	</head>
    <body>
		<form method="post" action="login.php">
			<fieldset id="login-box">
				<legend id="login">Login</legend>
				<p>
					<label for="loginname">Benutzername: </label>
					<input id="loginname" class="login" type="text" name="loginname" title="" maxlength="20"/> <!--required="required" --><!--pattern=".{3,20}" -->
				</p>
				<p>
					<label for="loginpassword">Passwort: </label>
					<input id="loginpassword" class="login" type="password" name="logpassword" title="" /><!--pattern=".{6,}"--><!--required="required"-->
                </p>
				<input type="submit" class="login" name="submit" value="Senden" />
			</fieldset>
		</form>

    </body>
</html>
