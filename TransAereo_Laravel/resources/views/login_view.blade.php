<link rel="stylesheet" href="http://localhost:8000/template/css/style.css" type="text/css">
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<title>Website TransAereo</title>
	<link rel="stylesheet" href="http://localhost:8000/template/css/style.css" type="text/css">
</head>
<body>
	<a href="{{ route('main') }}">Menu</a>
	<div class="center">
		<h1>Entrar</h1>
	<div/>

	<form action="autentication" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		Login: 	<input type="text" name="login"><br>
		Password: 	<input type="text" name="pass"><br>
		<input type="submit">
	</form>
</body>
</html>