<?php t("Javaref - Static &amp; Instance Initializers");?>
<h1>Static &amp; Instance Initializers</h1>
<p class="description">Code block used to run arbitrary code during
	class or instance initialization.</p>
<p>
	Static and Instance initializers (sometimes called <i>initializer
		blocks</i>) solve the issue of it being cumbersome or impossible to
	run arbitrary code during the initialization of a class or an
	interface. Both types of initializers are blocks of code.
</p>
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
	class or object. They provide a means of executing statements and
	expressions beyond what can be executed through the variable
	initializer of a <code>static</code> or instance field. An initializer
	executes its body <span class="syntax-piece">statements</span> from top
	to bottom, in order, just like a normal code block.
</p>
<h3>Ordering &amp; Interleaving</h3>
<p>
	The instance variable initializers in field declarations and the
	instance initializer blocks, contained within a type, collectively make
	up the initialization code that gets executed when an instance of that
	type is created. Similarly, the variable initializers of static fields
	and the static initializer blocks collectively make up the
	initialization code that is executed when the type is loaded. Such
	initialization code is always executed in the same textual order as it
	is written throughout the class.<sup info=1></sup> Thereby, it is said
	that such initialization code is <i>ordered</i>. Note that other code
	contained within a type, (e.g. methods, constructors, inner types), is
	not subject to initialization code ordering.
</p>
<span info=1>Initializer code is executed in the order of its textual
	appearance. For example, consider the following class: <pre><code>public class Test {
	int x = 10;
	{
		System.out.println("x's initial value: " + x);// Prints 10.
	}
	int y = x++; // Sets y to 10 and increments x to 11.
	{
		System.out.println("x's new value: " + x); // Prints 11. The change inside y's variable initializer above is reflected.
		System.out.println("y's value: " + y); // Prints 10.
	}
}</code></pre>
	<p>
		If a <code>new Test();</code> object is created, the above code will
		print the following:
	</p> <pre><code class="output">x's initial value: 10
x's new value: 11
y's value: 10</code></pre>
</span>
<h3>Constraints</h3>
<p>
	Both <code>static</code> and instance initializers are disallowed from
	referencing a field if the following are true:
</p>
<ol>
	<li>The field is declared textually <i>after</i> the occurrence of the
		initializer,
	</li>
	<li>the field is of the same type as the initializer (<code>static</code>
		or instance), and
	</li>
	<li>the reference is through a simple name such as <code>x</code>
		(rather than a qualified name such as <code>this.x</code> or <code>ClassName.x</code>).
	</li>
</ol>
<p>
	This disallows initializers from directly referring to fields in a <i>forward-reference</i>
	fashion.
</p>
<h4>
	<code>final</code> Fields
</h4>
<p>
	There are additional constraints that apply to both types of
	initializers and their respective types of fields if the fields are
	marked <code>final</code>, regarding...
</p>
<h5>
	Initialization of <code>final</code> Fields
</h5>
<ul>
	<li><i>Class</i> initialization must assure that every <code>static</code>
		<code>final</code> field be assigned to exactly once through any
		branch of execution.<sup info=2></sup><span info=2>This allows a <code>static
				final</code> variable to be declared without being given a value in
			the declaration, but rather to be given a value further in the type
			in a <code>static</code> initializer block. E.g.: <pre><code>class X {
	static final int someNumb;
	static final String str = "Some String";
	static final Map&lt;String, Integer&gt; myMap = new HashMap&lt;&gt;();
	
	X() {	}
	
	static {
		myMap.put(str, str.hashCode()); // Put something into the map.
		someNumb = myMap.hashCode(); // Finally, initialize someNumb.
	}
}</code></pre></span></li>
	<li><i>Instance</i> initialization must assure that every <code>final</code>
		instance field be assigned to exactly once through any branch of
		execution, including through code executed in any constructor.<sup
		info=3></sup> <span info=3> <!-- TODO: Describe constructor 'paths' taken during initialization -->
	</span></li>
</ul>
<h5>
	Reference of Uninitialized <code>final</code> Fields
</h5>
<!-- TODO: Describe how final fields ADDITIONALLY cannot be referenced before being given a <i>value</i> (not just being declared) -->
<h4>Static Initializers</h4>
<p>
	<!-- TODO: Describe how static initializers also cannot refer to instance stuff, such as instance fields, <code>this</code>, <code>super</code>, instance methods, etc., since they operate in a static context. -->
</p>
<h2>Examples</h2>
<div class="example">
	<h4>Simple Example</h4>
	<pre><code>public class Dog {
	String q = "ABC"; // "Conventional" initialization code: give field a value.
	{
		System.out.println("First Statement");
		System.out.println("Second Statement");
	}
}</code></pre>
	<p>
		Simply creating a <code>new Dog();</code> will cause the initializer
		block to run, resulting in the output:
	</p>
	<pre><code class="output">First Statement
Second Statement</code></pre>
</div>