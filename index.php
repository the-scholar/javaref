<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="light.css">
<meta charset="ISO-8859-1">
<title>Javaref.net</title>
<style>
div.sec {
	font-weight: bold;
	color: var(--accent-color);
	margin-top: .5em;
	margin-bottom: .1em;
}

ul {
	list-style-type: none;
	padding: .3em 1em;
	margin: .2em;
	background-color: #ffffff0a;
	font-size: .87em;
}
</style>
<script src="/index.js"></script>
</head>
<body>
	<div id="Header">
		<div id="HeaderContent">
			<div id="HeaderContentTitle">
				<div id="Title">javaref.net</div>
				<div style="min-width: .5em;"></div>
				<input id=Search type="text" name="q" placeholder="Search...">
			</div>
			<div id="HeaderContentMenu">
				<a class="selected" href="/">Home</a> <a
					href="https://github.com/the-scholar/javaref">GitHub</a> <a
					href="/about">About</a>
				<div></div>
				<a href="/help">Help</a>
				<div id="LightThemeButton" class="button" onclick="lightTheme()">
					<img src="sun.svg" alt="Light Theme">
				</div>
				<div id="DarkThemeButton" class="button" onclick="darkTheme()"
					style="display: none;">
					<img src="moon.svg" alt="Dark Theme">
				</div>
			</div>
		</div>
	</div>
	<div id="Content">
		<h1>Java Reference</h1>
		<div class="sec">General</div>
		<ul>
			<li><a class="c" href="/identifiers">Identifiers</a></li>
			<li><a class="c" href="/initializers">Static &amp; Instance
					Initializers</a></li>
		</ul>
		<div class="sec">Concepts</div>
		<ul>
			<li><a class="c" href="/concepts/capture-conversion">Capture
					Conversion</a></li>
		</ul>
		<div class="sec">Literals</div>
		<ul>
			<li><a class="c" href="/literals/integer">Integer Literal</a></li>
			<li><a class="c" href="/literals/floating-point">Floating Point
					Literals</a></li>
			<li><a class="c" href="/literals/boolean">Boolean Literals</a></li>
			<li><a class="c" href="/literals/null">Null Literals</a></li>
		</ul>
		<div class="sec">Statements</div>
		<ul>
			<li><a class="c" href="/statements/for-loops">For Loops</a></li>
			<li><a class="c" href="/statements/expression-statements">Expression
					Statements</a></li>
		</ul>
		<div class="sec">Methods</div>
		<ul>
			<li><a class="c" href="/methods/declarations">Method Declarations</a></li>
			<li><a class="c" href="/methods/receiver-parameters">Receiver
					Parameters</a></li>
		</ul>
		<div class="sec">Operators</div>
		<ul>
			<li>
				<div class="sec">Unary</div>
				<ul>
					<li><a class="c" href="/operators/unary/cast">Cast Operator</a></li>
					<li><a class="c" href="/operators/unary/minus">Unary Minus</a></li>
					<li><a class="c u" href="/operators/unary/plus">Unary Plus</a></li>
				</ul>
			</li>
		</ul>
		<div class="sec">Annotations</div>
		<ul>
			<li><a class="c" href="annotations">Annotations</a></li>
			<li><a class="c" href="annotations/declarations">Annotation
					Declarations</a></li>
			<li><a class="c" href="annotations/elements">Annotation Element
					Declarations</a></li>
		</ul>
	</div>
</body>
</html>