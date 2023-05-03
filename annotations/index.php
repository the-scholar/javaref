<?php t("Annotations", "Used to annotate elements in a program, primarily for external processing.");?>
<h1>Annotations</h1>
<p>Annotations are used to mark program elements, possibly with extra
	information. Annotations are designed so that markers can be read and
	used by annotation processors at various points along the lifecycle of
	program development.</p>
<p>Annotations provide a means of adding structured information to
	program elements that can be processed easily.</p>
<h2>Syntax</h2>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><code>@</code> <span class="syntax-piece">name</span> <span
			class="optional"><code>(</code> <code>)</code></span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><code>@</code> <span class="syntax-piece">name</span> <code>(</code>
			<span class="syntax-piece">element-value</span> <code>)</code></td>
	</tr>
	<tr>
		<td>3</td>
		<td><code>@</code> <span class="syntax-piece">name</span> <code>(</code>
			<span class="syntax-piece">element-value-list</span> <code>)</code></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">name</span></td>
		<td>is a <a class="unlinked">qualified or simple name</a> that refers
			to the annotation.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">element-value</span></td>
		<td>is a constant expression or another (nested) annotation that
			matches the type of the annotation's <code>value</code> element.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">element-value-list</span></td>
		<td>is a map of annotation elements to constant expressions or other
			annotations. The map is specified as a comma-separated list of
			key-value pairs of the form:
			<div class="decorated" style="margin-left: 2em;">
				<span class="syntax-piece">element-name</span> <code>=</code> <span
					class="syntax-piece">value</span>
			</div> where <span class="syntax-piece">element-name</span> specifies
			which element the value is assigned to and <span class="syntax-piece">value</span>
			specifies the value to assign.
		</td>
	</tr>
</table>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> An annotation without attributes
	provided (a <i>marker</i> annotation).
</p>
<p>
	<span class="syntax-number">2</span> An annotation that specifies a
	single attribute, <code>value</code>, of its annotation type.
</p>
<p>
	<span class="syntax-number">3</span> A normal annotation, with
	attributes explicitly named.
</p>
<h2>Usage</h2>
<p>Annotations associate supplementary information with a Java element
	in a program. They can apply to:</p>
<ul>
	<li>declarations for the following:
		<ul>
			<li>Types</li>
			<li>Methods</li>
			<li>Constructors</li>
			<li>Fields</li>
			<li>Parameters</li>
			<li>Local Variables</li>
			<li>Packages</li>
			<li>Type Parameters</li>
		</ul>
	</li>
	<li>and uses of Types.</li>
</ul>
<p>
	The location in source code that an annotation may be present at to
	apply to a certain element is dictated by the syntax for that element.
	For example, see <a href="/methods/declarations">Method Declarations</a>.
	Semantic rules invovling the annotation's declared targets define
	whether annotations deemed to apply to certain elements are illegal and
	will raise compiler errors.
</p>
<p>
	Annotations that apply to declarations are almost always specified in
	the declaration's <i>modifier list</i>, intermixed with keyword
	modifiers, such as <code>public</code>, <code>protected</code>, <code>static</code>,
	<code>final</code>, etc. Annotations that apply to type uses may appear
	in these same locations (subject to some constraints) or may appear
	more closely to the type. For details, see below.
</p>
<h3>Targets</h3>
<p>
	Although not required, an annotation declaration can restrict (or
	expand) its use to certain program elements using the <code>@java.lang.annotation.Target</code>
	meta-annotation. The <code>@Target</code> annotation has a non-default
	<code>java.lang.annotation.ElementType[]</code> member, which specifies
	the types of program elements that the annotation may be applied to.
	The <code>ElementType</code> array may not contain duplicates when used
	as an argument to the <code>@Target</code> annotation.
</p>
<p>
	There are 10 possible targets that an annotation declaration may
	specify in a <code>@Target</code> meta-annotation:
</p>
<table>
	<tr>
		<th
			title="The java.lang.annotation.ElementType constant that represents this target.">Enum
			Constant</th>
		<th>Target</th>
		<th>Description</th>
		<th>Index</th>
	</tr>
	<tr>
		<td><code>TYPE</code></td>
		<td><a href="#target.type">Type</a></td>
		<td>any <code>class</code>, <code>enum</code>, and <code>interface</code>
			declarations (including any <code>@interface</code> annotation
			declarations).
		</td>
		<td>1</td>
	</tr>
	<tr>
		<td><code>ANNOTATION_TYPE</code></td>
		<td><a href="#target.annotation-type">Annotation Type</a></td>
		<td>any <code>@interface</code> annotation declarations.
		</td>
		<td>2</td>
	</tr>
	<tr>
		<td><code>METHOD</code></td>
		<td><a href="#target.method">Method</a></td>
		<td>any method declaration, including <code>abstract</code>
			declarations and annotation element declarations.
		</td>
		<td>3</td>
	</tr>
	<tr>
		<td><code>CONSTRUCTOR</code></td>
		<td><a href="#target.constructor">Constructor</a></td>
		<td>any constructor declaration.</td>
		<td>4</td>
	</tr>
	<tr>
		<td><code>FIELD</code></td>
		<td><a href="#target.field">Field</a></td>
		<td>any field declaration, including constants declared in <code>@interface</code>s
			and <code>enum</code> constants. (Note that annotations targeting
			fields can be used on their own member constants.)
		</td>
		<td>5</td>
	</tr>
	<tr>
		<td><code>PARAMETER</code></td>
		<td><a href="#target.parameter">Parameter</a></td>
		<td>any method parameter (not including <a
			href="/methods/receiver-parameters">receiver parameters</a>).
		</td>
		<td>6</td>
	</tr>
	<tr>
		<td><code>LOCAL_VARIABLE</code></td>
		<td><a href="#target.local-variable">Local Variable</a></td>
		<td>any local variable declaration, including those in the header of a
			<code>for</code> loop or <code>try</code>-with-resources statement.
		</td>
		<td>7</td>
	</tr>
	<tr>
		<td><code>PACKAGE</code></td>
		<td><a href="#target.package">Package</a></td>
		<td>implementation-chosen package declarations.</td>
		<td>8</td>
	</tr>
	<tr>
		<td><code>TYPE_PARAMETER</code></td>
		<td><a href="#target.type-parameter">Type Parameter</a></td>
		<td>any type parameter declaration.</td>
		<td>9</td>
	</tr>
	<tr>
		<td><code>TYPE_USE</code></td>
		<td><a href="#target.type-use">Type Use</a></td>
		<td>the use of a type.</td>
		<td>10</td>
	</tr>
</table>
<h4>How Targets Work</h4>
<p>Annotations whose declarations do not specify a target can be applied
	to:</p>
<ul>
	<li>Types</li>
	<li>Methods</li>
	<li>Constructors</li>
	<li>Fields</li>
	<li>Parameters</li>
	<li>Local Variables</li>
	<li>Packages</li>
</ul>
<p>That is, they can be applied to all annotatble program elements
	except Type Parameters and Type Uses.</p>
<p>
	Otherwise, if <code>@Target</code> is applied to an annotation's
	declaration, that annotation may be applied to the union of the types
	permitted by each <code>ElementType</code> specified in the <code>@Target</code>
	annotation. For example, if <code>@Target({ TYPE, FIELD })</code> is
	applied to a declaration, the annotation may be applied to <i>both</i>
	type declarations (e.g. classes, interfaces, etc.) and fields.
</p>
<h4 id="target.type">
	<code>TYPE</code> Target
</h4>
<p>
	The <code>TYPE</code> target allows an annotation to be applied to any
	type declaration.
</p>
<ul>
	<li>the modifier list of any <a class="unlinked"><code>class</code>
			declaration</a>, (including nested, inner, and local classes).
	</li>
	<li>the modifier list of any <a class="unlinked"><code>interface</code>
			declaration</a>, (including <a href="declarations"><code>@interface</code>
			declarations</a> and any nested <code>interface</code> or <code>@interface</code>
		declarations),
	</li>
	<li>the modifier list of any <a class="unlinked">enum declaration</a>.
	</li>
	<li>the modifier list of any <a href="declarations">annotation
			declaration</a>. (An annotation with the <code>TYPE</code> target can
		be applied to its own declaration.)
	</li>
</ul>
<h4 id="target.annotation-type">
	<code>ANNOTATION_TYPE</code> Target
</h4>
<p>
	The <code>ANNOTATION_TYPE</code> target is a subset of the <code>TYPE</code>
	target. The <code>ANNOTATION_TYPE</code> allows an annotation to apply
	to <a href="declarations">annotation declarations</a>.
</p>
<p>
	An annotation that targets both <code>TYPE</code> and <code>ANNOTATION_TYPE</code>
	can be applied to the same set of program elements as an annotation
	that targets only <code>TYPE</code>.
</p>
<h3>Meta Annotations</h3>
<h3>
	<span class="syntax-piece">element-value</span> and <span
		class="syntax-piece">element-value-list</span>
</h3>
<!-- TODO: Talk about how these arguments must be constants. -->
<!-- TODO: Talk about how these arguments may also include annotations, even inside the array expressions. -->
<?php
b();
