<?php

t("Javaref - Conditional Operators", "Uses the result of the first expression to select
	which of the next two expressions to evaluate and return.");
?>
<h1>Conditional Operator</h1>
<p class="description">Uses the result of the first expression to select
	which of the next two expressions to evaluate and return.</p>
<p>
	The conditional operator evaluates the first expression (a <code>boolean</code>)
	and uses the result to select which of the second and third expressions
	to evaluate and return. If the first expression evaluates to <code>true</code>,
	the second is selected and returned. If the first evaluates to <code>false</code>,
	the third is evaluated and returned.
</p>
<pre>
	<code>isRaining() ? "It's raining!" : "Clear skies!";</code>
</pre>
<p>
	If it's raining (<code>isRaining()</code> returns true), this
	expression evaluates to <code>"It's raining!"</code>. Otherwise this
	expression evaluates to <code>"Clear skies!"</code>.
</p>
<h2>Syntax</h2>
<p>Conditional Operators can be expressed through:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece">bool-expr</span> <code>?</code> <span
			class="syntax-piece">expr1</span> <code>:</code> <span
			class="syntax-piece">expr2</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">bool-expr</span></td>
		<td>is an expression whose type is <code>boolean</code> (or its
			wrapper type, <code>Boolean</code>).
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">expr1</span></td>
		<td>is any non-<code>void</code><sup info=1></sup> expression,
			including assignment expressions.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">expr2</span></td>
		<td>is a any non-<code>void</code><sup info=1></sup> expression <em>except
				for assignment expressions</em>.
		</td>
	</tr>
</table>
<span info=1>A non-<code>void</code> expression is an expression whose
	type is not <code>void</code>. In other words, any expression except
	for an invocation of a void method.
</span>
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