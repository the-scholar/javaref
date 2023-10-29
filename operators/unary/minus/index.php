<?php t("Javaref - Unary Minus", "The unary minus operator is used to negate a numeric value.");?>
<h1>Unary Minus</h1>
<p class="description">
	The unary minus operator is used to negate a numeric value, (and
	sometimes to promote the value's type to <code>int</code> in the
	process).
</p>
<h2>Syntax</h2>
<p>Unary Minus operators can be used in unary minus expressions. Unary
	minus expressions can be expressed through:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><code>-</code><span class="syntax-piece">operand</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">operand</span></td>
		<td>is a primitive numeric type<sup info=1></sup> or a wrapper type
			corresponding to a primitive numeric type (such as <code>Integer</code>
			or <code>Double</code>). <span info=1>A primitive numeric type is any
				primitive type other than <code>boolean</code>, that is, any of the
				following types:
				<ul>
					<li><code>byte</code></li>
					<li><code>short</code></li>
					<li><code>char</code></li>
					<li><code>int</code></li>
					<li><code>float</code></li>
					<li><code>long</code></li>
					<li><code>double</code></li>
				</ul>
		</span></td>
	</tr>
</table>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> Unary minus expression.
</p>
<h2>Behavior</h2>
<p>The unary minus operator negates its input. For most numbers, this
	transformation is trivial.</p>
<h2>Examples</h2>
<div class="example">
	<h4>Negating Numbers</h4>
	<p>This example uses the unary minus operator twice, once per line:</p>
	<pre><code>int x = -14;
System.out.println(-x);</code></pre>
	<p>Output:</p>
	<pre><code class="output">14</code></pre>
</div>
<div class="example">
	<h4>Numeric Promotion</h4>
	<p>
		Applying the unary minus operator to a value twice will always result
		in the same numeric value, though the type will be <i>promoted</i> if
		it's smaller than <code>int</code>:
	</p>
	<pre><code>System.out.println(- -10); // Prints 10
int minInteger = -2147483648; // Lowest possible integer
System.out.println(- -minInteger); // Prints -2147483648
System.out.println(- -0.0); // Prints 0.0
System.out.println(- -0.0d); // Also prints 0.0</code></pre>
	<p>Output:</p>
	<pre><code class="output">10
-2147483648
0.0
0.0</code></pre>
	<h5>Double-Negation of NaN</h5>
	<p>
		The result of double-negating a value is always that same value, but
		if the value is a floating point <code>NaN</code>, equality
		comparisons will always result in <code>false</code>:
	</p>
	<pre><code>double x = 0.0 / 0; // x is equal to NaN
System.out.println(x == - -x); // Prints false, despite x and - -x being the same value.</code></pre>
	<p>Output:</p>
	<pre><code class="output">false</code></pre>
	<p>
		This is because an equality check between two <code>NaN</code> values
		always results in <code>false</code>.
	</p>
</div>
<h2>Notes</h2>
<ol>
	<li>
		<!-- TODO: Add notes -->
	</li>
</ol>
<?php

b();