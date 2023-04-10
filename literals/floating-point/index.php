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
		<td><span>decimal-number</span> <span>float-suffix</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><span>decimal-number</span> <span>exponent</span></td>
	</tr>
	<tr>
		<td>3</td>
		<td><span>decimal-number</span> <span>exponent</span> <span>float-suffix</span></td>
	</tr>
	<tr>
		<td>4</td>
		<td><span>hex-number</span> <span>binary-exponent</span> <span
			class="optional">float-suffix</span></td>
	</tr>
</table>
<p>
	<i>where</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">decimal-number</span></td>
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
		<td><span class="syntax-piece">hex-number</span></td>
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
		<td>is one of: <code>f</code>, <code>F</code>, <code>d</code>, or <code>D</code>.
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
			followed by one or more decimal digits.
		</td>
	</tr>
</table>