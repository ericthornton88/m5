<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>M5</title>
</head>
<body>
	<header>
		@section('header')
			<a href="/">Home</a>
		@show
	</header>
	<main>
		@yield('main_content')
	</main>
</body>
</html>