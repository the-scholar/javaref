<?php t("Java Reference Test");?>
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
		<td><span>decimal-literal</span> <span class="optional">integer-type-suffix</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><span>hexadecimal-literal</span> <span class="optional">integer-type-suffix</span></td>
	</tr>
	<tr>
		<td>3</td>
		<td><span>octal-literal</span> <span class="optional">integer-type-suffix</span></td>
	</tr>
	<tr>
		<td>4</td>
		<td><span>binary-literal</span> <span class="optional">integer-type-suffix</span></td>
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
	10), using digits <code>0</code> through <code>10</code> .
</p>
<p>
	<span class="syntax-number">2</span> A hexadecimal integer literal
	(base 16), using the same digits as base 10 as well as digits <code>A</code>
	through <code>F</code> with values <code>10</code> through <code>15</code>
	. Capitalization is ignored, so <code>A</code> is equivalent to <code>a</code>
	, <code>B</code> to <code>b</code> , etc.
</p>
<p>
	<span class="syntax-number">3</span> An octal integer literal (base 8),
	using digits <code>0</code> through <code>7</code> . The <code>0</code>
	prefix is only used to signify that the literal is in octal notation
	and does not otherwise affect the literal's value.
</p>
<p>
	<span class="syntax-number">4</span> A binary integer literal (base 2),
	using digits <code>0</code> and <code>1</code> .
</p>
<h2>Examples</h2>
<div class="example">
	<h4>Simple Usage</h4>
	<p>
		<code>41</code> declared both as binary and decimal literals:
	</p>
	<pre>
		<code>int x = 0b00101001; // 41
int y = 41;
System.out.println(x == y); // Prints true</code>
	</pre>
	Output:
	<pre>
		<code class="output">true</code>
	</pre>
	<p>
		A for loop that loops <code>16</code> times, starting at <code>0xF</code>
		( <code>15</code> ), down to <code>0</code> :
	</p>
	<pre>
		<code>for (int i = 0xF; i >= 0x0; i--)
	System.out.println(i);	// println(...) prints integers in decimal (base 10)</code>
	</pre>
	<pre>
		<code class="output">15
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
0</code>
	</pre>
</div>
<div class="example">
	<h4>Bitflags &amp; Bitmasks</h4>
	<p>
		Demonstration of bitmasking using a bitflag named <code>FLAG</code> :
	</p>
	<pre>
		<code>int x = 0b0110; // equal to 6
final int FLAG = 0b0001;

// Enable flag:
x |= FLAG;// x is now 0b0111 which is equal to 7

// Disable flag:
x ^= FLAG;// x is now 0b0110 which is 6

// Check for flag:
boolean flagOn = (x &amp; FLAG) != 0;
if (flagOn)
   doSomething();</code>
	</pre>
</div>
<div class="example">
	<h4>Octal Numbers</h4>
	<p>Example depicting equivalence between 3-bit parts of a number and
		single octal digits:</p>
	<pre>
		<code>// Each octal digit is 3 bits
System.out.println(0b111 == 07); // true
System.out.println(0b111000 == 070); // true

// Octal 7 is binary 111
// Octal 0 is binary 000
System.out.pintln(0b111_000_111_000 == 07070); // true</code>
	</pre>
	Output:
	<pre>
		<code class="output">true
true
true</code>
	</pre>
</div>
<h2>Notes</h2>
<ol>
	<li><code>0</code> is the only integer literal whose leftmost digit is
		<code>0</code> that is not an octal literal.</li>
</ol>
<?php b();?>