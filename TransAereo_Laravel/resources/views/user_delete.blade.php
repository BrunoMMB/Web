<link rel="stylesheet" href="http://localhost:8000/template/css/style.css" type="text/css">
<!DOCTYPE html>
<html>
<head>
	<title>Delete Search Person</title>
</head>
<body>
	<h1>User Delete Search</h1>
	<a href="{{ route('main') }}">Menu</a>
	<form action="{{ route('delete') }}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		ID: 	<input type="text" name="pessoa"><br>
		<input type="submit">
	</form>
</body>
</html>
