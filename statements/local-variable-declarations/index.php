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
	definitively assigned a value. If there is a path of execution (even a
	single path) that would result in the variable not being initialized by
	the time it is read, the read is not valid. For example, the following
	print statement illegal refers to <code>x</code>:
</p>
<div class="todo">Add code example</div>
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
</ol>
<?php
b();