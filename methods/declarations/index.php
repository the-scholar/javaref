<?php t("Javaref - Method Declaration");?>
<h1>Method Declaration</h1>
<p class="description">Declares a method so that it can be referenced
	via a method reference, called, and overridden, possibly while also
	providing a body.</p>
<p>A method is a named group of statements that can be referred to and
	executed via a method invocation statement. A method declaration
	introduces a method to the program. The group of statements that are
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
			<span class="syntax-piece">body</span></td>
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
			<span class="syntax-piece">body</span></td>
	</tr>
</table>
<p class="note">
	For a more human-friendly treatment, see <a href="#AppendixA">Appendix
		A</a>.
</p>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">modifier-list</span></td>
		<td>is a possibly empty set of keywords and annotations that can
			contain:
			<ul>
				<li>one of the three <i>access modifiers</i>: <code>public</code>, <code>protected</code>,
					and <code>private</code>,
				</li>
				<li>up to one of each of the following keywords: <code>final</code>,
					<code>static</code>, <code>strictfp</code>, <code>synchronized</code>,
					<code>abstract</code>, and <code>default</code>,
				</li>
				<li>any number of annotations that are applicable to the method (see
					<a href="annotation-applicability">below</a> for details).
				</li>
			</ul> in any order.
			<p>
				Note that keywords and identifier tokens must be separated from each
				other by at least one whitespace character<sup info=1></sup> to be
				parsed as separate tokens and, thus, separate keywords, but the <code>@</code>
				character, present in any annotation, may have any amount of
				whitespace before or after it.
			</p> <span info=1> Keywords must be separated by whitespace,
				otherwise two consecutive keywords will be parsed as a single
				identifier token. For example, <code>finalstatic</code> is parsed as
				one, single identifier. Annotations, however, never need whitespace
				immediately before them, even if a keyword precedes them, since the
				<code>@</code> symbol indicates to Java the end of the previous
				token and the beginning of an annotation: <pre><code>public@SuppressWarnings("all")void test() {	}</code></pre>
				<p>Such code compiles.</p>
				<p>
					For annotations that end in an identifier, e.g. <code>@Override</code>,
					whitespace <i>must</i> come after them if an identifier or keyword
					follows, to separate the annotation's name from the succeeding
					token:
				</p> <pre><code>public @Overridevoid test() {	} // Does not compile: Unknown annotation "Overridevoid" and method has no return type.</code></pre>
		</span>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">return-type</span></td>
		<td>is a type denoting what type of values, if any<sup info=2></sup>,
			the method returns.
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
		<td>is</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">array-dims</span></td>
		<td>is any number of consecutive pairs of <code>[]</code> strings,
			optionally separated and/or split by whitespace.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">throw-list</span></td>
		<td>
			<!-- TODO -->
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">body</span></td>
		<td>is either a semicolon <code>;</code> or a block statement.
		</td>
	</tr>
	<p>
		<i>such that...</i>
	</p>
	<ul>
		<li>Each syntactical element may be separated by whitespace.</li>
	</ul>
</table>
<span info=2>If <code>void</code> is specified as the method's return
	type, the method returns no value.
</span>

<section sect-symbol="A" id="AppendixA">
	<h1>Appendix A</h1>

</section>


<?php b();?>