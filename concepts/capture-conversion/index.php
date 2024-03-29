<?php t("Javaref - Capture Conversions", "Capture conversion is a process that the compiler undergoes to replace wildcards with reified types in certain contexts. In doing so, it \"captures\" the type hidden behind the wildcard for use in type checking.");?>
<!-- TODO: Add to homepage -->
<h1>Capture Conversion</h1>
<p class="description">
	Capture conversion is a process undergone by the compiler during type
	checking that effectively gives a unique, <i>temporary</i> name to a
	wildcard type that is not directly referencable by the developer, but
	can be used by the compiler to validate typing in certain operations.
	Capture conversion strengthens the applicability of wildcards.
</p>
<h2>Extended Description</h2>
<h3>Motivation</h3>
<p>
	Consistency information regarding wildcard types is not kept between
	two uses of the <i>same</i> wildcard type. For example, the fourth statement
	of the following code raises a compilation error:
</p>
<pre><code>List&lt;String&gt; strlist = new ArrayList&lt;&gt;();
strlist.add("some value");

List&lt;?&gt; myList = strlist;
myList.set(0, myList.get(0));</code></pre>
<p>
	Despite it being obvious that execution of this code would never result
	in type mismatches, (since the element returned by <code>myList.get(0)</code>
	is of type <code>String</code>, and <code>myList</code> can
	store strings), this code fails to compile due to type checking:
	Because <code>myList</code>'s parameter type is a wildcard, <code>?</code>,
</p>
<ul>
	<li>the type of the expression <code>myList.get(0)</code> is <code>?</code>
		and
	</li>
	<li>the type of the second parameter of <code>myList.set(...)</code> is
		<code>?</code>.
	</li>
</ul>
<p>
	Java does not consider these two <code>?</code> wildcards as
	equivalent, even though they represent the same type. In particular, a wildcard is not a named type, so two
	distinct type references referring to the same wildcard are considered
	unequal by the compiler. (This means that the compiler considers the
	return type of <code>myList.get</code> and the parameter of <code>myList.set</code>
	as completely distinct types.)
</p>
<p>Capture conversion helps to alleviate this issue.</p>
<h3>Capture Conversion</h3>
<p>Capture conversion is a process in which the compiler assigns an
	actual, inferred type to a wildcard, allowing code referencing the
	wildcard type to be used in certain contexts, like a method call:</p>
<pre><code>&lt;T&gt; void doSomething(List&lt;T&gt; someList) {
	// Works, because someList.get(0) is an expression of NAMED type T, which is equivalent to the type of the second parameter of someList.set(...)
	// Java checks equality of named types.
	someList.set(0, someList.get(0));
}</code></pre>
<p>
	This method may be called with a <code>List</code> whose type argument
	is a wildcard:
</p>
<pre><code>List&lt;?&gt; myList = new ArrayList&lt;&gt;();
doSomething(myList); // Valid, despite being called with a list whose type is a wildcard.</code></pre>
<p>
	In such a case as the method invocation <code>doSomething(myList);</code>
	above, capture conversion is performed, replacing the wildcard type <code>?</code>
	in the type of the expression <code>myList</code> with the actual type
	<code>Object</code> (see <a href="#type-replacement-rules">below</a>
	for detail on what the wildcard is replaced with during capture
	conversion). The <code>doSomething</code> method is then called with
	the type parameter <code>Object</code>, similar to as if by <code>ContainingType.&lt;Object&gt;doSomething(myList);</code>.
</p>
<p>Capture conversion is performed in certain, language-mandated
	contexts.</p>
<h3 id="type-replacement-rules">Type Replacement Rules</h3>
<ul>
	<!-- TODO rewrite to be clearer; see int/float literals pages' descriptive sections. -->
	<li>If the wildcard has no bound, it is replaced with the bound for the
		type argument it substitutes,</li>
	<li>if the wildcard has an upper bound, it is replaced with a new type
		whose upper bound is the intersection of:
		<ol>
			<li>the wildcard's upper bound and</li>
			<li>the upper bound of the type parameter that the wildcard replaces,</li>
		</ol> (so long as at least one of the two upper bounds is a subtype of
		the other) and whose lower bound is the <code>null</code> type, and<sup
		info=8></sup> <span info=8>If a type parameter, <code>T extends
				UpperBoundOne</code> is parameterized by <code>? extends
				UpperBoundTwo</code>, the resulting new type has upper bound <code>UpperBoundOne
				&amp; UpperBoundTwo</code>.
	</span> <!-- TODO Describe how it's a compile-time error if none of the intersected types subtypes the other. -->
	</li>
	<li>if the wildcard has a lower bound, it is replaced with a new type
		whose upper bound is the bound of the type parameter that the wildcard
		takes place of and whose lower bound is the wildcard's lowerbound.</li>
</ul>
<p>
	This allows for otherwise impossible casts in various cases. (See <a
		href="/operators/unary/cast#note-2">Cast Operator - Notes</a> for
	examples.)
</p>
<h2>Examples</h2>
<!-- TODO: Add examples -->
<?php
b();