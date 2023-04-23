<?php t("Annotation Element Declarations", "Used to specify the properties that need to be given values when an annotation is used.");?>
<h1>Annotation Element Declarations</h1>
<p class="description">Defines a property of an annotation.</p>
<p>
	Annotations may, optionally, specify <i>elements</i> in their body,
	which define properties that are provided in each use of the
	annotation. The elements may have a default value, in which case their
	being specified in an annotation's use is optional.
</p>
<h2>Syntax</h2>
<p>An annotation element declaration consists of:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece optional">modifier-list</span> <span
			class="syntax-piece">type</span> <span class="syntax-piece">name</span>
			<code>(</code> <code>)</code> <span class="syntax-piece optional">array-dims</span>
			<span class="optional"><code>default</code> <span
				class="syntax-piece">default-value</span></span> <code>;</code></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">modifier-list</span></td>
		<td>is a possibly empty set of keywords and annotations that can
			contain, <code>public</code>, <code>abstract</code>, and any number
			of annotations that are applicable to the annotation element.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">type</span></td>
		<td>is one of the following:
			<ul>
				<li>A primitive type,</li>
				<li>the type, <code>Class</code> (possibly parameterized),
				</li>
				<li><code>String</code>,</li>
				<li>any <code>enum</code> type,
				</li>
				<li>any other annotation type that does not have an element of this
					annotation type (directly or indirectly), or</li>
				<li>an array of any of these types of max dimensionality <code>1</code>.
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">name</span></td>
		<td>is an identifier denoting the name of the element.</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">array-dims</span></td>
		<td>is the <code>[</code> token followed by the <code>]</code> token,
			used together to indicate that the element's type is an array. The
			brackets can instead be included in the <span class="syntax-piece">type</span>,
			but are allowed here for consistency with older versions.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">default-value</span></td>
		<td>is a constant expression, whose type is the same as the element's
			declared type.</td>
	</tr>
</table>