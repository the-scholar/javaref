<?php t("Javaref - Cast Operators", "The Java cast operator attempts to coerce the type of an expression, throwing a ClassCastException upon failure.");?>
<h1>Cast Operator</h1>
<p class="description">Changes the type of an expression without
	changing the value.</p>
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
			<span class="syntax-piece">unary-expression</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><code>(</code> <span class="syntax-piece">main-type</span> <span
			class="optional syntax-piece">additional-types</span> <code>)</code>
			<span class="syntax-piece">castable-expression</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">primitive-type</span></td>
		<td>is one of the primitive types:
			<ul>
				<li><code>byte</code></li>
				<li><code>short</code></li>
				<li><code>char</code></li>
				<li><code>int</code></li>
				<li><code>long</code></li>
				<li><code>float</code></li>
				<li><code>double</code></li>
				<li><code>boolean</code></li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">unary-expression</span></td>
		<td>is any unary expression<sup info=1></sup>. <span info=1>A unary
				expression is simple expression including expressions with
				unary-operators. Each of the following expressions <!-- TODO: Organize -->
				<ul>
					<li>Pre-Increment Expression (<code>++</code> operator)
					</li>
					<li>Pre-Decrement Expression (<code>--</code> operator)
					</li>
					<li>Cast Expression</li>
					<li>The use of any of the following operators:
						<ul>
							<li>Unary Plus (<code>+</code>)
							</li>
							<li>Unary Minus (<code>-</code>)
							</li>
							<li>Bitwise Complement (<code>~</code>)
							</li>
							<li>Logical Complement (<code>!</code>)
							</li>
						</ul>
					</li>
				</ul>
		</span></td>
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