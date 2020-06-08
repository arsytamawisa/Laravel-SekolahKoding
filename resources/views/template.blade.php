<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<nav>
			<a href="/">Home</a>
			<a href="/blog">Blog</a>
		</nav>
	</header>
	<br>
	@yield('content')
</body>
</html>