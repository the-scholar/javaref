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
		<td><code>-</code> <span class="syntax-piece">operand</span></td>
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
<h2>Inputs</h2>
<p>
	The unary minus operator can take any primitive numeric type (<code>byte</code>,
	<code>short</code>, <code>char</code>, <code>int</code>, <code>long</code>,
	<code>float</code>, or <code>double</code>) as its operand, but can
	also take any corresponding wrapper type (<code>Byte</code>, <code>Short</code>,
	<code>Character</code>, <code>Integer</code>, <code>Long</code>, <code>Float</code>,
	or <code>Double</code>). If a wrapper type is provided, the type is
	first <i>unboxed</i> into its primitive counterpart<sup info=2></sup>.
</p>
<span info=2>If a wrapper type is provided as the operand of a unary
	minus operator, it is unboxed before "promotion to <code>int</code>" or
	the negation occur. For example, <pre><code>Integer x = Integer.valueOf(123); // Variable x stores an Integer object that represents the value 123
System.out.println(-x); // x is "unboxed" into 123 as an int</code></pre>
	<p>The above code is equivalent to:</p> <pre><code>Integer x = Integer.valueOf(123);
System.out.println(- (int) x);</code></pre>
	<p>
		That is to say that the operand of <code>-</code> is converted to its
		primitive form, if necessary.
	</p>
</span>
<p>
	After unboxing (if necessary), if the operand is a <code>byte</code>, <code>short</code>,
	or <code>char</code>, then <i>integer promotion</i> occurs: The type is
	converted to <code>int</code>. Since the <code>int</code> type can
	always represent all of the values of each of these 3 smaller types, no
	change in value ever occurs during this promotion process.
</p>
<h2>Behavior</h2>
<p>The type of a unary minus expression is the promoted, primitive type
	of the input (that is, the type of the input after unboxing then
	integer promotion are performed, if necessary).</p>
<p>The unary minus operator negates its input. For most numbers, this
	transformation is trivial.</p>
<h3>Integral Types</h3>
<p>
	The minimum values of integer types <code>int</code> and <code>long</code>
	are: <code>-2147483648</code> and <code>-9223372036854775808</code>
	respectively. Performing the unary minus operation on either of these
	values will cause overflow and result in the same value.<sup info=3></sup>
</p>
<span info=3>There is no corresponding, positive <code>int</code> for <code>-2147483648</code>,
	and there is no corresponding positive <code>long</code> for <code>-9223372036854775808</code>.
	Because of this, trying to negate either value would result in the
	maximum positive value plus <code>1</code> for the respective type,
	which overflows to the minimum value. For example, negating <code>-2147483648</code>,
	<i>would</i> result in <code>2147483648</code> (which is the maximum
	value of an int: <code>2147483647</code>, plus 1), which then simply
	overflows back to <code>-2147483648</code>.
	<p>
		Resultingly, negating the minimum <code>int</code> or <code>long</code>
		value results in the same value.
	</p>
</span>
<h3>Floating Point Types</h3>
<p>
	For floating point values (<code>float</code> and <code>double</code>),
	the unary minus operator simply flips the sign bit. This results in a
	normal, mathematic negation for any floating point value except for <code>NaN</code>;
	the negation of <code>NaN</code> is <code>NaN</code>.
</p>
<p>
	Note that negating floating point zero (<code>0.0</code>) will result
	in <i>negative zero</i> (<code>-0.0</code>), and negating negative zero
	results in positive zero. Floating point types differentiate between
	negative and positive zero.
</p>
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
	<p>
		Because of this, double negation is effectively equivalent to an
		application of the <a href="/operators/unary/plus">unary plus operator</a>.
	</p>
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
<div class="example">
	<h4>Type of Unary Minus Expressions</h4>
	<p>The type of a unary minus expression is partially controlled by the
		type of the operand expression.</p>
	<pre><code>public static void main(String[] args) {
	System.out.println("Types of primitive invocations:");
	test(-(byte) 1); 					// int
	test(-(char) 1);					// int
	test(-(short) 1);					// int
	test(-(int) 1);
	test(-(long) 1);
	test(-(float) 1);
	test(-(double) 1);
	System.out.println("\nTypes of wrapper invocations:");
	test(-Byte.valueOf((byte) 1));		// int
	test(-Character.valueOf((char) 1));	// int
	test(-Short.valueOf((short) 1));	// int
	test(-Integer.valueOf(1));			// int
	test(-Long.valueOf(1));				// long
	test(-Float.valueOf(1));			// float
	test(-Double.valueOf(1));			// double

}

static void test(byte in) {
	System.out.println("byte");
}

static void test(char in) {
	System.out.println("char");
}

static void test(short in) {
	System.out.println("short");
}

static void test(int in) {
	System.out.println("int");
}

static void test(long in) {
	System.out.println("long");
}

static void test(float in) {
	System.out.println("float");
}

static void test(double in) {
	System.out.println("double");
}</code></pre>
	<p>Output:</p>
	<pre><code class="output">Types of primitive invocations:
int
int
int
int
long
float
double

Types of wrapper invocations:
int
int
int
int
long
float
double</code></pre>
	<p>
		In the above example, the <code>test(int)</code>, <code>test(long)</code>,
		<code>test(float</code>, and <code>test(double)</code> methods are
		called, which is why the output contains only <code>int</code>, <code>long</code>,
		<code>float</code>, and <code>double</code>. The <code>test(byte)</code>,
		<code>test(char)</code>, and <code>test(short)</code> methods do not
		get called at all. The type of the unary minus expression is either <code>int</code>,
		<code>long</code>, <code>float</code>, or <code>double</code>,
		depending on the argument.
	</p>
</div>
<?php
b();