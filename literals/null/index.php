<?php t("Javaref - Null Literals", "The null value expresses the special null value in source code, and can be assigned to any reference type.");?>
<h1>Null Literal</h1>
<p class="description">
	A literal (textual) expression of the <code>null</code> value in source
	code.
</p>
<p>
	The <code>null</code> literal is used to denote the special null value,
	which cast to any reference type. There is only one null value whose
	type is the null type. The null type cannot be expressed in Java code.
</p>
<h2>Syntax</h2>
<p>The Null Literal has one form:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><code>null</code></td>
	</tr>
</table>

<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> The <code>null</code> literal.
	Parsed as a single token.
</p>
<h2>Usage</h2>
<p>
	The null value is a special type of value that's used to represent the
	<i>lack</i> of information. The <code>null</code> literal is used to
	explicitly write the null value in source code:
</p>
<pre><code>String x = null;</code></pre>
<p>
	The <code>null</code> value is assignable to any reference type,
	including variables of any type parameter, even if the type is not
	visible (see <a href="#notes.1">note 1</a>).
</p>
<h2>Examples</h2>
<h3>Method Invocation</h3>
<p>
	Invoking a method on the null value results in a <code>java.lang.NullPointerException</code>.
	Doing so requires that the <code>null</code> value be cast to some
	reference type, such as <code>String</code>:
</p>
<pre><code>int x = ((String) null).length(); // throws a NullPointerException</code></pre>
<p>or more simply:</p>
<pre><code>((String) null).length(); // throws a NullPointerException</code></pre>
<h3>
	Throwing <code>null</code>
</h3>
<p>
	The <code>null</code> literal can be the operand of the <code>throw</code>
	operator in a throw statement:
</p>
<pre><code>throw null;</code></pre>
<p>
	This creates and throws a <code>java.lang.NullPointerException</code>.
</p>
<h2>Notes</h2>
<ol>
	<li id="notes.1">
		<p>
			The <code>null</code> literal can be used to call a function that has
			parameters of inaccessible type. For example:
		</p> <pre><code>class A {
	private static class Hidden {

	}

	public static void secureMethod(Hidden hidden) {

	}
}

class B {
	public static void test() {
		// Call A.secureMethod(A.Hidden) without having an instance of the class, A.Hidden
		A.secureMethod(null); // null is assignable to A.Hidden, so no instance of A.Hidden needed
		// A.secureMethod(new A.Hidden()); // Not allowed; A.Hidden is private
	}
}</code></pre>
	</li>
</ol>
<?php

b();
