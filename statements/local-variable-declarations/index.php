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
	variable to a local scope (called, a <i>local variable</i>). Such
	variables exist and are accessible immediately after their declaration
	(even within the same local variable declaration; <a href="#note-1">see
		below</a>), within the scope in which they were declared.
</p>
<p>
	They can be used within any local scope, such as inside <a
		href="/initializers">static and instance initializers</a> and <a
		href="/methods/declarations">method bodies</a>.
</p>
<h3>Reading from a local variable</h3>
<p>
	Local variables can be read and evaluated only after they have been
	definitively assigned a value (see <a href="/definite-assignment"
		class="u">Definite Assignment</a>). If there is a path of execution
	(even a single path) that would result in the variable not being
	initialized by the time it is read, the read is not valid. For example,
	in the following code, each commented print statement illegally refers
	to <code>x</code>:
</p>
<pre><code>int x;
// System.out.println(x); // x not yet initialized; error
if (Math.random() > .25) {
	// System.out.println(x); // x not yet initialized; error
	x = 20;
	System.out.println(x); // x has been initialized; prints 20
}
// System.out.println(x); // x not yet initialized; error</code></pre>
<h3>Final Declarations</h3>
<p>
	<code>final</code> local variable declarations create a <code>final</code>
	local variable. In contrast to <code>final</code> fields (class
	members), they do not have to be given a value (if they are not ever
	read). Once they have been assigned a value, though, they cannot be
	reassigned (similar to <code>final</code> fields).
</p>
<p>
	<code>final</code> local variables can only be assigned a value once.
	It's a compile-time error for any path of execution to assign to a <code>final</code>
	variable more than once.
</p>
<h3>Constant Declarations</h3>
<p>The variable introduced by a local variable declaration can be
	constant if all of the following are true:</p>
<ol>
	<li>The local variable declaration is marked <code>final</code> (i.e. <code>final</code>
		is present in the list of <span class="syntax-piece">modifiers</span>),
	</li>
	<li>the variable's type is either <code>String</code> or some primitive
		type,
	</li>
	<li>the variable has an initializer (i.e. the variable has a
		corresponding <code>=</code> <span class="syntax-piece">init-expr</span>),
		and
	</li>
	<li>the <span class="syntax-piece">init-expr</span> used to initialize
		the variable is a <a href="/constant-expressions" class="u">constant
			expression</a>.
	</li>
</ol>
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
	<li>In line with the first note above, <span class="synatx-piece">init-expr</span>s
		for variables declared within the same local variable declaration are
		executed in order, immediately after the variable they belong to is
		introduced, and immediately before the succeeding variable (if any) is
		introduced: <pre><code>int x = 0;
int y = ++x, z = ++x, w = ++x; // Initializes x, y, and z to 1, 2, and 3, respectively.
// x is set to 3.

System.out.println("x: " + x);
System.out.println("y: " + y + ", z: " + z + ", w: " + w);</code></pre>
		This code prints:<pre><code class="output">x: 3
y: 1, z: 2, w: 3</code></pre>
	</li>
	<li>A final local variable can be read even if not every path of
		execution assigns it a value, so long as every path of execution
		leading up to the read assigns it a value: <pre><code>final int x;
if (Math.random() &lt; .5) {
	x = 10;
	System.out.println(x);
} else {
	// System.out.println(x); // x cannot be accessed here.
}
// System.out.println(x); // x cannot be accessed here because it may not have been initialized</code></pre>
	</li>
	<li>Constant local variables can be used to form other constant
		expressions, which allows certain calculations and expressions that
		are not otherwise allowed. For example: <pre><code>final long x = 10;
	byte b = x;</code></pre>This code compiles because <code>x</code> is a
		constant variable, meaning that its evaluation when initializing <code>b</code>
		is performed at compile-time. Since <code>b</code> is initialized with
		an integral constant-expression whose value (<code>10</code>) is known
		to be able to fit within the <code>byte</code> type, the assignment
		succeeds.
		<p>
			If <code>x</code>'s local variable declaration were not declared
			constant, the variable <code>x</code> would not be a constant
			variable. This would cause the evaluation of <code>x</code>, within <code>b</code>'s
			initializer, to not undergo value-checks that determine if the value
			of <code>b</code>'s initializer can fit into <code>b</code>, making
			the initialization result in the standard loss-of-precision in
			assignment error.
		</p>
	</li>
</ol>
<?php
b();