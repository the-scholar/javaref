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
					<code>abstract</code>, <code>native</code>, and <code>default</code>,
				</li>
				<li>any number of annotations that are applicable to the method (see
					<a href="annotation-applicability">below</a> for details).
				</li>
			</ul> intermixed and in any order.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">return-type</span></td>
		<td>is a type denoting what type of values, if any<sup info=1></sup>,
			the method returns. The type may have its own annotations. <span
			info=1>If <code>void</code> is specified as the method's return type,
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
			the first of which may be a receiver parameter and the last of which
			may be a variable-arity (var-args) parameter.
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
		at least one whitespace character<sup info=2></sup> to be parsed as
		separate tokens and, thus, separate keywords, but the <code>@</code>
		character, present in any annotation, may have any amount of
		whitespace before or after it. <span info=2> If not separated by
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
				contains the <code>abstract</code> or <code>native</code> keywords,
				or
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
<h2>Behavior</h2>
<p>A method can be declared directly within a class or interface, or
	within an enum's body declaration (after the constant list). Method
	declarations can override methods inherited from a parent type.</p>
<h3>Annotations</h3>
<p>
	Annotations can be placed in two distinct places in a method
	declaration, either in the <span class="syntax-piece">modifier-list</span>,
	intermixed with keyword modifiers, or, if type parameters are includes,
	after the <span class="syntax-piece">type-parameter-list</span> and
	immediately before the return type.
</p>
<p>Annotations included in the method declaration's modifier list will
	apply to:</p>
<ul>
	<li>the method, if the annotation's declaration declares that it
		targets methods, and</li>
	<li>the type-use that is the return type, if the annotation targets
		type-uses.</li>
</ul>
<p>If the annotation targets both type-uses and methods, the annotation
	applies to both the return type and the method. If the annotation does
	not target either, a compile error occurs.</p>
<p>
	If the method declares type parameters and the annotation is placed
	after the <span class="syntax-piece">type-parameter-list</span>, the
	annotation must target type-uses and the annotation applies only to the
	return type.
</p>
<h3>Keyword Modifiers</h3>
<p>
	Keyword modifiers are any of <code>public</code>, <code>protected</code>,
	<code>private</code>, <code>static</code>, <code>final</code>, <code>synchronized</code>,
	<code>strictfp</code>, <code>default</code>, <code>abstract</code>, and
	<code>native</code>. 
</p>
<h4>Access Modifier Keywords</h4>
<p>
	Access modifiers affect the accessibility of a method, which determines
	from where the method may be invoked (via a method invocation
	statement), referenced (via a method reference), and overridden.
	Without any access modifier keywords, a method's accessibility is <i>package-protected</i>,
	meaning that it can be accessed by code within the same package as
	where it is declared. If the method has the access modifier:
</p>
<ul>
	<li><code>public</code>, it can be accessed from anywhere,</li>
	<li><code>protected</code>, it can be accessed from within the
		top-level class it is declared in and within all of the subclasses of
		the immediate, surrounding class it is declared in,</li>
	<li><code>private</code>, it can be accessed from within the top-level
		class it is declared in only.</li>
</ul>
<p>A method can have at most one access modifier keyword, otherwise a
	compile error occurs.</p>
<h4>
	<code>final</code> Modifier
</h4>
<p>
	The <code>final</code> modifier, when used on a method, disables the
	ability for any subclasses to override the method. Despite having no
	effect, it may be used on <code>private</code> methods. It cannot be
	used on declarations directly in an <code>interface</code>, nor on any
	method declared <code>abstract</code> or <code>native</code>.
</p>
<h4>
	<code>static</code> Modifier
</h4>
<p>
	The <code>static</code> modifier causes a method to be a <i>class
		method</i> rather than an <i>instance method</i>. Resultingly, the
	method may not refer to <code>this</code>, <code>super</code>, or any
	other instance methods or instance fields without qualifying such
	references with an explicit instance:
</p>
<pre><code>class Dog {
	int age; // Instance field
	static void grow() {
		// age++; // Not allowed; no Dog instance to increment the age of.
	}
}</code></pre>
<p>This is in contrast to instance methods, which, in their bodies, may
	access instance-specific members without explicit qualification:</p>
<pre><code>class Dog {
	int age;
	void grow() {
		age++;
	}
}</code></pre>
<p>
	Instance methods additionally may refer to <code>this</code> and <code>super</code>:
</p>
<pre><code>class Dog {
	int age;
	void grow() {
		this.age++; // Equivalent to age++, which refers to age as a member of "this"
	}
}</code></pre>
<h4><code>strictfp</code> Modifier</h4>
<p>
	The <code>strictfp</code> modifier causes all floating point
	computations written in the body of a so modified method to
	consistently operate on the normal float/double value set (depending on
	expression type) across implementations. See <a
		href="/keywords/strictfp">strictfp</a> for details.
</p>
<h4><code>synchronized</code> Modifier</h4>
<p>
	A <code>synchronized</code> method synchronizes on:
</p>
<ul>
	<li><code>this</code>, if the method is an instance method, or</li>
	<li>the <code>Class</code> object of the class of which it is a member,
		if the method is <code>static</code>
	</li>
</ul>
<p>before it begins executing. The lock is released after the method
	completes.</p>
<h4>
	<code>abstract</code> Modifier
</h4>
<p>
	Abstract method declarations cannot provide a block statement body. <code>abstract</code>
	methods cannot be <code>static</code>, <code>final</code>, <code>native</code>,
	<code>private</code>, <code>synchronized</code>, nor <code>strictfp</code>.
	Any type containing an <code>abstract</code> method must also, itself,
	be <code>abstract</code> (<code>interface</code>s are always inherently
	<code>abstract</code>). <code>abstract</code> types cannot be
	instantiated directly; only concrete sub-types can be instantiated
	directly.
</p>
<p>
	If a method, <code>m()</code> is declared abstract in a type, <code>A</code>,
	then <code>m()</code> may be invoked on expressions of type <code>A</code>:
</p>
<pre><code>abstract class A {
	abstract void test();
}

class Test {
	void test() {
		A obj = getNewA(); // get an A object from somewhere...
		obj.test();
	}
}</code></pre>
<p>
	Any non-<code>abstract</code> sub-type that inherits an <code>abstract</code>
	method from its immediate parent must override the abstract method and
	provide an implementation:
</p>
<pre><code>abstract class A {
	abstract void test();
}

class Sub extends A {

	// Sub must implement test since Sub is not an abstract class, test is abstract, and test was inherited by Sub from A.
	@Override void test() {
		System.out.println("Sub");
	}
}

class Test {
	static A getNewA() {
		return new Sub();
	}

	void test() {
		A obj = getNewA();
		obj.test();
	}
}</code></pre>
<h4>
	<code>native</code> Modifier
</h4>
<p>The native modifier is used to declare a method whose implementation
	is provided through some other language, typically C or C++. Such
	methods' implementations are connected to the program through the Java
	Native Interface.</p>
<p>
	The <code>native</code> modifier cannot be used with <code>strictfp</code>
	or <code>abstract</code>, although it can be used with other modifiers.
</p>
<h4><code>default</code> Modifier</h4>
<p>
	The default modifier allows a method declared in an <code>interface</code>
	to include an implementation. <code>default</code> methods are not
	abstract. A method declaration containing <code>default</code> must
	include a block as its body.
</p>
<h3>Return Type</h3>
<p>A method's return type determines the type of the method invocation
	statement that invokes it:</p>
<pre><code>public class Test {
	static int x() {
		System.out.println("x");
		return 5;
	}
	
	static void y() {
		System.out.println("y");
	}
	
	public static void main(String[] args) {
		int a = x();
		// int b = y(); // Not allowed; y does not return anything.
		// String c = x(); // Not allowed; x does not return a String.
		
		System.out.println(a); // Prints 5.
	}
}</code></pre>
<p>
	If a method has a return type other than <code>void</code>, it is
	required to execute at least 1<sup info=3></sup> <code>return</code>
	statement at the end of every possible path of execution that does <code>throw</code>
	a value:
</p>
<pre><code>int test() {
	if (Math.rand() > 0.5) {
		return 4;
	}

	// Function may reach this point without returning a value; this is not allowed.
}</code></pre>
<span info=3> With a <code>finally</code> block, a method may execute
	multiple of <code>return</code> statements. In such a case, the last
	<i>abrupt exit</i> from execution of the method takes precedence, i.e.,
	the final <code>return</code> or <code>throw</code> that is executed is
	what the method completes with: <pre><code>int test() {
	try {
		return 5;
	} finally {
		return 10;
	}
}</code></pre> A call to <code>test()</code> returns <code>10</code>.
</span>
<h2>Examples</h2>
<h2>Notes</h2>
<ol>
	<li>The <code>final</code> modifier never has an effect on <code>private</code>
		methods, since such instance methods are not dynamically bound, and
		since such <code>static</code> methods cannot be overridden anyway.
	</li>
</ol>
<section sect-symbol="A" id="AppendixA">
	<h1>Appendix A</h1>

</section>


<?php b();?>