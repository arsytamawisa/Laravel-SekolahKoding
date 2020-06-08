<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel | Email</title>
</head>
<body>
	<h2>Post has been created</h2>
	<p>Title : {{ $email['title'] }}</p>
	<img src="{{ asset('storage/img/'.$email->img) }}" width="250">
</body>
</html>