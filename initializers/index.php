<?php t("Javaref - Static &amp; Instance Initializers");?>
<h1>Static &amp; Instance Initializers</h1>
<p class="description">Code block used to run arbitrarily code during
	class or instance initialization.</p>
<p>Static and Instance initializers solve the issue of it being
	cumbersome or impossible to run arbitrary code during the
	initialization of a class or an interface. Both types of initializers
	are blocks of code.</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><code>static</code> <code>{</code> <span
			class="syntax-piece optional">statements</span> <code>}</code></td>
	</tr>
	<tr>
		<td>2</td>
		<td><code>{</code> <span class="syntax-piece optional">statements</span>
			<code>}</code></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">statements</span></td>
		<td>is a sequence of statements, just like the body of a code block.
			The statements can be separated by whitespace. (For more details, see
			<a href="/statements/blocks">blocks</a>.)
		</td>
	</tr>
</table>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> A static initializer.
</p>
<p>
	<span class="syntax-number">2</span> An instance initializer.
</p>
<h2>Usage</h2>
<p>
	Initializers are used to run arbitrary code during initialization of a
	class or object. Without initializers, initialization code outside of
	the constructor would be limited to assignments to <code>static</code>
	and instance fields.
</p>
<p>
	An initializer executes its body <span class="syntax-piece">statements</span>
	from top to bottom, in order, just like a normal code block:
</p>
<pre><code>public class Dog {
	{
		System.out.println("First Statement");
		System.out.println("Second Statement");
	}
}</code></pre>
<p>
	Creating a <code>new Dog();</code> will cause the initializer block to
	run, resulting in the output:
</p>
<pre><code class="output">First Statement
Second Statement</code></pre>
<h3>Execution Order</h3>
<p>
	Much like fields, initializers strewn throughout a type run in order,
	from the beginning of the type to the end. <code>static</code>
	initializers are ordered against other <code>static</code>
	initialization code and instance initializers are ordered against other
	instance initialization code.
</p>
<pre><code>public class Dog {
	int x = 10; // instance field
	{
		System.out.println("x begins with value: " + x);
	}
	double y = x++; // Increments x to 11 and sets y to 10.0d
	{
		System.out.println("x is now: " + x);
		System.out.println("y is: " + y);
	}
}</code></pre>
<p>
	Creating a <code>new Dog();</code> results in the output:
</p>
<pre><code class="output">x begins with value: 10
x is now: 11
y is: 10.0</code></pre>
<p>Initialization code can be interleaved (as in the above example) with
	field declarations, including declarations that initialize the fields
	to different values. The initialization code included throughout a type
	is aggregated, (order maintained), and collectively, executed during
	class/object initialization.</p>
<h3>Constraints</h3>
<p>
	<code>static</code> and <code>instance</code> initializers are both
	constrained so that they cannot access
<h3>Static Initializer</h3>
<p>