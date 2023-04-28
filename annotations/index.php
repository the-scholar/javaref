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
		<td>is an identifier that names the annotation.</td>
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
</p>
<p>
	Annotations that apply to declarations are almost always specified in
	the declaration's <i>modifier list</i>, intermixed with keyword
	modifiers, such as <code>public</code>, <code>protected</code>, <code>static</code>,
	<code>final</code>, etc. Annotations that apply to type uses may appear
	in these same locations (subject to some constraints) or may more
	closely to the type. For details, see below.
</p>
<h3>Targets</h3>

<h2>Meta Annotations</h2>
<?php
b();