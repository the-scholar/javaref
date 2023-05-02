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
		<td>is a <a href="/names" class="unlinked">qualified or simple name</a>
			that refers to the annotation.
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
	Although not required, an annotation declaration can restrict its use
	to certain program elements using the `@java.lang.annotation.Target`
	meta-annotation. The `@Target` annotation takes an array of
	<!-- TODO: Finish -->
</p>
<p>
	There are 10 possible targets that an annotation declaration may
	specify in a <code>@Target</code> meta-annotation:
</p>
<table>
	<tr>
		<th>Index</th>
		<th>Target</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>1</td>
		<td><a href="#target.type">Type</a></td>
		<td>any <code>class</code>, <code>enum</code>, and <code>interface</code>
			declarations (including any <code>@interface</code> annotation
			declarations).
		</td>
	</tr>
	<tr>
		<td>2</td>
		<td><a href="#target.annotation-type">Annotation Type</a></td>
		<td>any <code>@interface</code> annotation declarations.
		</td>
	</tr>
	<tr>
		<td>3</td>
		<td><a href="#target.method">Method</a></td>
		<td>any method declaration, including <code>abstract</code>
			declarations and annotation element declarations.
		</td>
	</tr>
	<tr>
		<td>4</td>
		<td><a href="#target.constructor">Constructor</a></td>
		<td>any constructor declaration.</td>
	</tr>
	<tr>
		<td>5</td>
		<td><a href="#target.field">Field</a></td>
		<td>any field declaration, including constants declared in <code>@interface</code>s
			and <code>enum</code> constants. (Note that annotations targeting
			fields can be used on their own member constants.)
		</td>
	</tr>
	<tr>
		<td>6</td>
		<td><a href="#target.parameter">Parameter</a></td>
		<td>any method parameter (not including <a
			href="/methods/receiver-parameters">receiver parameters</a>).
		</td>
	</tr>
	<tr>
		<td>7</td>
		<td><a href="#target.local-variable">Local Variable</a></td>
		<td>any local variable declaration, including those in the header of a
			<code>for</code> loop or <code>try</code>-with-resources statement.
		</td>
	</tr>
	<tr>
		<td>8</td>
		<td><a href="#target.package">Package</a></td>
		<td>implementation-chosen package declarations.</td>
	</tr>
	<tr>
		<td>9</td>
		<td><a href="#target.type-parameter">Type Parameter</a></td>
		<td>any type parameter declaration.</td>
	</tr>
	<tr>
		<td>10</td>
		<td><a href="#target.type-use">Type Use</a></td>
		<td>the use of a type.</td>
	</tr>
</table>
<h4 id="target.type">Type Target</h4>
<p>The type target allows an annotation to be applied to any type
	declaration.</p>
<ul>
	<li>the modifier list of any <a class="unlinked"><code>class</code>
			declaration</a>, (including nested, inner, and local classes).
	</li>
	<li>the modifier list of any <a class="unlinked"><code>interface</code>
			declaration</a>, (<a href="declarations"><code>@interface</code>
			declarations</a> and any nested <code>interface</code> or <code>@interface</code>
		declarations),
	</li>
	<li>the modifier list of any <a class="unlinked"></a> <!-- TODO: Finish listing places where Type annotations can be used. -->

</ul>
<h3>Meta Annotations</h3>
<?php
b();
