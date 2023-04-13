<?php t("Javaref - Method Declaration");?>
<h1>Method Declaration</h1>
<p class="description">A name given to a group of statements (the
	implementation) that can be referred to and executed via a method
	invocation statement. A method declaration includes the method's name
	(and formally, it's signature), which can be used to refer to it
	unambiguously elsewhere, though it is not necessary for a declaration
	to include the implementation.</p>
<h2>Syntax</h2>
<p>A method declaration consists of:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece">modifier-list</span> <span
			class="syntax-piece">return-type</span> <span class="syntax-piece">name</span>
			<code>(</code><span class="syntax-piece optional">parameter-list</span><code>)</code>
			<span class="syntax-piece optional">array-dims</span> <span
			class="optional"><code>throws</code> <span class="syntax-piece">throw-list</span></span>
			<span class="syntax-piece">block-body</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><span class="syntax-piece">modifier-list</span> <code>&lt;</code>
			<span class="syntax-piece">type-parameter-list</span> <code>&gt;</code>
			<span class="syntax-piece">annotation-list</span> <span
			class="syntax-piece">name</span> <code>(</code> <span
			class="syntax-piece optional">parameter-list</span> <code>)</code> <span
			class="optional syntax-piece">array-dims</span> <span
			class="optional"><code>throws</code> <span class="syntax-piece">throw-list</span></span>
			<span class="syntax-piece">block-body</span></td>
	</tr>
</table>
<p>
	For a more human-friendly breakdown, see <a
		href="#AppendixA">Appendix A</a>.
</p>

<section sect-symbol="A" id="AppendixA">
	<h1>Appendix A</h1>
	
</section>


<?php b();?>