<?php t("Javaref - Boolean Literals", "A boolean literal is a textual expression of either true or false.");?>
<h1>Boolean Literals</h1>
<p class="description">
	Literal expression of a Boolean (<code>true</code>/<code>false</code>)
	value in source code.
</p>
<h2>Syntax</h2>
<p>Boolean literals have two forms:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><code>true</code></td>
	</tr>
	<tr>
		<td>2</td>
		<td><code>false</code></td>
	</tr>
</table>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> The literal for the value <code>true</code>.
</p>
<p>
	<span class="syntax-number">2</span> The literal for the value <code>false</code>.
</p>
<p>
	<i>such that...</i>
</p>
<ul>
	<li>As with identifiers, keywords, and the <code>null</code> literal,
		Boolean literals must be separated from identifier-like tokens by any
		non-zero amount of whitespace or a comment, otherwise they will be
		interpreted as a part of the other identifier-like token.
	</li>
</ul>
<h2>Usage</h2>
<p>
	The type of a Boolean literal is always the <code>boolean</code> type.
	Boolean literals can be used in any context that a boolean expression
	is acceptable.
</p>
<h2>Examples</h2>
<div class="example">
	<h4>Usage in Loop</h4>
	<p>
		An "infinite" <code>while</code> loop using the literal <code>true</code>:
	</p>
	<pre><code>while (true) {
	renderGame();
	glSwapBuffers();
	if (checkShouldClose())
		break;
	tickGame();
}</code></pre>
</div>
<div class="example">
	<h4>
		Flipping a <code>boolean</code>
	</h4>
	<p>
		A simple statement that flips the value of a <code>boolean</code>
		variable can be made with the literal <code>true</code>:
	</p>
	<pre><code>boolean x = false;
x ^= true; // Flips x; x is now true
x ^= true; // Flips x; x is now false
x ^= true; // x is true
x ^= true; // x is false
x ^= true; // x is true

if (x) {
	System.out.println("X is true");
}</code></pre>
	<p>Output:</p>
	<pre><code class="output">X is true</code></pre>
</div>
<?php b();