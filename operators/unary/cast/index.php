<?php t("Javaref - Cast Operator", "The Java cast operator attempts to convert or specify the type of an expression to a specified type, throwing a ClassCastException upon failure. It can also be used to check or assert the type of an expression.");?>
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
	the type of an expression, which is a compile-time change; using the
	cast operator on some expression forms a new expression whose type is
	that specified in the cast.
</p>
<p>A cast expression does not affect the value of its operand except in
	the case that the operand is a poly expression (notably a lambda
	expression or method reference expression).</p>
<h3>Casting Conversion</h3>
<p>
<h3>Cast Errors or Redundance</h3>
<p>
<h3>Reference &amp; Primitive Cast Differences</h3>
<p>Casting to a primitive type is treated different, syntactically, from
	casting to a reference type. To avoid syntactical ambiguity and ease
	parsing, a cast to one or more reference types cannot be applied to a
	unary plus or minus expression, or to a pre-increment or pre-decrement
	expression. This restriction holds even in the case when an
	intersection cast is used, (despite the lack of syntactic ambiguity
	with an intersection cast).</p>
<h3>Poly Expression Arguments</h3>
<p>
	The operand to a cast expression can be a poly expression (although,
	whether the argument is a poly expression is dependent on which type of
	expression the argument is).
	<!-- TODO: Supplement this section (and replace the parenthesized portion) with the details of which expressions can be poly expressions as the argument of a cast. (Also include the conditions for when they are poly expressions.) -->
</p>
<p>
	If the argument for a cast expression is a poly expression, the <i>target
		type</i><sup info=4></sup> for the poly expression is exactly the type
	specified by the cast, unless that specified type is generic and
	contains any wildcard type arguments, in which case the target type is
	instead the original type with each wildcard replaced as follows:
</p>
<span info=4>The actual type of a poly expression is based on the type
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
	expression's argument will have no wildcards. See <a href="note-2">Note
		2</a> for details.
</p>
<h3>Intersection Casts</h3>
<h2>Examples</h2>
<!-- TODO: Add examples -->
<div>
	<h4></h4>
</div>
<h2>Notes</h2>
<ol>
	<li></li>
	<li id="note-2"></li>
</ol>
<?php
b();