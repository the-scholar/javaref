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
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span>decimal-significand</span> <span>float-suffix</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><span>decimal-significand</span> <span>exponent</span></td>
	</tr>
	<tr>
		<td>3</td>
		<td><span>decimal-significand</span> <span>exponent</span> <span>float-suffix</span></td>
	</tr>
	<tr>
		<td>4</td>
		<td><span>hex-significand</span> <span>binary-exponent</span> <span
			class="optional">float-suffix</span></td>
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
	the closest <code>double</code> or <code>float</code> value. The
	suffix, when included, determines whether the literal is of type <code>double</code>
	or <code>float</code>.
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