<?php t("Javaref - Cast Operator", "The Java cast operator attempts to convert or specify the type of an expression to a specified type, throwing a ClassCastException upon failure. It can also be used to check or assert the type of an expression.");?>
<h1>Cast Operator</h1>
<p class="description">Changes the type of an expression.</p>
<p>
	The cast operator changes or specifies the type of an expression,
	throwing a <code>ClassCastException</code> if its argument cannot be
	coerced to the specified type.
</p>
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
			class="optional syntax-piece">interface-type-list</span> <code>)</code>
			<span class="syntax-piece">reference-castable-expression</span></td>
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
		<td>is any one of the following expressions:
			<ul>
				<li>the application of any one unary operator (including another
					cast),</li>
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
				<li>an expression name.</li>
			</ul>
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
		<td>is the same<sup info=1></sup> as <span class="syntax-piece">primitive-castable-expression</span>,
			except that <span class="syntax-piece">reference-castable-expression</span>
			includes
			<ul>
				<li>lambda expressions</li>
			</ul>
			<p>and excludes expressions that are an application of</p>
			<ul>
				<li>the pre-increment operator,</li>
				<li>the pre-decrement operator,</li>
				<li>the unary plus operator, and</li>
				<li>the unary minus operator.</li>
			</ul> <span info=1>More formally, <span class="syntax-piece">reference-castable-expression</span>
				is any of the following:
				<ul>
					<li>the application of any one of the following operators:
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
				</ul></span>
		</td>
	</tr>
	<!-- TODO: Finish -->
</table>
<p>
	<i>such that...</i>
</p>
<ul>
	<li>
		<!-- TODO: Insert Such that clause -->
	</li>
</ul>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> syntax_fragment_1_breakdown
</p>
<!-- TODO: Insert any additional syntax fragment breakdowns -->
<h2>main_section_title</h2>
<!-- TODO: Fill out main section -->
<h2>Examples</h2>
<!-- TODO: Add examples -->
<h2>Notes</h2>
<ol>
	<li>
		<!-- TODO: Add notes -->
	</li>
</ol>
<?php
b();