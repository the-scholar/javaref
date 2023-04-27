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
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> A declaration of an annotation
	type.
</p>
<h2>Usage</h2>
<p>
	An annotation declaration introduces an annotation type to the program.
	Annotation types are <code>interface</code>s<sup info=1></sup> that can
	be used to annotate program elements.
</p>
<span info=1>Annotations are formally a type of <code>interface</code>.
	They can be used as <code>interface</code>s in most respects (e.g. they
	can be instantiated with anonymous classes, lambda expressions, and
	used as a variable type), but are designed to be used primarily for
	annotating elements. If a type declares that it <code>implement</code>s
	an annotation, a warning is issued.
</span>
<h3>Targets</h3>
<p>
	An annotation declaration may specify a set of <i>targets</i> that
	determines what program elements the annotation may be used on using
	the <code>java.lang.annotation.Target</code> meta annotation.
</p>
<ul>
	<li>If the <code>@Target</code> annotation is applied to an annotation
		declaration, the declaration may be used to annotate the program
		elements specified in the <code>@Target</code> annotation.<sup info=2></sup>
		More precisely, such an annotation may apply to a program element if
		any of the targets specified permits the annotation to be used on that
		element.
	</li>
	<li>Otherwise, if no set is specified, the annotation may target all
		annotatable program elements except type parameter declarations.</li>
</ul>
<span info=2>Note that if <code>@Target</code> is specified with an
	empty set, the annotation may not be applied to <i>any</i> program
	element, for example <code>@Target({})</code>. For uses of this, see <a
	href="#note-1">note 1</a> below.
</span>
<p>The following table lists each annotation target along with a
	description of what elements it allows an annotation to apply to:</p>
<table>
	<tr>
		<th>Target</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>Type</td>
		<td>any <code>class</code>, <code>enum</code>, and <code>interface</code> declarations
			(including <code>@interface</code> annotation declarations)</td>
	</tr>
	<tr>
		<td>Annotation Type</td>
		<td>any <code>@interface</code> annotation declarations</td>
	</tr>
	<!-- TODO: Complete -->
</table>
<h4>Duplication</h4>
<p>
	The <code>@Target</code> annotation does not permit duplicate targets
	in its arguments. <code>@Target</code> is used with duplicate targets,
	a compiler error occurs.
</p>
<h2>Notes</h2>
<ol>
	<li id="note-1">Annotations may be declared so that they cannot
		be applied to other elements using the meta-annotation <code>@Target({})</code>.
		Such an annotation will raise a compile-time error if used on any
		element.
		<p>Nevertheless, the annotation may still be used as an element for
			other annotations, e.g.:</p> <pre><code>@Target({})
@interface Author {
	String authorName();
	String authorEmail();
	int authorAge();
}

@interface Authors {
	Author[] value();
}</code></pre>
		<p>
			The <code>@Authors</code> annotation may then be applied to any
			element (except type parameter declarations) while the <code>@Author</code>
			annotation may not be applied to any.
		</p>
		<p>
			Additionally, note that the surviving <code>interface</code> features
			of annotations may still be used with such annotations. For example,
			variables can be declared with the annotation as a type, and the
			annotations can even be used to create anonymous classes:
		</p> <pre><code>Author a = new Author() {
	
	@Override
	public Class&lt;? extends Annotation&gt; annotationType() {
		return null;
	}
	
	@Override
	public String authorName() {
		return null;
	}
	
	@Override
	public String authorEmail() {
		return null;
	}
	
	@Override
	public int authorAge() {
		return 0;
	}
};</code></pre>
	</li>
</ol>
<?php
b();