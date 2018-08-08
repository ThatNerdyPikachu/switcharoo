<!DOCTYPE html>
<html>
<!--
	switcharoo
	copyright 2018 pika studios llc (lol jk)
	any work of pikas is hers don't steal

	thanks to:
	- miguel
	- wrath
	- slick 💖
	- and you!
-->

<head>
	<title>Switcharoo</title>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.2/darkly/bootstrap.min.css" rel="stylesheet">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#">Switcharoo</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/">Home</a>
				</li>
			</ul>
			@if (Auth::check())
				<a class="navbar-text" href="/logout">Logout ({{ Auth::user()->name }})</a>
			@else
				<a class="navbar-text" href="/login">Login</a>
			@endif
		</div>
	</nav>

	@yield("content")

</body>
</html>