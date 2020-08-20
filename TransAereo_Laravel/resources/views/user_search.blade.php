<link rel="stylesheet" href="http://localhost:8000/template/css/style.css" type="text/css">
<!DOCTYPE html>
<html>
<head>
	<title>Update Search Person</title>
</head>
<body>
	<h1>User Search</h1>
	<a href="{{ route('main') }}">Menu</a><br/>
	<form action="{{ route('update') }}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		ID: 	<input type="text" name="id"><br>
		<input type="submit">
	</form>
</body>
</html>