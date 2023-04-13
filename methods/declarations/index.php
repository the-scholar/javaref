<?php t("Javaref - Method Declaration");?>
<h1>Method Declaration</h1>
<p class="description">Declares a method so that it can be referenced
	via a method reference, called, and overridden, possibly while also
	providing a body.</p>
<p>A method is a named group of statements that can be referred to and
	executed via a method invocation statement. A method declaration
	introduces a method unto the program. The group of statements that are
	executed are called the method's implementation. A method declaration
	includes the method's name (and formally, it's signature), which can be
	used to refer to it elsewhere, though it is not necessary for a
	declaration to include the implementation.</p>
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
<p class="note">
	For a more human-friendly breakdown, see <a href="#AppendixA">Appendix
		A</a>.
</p>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">modifier-list</span></td>
		<td>is an unordered set of:
			<ol>
				<li>applicable method modifier keywords, and</li>
				<li>applicable annotations.</li>
			</ol>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">return-type</span></td>
		<td>is a type denoting what type of values the method returns, if any<sup
			info=1></sup>.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">name</span></td>
		<td>is an identifier that names the method.</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">parameter-list</span></td>
		<td>is a comma-separated list of <span class="syntax-piece">parameter</span>s,
			the last of which may be a variable-arity (var-args) parameter.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">parameter</span></td>
		<td>is an identifier</td>
	</tr>
</table>
<span info=1>If <code>void</code> is specified as the method's return
	type, the method returns no value.
</span>

<section sect-symbol="A" id="AppendixA">
	<h1>Appendix A</h1>

</section>


<?php b();?>