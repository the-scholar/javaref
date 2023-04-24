<?php t("Annotation Element Declarations", "Used to specify the attributes that need to/can be given values when an annotation is used.");?>
<h1>Annotation Element Declarations</h1>
<p class="description">Defines an attribute of an annotation.</p>
<h2>Syntax</h2>
<p>An annotation element declaration consists of:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece optional">modifier-list</span> <span
			class="syntax-piece">type</span> <span class="syntax-piece">name</span>
			<code>(</code> <code>)</code> <span class="syntax-piece optional">array-dims</span>
			<span class="optional"><code>default</code> <span
				class="syntax-piece">default-value</span></span> <code>;</code></td>
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
				<li><code>public</code>,</li>
				<li><code>abstract</code>,</li>
				<li>and any number of annotations that are applicable to the
					annotation element</li>
			</ul>
			<p>intermixed in any order.</p>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">type</span></td>
		<td>is one of the following:
			<ul>
				<li>A primitive type,</li>
				<li>the type, <code>Class</code> (possibly parameterized),
				</li>
				<li><code>String</code>,</li>
				<li>any <code>enum</code> type,
				</li>
				<li>any other annotation type that does not have an element of this
					annotation type (directly or indirectly), or</li>
				<li>an array of any of these types of max dimensionality <code>1</code>.
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">name</span></td>
		<td>is an identifier denoting the name of the element.</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">array-dims</span></td>
		<td>is the <code>[</code> token followed by the <code>]</code> token,
			used together to indicate that the element's type is an array. The
			brackets can instead be included in the <span class="syntax-piece">type</span>,
			but are allowed here for consistency with older versions.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">default-value</span></td>
		<td>is a constant expression, whose type is the same as the element's
			declared type.</td>
	</tr>
</table>
<h2>Usage</h2>
<p>
	Annotation element declarations are used exclusively in the body of <a
		href="/annotations/declarations">annotation declarations</a>. They're
	used to define attributes that must/may be specified when the declared
	annotation is used. The <span style="color: #66ffe3;">annotation
		element declarations</span> in the following example are highlighted
	turquoise, and the <span style="color: #ffe62b;">annotation uses</span>
	are higlighted yellow.
</p>
<pre><code>@interface SomeAnnotation {
	<span style="color: #66ffe3;">int size();</span> // Required annotation element
	<span style="color: #66ffe3;">String website() default "javaref.net";</span> // Optional annotation element
}


<span style="color: #ffe62b">@SomeAnnotation(<span
			style="color: #9a935b;">size = 4</span>)</span> class AnnotationTest { // size is required, so it must be specified
	<span style="color: #ffe62b">@SomeAnnotation(<span
			style="color: #9a935b;">size = 12, website = "javaref.net/annotations/declarations"</span>)</span>
	int x = 14; // Specify size explicitly

	<span style="color: #ffe62b">@SomeAnnotation(<span
			style="color: #9a935b;">website = "example.com", size = 10</span>)</span>
	void someMethod() {	}
}</code></pre>
<p>
	The type of value that may be provided for an element when using an
	annotation is the <span class="syntax-piece">type</span> specified in
	the element declaration. Annotation elements may optionally have both
	or either of the keywords <code>public</code> and <code>abstract</code>,
	but neither one has any effect, since annotation element declarations
	are already deemed <code>public</code> and <code>abstract</code>.
</p>
<h3>Default Elements</h3>
<!-- Discuss how default annotation elements do not have to be specified. -->
<h3>Restrictions</h3>
<h4>Inheritance</h4>
<!-- Talk about how no public or protected method from Object or Annotation can be "overridden" with an annotation element decl. -->
<h4>Cyclic Elements</h4>
<!-- Talk about how having an element whose type, either directly or indirectly, contains an annotation of the current type, is a compile-time error. -->
<h3>
	<code>value()</code> Element
</h3>
<!-- Discuss how this element is used to allow a anonymously supplying a value when using an annotation. -->