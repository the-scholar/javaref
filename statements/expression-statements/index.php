<?php t("Javaref - Expression Statements", "Expression statements are statements that compute an expression and discard the result, and do nothing else. They allow the computation of an expression without the need to execute excess operations (e.g., declaring a variable).");?>
<h1>Expression Statement</h1>
<p class="description">Expression Statements are statements that are
	executed by simply evaluating the expression they contain and
	discarding the result. Expressively, they are a means of instructing
	the runtime to compute an expression (usually with side-effects).</p>
<p>
	There are a number of expressions that can be made into a statement
	simply by suffixing them with a semicolon (<code>;</code>). These
	expressions are called Statement Expressions. An Expression Statement
	is one of the statements made from these Statement Expressions. For
	example,
</p>
<p>
	<code>x++</code> - Statement Expression<br> <code>x++;</code> -
	Expression Statement (made of a Statement Expression followed by <code>;</code>).
</p>
<h2>Syntax</h2>
<p>Expression Statements can be expressed through:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece">stmt-expression</span> <code>;</code></td>
	</tr>
	<!-- TODO: Insert any additional syntax fragments -->
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">stmt-expression</span></td>
		<td>is either:
			<ul>
				<li>A use of an <a href="/expressions/assignment">assignment
						operator</a>,
				</li>
				<li>a <a href="/expressions/method-invocation">method invocation</a>,
				</li>
				<li>an <a href="/expressions/instance-creation">instance creation
						expression</a> (i.e., a use of the <code>new</code> operator),
				</li>
				<li>use of any of the increment or decrement operators (pre- or
					post- increment or decrement).</li>
			</ul>
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
<h2>Expression Statements</h2>
<p>There are a number of expressions that may be computed as a
	statement, with the result simply discarded. These are known as
	Statement Expressions.</p>
<h2>Extended Explanation</h2>
<p>
	Certain types of expressions can have <i>side-effects</i>, meaning they
	can affect the state of the running program other than by what they
	evaluate to. For example,
</p>
<pre><code>int x = 10;
int i = 1 + x;	// 1 + x evaluates to 11, so i is set to 11.
int j = ++x;	// ++x evaluates to 11, so j is set to 11.
				// However, ++x also changes the value of x to 11. This is a side-effect of the ++ operator.
System.out.println(x);	// Prints 11</code></pre>
<p>Because of side-effects, expressions can have usefulness in contexts
	other than within most statements. For example, a developer may want to
	increment a variable, which can be done using an increment expression.
	For example:</p>
<pre><code>int x = getSomeValue();
</code></pre>
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