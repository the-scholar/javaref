<?php t("Javaref - Local Variable Declarations", "Local variable declarations are statements introduce one or more variables to a block scope and, optionally, initialize them with values.");?>
<h1>Local Variable Declaration</h1>
<p class="description">
	Local Variable Declarations are statements that introduce new variables
	to the block that contains them. Local Variable Declarations can
	possess <a href="#modifiers">modifiers</a> that apply to the variables,
	and optionally, an <a href="#initializer">initializer</a> for each
	variable declared.
</p>
<p>Variables declared in a Local Variable Declaration are declared (and
	possibly initialized) in the order they're written.</p>
<h2>Syntax</h2>
<p>Local Variable Declarations can be expressed through:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece">modifiers</span> <span
			class="syntax-piece">type</span> <span class="syntax-piece">first-var-decl</span>
			<span class="syntax-piece optional">additional-var-decls</span> <code>;</code></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">modifiers</span></td>
		<td>is either:
			<ul>
				<li>The keyword <code>final</code>, or
				</li>
				<li>an <a href="/annotations">annotation</a> applicable to local
					variables.
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">type</span></td>
		<td>is any type that can be used to declare a variable (i.e., that is
			not <code>void</code>).
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">first-var-decl</span></td>
		<td>is an unused variable identifier, then any number of (optionally
			annotated) pairs of brackets (<code>[]</code>) indicating additional
			array dimensions, then optionally followed by an equals token (<code>=</code>)
			and an expression whose type is that of the variable. Equivalently,
			the <span class="syntax-piece">first-var-decl</span> has the form: <br>
			<br>
			<div class="decorated">
				<span class="syntax-piece">name</span> <span
					class="syntax-piece optional">array-dims</span> <span
					class="optional"><code>=</code> <span class="syntax-piece">init-expr</span></span>
			</div>
			<p>
				<i>where...</i>
			</p>
			<table class="sytnax-breakdown">
				<tr>
					<td><span class="syntax-piece">name</span></td>
					<td>is an identifier that is used to name the variable being
						declared.</td>
				</tr>
				<tr>
					<td><span class="syntax-piece">array-dims</span></td>
					<td>is any number of consecutive pairs of <code>[]</code> brackets,
						each of which can be independently annotated by an applicable <a
						href="/annotations">annotation</a>.
					</td>
				</tr>
				<tr>
					<td><span class="syntax-piece">init-expr</span></td>
					<td>is an expression whose type is assignable to the effective type
						of the variable.</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">additional-var-decls</span></td>
		<td>is any number of <span class="syntax-piece">first-var-decl</span>s,
			separated by comma tokens (<code>,</code>).
		</td>
	</tr>
</table>
<h2>Behavior</h2>
<p>
	Local variable declarations are the basic way to introduce a new
	variable to a local scope. Such variables exist and are accessible
	immediately after their declaration (even within the same local
	variable declaration; <a href="#note-1">see below</a>).
</p>
<p>
	They can be used within any local scope, such as inside <a
		href="/initializers">static and instance initializers</a> and <a
		href="/methods/declarations">method bodies</a>.
</p>
<h1>Notes</h1>
<ol>
	<li id="note-1">Declared local variables can be accessed and used
		immediately after their actual declaration, before the end of the
		local variable declaration statement that they're a part of. For
		example:<pre><code>int x, y, z = x = y = 10; // Initializes all 3 variables to 10.
System.out.println(x + y + z); // All variables are accessible and initialized; prints 30.</code></pre>
		In the above code, <code>x</code> and <code>y</code> are accessible
		within the initializer expression of <code>z</code>, and can be
		assigned values before the end of the statement.
		<p>Comparatively, declared local variables cannot be accessed or used
			before their declaration, even within the same statement:</p> <pre><code>int x = y, y = 10; // Compiler error: cannot find symbol 'y'</code></pre>
	</li>
</ol>
<?php
b();