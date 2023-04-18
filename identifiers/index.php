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
	Java identifiers are composed of Unicode code-points<sup info=1></sup>
	(characters), defined by the Unicode standard. The code-points that can
	comprise an identifier are defined by the static Java API methods <code>Character.isJavaIdentifierStart(int)</code>
	and <code>Character.isJavaIdentifierPart(int)</code>, for the <span
		class="syntax-piece">ident-start-char</span> and each character in <span
		class="syntax-piece">ident-body-chars</span>, respectively; if either
	method returns <code>true</code> for a character, then the respective
	syntax element can be composed of that character in a valid identifier.
</p>
<span info=1>The Unicode Standard technically specifies <i>code-points</i>,
	not characters. In Java (and the Java specification), characters are
	16-bit data stored by the well-known <code>char</code> type. <code>String</code>s
	are sequences of <code>char</code>s. Some Unicode code-points are now
	larger than 16 bits, so two characters in Java are required to
	represent them (totaling 32 bits). (This is why some methods in the <code>Character</code>
	and <code>String</code> classes are overloaded to accept an <code>int</code>.)
	Because of such, the Java documentation distinguishes between <i>characters</i>
	and <i>code-points</i>, the latter being represented by an <code>int</code>
	in Java, and the former being represented by a <code>char</code>.
	Code-points are what most understand a character to be: A concept of a
	letter, digit, or other symbol (primarily) used for communication.
	<p>When referring to a Unicode code-point, this document uses the term
		code-point.</p>
</span>
<h3>
	Permitted Characters for <span class="syntax-piece">ident-start-char</span>
</h3>
<p>
	The first character of a Java identifier may be any Unicode code-point
	whose general category<sup info=2></sup>:
</p>
<span info=2>Unicode groups characters into <i>blocks</i> and into <i>general
		categories</i> (and sub-categories). Blocks are generally used to
	group code-points by language, function, etc. A character can only be
	in one block and blocks are contiguous. General Categories are an <i>attribute</i>
	of code-points. Each code-point is assigned exactly one general
	category and sub-category (known as the Major and minor categories,
	respectively).
</span>
<ul>
	<li>begins with is <code>L</code> (i.e., the code-point's major
		category is <i>Letter</i>),
	</li>
	<li>is <code>Nl</code> (i.e., the code-point is a <i>Number, letter</i>),
	</li>
	<li>is <code>Sc</code> (i.e., the code-point is a <i>Symbol, currency</i>),
	</li>
	<li>is <code>Pc</code> (i.e., the code-point is a <i>Punctuation,
			connector</i>).
	</li>
</ul>
<p>
	Note that this encompasses the <b>overwhelming majority</b> of Unicode
	code-points; more than 130 thousand characters can be used to begin a
	Java identifier.
</p>
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