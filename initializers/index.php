<?php t("Javaref - Static &amp; Instance Initializers", "Static and instance initializers are used to execute arbitrary code during class initialization or object instantiation.");?>
<h1>Static &amp; Instance Initializers</h1>
<p class="description">Code block used to run arbitrary code during
	class or instance initialization.</p>
<p>
	Static and Instance initializers (sometimes called <i>initializer
		blocks</i>) solve the issue of it being cumbersome or impossible to
	run arbitrary code during the initialization of a class or an
	interface. Both types of initializers are blocks of code.
</p>
<h2>Syntax</h2>
<p>Initializer Blocks have the following forms:</p>
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
<h2>Behavior</h2>
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
	The variable initializers in instance field declarations and the
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
<h2>Constraints</h2>
<h3>Placement</h3>
<p>
	Both <code>static</code> and instance initializers are permitted only
	in the body of a type. <code>static</code> initializers may be present
	in any <code>static</code> class or in an <code>enum</code> (which is
	implicitly <code>static</code>). Specifically, <code>static</code>
	initializers may be present in:
</p>
<ul>
	<li><code>static</code> classes,</li>
	<li>top-level classes,</li>
	<li><code>enum</code>s, after the <code>enum</code> constant header.</li>
</ul>
<p>
	Instance initializers may be placed in any <code>class</code> body,
	(including inner, local, and anonymous classes), or in <code>enum</code>s
	after the <code>enum</code> constant header.
</p>
<h3>Field Reference</h3>
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
	<li>the reference is through a simple name<sup info=2></sup> such as <code>x</code>.
		<span info=2>A simple name is:
			<ul>
				<li>for <code>static</code> fields, the field's unqualified name
					(e.g. <code>x</code> instead of <code>ClassName.x</code>).
				</li>
				<li>for instance fields, the field's unqalified name (e.g. <code>x</code>)
					or the latter accessed directly through <code>this</code>, (e.g. <code>this.x</code>).
				</li>
			</ul>
	</span>
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
		branch of execution.<sup info=3></sup><span info=3>This allows a <code>static
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
		instance field be assigned to, exactly once, through any branch of
		execution, including through code executed in any constructor.<sup
		info=4></sup> <span info=4>Initialization of any <code>final</code>
			instance field must be done either through the constructors of a
			class or the class's intialization code (field declarations and
			instance initializer blocks). It cannot be through both, otherwise a
			compile-time error results, and it must be done through one so that
			the field is initialized by the time construction completes.
	</span></li>
</ul>
<p>
	Such initialization <b>must</b> be performed through simple reference;
	it is always a compile-time error to attempt to assign to a <code>final</code>
	field other than through a simple reference.
</p>
<h5>
	Reference of Uninitialized <code>final</code> Fields
</h5>
<p>
	It is a compile time error if an initializer block attempts to refer to
	a <code>final</code> field through simple reference, before its
	initialization, unless that reference is as the left-hand side of an
	assignment. <code>final</code> fields must be initialized (via simple
	reference) before they can be referenced in ways other than assignment
	(by simple reference).
</p>
<h4>
	<code>static</code> Initializers
</h4>
<p>
	<code>static</code> initializers may not directly refer to instance
	members, as there is no implicitly accessible state available for <code>static</code>
	code. References to instance members must be qualified with an
	expression.
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
<div class="example">
	<h4>Order of Execution</h4>
	<pre><code>class Test {
	{
		System.out.println("Point 1: " + ((Test) this).x); // At this point, x has not been declared, and so has value 0.
		// x++;			// x is not yet declared.
		// this.x++;	// x is not yet declared.
		((Test) this).x++; // x is now 1.
		System.out.println("Point 2: " + ((Test) this).x);
	}
	int x = 5; // x is set to 5.
	{
		System.out.println("Point 3: " + x);
		// Increment x 3 times:
		x++;
		this.x++;
		((Test) this).x++; // x is now 8
		System.out.println("Point 4: " + x);
	}
}</code></pre>
	<p>This code prints the following:</p>
	<pre><code class="output">Point 1: 0
Point 2: 1
Point 3: 5
Point 4: 8</code></pre>
</div>
<div class="example">
	<h4>
		Mixing <code>static</code> and Instance Initializers
	</h4>
	<p>
		Instance initializer code can access <code>static</code> fields:
	</p>
	<pre><code>public class Example {
	static int count;
	String str;
	{
		str = "Item #" + count++;
	}

	public static void main(String[] args) {
		System.out.println(new Example().str); // Create one example object.
		System.out.println(new Example().str); // Create another.
		System.out.println(new Example().str);
		
		Example nextExample = new Example(), lastExample = new Example();
		System.out.println();
		System.out.println("Last two Example objects:");
		System.out.println(nextExample.str);
		System.out.println(lastExample.str);
	}
}</code></pre>
	<p>Output:</p>
	<pre><code class="output">Item #0
Item #1
Item #2

Last two Example objects:
Item #3
Item #4</code></pre>
</div>
<div class="example">
	<h4>Initializers Interleaved With Members</h4>
	<pre><code>public class C {
	static {
		System.out.println("Initializer 1 (Static)");
	}
	{
		System.out.println("Initializer 2 (Instance)");
	}
	
	C() {
		System.out.println("Constructor");
	}
	
	static {
		System.out.println("Initializer 3 (Static)");
	}
	{
		System.out.println("Initializer 4 (Instance)");
	}
	
	public static void main(String[] args) {
		System.out.println("Main method started.");
		new C();
	}
}</code></pre>
	<p>Output:</p>
	<pre><code class="output">Initializer 1 (Static)
Initializer 3 (Static)
Main method started.
Initializer 2 (Instance)
Initializer 4 (Instance)
Constructor</code></pre>
</div>
<h2>Notes</h2>
<ol>
	<li>It is possible to declare a <code>final</code> instance field
		without initializer blocks or a constructor, even when that field is
		declared without a variable initializer: <pre><code>public class InitializerTest {
	final int x;
	final int y;
	final int z;
	final double test = x = y = z = 10;
}</code></pre>
		<p>
			In this example, the three <code>int</code> variables are each set to
			<code>10</code> and the variable <code>test</code> is set to <code>10.0</code>.
			This is also possible for <code>static</code> fields.
		</p> <pre><code>public class InitializerTest {
	static final int x;
	static final int y;
	static final int z;
	static final double test = x = y = z = 10;
}</code></pre>
	</li>
	<li>It is possible to access a field in code that has not yet been
		declared in multiple ways. For example, by using a non-simple name: <pre><code>public class Test {
	static final int x = Test.y;
	static final int y = Test.x;
}</code></pre>
		<p>
			As with other fields, the default value of <code>y</code>, (which is
			what <code>Test.y</code> evaluates to in <code>x</code>'s variable
			initializer), is <code>0</code>, so both <code>x</code> and <code>y</code>
			are initialized to the value <code>0</code>.
		</p>
	</li>
	<li>It is possible for instance initializer code to be executed before
		<code>static</code> initializer code completes, particularly in the
		case that <code>static</code> initializer code attempts to create an
		object of the class currently being initialized: <pre><code>class Test {
	// Instance initializer code
	{
		System.out.println(x);
	}
	
	// Static initializer code
	static int x;
	static {
		new Test(); // Create new Test before static initialization has completed. This causes the instance initializer to be run.
		// The object instantiation prints 0, since x has not been assigned to yet.
		
		x = 10000;
	}
}</code></pre>
		<p>Output:</p> <pre><code class="output">0</code></pre>
	</li>
	<li>It is possible to run code before the <code>main(String[])</code>
		method begins by including such code in a <code>static</code>
		initializer block in the class containing the <code>main(String[])</code>
		method: <pre><code>public class Test {
	private static int x;
	static {
		Scanner s = new Scanner(System.in);
		System.out.print("Please enter a number: ");
		x = s.nextInt();
	}
	
	public static void main(String[] args) {
		System.out.println("You entered " + x + " before the main method was called.");
	}
}</code></pre>
		<p>Calling this code and providing the command-line input:</p> <pre><code
			class="input">14
</code></pre>
		<p>will print the output:</p> <pre><code class="output">You entered 14 before the main method was called.</code></pre>
	</li>
	<li>It is possible to include a <code>static</code> initializer inside
		an <code>interface</code> (including <code>@interface</code>s)
		indirectly, by declaring a <code>class</code> or <code>enum</code>
		within the interface and including the <code>static</code> initializer
		inside that.
	</li>
</ol>
<?php

b();