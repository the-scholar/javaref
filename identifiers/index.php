<?php t("Javaref - Identifiers", "Identifiers are the names of Java constructs in a source file. They're used to name methods, variables, and types");?>
<h1>Identifiers</h1>
<p class="description">A string of characters used to name (or otherwise
	identify) a Java construct.</p>
<p>
	Identifiers are used in source code for the names of variables,
	methods, types, type parameters, and packages.<sup info=1></sup> Each
	identifier is parsed as a separate token during tokenization of a Java
	program. Keywords are not considered identifiers.
</p>
<span info=1>For example, <pre><code>int x = 10;</code></pre>
	<p>
		<code>x</code> is an identifier.
	</p>
</span>
<h2>Syntax</h2>
<p>Identifiers consist of:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece">ident-start-char</span><span
			class="syntax-piece optional">ident-body-chars</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">ident-start-char</span></td>
		<td>is either <code>_</code>, <code>$</code>, or any valid letter (<a
			href="#Composition">see below</a>).
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">ident-body-chars</span></td>
		<td>is a sequence of characters composed entirely of: either <code>_</code>,
			<code>$</code>, or any valid letter or digit (<a href="#Composition">see
				below</a>). The sequence may be of any size.
		</td>
	</tr>
</table>
<p>
	<i>such that...</i>
</p>
<ul>
	<li>No identifier may be identical to a keyword, the <code>null</code>
		literal, or either Boolean literal.
	</li>
</ul>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> An identifier, used to name a
	variable, method, class or other type, type parameter, etc.
</p>
<h2 id="Composition">Composition</h2>
<p>
	Java identifiers are composed of Unicode code-points<sup info=2></sup>
	(characters), defined by the Unicode standard. The code-points that can
	comprise an identifier are defined by the static Java API methods <code>Character.isJavaIdentifierStart(int)</code>
	and <code>Character.isJavaIdentifierPart(int)</code>, for the <span
		class="syntax-piece">ident-start-char</span> and each character in <span
		class="syntax-piece">ident-body-chars</span>, respectively; if either
	method returns <code>true</code> for a character, then the respective
	syntax element can be composed of that character in a valid identifier.
</p>
<span info=2>The Unicode Standard technically specifies <i>code-points</i>,
	not characters. In Java (and the Java specification), characters are
	16-bit data stored by the well-known <code>char</code> type. <code>String</code>s
	are sequences of <code>char</code>s. Some Unicode code-points are now
	larger than 16 bits, so two characters in Java are required to
	represent them (totaling 32 bits). (This is why some methods in the <code>Character</code>
	and <code>String</code> classes are overloaded to accept an <code>int</code>,
	which is 32 bits.) Because of such, the Java documentation
	distinguishes between <i>characters</i> and <i>code-points</i>, the
	latter being represented by an <code>int</code> in Java, and the former
	being represented by a <code>char</code>. Code-points are what most
	understand a character to be: A concept of a letter, digit, or other
	symbol (primarily) used for communication.
	<p>When referring to a Unicode code-point, this document uses the term
		code-point.</p>
</span>
<h3>
	Permitted Characters for <span class="syntax-piece">ident-start-char</span>
</h3>
<p>
	The first character of a Java identifier may be any Unicode code-point
	whose general category<sup info=3></sup>:
</p>
<span info=3>Unicode groups characters into <i>blocks</i> and into <i>general
		categories</i> (and sub-categories). Blocks are generally used to
	group code-points by language, function, etc. A character can only be
	in one block and blocks are contiguous. General Categories are an <i>attribute</i>
	of code-points. Each code-point is assigned exactly one general
	category and sub-category (known as the Major and minor categories,
	respectively).
</span>
<ul>
	<li>begins with <code>L</code> (i.e., the code-point's major category
		is <i>Letter</i>),
	</li>
	<li>is <code>Nl</code> (i.e., the code-point is a: <i>Number, letter</i>),
	</li>
	<li>is <code>Sc</code> (i.e., the code-point is a: <i>Symbol, currency</i>),
	</li>
	<li>is <code>Pc</code> (i.e., the code-point is a: <i>Punctuation,
			connector</i>).
	</li>
</ul>
<p>
	Note that this encompasses the <b>overwhelming majority</b> of Unicode
	code-points; more than 130 thousand characters can be used to begin a
	Java identifier.
</p>
<h3>
	Permitted Characters for <span class="syntax-piece">ident-body-chars</span>
</h3>
<p>
	Subsequent characters in a Java identifier may be any code-point that
	is <i>ignored</i> (<a href="#IgnoredCharacters">see below</a>), can
	begin a Java identifier, or any codepoint whose general category:
</p>
<ul>
	<li>is <code>Nd</code> (i.e., the code-point is a: <i>Number, decimal
			digit</i>),
	</li>
	<li>is <code>Mc</code> (i.e., the code-point is a: <i>Mark, spacing
			combining</i>),
	</li>
	<li>is <code>Mn</code> (i.e., the code-point is a: <i>Mark, nonspacing</i>)
	</li>
	<li>is <code>Cf</code> (i.e., the code-point is an: <i>Other, format</i>;
		note that these characters are <a href="#IgnoredCharacters">ignored
			characters</a>).
	</li>
</ul>
<p id="IgnoredCharacters">
	Ignored characters are code-points for which <code>Character.isIdentifierIgnorable(int)</code>
	returns <code>true</code>. This includes those whose general category
	is <code>Cf</code> (as listed above), and all code-points from:
</p>
<ul>
	<li><code>\u0000</code> (the <i>null</i> character) to <code>\u0008</code>
		(the <i>backspace</i> character),</li>
	<li><code>\u000E</code> (the <i>shift out</i> character) to <code>\u001B</code>
		(the <i>escape</i> character),</li>
	<li><code>\u007F</code> (the <i>delete</i> character) to <code>\u009F</code>
		(the <i>application program command</i> character).</li>
</ul>
<p>These characters are not actually ignored, but are rather allowed as
	subsequent characters in an identifier.</p>
<h2>Examples</h2>
<div class="example">
	<h4>Simple Variable Declarations</h4>
	<pre><code>int x, y, z;
double dbl1, dbl2, dbl3, dbl4, dbl5;
Object text = "Some text";</code></pre>
</div>
<div class="example">
	<h4>Identifiers with Greek Letters</h4>
	<pre><code>int α = 10;
double β = 20;
System.out.println(β - α);</code></pre>
</div>
<div class="example">
	<h4>Combining Mark in Identifier</h4>
	<p>Combining marks allowed in identifiers can graphically extend
		upwards when a program renders a variable name (or other identifier)
		in Java source code:</p>
	<pre><code>int xͫ = 14;
xͫ++;
System.out.println(xͫ);</code></pre>
	<p>Output:</p>
	<pre><code class="output">14</code></pre>
	<p>Combining marks are often small, which can make it hard to
		differentiate identifiers:</p>
	<pre><code>void someͫMethod() {
	System.out.println("Failure");
}

void someMethod() {
	System.out.println("Success");
}

public static void main(String[] args) {
	someͫMethod(); // Prints "Failure"
}</code></pre>
	<p>Output:</p>
	<pre><code class="output">Failure</code></pre>
</div>
<div>
	<h4>Examples From Code Snippets</h4>
</div>
<h2>Notes</h2>
<ol>
	<li><p>Unicode characters can be used to produce graphically disruptive
			identifiers in source code. This is often achieved through the usage
			of combining diacritical marks:</p> <pre><code>int x̅̅̅̅̅̅̅̅̅̅̅̅̅̅̅̅̅̅̅̅̅̅ = 10;</code></pre>
		<p>This can produce visual clutter in IDEs and other text editors.
			Following is an example image of how Eclipse IDE renders the above
			code:</p> <img src="overbars-eclipse-small.png">
		<p>Changing the zoom level in Eclipse affects character rendering and
			the height that the stacked combining diacritical marks can reach far
			enough to cover text two lines above:</p> <img
		src="overbars-eclipse-large.png">
		<p>When used profusely, identifiers with combining characters may
			distend and cover other parts of code, as the following declaration
			may do in various IDEs:</p> <pre><code id="VarInternalRef">int v̶̫͗̾̀a̷̻̟̿̂́̿ṛ̴̡̢̳͒i̵̮̾̇͊͠ả̷͍͂̈́͝b̵͍̠̬̼̊͑l̷̰̩̍͗̈́e̴͕̩̗͑̔͋ͅ = 12;</code></pre>
	</li>
	<li><p>
			Unicode characters can also be used to produce graphically equivalent
			variables which are actually different. This can be done using
			various characters that have no visual appearance, such as the
			zero-width space (<code>\u200B</code>):
		</p> <pre><code>boolean javaref = true;
boolean javaref​ = false;
if (javaref​)
	System.out.println(javaref);
else
	System.out.println(javaref​);</code></pre>
		<p>Output:</p> <pre><code class="output">false</code></pre>
		<p>
			The above code snippet contains a zero width space in the occurrences
			of <code>javaref</code> in the <code>if</code>'s condition and the
			second print statement. The <code>if</code>'s condition therefore
			evaluates to <code>false</code> and the <code>else</code> block is
			executed, printing <code>false</code>.
		</p></li>
</ol>
<h2>External Links</h2>
<ol id="Linklist">
	<li id="Link1"
		title="The Unicode Standard, Version 15.0.0, Chapter 4: General Category"><a
		href="https://www.unicode.org/versions/Unicode15.0.0/ch04.pdf#page=15">Unicode
			Standard: General Category</a> - Precise description of <i>General
			Category</i> defined by the Unicode Standard. (The link leads to
		version 15.0.0 of the standard.)</li>
	<li title="Unicode Utility Webapp"><a
		href="https://util.unicode.org/UnicodeJsps/list-unicodeset.jsp">Unicode
			Utilities: UnicodeSet</a> - A webapp provided by <i>Unicode.org</i>
		which allows querying all characters present in a general category
		(amongst other operations).</li>
	<li title="Java 8 Character, Class Documentation"><a
		href="https://docs.oracle.com/javase/8/docs/api/java/lang/Character.html">Java
			Character Class Documentation</a> - Documentation for the <code>Character</code>
		class. See the <a
		href="https://docs.oracle.com/javase/8/docs/api/java/lang/Character.html#isJavaIdentifierStart-int-"><code>isJavaIdentifierStart(int)</code></a>
		and <a
		href="https://docs.oracle.com/javase/8/docs/api/java/lang/Character.html#isJavaIdentifierPart-int-"><code>isJavaIdentifierPart(int)</code></a>
		method documentation for more details.</li>
	<li title="LingoJam Zalgo Text Generator"><a
		href="https://lingojam.com/ZalgoText">Zalgo Text Generator</a> - Used
		to generate the <code>int</code> variable <a href="#VarInternalRef">above</a>.</li>
</ol>
<?php

b();