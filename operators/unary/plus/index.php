<?php t("Javaref - Unary Plus", "The unary plus operator converts its operand to a primitive int, long, float, or double. The value of the operand is not changed.");?>
<h1>Unary Plus</h1>
<p class="description">
	Converts its operand to <code>int</code>, <code>long</code>, <code>float</code>,
	or <code>double</code>. The value is preserved.
</p>
<p>
	The unary plus operator may have any primitive numeric type<sup info=1></sup>
	(or corresponding wrapper type). The result of the operation is the
	same value as the input, but converted to a primitive type (if the
	operand's type is a wrapper type) and converted to <code>int</code> (if
	the operand is <code>byte</code>, <code>char</code>, <code>short</code>,
	or a wrapper of one of those types).
</p>
<span info=1>A primitive numeric type is any primitive type other than <code>boolean</code>.
	Specifically, any of the following types:
	<ul>
		<li><code>byte</code></li>
		<li><code>short</code></li>
		<li><code>char</code></li>
		<li><code>int</code></li>
		<li><code>float</code></li>
		<li><code>long</code></li>
		<li><code>double</code></li>
	</ul>
</span>
<h2>Syntax</h2>
<p>Unary Plus can be expressed through:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><code>+</code> <span class="syntax-piece">operand</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">operand</span></td>
		<td>is an expression whose type is a primitive numeric type or a
			wrapper of a primitive numeric type (such as <code>Integer</code> or
			<code>Long</code>.
		</td>
	</tr>
</table>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> A unary plus expression.
</p>
<h2>Inputs</h2>
<p>
	Like all other unary operators (except for the cast operator), the
	unary plus operator accepts an expression of any primitive, numeric
	type (<code>byte</code>, <code>short</code>, <code>char</code>, <code>int</code>,
	<code>long</code>, <code>float</code>, or <code>double</code>), or an
	expression of any numeric wrapper type (<code>Byte</code>, <code>Short</code>,
	<code>Character</code>, <code>Integer</code>, <code>Long</code>, <code>Float</code>,
	or <code>Double</code>). If a wrapper type is provided, the type is
	first <i>unboxed</i> into its primitive counterpart<sup info=2></sup>.
</p>
<span info=2>If a wrapper type is provided as the operand of a unary
	plus operator, it is unboxed before a <i>promotion to <code>int</code></i>
	is attempted. For example, <pre><code>Integer x = Integer.valueOf(123); // Variable x stores an Integer object that represents the value 123
System.out.println(+x); // x is "unboxed" into 123 as an int</code></pre>
	<p>The above code is equivalent to:</p> <pre><code>Integer x = Integer.valueOf(123);
System.out.println((int) x);</code></pre>
	<p>
		That is to say that the operand of <code>+</code> is converted to its
		primitive form if not a primitive type.
	</p>
</span>
<h2>Behavior</h2>
<h3>Unboxing</h3>
<p>
	If the operand expression has a type that is a wrapper type, the value
	is unboxed to its primitive form. For example, an operand of type <code>Long</code>
	will be converted to <code>long</code>. See the <a href="unbox-example">below
		examples</a> for details.
</p>
<h3>Numeric Promotion</h3>
<p>
	After unboxing, (if applicable), the operand is <i>promoted</i> to type
	<code>int</code> if its type is <code>byte</code>, <code>short</code>,
	or <code>char</code>. This conversion does not change the numeric value
	of the operand, (since every <code>byte</code>, <code>short</code>, and
	<code>char</code> can be represented as an <code>int</code> as well.
</p>
<p>
	Operands of type <code>int</code>, <code>long</code>, <code>float</code>,
	and <code>double</code> are not changed by the unary plus operator.
</p>
<h2>Examples</h2>
<div class="example" id="unbox-example">
	<h4>Unboxing</h4>
	<p>The unary plus operator will first unbox its argument before
		attempting numeric promotion:</p>
	<pre><code>static void example(long arg) {
	System.out.println("Primitive method called");
}
static void example(Long arg) {
	System.out.println("Wrapper method called");
}

public static void main(String[] args) {
	Long x = 123L;
	example(x);	// Calls example(Long)
	example(+x);	// Calls example(long)
}</code></pre>
	<p>Output:</p>
	<pre><code class="output">Wrapper method called
Primitive method called</code></pre>
</div>
<?php
b();