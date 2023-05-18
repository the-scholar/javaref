<?php $tmods["head_after_stylesheet"] = function() {?>
<style type="text/css">
.toc ol {
	list-style: lower-alpha;
}

.toc ol ol {
	list-style: upper-roman;
}

.toc ol ol ol {
	list-style: lower-roman;
}

.toc li:has(>ol, >ul)>a {
	color: #7fd4e3;
}
</style>
<?php
};
t("Javaref - Cast Operator", "The Java cast operator attempts to convert or specify the type of an expression so that it is a chosen type, throwing a ClassCastException upon failure. It can also be used to check or assert the type of an expression.");
?>
<h1>Cast Operator</h1>
<p class="description">Changes the type of an expression.</p>
<p>
	The cast operator (often simply called <i>cast</i>) changes or
	specifies the type of an expression, throwing a <code>ClassCastException</code>
	if its argument cannot be coerced to the specified type.
</p>
<p>Casts can be used to perform certain automatic conversions, broaden
	or shrink the type of an expression, change the type being instantiated
	by a lambda or method reference, clarify ambiguous method invocations,
	and more.</p>
<h2>Syntax</h2>
<p>Cast Operators can be expressed through:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><code>(</code> <span class="syntax-piece">primitive-type</span> <code>)</code>
			<span class="syntax-piece">primitive-castable-expression</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><code>(</code> <span class="syntax-piece">reference-type</span> <code>)</code>
			<span class="syntax-piece">reference-castable-expression</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><code>(</code> <span class="syntax-piece">reference-type</span> <span
			class="syntax-piece">interface-type-list</span> <code>)</code> <span
			class="syntax-piece">reference-castable-expression</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">primitive-type</span></td>
		<td>is any one of the types: <code>boolean</code>, <code>byte</code>,
			<code>short</code>, <code>char</code>, <code>int</code>, <code>long</code>,
			<code>float</code>, or <code>double</code>.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">primitive-castable-expression</span></td>
		<td>is an expression of one of the following types:
			<ul>
				<li>the application of any one unary operator (including another
					cast),</li>
				<li>a literal,</li>
				<li>a parenthesized expression,</li>
				<li>a reference to a field or variable,</li>
				<li>an array component,</li>
				<li>a method invocation,</li>
			</ul>
			<p>
				Other types are syntactically, but not semantically<sup info=1></sup>
				permitted.
			</p> <span info=1>Syntactically, a <span class="syntax-piece">primitive-castable-expression</span>
				can also be any one of the following expressions, but a
				primitive-type&ndash;cast may only be applied to a type convertible
				to a primitive type, and none of the following types can be
				converted to a primitive type through a single cast.<!-- TODO -->
				<ul>
					<li>any type of array creation expression,</li>
					<li>a method reference,</li>
					<li>the keyword <code>this</code> (possibly qualified by a type),
					</li>
					<li>a class literal,</li>
					<li>a class instance creation expression,</li>
					<li>an expression name.</li>
				</ul>
		</span>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">reference-type</span></td>
		<td>is any non-primitive type. This can be either a user-defined type
			(<code>class</code>, <code>interface</code> including <code>@interface</code>,
			or <code>enum</code>), a type parameter variable, or any array type
			(including one with a primitive component type).
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">reference-castable-expression</span></td>
		<td>is an expression of one of the following types:
			<ul>
				<li>lambda expressions</li>
				<li>only<sup info=2></sup> the application of any one of the
					following operators:
					<ul>
						<li>the cast operator,</li>
						<li>the logical negation operator,</li>
						<li>the bitwise negation operator,</li>
						<li>the post-increment operator,</li>
						<li>the post-decrement operator,</li>
					</ul>
				</li>
				<li>any type of array creation expression,</li>
				<li>a method reference,</li>
				<li>the keyword <code>this</code> (possibly qualified by a type),
				</li>
				<li>a class literal,</li>
				<li>a literal,</li>
				<li>a parenthesized expression,</li>
				<li>a class instance creation expression,</li>
				<li>a reference to a field,</li>
				<li>an array component,</li>
				<li>a method invocation,</li>
				<li>an expression name,</li>
				<li>a lambda expression.</li>
			</ul> <span info=2> This excludes types of expressions from being the
				operand of a reference-type&ndash;cast:
				<ul>
					<li>the pre-increment operator,</li>
					<li>the pre-decrement operator,</li>
					<li>the unary plus operator, and</li>
					<li>the unary minus operator.</li>
				</ul>
		</span>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">interface-type-list</span></td>
		<td>is a sequence that specifies additional types, each of which must
			be an <code>interface</code> type. Each element of the sequence is
			comprised of the <code>&</code> token (used as a separator between
			the types specified) followed by the type itself. Each type in the
			sequence must be an <code>interface</code>.
		</td>
	</tr>
</table>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> A normal cast to a primitive type.
</p>
<p>
	<span class="syntax-number">2</span> A normal cast to a reference type.
</p>
<p>
	<span class="syntax-number">3</span> An intersection cast. Intersection
	casts always use reference types.
</p>
<h2>Behavior</h2>
<p>
	Every expression has a type which is known at compile time<sup info=3></sup>.<span
		info=3>Every expression is classified as either a <i>standalone</i> or
		a <i>poly</i> expression. A standalone expression's type can be
		determined from its contents whereas a poly expression's type can be
		determined from its context.
	</span> Casting can have runtime effects, but is usually used to change
	the type of an expression without changing the value, which is a
	compile-time operation; using the cast operator on some expression
	forms a new expression whose type is that specified in the cast.
</p>
<p>A cast expression can affect the runtime value of its operand.
	Notable cases include the case that the operand is a lambda expression
	or method reference expression and the case that either the operand or
	the type being casted to is primitive.</p>
<h3>Conversions</h3>
<p>
	Casting operates on its argument by performing a <i>casting conversion</i>.
	A casting conversion is the attempted change of a value's type to the
	type specified by the cast.
</p>
<ol class="toc">
	<li><a href="#conversions.primitive-to-primitive">Primitive-Type <span
			style="font-family: monospace;">--&gt;</span> Primitive-Type
			Conversion
	</a>
		<ol>
			<li><a href="#conversions.primitive.widening">Widening Primitive
					Conversion</a>
				<ol>
					<li><a href="#conversions.primitive.widening.i2i">Integral <span
							style="font-family: monospace;">--&gt;</span> Integral
					</a>
						<ol>
							<li><a href="#conversions.primitive.widening.i2i.normal"><code>byte</code>
									<span style="font-family: monospace;">--&gt;</span> <code>short</code>,
									<code>int</code>, <code>long</code><br> <code>short</code> <span
									style="font-family: monospace;">--&gt;</span> <code>int</code>,
									<code>long</code><br> <code>int</code> <span
									style="font-family: monospace;">--&gt;</span> <code>long</code></a></li>
							<li><a href="#conversions.primitive.widening.i2i.char-prom"><code>char</code>
									<span style="font-family: monospace;">--&gt;</span> <code>int</code>,
									<code>long</code></a></li>

						</ol></li>
					<li><a href="#conversions.primitive.widening.float-to-double"><code>float</code>
							<span style="font-family: monospace;">--&gt;</span> <code>double</code></a></li>
					<li><a href="#conversions.primitive.widening.i2f">Integral <span
							style="font-family: monospace;">--&gt;</span> Floating
					</a>
						<ol>
							<li><a href="#conversions.primitive.widening.i2f.lossless"><code>byte</code>,
									<code>short</code>, <code>char</code> <span
									style="font-family: monospace;">--&gt;</span> <code>float</code><br>
									<code>byte</code>, <code>short</code>, <code>char</code>, <code>int</code>
									<span style="font-family: monospace;">--&gt;</span> <code>double</code></a></li>
							<li><a href="#conversions.primitive.widening.i2f.lossy"><code>int</code>,
									<code>long</code> <span style="font-family: monospace;">--&gt;</span>
									<code>float</code><br> <code>long</code> <span
									style="font-family: monospace;">--&gt;</span> <code>double</code></a></li>
						</ol></li>
				</ol></li>
			<li><a href="#conversions.primitive.narrowing">Narrowing Primitive
					Conversion</a>
				<ol>
					<li><a href="#conversions.double-to-float"><code>double</code> <span
							style="font-family: monospace;">--&gt;</span> <code>float</code></a></li>
					<li><a href="#conversions.narrowing.integral-to-integral"><code>short</code>,
							<code>char</code>, <code>int</code>, <code>long</code> <span
							style="font-family: monospace;">--&gt;</span> <code>byte</code><br>
							<code>short</code>, <code>int</code>, <code>long</code> <span
							style="font-family: monospace;">--&gt;</span> <code>char</code><br>
							<code>char</code>, <code>int</code>, <code>long</code> <span
							style="font-family: monospace;">--&gt;</span> <code>short</code><br>
							<code>long</code> <span style="font-family: monospace;">--&gt;</span>
							<code>int</code></a></li>
					<li><a href="#conversions.narrowing.floating-to-integral"><code>float</code>,
							<code>double</code> <span style="font-family: monospace;">--&gt;</span>
							<code>int</code>, <code>long</code></a></li>
					<li><a href="#conversions.narrowing.floating-to-reduced-integral"><code>float</code>,
							<code>double</code> <span style="font-family: monospace;">--&gt;</span>
							<code>byte</code>, <code>short</code>, <code>char</code></a></li>
				</ol></li>
			<li><a href="#conversions.byte-to-char"><code>byte</code> <span
					style="font-family: monospace;">--&gt;</span> <code>char</code></a></li>
		</ol></li>
	<li><a href="#conversions.boxing">Primitive Type <span
			style="font-family: monospace;">--&gt;</span> Reference Type
			Conversion
	</a>
		<ol>
			<li><a href="#conversions.boxing.simple">Auto-Boxing of <code>boolean</code>,
					<code>byte</code>, <code>short</code>, <code>char</code>, <code>int</code>,
					<code>long</code></a></li>
			<li><a href="#conversions.boxing.floating">Auto-Boxing of <code>float</code>,
					<code>double</code></a></li>
		</ol></li>
	<li><a href="#conversions.reference">Reference Type <span
			style="font-family: monospace;">--&gt;</span> Reference Type
			Conversion
	</a>
		<ol>
			<li><a href="#conversions.reference.sub-to-super">Widening (Subtype <span
					style="font-family: monospace;">--&gt;</span> Supertype)
			</a></li>
			<li><a href="#conversions.reference.super-to-sub">Narrowing
					(Supertype <span style="font-family: monospace;">--&gt;</span>
					Subtype)
			</a></li>
		</ol></li>
</ol>
<h4 id="conversions.primitive-to-primitive">
	Primitive <span style="font-family: monospace;">--&gt;</span> Primitive
	Conversions
</h4>
<p>
	All primitive types can be cast between each other except for the type
	<code>boolean</code>, which cannot be cast to or from any other
	primitive type (since it is not numeric).
</p>
<h5 id="conversions.primitive.widening">Widening Primitive Conversion</h5>
<p>
	Widening primitive conversion is performed when an expression of a
	smaller numeric primitive type is cast to a larger numeric primitive
	type, such as in casting an <code>int</code> expression to type <code>long</code>,
	or a <code>short</code> to type <code>double</code>.
</p>
<h6 id="conversions.primitive.widening.i2i">For integral types</h6>
<p>
	For integral (non-decimal) types, the value resulting from a widening
	cast conversion always exactly represents the original value, except
	when casting a negative <code>byte</code> to type <code>char</code>
	(see <a href="#conversions.byte-to-char"><code>byte</code> <span
		style="font-family: monospace;">--&gt;</span> <code>char</code></a>).
	Integral numeric types are ordered by size as follows:
</p>
<div class="block">
	<code>byte</code> &lt; <code>short</code><sup info=5></sup> &lt; <code>int</code>
	&lt; <code>long</code>
</div>
<span info=5><code>char</code> is equal in byte-size to <code>short</code>,
	but is unsigned.</span>
<div>
	<p id="conversions.primitive.widening.i2i.normal">
		If any such smaller type is cast to a larger type, the conversion will
		occur without loss of information and the larger-type value will
		exactly represent the same as the smaller-type value. This is because
		a larger such type can represent all of the values that the smaller
		such type can (e.g. any <code>byte</code> value is also a valid <code>int</code>
		value).
	</p>
	<p>A cast of a value from a smaller such type to a larger such type
		performs a two's-complement sign-extension on the binary data of the
		value (extending the sign bit) to fill the bits of the larger type.</p>
</div>
<p id="conversions.primitive.widening.i2i.char-prom">
	Converting a <code>char</code> to a wider integral type (i.e., to <code>int</code>
	or <code>long</code>) involves a zero-extension of the value (i.e.,
	bits introduced by the larger type are set to 0). Therefore, casting
	from <code>char</code> to <code>int</code> or <code>long</code> never
	changes the value being cast.
</p>
<h6 id="conversions.primitive.widening.float-to-double">
	<code>float</code> <span style="font-family: monospace;">--&gt;</span>
	<code>double</code>
</h6>
<p>
	Conversion of a <code>float</code> to type <code>double</code> results
	in a <code>double</code> value that represents the exact same number as
	the original <code>float</code> value.
</p>
<h5 id="conversions.primitive.widening.i2f">Integral to Floating Point
	Conversions</h5>
<p>
	Converting an integral-type value to a floating point type performs
	IEEE 754 rounding with round-to-nearest mode. The resulting floating
	point number is the representable value that is nearest to the source
	value, with ties between two potential floating point numbers being
	broken by picking the one whose least significant bit is zero (i.e.,
	the one that is farthest from <code>0</code>).
</p>
<h6 id="conversions.primitive.widening.i2f.lossless">Converting to
	floating point losslessly</h6>
<p>
	Conversion from <code>byte</code>, <code>short</code>, or <code>char</code>
	to <code>float</code> will always result in a <code>float</code> that
	exactly represents the same number as the original value. Conversion
	from <code>byte</code>, <code>short</code>, <code>char</code>, or <code>int</code>
	to <code>double</code> will result in a <code>double</code> that
	exactly represents the same number as the source value.
</p>
<h6 id="conversions.primitive.widening.i2f.lossy">Lossy conversion to
	floating point</h6>
<p>Conversion of large integral types to floating point types, i.e.</p>
<ul>
	<li><code>int</code> or <code>long</code> converted to <code>float</code>,
		or</li>
	<li><code>long</code> converted to <code>double</code>,</li>
</ul>
<p>undergoes IEEE 754 rounding with round-to-nearest mode to arrive at a
	floating point value.</p>
<h5 id="conversions.primitive.narrowing">Narrowing Primitive Conversion</h5>

<h5 id="conversions.byte-to-char">
	<code>byte</code> --&gt; <code>char</code>
</h5>
<p>
	Conversion of a <code>byte</code> into a <code>char</code> will operate
	in two steps:
</p>
<ol>
	<li>The value is converted <a
		href="#conversions.primitive.widening.i2i.normal">from <code>byte</code>
			to <code>int</code></a>,
	</li>
	<li>then the value is converted <a
		href="#conversions.narrowing.integral-to-integral">from <code>int</code>
			to <code>char</code></a>.
	</li>
</ol>
<h3>Cast Legality</h3>
<p>It is always permissible to cast an expression to its own type.
<h3>Reference &amp; Primitive Cast Differences</h3>
<p>Casting to a primitive type is treated different, syntactically, from
	casting to a reference type. To avoid syntactical ambiguity and ease
	parsing, a cast to one or more reference types cannot be applied to a
	unary plus or minus expression, or to a pre-increment or pre-decrement
	expression. This restriction holds even in the case when an
	intersection cast is used, (despite the lack of syntactic ambiguity
	with an intersection cast).</p>
<h3 id="poly-expr-args">Poly Expression Arguments</h3>
<p>
	The operand to a cast expression can be a poly expression (although,
	whether the argument is a poly expression is dependent on which type of
	expression the argument is).
	<!-- TODO: Supplement this section (and replace the parenthesized portion) with the details of which expressions can be poly expressions as the argument of a cast. (Also include the conditions for when they are poly expressions.) -->
</p>
<p id="capture-conversion-part">
	If the argument for a cast expression is a poly expression, the <i>target
		type</i><sup info=6></sup> for the poly expression is exactly the type
	specified by the cast, unless that specified type is generic and
	contains any wildcard type arguments, in which case the target type is
	instead the original type with each wildcard replaced as follows due to
	capture conversion:
</p>
<span info=6>The actual type of a poly expression is based on the type
	of expression the poly expression is <i>and</i> on the target type of
	the context that the poly expression is used in.
</span>
<ul>
	<li>If the wildcard has no bound, it is replaced with the bound for the
		type argument it substitutes,</li>
	<li>if the wildcard has a lower bound, it is replaced such that<!-- TODO -->,
		and
	</li>
	<li>if the wildcard has an upper bound, it is replaced such that<!-- TODO -->.
	</li>
</ul>
<p>
	In this case, the cast expression's type is still exactly the type
	specified in the parentheses, but the target type for the cast
	expression's argument will have no wildcards. See <a
		href="#examples.wildcard-cast">Poly Expressions &amp; Wildcard Casts</a>
	for details.
</p>
<h3>Intersection Casts</h3>
<h2>Examples</h2>
<!-- TODO: Add examples -->
<div>
	<h4 id="examples.wildcard-cast">Poly Expressions &amp; Wildcard Casts</h4>
	<p>Casting a poly expression to a generic type with a wildcard type
		parameter causes the poly expression's finalized type to be different
		from the type of the cast.</p>
	<p>
		Consider some generic <code>interface</code>:
	</p>
	<pre><code>interface Example&lt;T&gt; {
	void doSomething(T input);
}</code></pre>
	<p>
		The type parameter declaration <code>&lt;T&gt;</code> does not declare
		an explicit bound, so its bound is <code>Object</code> (as if declared
		as <code>&lt;T extends Object&gt;</code>). Instances can be obtained
		using lambda expressions:
	</p>
	<pre><code>Object ex = (Example&lt;?&gt;) a -> System.out.println(a);
// ex is an instance of Example</code></pre>
	<p>
		Due to the <a href="#poly-expr-args">rules of casting with poly
			expressions</a> as arguments, the lambda expression is created as an
		instance of <code>Example&lt;Object&gt;</code>, with <code>Object</code>
		used as the type argument rather than the wildcard <code>?</code>
		(since wildcards are not allowed to be specified as type arguments for
		the instantiation of a type).
	</p>
	<p>
		Expressions of type <code>Example&lt;Object&gt;</code> can be assigned
		to expressions of type <code>Example&lt;?&gt;</code>, due to subtyping
		rules, so the thus <code>Example&lt;?&gt;</code>-type lambda
		expression is permitted as the argument of the cast, and the full cast
		expression maintains its type, <code>Example&lt;?&gt;</code>.
	</p>
	<p>This allows lambda expressions and method reference expressions to
		be cast to a type possessing wildcard type arguments without the need
		to first cast the expression to a type without wildcard arguments.</p>
</div>
<h2>Notes</h2>
<ol>
	<li>An expression beginning with a <code>+</code> or <code>-</code>
		cannot be cast to a reference type, but can be cast to a primitive
		type. This simplifies the Java grammar but seems to be the result of a
		nominal oversight in the language's design<sup info=7></sup>. <span
		info=7>The justification for this grammar seems to be an oversight in
			the design of the Java language. The <a
			href="https://docs.oracle.com/javase/specs/jls/se8/html/jls-15.html#jls-15.15">relevant
				footnote</a>, in section 15.15, assumes that
			<blockquote>all type names involved in casts on numeric values are
				known keywords</blockquote>
			<p>However, there are in fact valid reference-type casts, generic
				casts, and even intersection casts that can be applied to other
				expressions of numeric types, though none to the aforementioned
				unary expressions:</p> <pre><code>	// Valid
	System.out.println((Object) 1);
	System.out.println((Comparable&lt;Integer&gt;) 1);
	System.out.println((Object & Serializable & Comparable&lt;Integer&gt;) 1);

	// Invalid
//	System.out.println((Object) -1);
//	System.out.println((Comparable&lt;Integer&gt;) -1);
//	System.out.println((Object & Serializable & Comparable&lt;Integer&gt;) -1);</code></pre>
	</span>
		<p>For example,</p> <pre><code>	System.out.println((int) +10); // Valid
//	System.out.println((Integer) +10); // Invalid

	int x = 10;
	System.out.println((int) ++x); // Valid
//	System.out.println((Integer) ++x);// Invalid</code></pre>
		<p>This limitation can be overcome by parenthesizing the argument to
			the cast expression.</p> <pre><code>//	System.out.println((Integer) (+10)); // Valid

	int x = 10;
//	System.out.println((Integer) (++x));// Valid</code></pre>
	</li>
	<li>The ability to cast a lambda expression or method reference to a
		type parameterized with a wildcard allows creating an instance of an <code>interface</code>
		in a way that is otherwise impossible, without using generics.
		<p>
			An <code>interface</code> can be declared generic with a type
			parameter bounded by a private (inaccessible) class. For example:
		</p> <pre><code>class ContainerType {
	private static class PrivateClass {	}

	public interface Interface&lt;T extends PrivateClass&gt; {
		int doSomething();
	}
}</code></pre>
		<p>
			Classes outside of <code>ContainerType</code> can refer to <code>Interface</code>
			but not use it as a type unless using it raw or with the <code>?</code>
			wildcard type argument. The only other permissible parameterization
			is <code>PrivateClass</code> which is inaccessible.
		</p>
		<p>
			In a separate class, one can instantiate <code>Interface</code> using
			a lambda expression or method reference without using <code>Interface</code>
			as a raw type and without having to refer to <code>PrivateClass</code>
			(which would raise a compile-time error) using a wildcard:
		</p> <pre><code>public class Example {
	public static void main(String[] args) {
		Object x = (Interface&lt;?&gt;) () -&gt; 1;
	}
}</code></pre>
		<p>
			Because of the cast, the lambda expression is instantiated as the
			type <code>Interface&lt;PrivateClass&gt;</code> due to <a
				href="#capture-conversion-part">capture conversion</a>. This becomes
			the type of the lambda expression itself. Since <code>PrivateClass</code>
			is not explicitly referenced, no compile-time error occurs. The cast
			expression converts the type to <code>Interface&lt;?&gt;</code>,
			which is the result of the cast expression itself.
		</p>
	</li>
</ol>
<?php
b();