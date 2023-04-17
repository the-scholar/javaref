<?php t("Javaref - Identifiers");?>
<h1>Identifiers</h1>
<p class="description">A string of characters used to name (or otherwise
	identify) a Java construct.</p>
<p>Identifiers are used for the names of variables, methods, types, type
	parameters, and packages. Each identifier is parsed as a separate token
	during tokenization of a Java program. Keywords are not considered
	identifiers.</p>
<h2>Syntax</h2>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece">ident-start-char</span><span
			class="syntax-piece optional">ident-body-chars</span></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">ident-start-char</span></td>
		<td>is either <code>_</code>, <code>$</code>, or any valid unicode
			letter.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">ident-body-chars</span></td>
		<td>is a sequence of characters composed entirely of: either <code>_</code>,
			<code>$</code>, or any valid unicode letter or digit. The sequence
			may be of any size.
		</td>
	</tr>
</table>
