<?php t("Javaref - For Loops", "For loops allow re-executing a statement a number of times in Java.");?>
<h1>For Loop</h1>
<p class="description">A looping statement used to repeatedly execute
	another statement (the body statement) in a structured manner.</p>
<p>
	For loops come in two forms: <i>Basic</i> and <i>Enhanced</i>. Basic
	for loops contain an initializer expression, a condition, an increment
	expression, and a body statement, and Java executes them by begins by executing
	its initializer statement. Then the condition is checked and if true,
	the body, and then the increment expression are executed, in that
	order. Enhanced for loops execute their body for every member of an <i>Iterable</i>
	or an array type expression.
</p>
<h2>Syntax</h2>
<p>For Loops have three forms:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><code>for (</code><span class="syntax-piece optional">init-expression</span>
			<code>;</code> <span class="syntax-piece optional">condition</span> <code>;</code>
			<span class="syntax-piece optional">increment-expr</span> <code>)</code>
			<span class="syntax-piece">body-statement</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><code>for (</code> <span class="syntax-piece">iter-variable-decl</span>
			<code>:</code> <span class="syntax-piece">iterable-expr</span> <code>)</code>
			<span class="syntax-piece">body-statement</span></td>
	</tr>
	<tr>
		<td>3</td>
		<td><code>for (</code> <span class="syntax-piece">iter-variable-decl</span>
			<code>:</code> <span class="syntax-piece">array-expr</span> <code>)</code>
			<span class="syntax-piece">body-statement</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">init-expression</span></td>
		<td>is either a list of any number of <span class="syntax-piece">stmt-expr</span>
			(statement expressions) or a local variable declaration. The list is
			comma-delimited.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">condition</span></td>
		<td>is a <code>boolean</code> expression.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">increment-expr</span></td>
		<td>is a comma-delimited list of any number of <span
			class="syntax-piece">stmt-expr</span> (statement expressions).
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">stmt-expr</span></td>
		<td>is a any one of:
			<ul>
				<li>an assignment,</li>
				<li>a pre- or post-increment expression,</li>
				<li>a pre- or post-decrement expression,</li>
				<li>a method invocation, or</li>
				<li>a class instance creation expression (with the <code>new</code>
					operator)
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">body-statement</span></td>
		<td>is any statement.</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">iter-variable-decl</span></td>
		<td>is a formal parameter declaration, (like one that may go in a
			method declaration). The <span class="syntax-piece">iter-variable-decl</span>
			is equivalently a local variable declaration without the optional
			initializer (and without the trailing semicolon):
			<div class="decorated">
				<span class="syntax-piece optional">variable-modifiers</span> <span
					class="syntax-piece">type</span> <span class="syntax-piece">name</span>
				<span class="syntax-piece optional">array-dims</span>
			</div>
			<p>
				<i>where...</i>
			</p>
			<table class="syntax-breakdown">
				<tr>
					<td><span class="syntax-piece">variable-modifiers</span></td>
					<td>is a any number of the modifiers: <code>final</code> or any
						applicable annotation.
					</td>
				</tr>
				<tr>
					<td><span class="syntax-piece">type</span></td>
					<td>is the variable's type.</td>
				</tr>
				<tr>
					<td><span class="syntax-piece">name</span></td>
					<td>is an identifier that names the variable.</td>
				</tr>
				<tr>
					<td><span class="syntax-piece">array-dims</span></td>
					<td>is any number of bracket pairs augmenting the
						array-dimensionality of the type of the variable. Each consecutive
						<code>[]</code> after the variable name adds a new dimension to
						the array variable, and can be annotated by an appropriate
						annotation.
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>
		<td><span class="syntax-piece">iterable-expr</span></td>
		<td>is any expression that is assignable to the <code>Iterable</code>
			type. <code>Iterable</code> is generic; the type of the expression
			may be either raw or parameterized.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">array-expr</span></td>
		<td>is any expression whose type is an array type.</td>
	</tr>
</table>
<p>
	<i>such that...</i>
</p>
<ul>
	<!-- REV: Not very clear. -->
	<li>The element type of <span class="syntax-piece">array-expr</span>
		must be assignable to the effective type of the variable in <span
		class="syntax-piece">iter-variable-decl</span>.<sup info=1></sup> <span
		info=1>In essence, this means that array elements must be able to
			"fit" in the <span class="syntax-piece">iter-variable-decl</span>
			variable, as if through an assignment statement: <pre><code>class Animal {}
class Dog extends Animal {}
class Cat extends Animal {}

Dog[] dogArray = new Dog[100];	// Each element has type Dog

// Valid enhanced for loops:
for (Dog d : dogArray);			// Dog objects (from the array) can fit in the Dog variable, d
for (Animal a : dogArray);		// Dog objects can fit in the Animal variable, a
for (Object o : dogArray);		// Dog objects can fit in the Object variable, o

// Invalid enhanced for loops:
// for (Cat c : dogArray);		// Invalid; Dog objects cannot fit in Cat variable, c</code></pre>
	</span>
	</li>
	<li>
		<!-- TODO: Add bullet regarding iterable-expr behavior -->
	</li>
</ul>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> Basic <code>for</code> loop.
</p>
<p>
	<span class="syntax-number">2</span> Enhanced <code>for</code> loop,
	looping over an <code>Iterable</code>.
</p>
<p>
	<span class="syntax-number">3</span> Enhanced <code>for</code> loop,
	looping over an array.
</p>
<h2>Behavior</h2>
<p>
	The execution of enhanced <code>for</code> loops is expressed through a
	basic <code>for</code> loop. Execution of a basic <code>for</code> loop
	proceeds as follows:
</p>
<ol>
	<li>The <code>init-expression</code> is executed. If it is a
		comma-delimited list of statements, they are each executed in order.
	</li>
	<li>The <code>condition</code> is evaluated. If it evaluates to <code>false</code>, the loop finishes
</ol>
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