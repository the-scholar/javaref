<?php t("Javaref - For Loops", "For loops allow re-executing a statement a number of times in Java.");?>
<h1>For Loop</h1>
<p class="description">A looping statement used to repeatedly execute
	another statement (the body statement) in a structured manner.</p>
<p>
	For loops come in two forms: <i>Basic</i> and <i>Enhanced</i>.
</p>
<p>
	Basic for loops contain an initializer expression, a condition, an
	increment expression, and a body statement. They are executed beginning
	with their initializer statement. Then their condition evaluated and,
	while <code>true</code>, the body statement and then the increment
	expression are executed, in that order. The condition, body, and
	increment expression are executed repeatedly until the condition
	evaluates to <code>false</code> or an exception is thrown.
</p>
<p>
	Enhanced for loops execute their body statement for every member of an
	<i>Iterable</i> or an array type expression.
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
		<td>is either:
			<ol>
				<li>any number of <a
					href="/statements/expression-statements#statement-expressions">statement
						expressions</a>, separated by comma tokens, or
				</li>
				<li>a local variable declaration.</li>
			</ol>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">condition</span></td>
		<td>is an expression of type <code>boolean</code> or <code>Boolean</code>.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">increment-expr</span></td>
		<td>is any number of <a
			href="/statements/expression-statements#statement-expressions">statement
				expressions</a>, separated by comma tokens.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">body-statement</span></td>
		<td>is any statement.</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">iter-variable-decl</span></td>
		<td>is a formal parameter declaration, (as in a method declaration's
			parameter list). Equivalently, the <span class="syntax-piece">iter-variable-decl</span>
			is a local variable declaration without the optional initializer (and
			without the trailing semicolon):
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
			variable, as if through an assignment statement: <pre>
				<code>class Animal {}
class Dog extends Animal {}
class Cat extends Animal {}

Dog[] dogArray = new Dog[100];	// Each element has type Dog

// Valid enhanced for loops:
for (Dog d : dogArray);			// Dog objects (from the array) can fit in the Dog variable, d
for (Animal a : dogArray);		// Dog objects can fit in the Animal variable, a
for (Object o : dogArray);		// Dog objects can fit in the Object variable, o

// Invalid enhanced for loops:
// for (Cat c : dogArray);		// Invalid; Dog objects cannot fit in Cat variable, c</code>
			</pre>
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
<h2>Execution</h2>
<p>
	The execution of enhanced <code>for</code> loops is expressed through a
	basic <code>for</code> loop.
</p>
<h3>Basic For Loop Execution</h3>
<p>
	Normal execution (no exceptions, <code>return</code> statements, <code>break</code>s,
	etc.) of a basic <code>for</code> loop proceeds as follows. Steps <span
		style="color: #ffe62b;">2, 3, and 4</span> are repeated until <span
		class="syntax-piece">condition</span> evaluates to <code>false</code>.
</p>
<ol id="basic-for-loop-steps">
	<li>The <span class="syntax-piece">init-expression</span> is executed.
	</li>
	<li style="color: #ffe62b;">The <span class="syntax-piece">condition</span>
		is evaluated. If it evaluates to <code>false</code>, the loop is
		exited.
	</li>
	<li style="color: #ffe62b;">The <span class="syntax-piece">body-stmt</span>
		is executed.
	</li>
	<li style="color: #ffe62b;">The <span class="syntax-piece">increment-expr</span>
		is executed.
	</li>
</ol>
<p>
	The loop exits normally if the <span class="syntax-piece">condition</span>
	evaluates to <code>false</code>.
</p>
<p>
	Each of the <a
		href="/statements/expression-statements#statement-expressions">statement
		expressions</a> in the <span class="syntax-piece">increment-expr</span>
	is executed in the order they are written. If any statement expression
	completes abruptly, the whole <span class="syntax-piece">increment-expr</span>
	immediately completes abruptly for the same reason. If the <span
		class="syntax-piece">init-expression</span> is also a list of
	statement expressions, it is executed in the same way.
</p>
<h3>Enhanced For Loop Execution</h3>
<p>
	<!-- TODO -->
</p>
<h3>Abrupt Completion of For Loops</h3>
<h4>
	Unlabeled <code>break</code>s &amp; <code>continue</code>s
</h4>
<p>
	If execution of the <span class="syntax-piece">body-statement</span>
	completes abruptly due to an:
</p>
<ul>
	<li><em>unlabeled</em> <code>break</code>, the for loop immediately
		completes <em>normally</em>.</li>
	<li><em>unlabeled</em> <code>continue</code>, the for loop loops, (as
		if the <span class="syntax-piece">body-statement</span> completed
		normally), executing the <span class="syntax-piece">increment-expr</span>
		(step <span style="color: #ffe62b;">4</span> in the <a
		href="#basic-for-loop-steps">list of steps above</a>).</li>
</ul>
<h4>Other Abrupt Completion</h4>
<p>
	Otherwise, if execution of any statement/expression immediately
	enclosed<sup info=2></sup> by a for loop completes abruptly, due to any
	other reason, the for loop immediately completes abruptly for the same
	reason.
</p>
<span info=2>The four statements/expressions immediately enclosed by a
	basic for loop are the:
	<ol>
		<li><span class="syntax-piece">init-expression</span>,</li>
		<li><span class="syntax-piece">condition</span>,</li>
		<li><span class="syntax-piece">increment-expr</span>, and</li>
		<li><span class="syntax-piece">body-statement</span>.</li>
	</ol>
	<p>The two statements/expressions immediately enclosed by an enhanced
		for loop are the:</p>
	<ol>
		<li><span class="syntax-piece">iterable-expr</span> or <span
			class="syntax-piece">array-expr</span>, and</li>
		<li><span class="syntax-piece">body-statement</span>.</li>
	</ol>
</span>
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