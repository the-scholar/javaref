<?php t("Javaref - Floating Point Literals");?>
<h1>Floating Point Literals</h1>
<p class="description">A direct (literal) expression of a floating point
	value in source code.</p>
<p>
	Float literals are used to directly write a decimal value (or any <code>float</code>
	or <code>double</code>) in source code. Floating point literals have
	type <code>double</code> or <code>float</code>, depending on how
	they're specified.
</p>
<h2>Syntax</h2>
<p>Floating point literals can be expressed through four forms:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece">decimal-significand</span> <span
			class="syntax-piece">float-suffix</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><span class="syntax-piece">decimal-significand</span> <span
			class="syntax-piece">exponent</span></td>
	</tr>
	<tr>
		<td>3</td>
		<td><span class="syntax-piece">decimal-significand</span> <span
			class="syntax-piece">exponent</span> <span class="syntax-piece">float-suffix</span></td>
	</tr>
	<tr>
		<td>4</td>
		<td><span class="syntax-piece">hex-significand</span> <span
			class="syntax-piece">binary-exponent</span> <span
			class="syntax-piece optional">float-suffix</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">decimal-significand</span></td>
		<td>is one or more decimal digits (<code>0</code>, <code>1</code>, <code>2</code>,
			<code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>,
			<code>8</code>, <code>9</code>), possibly with one decimal point (<code>.</code>)
			before, after, or in between any of the digits.<sup info=1></sup><span
			info=1>In other words, it is one of:
				<ol>
					<li>A decimal point followed by one or more decimal digits, e.g. <code>.439</code>,
					</li>
					<li>one or more decimal digits followed by a decimal point, e.g. <code>1.</code>,
						or
					</li>
					<li>one or more decimal digits followed by a decimal point and then
						one or more decimal digits, e.g. <code>0.3</code>.
					</li>
				</ol>
		</span>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">hex-significand</span></td>
		<td>is the string prefix <code>0x</code> or <code>0X</code>, followed
			by one or more hexadecimal digits (<code>0</code>, <code>1</code>, <code>2</code>,
			<code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>,
			<code>8</code>, <code>9</code>, <code>a</code>, <code>b</code>, <code>c</code>,
			<code>d</code>, <code>e</code>, <code>f</code>, <code>A</code>, <code>B</code>,
			<code>C</code>, <code>D</code>, <code>E</code>, <code>F</code>),
			possibly with one decimal point (<code>.</code>) before, after, or in
			between any of the digits.<sup info=2></sup><span info=2>In other
				words, it is one of:
				<ol>
					<li><code>0x</code> or <code>0X</code>, followed by a decimal
						point, followed then by one or more hexadecimal digits, e.g. <code>0x.43A</code>,</li>
					<li><code>0x</code> or <code>0X</code>, followed by one or more
						hexadecimal digits, followed then by a decimal point, e.g. <code>0xfff.</code>,</li>
					<li><code>0x</code> or <code>0X</code>, followed by one or more
						hexadecimal digits, followed by a decimal point, followed by one
						or more hexadecimal digits, e.g. <code>0xabc.ef</code>.</li>
				</ol>
		</span>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">float-suffix</span></td>
		<td>is one of the characters <code>f</code>, <code>F</code>, <code>d</code>,
			or <code>D</code>.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">exponent</span></td>
		<td>is the character <code>e</code> or <code>E</code>, possibly
			followed by a sign symbol (either <code>+</code> or <code>-</code>),
			followed by one or more decimal digits.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">binary-exponent</span></td>
		<td>is the character <code>p</code> or <code>P</code>, possibly
			followed by a sign symbol (either <code>+</code> or <code>-</code>),
			followed by one or more decimal<sup info=3></sup> digits. <span
			info=3>Despite the significand of the number being expressed in
				hexadecimal, the <span class="syntax-piece">binary-exponent</span>
				must be specified in decimal. See <a href="#Note-2">Note 2</a>
				below.
		</span>
		</td>
	</tr>
</table>
<p>
	<i>such that...</i>
</p>
<ul>
	<li>Each pair of consecutive digits (including those in the <span
		class="syntax-piece">exponent</span> and <span class="syntax-piece">binary-exponent</span>
		parts) can be separated by any number of underscores, (e.g., <code>0xfa.1bp+01
			== 0xf_a.1_bp+0_1f</code>.
	</li>
</ul>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> A base-10 floating point literal
	using a suffix to indicate whether the literal is of type <code>float</code>
	or <code>double</code>.
</p>
<p>
	<span class="syntax-number">2</span> A base-10 floating point literal
	that specifies an exponent. The literal is always of type <code>double</code>.
</p>
<p>
	<span class="syntax-number">3</span> A base-10 floating point literal
	that specifies both an exponent and a suffix.
</p>
<p>
	<span class="syntax-number">4</span> A base-16 floating point literal
	that specifies a binary exponent and, optionally, a suffix.
</p>
<h2>Interpretation</h2>
<p>
	The value of a floating point literal is calculated by interpreting it
	as a number in scientific notation, and then rounding that number to
	the closest value in the value set for the literal's type. The suffix,
	when included, determines whether the literal is of type <code>double</code>
	or <code>float</code>, and thus determines the corresponding value set<sup
		info=4></sup>. <span info=4>The value set of <code>float</code> is the
		set of all values in the <i>IEEE 754 32-bit single-precision
			floating-point format</i>, and the value set for <code>double</code>
		is the set of all values in the <i>IEEE 754 64-bit double-precision</i>
		format.
	</span>
</p>
<h3>Base-10 Interpretation</h3>
<p>
	If the literal is in base-10 and it includes no exponent, it is simply
	interpreted as a base-10, possibly-fractional number. If an exponent is
	included, then the interpretation of the literal is the <span
		class="syntax-piece">decimal-significand</span> multiplied by <code>10</code>
	to the power of <span class="syntax-piece">exponent</span>.
</p>
<p>
	Denoting the significand as <code>s</code> and the exponent as <code>e</code>,
	the interpretation of a base-10 floating point literal is <code>s
		&times; 10<sup>e</sup>
	</code>.
</p>
<h3>Base-16 Interpretation</h3>
<p>
	If the literal is in base-16, its interpretation is the <span
		class="syntax-piece">hexadecimal-significand</span> multiplied by <code>2</code>
	to the power of <span class="syntax-piece">binary-exponent</span>.
	Denoting the base-16 significand as <code>s</code> and the base-10
	exponent as <code>p</code>, the interpretation of the literal is <code>s
		&times; 2<sup>p</sup>
	</code>.
</p>
<h3>Restrictions on Floating Point Literals</h3>
<p>
	Floating point literals' syntax do not provide a direct means of
	expressing negative values. A floating point literal that, upon being
	rounded to the closest value in its type's value set, rounds to <code>Infinity</code>,
	results in a compile-time error. Additionally, any floating point
	literal that rounds to <code>0</code>, but is not equal to <code>0</code>,
	results in a compile time error. This means that literals which are
	"too big" (e.g., <code>1e99f</code> or <code>1e999d</code>) or "too
	small" (too close to <code>0</code>, e.g. <code>1e-99f</code> or <code>1e-999d</code>)
	to be represented by a <code>float</code> or <code>double</code> will
	raise compile-time errors. See the <a href="#Range-Restrictions">below
		example</a> for examples.
</p>
<p>
	Even if a floating point literal is too large or small to be expressed
	<i>exactly</i> as its corresponding type, so long as rounding the value
	of the literal to the nearest value in the value set does not result in
	<code>0</code> or <code>Infinity</code>, the literal is permitted. For
	example, even though the smallest actual <code>float</code> is
	approximately <code>1.401e-45</code>, the literal <code>0.71e-45f</code>
	is valid, and can be used in code:
</p>
<pre><code>// Use BigDecimal to print exact float value:
System.out.println(new BigDecimal(0.71e-45f));</code></pre>
<p>
	Note, however, that the value of that float literal is rounded to the
	nearest value in the value set for the <code>float</code> type. The
	output of the above code is:
</p>
<pre><code class="output">1.40129846432481707092372958328991613128026194187651577175706828388979108268586060148663818836212158203125E-45</code></pre>
<p>
	which is the smallest representable <code>float</code>.
</p>
<h4>Permissible Floating Point Literals</h4>
<p>
	The exact set of permissible <code>float</code> literals (those
	suffixed with <code>f</code> or <code>F</code>) is comprised of the
	literals exactly equal to:
<ul>
	<li><code>0</code>, or</li>
	<li>any value <i>strictly</i> greater than: <span class="shrink"><code>7.00649232162408535461864791644958065640130970938257885878534141944895541342930300743319094181060791015625</code></span>
		but strictly lesser than: <span class="shrink"><code>340282356779733661637539395458142568448</code></span>.
	</li>
</ul>
<p>
	The exact set of permissible <code>double</code> literals (those that
	have no suffix or have the suffix <code>d</code> or <code>D</code>) is
	comprised of the literals exactly equal to:
</p>
<ul>
	<li><code>0</code>, or</li>
	<li>any value <i>strictly</i> greater than: <span class="shrink"><code>2.4703282292062327208828439643411068618252990130716238221279284125033775363510437593264991818081799618989828234772285886546332835517796989819938739800539093906315035659515570226392290858392449105184435931802849936536152500319370457678249219365623669863658480757001585769269903706311928279558551332927834338409351978015531246597263579574622766465272827220056374006485499977096599470454020828166226237857393450736339007967761930577506740176324673600968951340535537458516661134223766678604162159680461914467291840300530057530849048765391711386591646239524912623653881879636239373280423891018672348497668235089863388587925628302755995657524455507255189313690836254779186948667994968324049705821028513185451396213837722826145437693412532098591327667236328125E-324</code></span>
		but strictly lesser than: <span class="shrink"><code>179769313486231580793728971405303415079934132710037826936173778980444968292764750946649017977587207096330286416692887910946555547851940402630657488671505820681908902000708383676273854845817711531764475730270069855571366959622842914819860834936475292719074168444365510704342711559699508093042880177904174497792</code></span>.
	</li>
</ul>
<p>Any of the literals in the aforementioned sets can be written in a
	syntactically valid Java program.</p>
<h2>Examples</h2>
<div class="example">
	<h4>Simple Usage</h4>
	<p>
		This example demonstrates various powers of 2 declared as base-10 and
		base-16 literals using exponents. <b>Note that <code>^</code> in the
			comments is used to denote exponentiation.
		</b>
	</p>
	<pre><code>// Print 1
System.out.println(1e0);	// 1 * 10^0	= 1
System.out.println(0x1p0);	// 1 * 2^0	= 1

// Print 2
System.out.println(2e0);	// 2 * 10^0	= 2
System.out.println(0x1p1);	// 1 * 2^1	= 2

// Print 4
System.out.println(4e0);	// 4 * 10^0	= 4
System.out.println(0x1p2);	// 1 * 2^2	= 4

// Print 8
System.out.println(8e0);	// 8 * 10^0	= 8
System.out.println(0x1p3);	// 1 * 2^3	= 8

// Print 16
System.out.println(1.6e1);	// 1.6 * 10^1	= 16
System.out.println(0x1p4);	// 1 * 2^4	= 16

// Print 32
System.out.println(3.2e1);	// 3.2 * 10^1	= 32
System.out.println(0x1p5);	// 1 * 2^5	= 32

// Print 64
System.out.println(6.4e1);	// 6.4 * 10^1	= 64
System.out.println(0x1p6);	// 1 * 2^6	= 64

// Print 128
System.out.println(1.28e2);	// 1.28 * 10^2	= 128
System.out.println(0x1p7);	// 1 * 2^7	= 128</code></pre>
	<p>Output:</p>
	<pre><code class="output">1.0
1.0
2.0
2.0
4.0
4.0
8.0
8.0
16.0
16.0
32.0
32.0
64.0
64.0
128.0
128.0</code></pre>
</div>
<div class="example">
	<h4>Suffix Demonstration</h4>
	<p>This example demonstrates the effect of the suffix in a literal:</p>
	<pre><code>Number d = 1.4; // double value 1.4 gets autoboxed into java.lang.Double object
System.out.println(d.getClass());

Number f = 1.4f; // f suffix to denote float; float value gets autoboxed to java.lang.Float object
System.out.println(f.getClass());</code></pre>
	<p>Output:</p>
	<pre><code class="output">class java.lang.Double
class java.lang.Float</code></pre>
	<p>
		Another demonstration, involving an overloaded function that takes
		either <code>float</code> or a <code>double</code>:
	</p>
	<pre><code>class X {
	void test(double input) {
		System.out.println("Double");
	}
	
	void test(float input) {
		System.out.println("Float");
	}
	
	void runTest() {
		test(0.0); // Prints "Double"
		test(0.0d); // Prints "Double"
		test(0.0f); // Prints "Float"
	}
}</code></pre>
	<p>
		Output of calling <code>runTest()</code>:
	</p>
	<pre><code class="output">Double
Double
Float</code></pre>
</div>
<div class="example">
	<h4 id="Range-Restrictions">Range Restrictions</h4>
	<p>
		This example demonstrates the upper "edge" of the set of permissible <code>float</code>
		literals:
	</p>
	<pre><code>// Invalid float; too large:
// float x = 340282356779733661637539395458142568448f; // Float value is out of range.
float y =    340282356779733661637539395458142568447.999f; // Float value is less than the upper bound; this compiles
float z =    340282356779733661637539395458142568447.9999999999999999999999f; // Aribtrarily many digits can be appended.

// System.out.println(x);
System.out.println(y);
System.out.println(z);

// Print exact textual representations of the floats
System.out.println(new BigDecimal(y));
System.out.println(new BigDecimal(z));</code></pre>
	<p>Output:</p>
	<pre><code class="output">3.4028235E38
3.4028235E38
340282346638528859811704183484516925440
340282346638528859811704183484516925440</code></pre>
	<p>
		Notice how the the literal assigned to <code>x</code> is greater than
		the value output by the final print statements. This is due to the
		literals assigned to <code>y</code> and <code>z</code> being rounded
		to the closest valid <code>float</code>, which is what is output in
		the two final print statements.
	</p>
</div>
<h2>Notes</h2>
<ol>
	<li>Since the <span class="syntax-piece">float-suffix</span>, if
		included, is not considered a digit, it may not have an underscore
		before it. For example, <code>0x123p+01_f</code> is syntactically
		invalid. This is because <code>f</code> in this case is an indicator
		as to the type of the literal, rather than a digit that determines the
		literal's value.
	</li>
	<li id="Note-2">Since the characters <code>e</code> and <code>E</code>
		are also hexadecimal digits, when defining a floating point number in
		hexadecimal, <code>p</code> and <code>P</code> are used to indicate
		the exponent part, rather than <code>e</code> or <code>E</code> (as
		are used for the exponent part of decimal floating point literals).
	</li>
</ol>