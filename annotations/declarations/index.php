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
		<td>any <code>class</code>, <code>enum</code>, and <code>interface</code>
			declarations (including any <code>@interface</code> annotation
			declarations)
		</td>
	</tr>
	<tr>
		<td>Annotation Type<sup info=3></sup></td>
		<td>any <code>@interface</code> annotation declarations <span info=3>The
				<i>Type</i> target is a superset of this target; declaring an
				annotation with both <i>Type</i> and <i>Annotation Type</i> as
				targets is redundant. This target is primarily used to declare
				meta-annotations, as annotations with <i>only</i> this target may
				not be applied to any type; just other annotations' declarations.
		</span>
		</td>
	</tr>
	<tr>
		<td>Method</td>
		<td>any method declaration, including <code>abstract</code>
			declarations and annotation element declarations.
		</td>
	</tr>
	<tr>
		<td>Constructor</td>
		<td>any constructor declaration.</td>
	</tr>
	<tr>
		<td>Field</td>
		<td>any field declaration<sup info=4></sup>, including constants
			declared in <code>@interface</code>s and <code>enum</code> constants.
			(Note that annotations targeting fields can be used on their own
			member constants.) <span info=4>Formally, annotations targeting
				fields apply to the <i>declaration</i> that declares a field, or set
				of fields.
				<p>
					In practice, each reflection <code>Field</code> object of a single
					declaration, annotated with an annotation that targets fields, will
					expose the annotation through <code>Field#getAnnotations()</code>
					and similar methods.
				</p>
		</span>
		</td>
	</tr>
	<tr>
		<td>Parameter</td>
		<td>any method parameter (not including <a
			href="/methods/receiver-parameters">receiver parameters</a><sup
			info=5></sup>). <span info=5>Receiver parameters are not formal
				parameters, so they may not be annotated by virtue of the annotation
				being declared to target a parameter.
				<p>
					Receiver parameters allow only their type to be annotated, so
					annotations contained in their syntax must target type use. For
					receiver parameter syntax, see, <a
						href="/methods/receiver-parameters">Receiver Parameters</a>.
				</p>
		</span></td>
	</tr>
	<tr>
		<td>Local Variable</td>
		<td>any local variable declaration<sup info=6></sup>, including those
			in the header of a <code>for</code> loop or <code>try</code>-with-resources
			statement. <span info=6>Annotations of this target apply to the <i>declaration</i>
				that declares a local variable, or possibly a list of local
				variables.
				<p>Since local variables cannot be accessed through reflection, such
					detail has no programmatic impact.</p>
		</span>
		</td>
	</tr>
	<tr>
		<td>Package</td>
		<td>implementation-dependent<sup info=7></sup> package declaration <span
			info=7>Syntactically (disregarding semantic restrictions),
				annotations targeting packages may be placed in front of the <code>package</code>
				keyword on any package declaration in any file, however, each
				package is subject to the constraint that only one such declaration
				may be annotated.
				<p>
					Java provides implementations with liberty for upholding this
					requirement. (File-based) implementations typically consider a
					canonical package declaration in a file named <code>package-info.java</code>,
					within the package being annotated, whose contents begin with the
					package declaration, possibly with annotations. Such
					implementations may disallow the annotated package declaration to
					be placed elsewhere.
				</p>
		</span>
		</td>
	</tr>
	<tr>
		<td>Type Parameter</td>
		<td>any type parameter declaration.</td>
	</tr>
	<tr>
		<td>Type Use</td>
		<td>the use of a type. For details, see <a href="../">annotations</a>.
		</td>
	</tr>
</table>
<div class="note">
	For a more detailed analysis, refer to the relevant sections in <a
		href="../">Annotations</a>.
</div>
<h4>Duplication</h4>
<p>
	The <code>@Target</code> annotation does not permit duplicate targets
	in its arguments. If <code>@Target</code> is used with duplicate
	targets (even if the use of <code>@Target</code> is not an application
	to an annotation declaration), a compiler error occurs.
</p>
<h3>
	<span class="syntax-piece">annotation-members</span>
</h3>
<p>Annotations may declare, as members, any number of the following:</p>
<ul>
	<li><a href="elements">annotation elements</a>,</li>
	<li>nested types,</li>
	<li>constants</li>
</ul>
<p>Each member may be located anywhere directly in the body of the
	annotation declaration.</p>
<h4>Annotation Elements</h4>
<p>
	Each annotation element in an annotation specifies an attribute of the
	annotation. They are described in detail <a href="elements">here</a>.
</p>
<h4>Nested Types</h4>
<!-- TODO: Discuss nested types. Make sure to note that classes are implicitly declared as static. -->
<h4>Constants</h4>
<!-- Discuss the slightly niche lack of initializer blocks or "collective initializer code" for these constants, and how they HAVE to be given a value ONLY in their declaration. -->
<h2>Examples</h2>
<!-- TODO: Target Examples -->
<!-- TODO: Classes -->
<!-- TODO: Enums -->
<!-- TODO: Constants -->
<h2>Notes</h2>
<ol>
	<li id="note-1">Annotations may be declared so that they cannot be
		applied to other elements using the meta-annotation <code>@Target({})</code>.
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
	<li>
		<!-- TODO: Discuss how an annotation's constants must be given a value only at declaration, and, unlike other types' static final fields, cannot be initialized in subsequent initializers. -->
	</li>
</ol>
<?php
b();