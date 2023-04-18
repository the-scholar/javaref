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
		<td>is either <code>_</code>, <code>$</code>, or any valid letter (<a
			href="">see below</a>).
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">ident-body-chars</span></td>
		<td>is a sequence of characters composed entirely of: either <code>_</code>,
			<code>$</code>, or any valid letter or digit (<a href="">see below</a>).
			The sequence may be of any size.
		</td>
	</tr>
</table>
<p>
	<i>such that...</i>
</p>
<ul>
	<li>No identifier may be identical to a keyword, the <code>null</code>
		literal, or either Boolean literal.
	</li>
</ul>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> An identifier, used to name a
	variable, method, class or other type, type parameter, etc.
</p>
<h2>Composition</h2>
<p>
	Java identifiers are composed of Unicode characters, defined by the
	Unicode standard. The Unicode characters that can comprise an
	identifier are defined by the static Java API methods <code>Character.isJavaIdentifierStart(int)</code>
	and <code>Character.isJavaIdentifierPart(int)</code>, for the <span
		class="syntax-piece">ident-start-char</span> and each character in <span
		class="syntax-piece">ident-body-chars</span>, respectively; if either
	method returns <code>true</code> for a character, then the respective
	syntax element can be composed of that character in a valid identifier.
</p>
<p>
	Unicode groups characters into <i>blocks</i> and into <i>general
		categories</i> (and sub-categories).
<p>The first character of an identifier is any one of the following:</p>
<ul>
	<li>

</ul>
<h2>References</h2>
<ol id="Reflist">
	<li id="Ref1"
		title="The Unicode Standard, Version 15.0.0, Chapter 4: General Category"><a
		href="https://www.unicode.org/versions/Unicode15.0.0/ch04.pdf#page=15">Unicode
			Standard: General Category</a> - Precise description of <i>General
			Category</i> defined by the Unicode Standard. (The link leads to
		version 15.0.0 of the standard.)</li>
	<li title="Unicode Utility Webapp"><a
		href="https://util.unicode.org/UnicodeJsps/list-unicodeset.jsp">Uncode
			Utilities: UnicodeSet</a> - A webapp provided by <i>Unicode.org</i>
		which allows querying all characters present in a general category
		(amongst other operations).</li>
</ol>