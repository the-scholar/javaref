<?php t("Javaref - Integer Literals", "An integer literal is a direct (textual) expression of a whole number in Java source code.");?>
<h1>Int Literals</h1>
<p class="description">A direct (literal) expression of an integral,
	(non-decimal), value in source code.</p>
<p>
	Integer literals are used to directly write the value of an integral
	type in source code. They can be used to specify an exact value for <code>char</code>s,
	<code>byte</code>s, <code>short</code>s, <code>int</code>s, and <code>long</code>s.
</p>
<h2>Syntax</h2>
<p>Integer literals can be expressed through four forms:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece">decimal-literal</span><span
			class="syntax-piece optional">integer-type-suffix</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><span class="syntax-piece">hexadecimal-literal</span><span
			class="syntax-piece optional">integer-type-suffix</span></td>
	</tr>
	<tr>
		<td>3</td>
		<td><span class="syntax-piece">octal-literal</span><span
			class="syntax-piece optional">integer-type-suffix</span></td>
	</tr>
	<tr>
		<td>4</td>
		<td><span class="syntax-piece">binary-literal</span><span
			class="syntax-piece optional">integer-type-suffix</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">decimal-literal</span></td>
		<td>is either:
			<ol>
				<li>the digit <code>0</code>, or
				</li>
				<li>a non-zero decimal digit (<code>1</code>, <code>2</code>, <code>3</code>,
					<code>4</code>, <code>5</code>, <code>6</code>, <code>7</code>, <code>8</code>,
					<code>9</code>)
				</li>
			</ol>followed by any number of decimal digits (<code>0</code>, <code>1</code>,
			<code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>,
			<code>7</code>, <code>8</code>, <code>9</code>)
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">hexadecimal-literal</span></td>
		<td>is the string prefix<sup info=1></sup> <code>0x</code> or <code>0X</code>,
			followed by at least one hexadecimal digit (<code>0</code>, <code>1</code>,
			<code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, <code>6</code>,
			<code>7</code>, <code>8</code>, <code>9</code>, <code>a</code>, <code>b</code>,
			<code>c</code>, <code>d</code>, <code>e</code>, <code>f</code>, <code>A</code>,
			<code>B</code>, <code>C</code>, <code>D</code>, <code>E</code>, <code>F</code>)
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">octal-literal</span></td>
		<td>is the digit <code>0</code> followed by at least one octal digit (<code>0</code>,
			<code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>,
			<code>6</code>, <code>7</code>)
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">binary-literal</span></td>
		<td>is the string prefix<sup info=1></sup> <code>0b</code> or <code>0B</code>,
			followed by at least one binary digit (<code>0</code>, <code>1</code>)
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">integer-type-suffix</span></td>
		<td>is the letter <code>L</code> or <code>l</code></td>
	</tr>
</table>
<span info=1>The prefix itself is not composed of digits and therefore
	cannot have interleaved underscores; <code>0_x123</code> and <code>0x_123</code>
	are both invalid, for example.
</span>
<p>
	<i>such that...</i>
</p>
<ul>
	<li>Each pair of consecutive digits (including the <code>0</code>
		prefix digit for <span class="syntax-piece">octal-literal</span>) can
		be separated by any number of underscores, (e.g., <code>0x47ab ==
			0x47_a__b</code>).
	</li>
</ul>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> A decimal integer literal (base
	10), using digits <code>0</code> through <code>9</code> .
</p>
<p>
	<span class="syntax-number">2</span> A hexadecimal integer literal
	(base 16), using the same digits as base 10 as well as digits <code>A</code>
	through <code>F</code> with values <code>10</code> through <code>15</code>.
	Capitalization is ignored, so <code>A</code> is equivalent to <code>a</code>,
	<code>B</code> to <code>b</code>, etc.
</p>
<p>
	<span class="syntax-number">3</span> An octal integer literal (base 8),
	using digits <code>0</code> through <code>7</code> . The <code>0</code>
	prefix is only used to signify that the literal is in octal notation
	and does not otherwise affect the literal's value.
</p>
<p>
	<span class="syntax-number">4</span> A binary integer literal (base 2),
	using digits <code>0</code> and <code>1</code>.
</p>
<h2>Interpretation</h2>
<p>Decimal integer literals can represent:</p>
<ul>
	<li>the number 0, and</li>
	<li>positive numbers ranging from decimal 1 to 9223372036854775808.</li>
</ul>
<p>Binary, octal, and hexadecimal integer literals can represent:</p>
<ul>
	<li>the number 0,</li>
	<li>positive numbers ranging from 1 to 9223372036854775807, and</li>
	<li>negative numbers ranging from -1 through -9223372036854775808.</li>
</ul>
<h3>Decimal Interpretation</h3>
<p>
	Decimal literals are interpreted as written. This means that one can
	expect the same text that makes up such a literal in source code to be
	printed if such literal is an argument of <code>System.out.println()</code>:
</p>
<pre><code>System.out.println(1234567890);</code></pre>
<p>Output:</p>
<pre><code>1234567890</code></pre>
<p>
	It is not possible for a decimal literal to represent a negative
	number; negative numbers derived from decimal literals can be obtained
	using the <a href="/operators/unary-minus">unary minus</a> operator
	with the decimal literal as the operand. Special usage is granted to
	the literals <code>2147483648</code> and <code>9223372036854775808L</code>,
	which can both be used only as the operand of the <a
		href="operators/unary-minus">unary minus</a> operator. Note that <code>2147483648L</code>
	(and <code>2147483648l</code>) can be used in contexts other than as
	the operand of the <a href="operators/unary-minus">unary minus</a>
	operator.
</p>
<p>
	Decimal literals are required to have the long suffix (<code>l</code>
	or <code>L</code>) if they are <i>out of range</i> for the type <code>int</code>
	and can, thus, only be represented as a <code>long</code> literal. This
	occurs when a decimal literal is greater in value than 2147483647 and
	is not the literal <code>2147483648</code> as the operand of a <a
		href="operators/unary-minus">unary minus</a>:
</p>
<pre><code>long x = 2147483647; // In-range for type int
long y = 2147483648L; // Out of range for int, requires L (or l) suffix
long z = 10000000000L; // Out of range for int

long negative = -2147483648; // Suffix not required since literal is 2147483648 and is operand for unary minus (-)</code></pre>
<h3>Binary, Octal, and Hexadecimal Literals Interpretation</h3>
<p>
	Binary, octal, and hexadecimal literals are interpreted as if used to
	specify the <i>bits</i> of a number, in <a
		href="https://en.wikipedia.org/wiki/Two%27s_complement">two's
		complement</a>.
</p>
<ul>
	<li>If the literal has no suffix, then that number is 32 bits (the size
		of an <code>int</code>).
	</li>
	<li>Otherwise, if the <code>L</code> or <code>l</code> suffix is
		specified, that number is 64 bits (the size of a <code>long</code>).
	</li>
</ul>
<h4>Two's Complement</h4>
<p>
	In two's complement format, the sign bit is used to denote the <i>sign</i>
	of the number and the remaining bits are used to determine the number's
	magnitude. The number is negative if the leftmost bit is <code>1</code>,
	otherwise the number is positive. To determine the magnitude of the
	number, the remaining (value) bits are interpreted as a positive
	integer number and are added to,
</p>
<ul>
	<li>the minimum possible value of the number if the sign bit is <code>1</code>,
		or
	</li>
	<li><code>0</code>, if the sign bit is <code>0</code>.</li>
</ul>
<p>
	The sign bit can be interpreted as adding the lowest (negative) value
	representable by the number, to the number when <code>1</code>, and
	having no effect on the number when <code>0</code>. See the <a
		href="#twos-complement">examples below</a> for more details.
</p>
<h4>Octal &amp; Hexadecimal</h4>
<p>Octal and hexadecimal literals' formats provide compact ways to
	specify the bits of a number in the same way that binary literals do.
	Each hexadecimal digit expresses 4 bits and each octal digit expresses
	3.</p>
<pre><code>int low = 0x8_0000000; // 8 hex digits is 32 bits of data
int lowInBinary = 0b1000_0000000000000000000000000000;
System.out.println(low);
System.out.println(lowInBinary);</code></pre>
<p>Output:</p>
<pre><code class="output">-2147483648
-2147483648</code></pre>
<h2>Examples</h2>
<div class="example">
	<h4>Simple Usage</h4>
	<p>
		<code>41</code> declared both as binary and decimal literals:
	</p>
	<pre><code>int x = 0b00101001; // 41
int y = 41;
System.out.println(x == y); // Prints true</code></pre> Output: <pre><code
		class="output">true</code></pre>
	<p>
		A for loop that loops <code>16</code> times, starting at <code>0xF</code>
		( <code>15</code> ), down to <code>0</code> :
	</p>
	<pre><code>for (int i = 0xF; i >= 0x0; i--)
	System.out.println(i);	// println(...) prints integers in decimal (base 10)</code></pre>
	<p>Output:</p>
	<pre><code class="output">15
14
13
12
11
10
9
8
7
6
5
4
3
2
1
0</code></pre>
</div>
<div class="example">
	<h4>Bitflags &amp; Bitmasks</h4>
	<p>
		Demonstration of bitmasking using a bitflag named <code>FLAG</code> :
	</p>
	<pre><code>int x = 0b0110; // equal to 6
final int FLAG = 0b0001;

// Enable flag:
x |= FLAG;// x is now 0b0111 which is equal to 7

// Disable flag:
x ^= FLAG;// x is now 0b0110 which is 6

// Check for flag:
boolean flagOn = (x &amp; FLAG) != 0;
if (flagOn)
   doSomething();</code></pre>
</div>
<div class="example">
	<h4>Octal Numbers</h4>
	<p>Example depicting equivalence between 3-bit parts of a number and
		single octal digits:</p>
	<pre><code>// Each octal digit is 3 bits
System.out.println(0b111 == 07); // true
System.out.println(0b111000 == 070); // true

// Octal 7 is binary 111
// Octal 0 is binary 000
System.out.pintln(0b111_000_111_000 == 07070); // true</code></pre>
	Output: <pre><code class="output">true
true
true</code></pre>
</div>
<div class="example">
	<h4 id="twos-complement">Two's Complement &amp; Negative Literals</h4>
	<p>
		A number has its lowest possible value when only its sign bit is <code>1</code>
		and all other bits are <code>0</code>.
	</p>
	<pre><code>int x = 0b1_0000000000000000000000000000000;	// 32 bits. All bits but the sign bit are 0.
				// Notice the leftmost bit (before the underscore); it is the sign bit.
System.out.println(x);</code></pre>
	<p>
		That code outputs: <code>-2147483648</code> which is the minimum value
		of an <code>int</code>.
	</p>
	<p>
		Changing the rightmost value bit to a <code>1</code> will increment
		the number:
	</p>
	<pre><code>int x = 0b1_0000000000000000000000000000001; // Rightmost bit is 1
System.out.println(x);</code></pre>
	<p>
		This code outputs: <code>-2147483647</code>.
	</p>
	<p>
		Changing the sign bit causes the number to be the numeric value of its
		value bits added with <code>0</code>, rather than <code>-2147483648</code>:
	</p>
	<pre><code>int x = 0b0_0000000000000000000000000000001;
System.out.println(x);</code></pre>
	<p>Output:</p>
	<pre><code class="output">1</code></pre>
	<p>The same can be applied to integer literals with the long suffix,
		although those comprise 64 bits rather than 32:</p>
	<pre><code>int x = 0b1_000000000000000000000000000000000000000000000000000000000000000L;
int y = 0b1_000000000000000000000000000000000000000000000000000000000000001L;
int z = 0b0_000000000000000000000000000000000000000000000000000000000000001L;
System.out.println(x);
System.out.println(y);
System.out.println(z);</code></pre>
	<p>Output:</p>
	<pre><code class="output">-9223372036854775808
-9223372036854775807
1</code></pre>
</div>
<h2>Notes</h2>
<ol>
	<li><code>0</code> is the only integer literal whose leftmost digit is
		<code>0</code> that is not an octal literal.</li>
</ol>
<?php b();?>