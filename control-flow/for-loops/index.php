<?php t("Javaref - For Loops", "For loops allow re-executing a statement a number of times in Java.");?>
<h1>For Loop</h1>
<p class="description">A control flow construct used to repeatedly
	execute a body statement in a structured manner.</p>
<p>
	For loops come in two forms: <i>Basic</i> and <i>Enhanced</i>. Basic
	for loops contain an initializer expression, a condition, an increment
	expression, and a body statement. One's execution begins by executing
	its initializer statement. Then the condition is checked and if true,
	the body, and then the increment expression are executed, in that
	order. Enhanced for loops execute their body for every member of an <i>Iterable</i>
	or an array type expression.
</p>
<h2>Syntax</h2>
<p>For Loops can be expressed through two forms:</p>
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
	<!-- TODO: Insert any additional syntax piece breakdowns -->
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