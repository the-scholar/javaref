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