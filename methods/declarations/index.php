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
			</ul> intermixed and in any order.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">return-type</span></td>
		<td>is a type denoting what type of values, if any<sup info=2></sup>,
			the method returns. The type may have its own annotations. <span
			info=2>If <code>void</code> is specified as the method's return type,
				the method returns no value.
		</span>
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
		<td>is made up of three components, in order:
			<ol>
				<li>A possibly empty set of parameter modifiers, in any order. The
					modifiers can contain the keyword <code>final</code>, as well as
					annotations that are applicable to parameters.
				</li>
				<li>A parameter type that determines the type of the variable. It
					may have its own annotations and may be followed by a <code>...</code>
					token if it is the last parameter in the parameter list, to
					indicate that it is a variable-arity argument. The <code>...</code>
					may be annotated, as well (e.g. <code>int @SomeAnnotation ...</code>).
				</li>
				<li>A variable name.</li>
			</ol>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">array-dims</span></td>
		<td>is any number of consecutive pairs of <code>[]</code> strings,
			optionally separated (e.g. <code style="white-space: pre;">[][]   []</code>)
			and/or split (e.g. <code style="white-space: pre;">[][][   ]</code>) by
			whitespace.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">throw-list</span></td>
		<td>A list of exception types denoting what the method is permitted to
			<code>throw</code>.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">body</span></td>
		<td>is either a semicolon <code>;</code> or a block statement.
		</td>
	</tr>
</table>
<p>
	<i>such that...</i>
</p>
<ul>
	<li>Keywords and identifier tokens must be separated from each other by
		at least one whitespace character<sup info=1></sup> to be parsed as
		separate tokens and, thus, separate keywords, but the <code>@</code>
		character, present in any annotation, may have any amount of
		whitespace before or after it. <span info=1> If not separated by
			whitespace, two consecutive keywords or identifiers will be parsed as
			a single identifier token. For example, <code>finalstatic</code> is
			parsed as a single identifier. Annotations, however, never need
			whitespace immediately before them, even if a keyword precedes them,
			since the <code>@</code> symbol indicates to Java the end of the
			previous token and the beginning of an annotation: <pre><code>public@SuppressWarnings("all")void test() {	}</code></pre>
			<p>
				A whitespace is not needed, but is allowed, before or after the <code>@</code>.
				Since <code>@SuppressWarnings</code> also ends in a closing
				parenthesis, whitespace is not required after it either.
			</p>
			<p>
				For annotations that end in an identifier, e.g. <code>@Override</code>,
				whitespace <i>must</i> come after them if an identifier or keyword
				follows, to separate the annotation's name from the succeeding
				token:
			</p> <pre><code>public @Overridevoid test() {	} // Does not compile: Unknown annotation "Overridevoid" and method has no return type.</code></pre>
	</span>
	</li>
	<li>If:
		<ul>
			<li>the method's <span class="syntax-piece">modifier-list</span>
				contains the <code>abstract</code> keyword, or
			</li>
			<li>the method belongs to an interface and its <span
				class="syntax-piece">modifier-list</span> does not contain the <code>default</code>
				keyword,
			</li>
		</ul> then the method is an <i>abstract</i> method and it must have <code>;</code>
		for its <span class="syntax-piece">body</span>. Otherwise, the method
		is not abstract and must not have <code>;</code> for its <span
		class="syntax-piece">body</span>.
	</li>
</ul>
<section sect-symbol="A" id="AppendixA">
	<h1>Appendix A</h1>

</section>


<?php b();?>