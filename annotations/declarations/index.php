<?php t("Annotation Declarations", "Introduces an annotation type to the program that can be used to annotate elements.");?>
<h1>Annotation Declarations</h1>
<p class="description">Introduces an annotation type to the program,
	which can be used to annotate targeted elements.</p>
<h2>Syntax</h2>
<p>An annotation declaration consists of:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece optional">modifier-list</span> <code>@</code>
			<code>interface</code> <span class="syntax-piece">name</span> <code>{</code>
			<span class="syntax-piece optional">annotation-members</span> <code>}</code>
		</td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">modifier-list</span></td>
		<td>is a possibly empty set of keywords and annotations that can
			contain:
			<ul>
				<li>one of <code>public</code>, <code>protected</code>, or <code>private</code>,
				</li>
				<li><code>abstract</code>,</li>
				<li><code>static</code>,</li>
				<li><code>strictfp</code>,</li>
				<li>and any number of annotations that are applicable to the
					declaration,</li>
			</ul>
			<p>in any order.</p>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">name</span></td>
		<td>is any valid <a href="/identifiers">identifier</a> that is not the
			same as a sibling type or a surrounding type, if the annotation is
			not top-level.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">annotation-members</span></td>
		<td>is any number of:
			<ul>
				<li>field declarations,</li>
				<li>type declarations,</li>
				<li>and <a href="../elements">annotation element declarations</a>,
				</li>
			</ul>
			<p>in any order.</p>
		</td>
	</tr>
</table>
<h2>Usage</h2>
<p>An annotation declaration introduces an annotation type to the
	program. Annotation types are interfaces that can additionally be used
	to annotate program elements.</p>
<h3>Annotating</h3>
<p>An annotation type can be used to
<!-- TODO: Complete -->
<?php b();