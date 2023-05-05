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
<h4 id="target.method">
	<code>METHOD</code> Target
</h4>
<p>
	Allows an annotation to apply to methods. Such annotations may be put
	within the <span class="syntax-piece">modifier-list</span> of a method
	declaration.
</p>
<p>Annotation declarations with this target can apply to annotation
	elements, including their own annotation elements.</p>
<h4>
	<code>CONSTRUCTOR</code> Target
</h4>
<p>
	Allows an annotation to target any constructor declaration. The
	annotation is put in the <span class="syntax-piece">modifier-list</span>
	of the declaration.
</p>
<h4>
	<code>FIELD</code> Target
</h4>
<p>
	Allows an annotation to target any field declaration. Such annotations
	can only be placed in the <span class="syntax-piece">modifier-list</span>
	of a field declaration. Reflectively, the annotation can be accessed
	from any <code>java.lang.reflection.Field</code> that is a part of the
	annotated declaration, though the annotation cannot be applied to only
	some fields in a multi-field declaration.
</p>
<h4>
	<code>PARAMETER</code> Target
</h4>
<p>Allows an annotation to target any parameter in a:</p>
<ul>
	<li>method declaration,</li>
	<li>lambda expression,</li>
	<li>or <code>catch</code> clause.
	</li>
</ul>
<p>
	The annotation is put in the <span class="syntax-piece">modifier-list</span>
	of the parameter.
</p>
<p>
	Note that this target does not allow an annotation to be applied to <a
		href="/methods/receiver-parameters">receiever parameters</a>, as
	annotations that are a part of a receiver parameter may only be applied
	to the type use within the receiver parameter declaration.
</p>
<h4>
	<code>LOCAL_VARIABLE</code> Target
</h4>
<p>
	Allows an annotation to target any local variable declaration,
	including those inside the headers of <code>for</code> loops and <code>try</code>
	statements. The annotation is put in the <span class="syntax-piece">modifier-list</span>,
	just like the keyword <code>final</code> if it is present.
</p>
<h4>
	<code>PACKAGE</code> Target
</h4>
<p>Allows an annotation to target package declarations. In any given
	package, only one such package declaration is allowed to be annotated.
	The annotation is put in front of the declaration, in the declaration's
	"modifier list." As of Java 8, there are no modifiers applicable to a
	package declaration other than annotations.</p>
<h5>Implementation-Specific Canonical Package Declaration</h5>
<p>
	Implementations typically choose to specify a canonical package
	declaration, and require that this be the only package declaration that
	be annotated. Many implementations follow suggestions made by the
	specification that this canonical declaration be in a file called <code>package-info.java</code>
	which is situated directly in the package.
</p>
<p>
	This means that, in some implementations of the Java compiler, an
	annotated package declaration must go in a <i>specific</i> file, rather
	than go in any file subject to the constraint that there is only one
	such annotated declaration per package.
</p>
<h4>
	<code>TYPE_PARAMETER</code> Target
</h4>
<p>Annotations with this target can be applied to type parameters in a
	declaration of a generic:</p>
<ul>
	<li>Class,</li>
	<li>Interface,</li>
	<li>Constructor,</li>
	<li>or Method.</li>
</ul>
<p>
	The type parameters declared in the <span class="syntax-piece">type-parameter-list</span>
	of these program elements can each be annotated with annotations
	targetnig <code>TYPE_PARAMETERS</code>. Such annotations are located
	textually immediately in front of the name of the type variable in the
	declaration.
</p>
<h4>
	<code>TYPE_USE</code> Target
</h4>
<p>
	The <code>TYPE_USE</code> target allows an annotation to be applied to
	types in <i>type contexts</i>. Type contexts are contexts where a type
	is used to denote the literal type of a value, object, or other thing.
	For example, the type in a simple variable declaration is used to
	denote the type of value the variable can store, and the type in an <code>extends</code>
	clause is used to denote what the type is being extended. In some
	cases, types can be used as other objects, such as a simple container
	for a nested class; the <code>TYPE_USE</code> target does not permit an
	annotation to be applied in these other cases.
</p>
<p>
	A <code>TYPE_USE</code> annotation can be located as follows:
</p>
<ul>
	<li>immediately before the <i>simple name</i> of the following types:
		<ul>
			<li>type of the variable in a field or local variable declaration,</li>
			<li>a non-<code>void</code> return type in a method declaration
				(including the element type of an annotation element declaration),
			</li>
			<li>the type of the parameter in a method or constructor's parameter
				declaration,</li>
			<li>the type of the parameter in a lambda expression's formal
				parameter declaration (if the type is included),</li>
			<li>each of the types of the exception parameter in a <code>catch</code>
				clause,<!-- TODO: In the execption param: (@A1 Ex1 | @A2 Ex2 e) it seems that @A1 applies to the type Ex1|@A2 Ex2 whereas @A2 applies to Ex2. Verify this? -->
			</li>
			<li>any type that is an argument to the <code>extends</code> clause,
				of a <code>class</code> or <code>interface</code> declaration,
			</li>
			<li>any type that is an argument to the <code>implements</code>
				clause,
			</li>
			<li>any type used to qualify a type that it encloses (i.e., contains
				in an non-<code>static</code> context<sup info=1></sup>), <span
				info=1>Types used in a reference to qualify other types may only be
					annotated if they enclose the qualified type. For example, if <code>Ann</code>
					is an annotation that targets <code>TYPE_USE</code>, <pre><code>class Outer {
	class Inner {	}
	
	private @Ann Outer.Inner someField; // Make a class variable of type Outer.Inner, where Outer is annotated.
}</code></pre>
					<p>
						The above <code>@Ann</code> annotation applies to <code>Outer</code>
						and compiles, since the identifier <code>Outer</code> refers to
						the class <code>Outer</code> as an <i>enclosing instance</i> of
						the class <code>Inner</code>; the meaning of the <code>Outer</code>
						identifier is semantically a type enclosing <code>Inner</code>.
					</p>
					<p>
						However, if <code>Inner</code> is <code>static</code> then the
						class <code>Inner</code> is no longer an instance member of <code>Outer</code>
						and outer no longer encloses it:
					</p> <pre><code>class Outer {
	static class Inner {	}
	
	// private @Ann Outer.Inner someField; // No longer compiles. Outer is considered nothing more than a container.
}</code></pre>
					<p>
						<code>Outer</code> is no longer semantically considered a type in
						the field declaration, so it may not be annotated as a type use.
						It is simply considered a "container" that statically contains <code>Inner</code>.
					</p>
					<p>
						In both cases, <code>Inner</code> may be annotated in the field
						declaration, since it is a type in both respects:
					</p> <pre><code>
class Outer {
	static class Nested {	}
	class Inner {	}
	
	private Outer.@Ann Nested field1;
	private Outer.@Ann Inner  field2;
}</code></pre>
			</span>
			</li>
			<li>any type that is an argument to a <code>throws</code> clause,
			</li>
			<li>the type used in an upper-bound for a type parameter, (i.e. the
				type used in the <code>extends</code> clause of a type parameter
				declaration),
			</li>
			<li>the type of a <a href="/methods/receiver-parameters">receiver
					parameter</a>,
			</li>
			<li>any type argument in an explicit type argument list,</li>
			<li>a type (including array types) used with the <code>new</code>
				operator that is instantiated by the <code>new</code> expression,
				<div class="note">Note that the annotation still applies to the type
					meant by the simple name, even if the type actually used is an
					array type.</div>
			</li>
			<li>a type used with the <code>new</code> operator to denote the
				supertype of an anonymous class being instantiated,
			</li>
		</ul> In these cases, the annotation applies to the type meant by the
		simple name that immediately follows it<sup info=2></sup>. <span
		info=2>For example, in the following fully qualified type: <pre><code>java.lang.@Ann Object myObjectVariable = "abc";</code></pre>
			<p>
				<code>Object</code> is a simple name, and it immediately follows <code>@Ann</code>,
				so <code>@Ann</code> applies to the type <code>Object</code> used in
				that variable declaration.
			</p>
			<p>This also has implications for array types:</p> <pre><code>@Ann Object[][] objectMatrix;</code></pre>
			<p>
				The <code>@Ann</code> annotation applies only to the type <code>Object</code>
				as it is used in the variable declaration. To apply the annotation
				to <code>Object[]</code> or <code>Object[][]</code> as used in the
				declaration, the annotation would need to be immediately before the
				appropriate pair of brackets. This occurs because an array type is
				textually composed of multiple types, so in the above variable
				declaration, the three types <code>Object</code>, <code>Object[]</code>,
				and <code>Object[][]</code> are being used.
			</p>
	</span>
	</li>
</ul>
<p>
	<code>TYPE_USE</code> <i>does not</i> permit an annotation to be used
	on:
</p>
<ul>
	<li>any type in an <code>import</code> declaration,
	</li>
	<li>a type used to qualify the <code>this</code> or <code>super</code>
		keyword, or
	</li>
	<li>a type <i>surrounding</i> (but not enclosing; see <sup info=1
		class="inline"></sup> above), another type<sup info=3></sup> in a
		qualified reference context,
	</li>
</ul>
<p>despite each of these being uses of types.</p>
<span info=3>A type can <i>surround</i> or <i>enclose</i> a member.
	<ul>
		<li>If a type's member is <code>static</code>, the type surrounds that
			member.
		</li>
		<li>If a type's member is an instance member (non-<code>static</code>),
			that type encloses that member.
		</li>
	</ul>
</span>
<h3>Meta Annotations</h3>
<h3>
	<span class="syntax-piece">element-value</span> and <span
		class="syntax-piece">element-value-list</span>
</h3>
<!-- TODO: Talk about how these arguments must be constants. -->
<!-- TODO: Talk about how these arguments may also include annotations, even inside the array expressions. -->
<h2>Examples</h2>
<div>
	<h4>Self-Application of Annotations</h4>
	<!-- TODO: Show an example of an annotation that targets ANNOTATION_TYPEs applying to itself. -->
</div>
<div>
	<h4>Annotation Applied to Own Members</h4>
	<!-- TODO: Show example of an annotation that targets METHODs being applied to its own element. -->
	<!-- TODO: Distinguish this from the annotation element returning itself. -->
</div>
<?php
b();
