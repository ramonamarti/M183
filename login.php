<!DOCTYPE html>
<html>
	<head>
		<title>Formular</title>
        <link rel="stylesheet" type="text/css" href="form.css" />
<!--        <script src="form.js"></script>-->
		<script src="js-library.js"></script>
	</head>
    <body>
		<form method="post" action="main.php">
			<fieldset id="login-box">
				<legend id="login">Login</legend>
				<p>
					<label for="login">Benutzername: </label>
					<input id="username" class="login" type="text" name="username" title="" maxlength="20"/> <!--required="required" --><!--pattern=".{3,20}" -->
				</p>
				<p>
					<label for="password">Passwort: </label>
					<input id="password" class="login" type="password" name="password" title="" /><!--pattern=".{6,}"--><!--required="required"-->
                </p>
				<input type="submit" class="login" name="submit" value="Senden" />
			</fieldset>
		</form>

    </body>
</html>
