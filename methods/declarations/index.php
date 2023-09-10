<?php t("Method Declaration", "Method declarations introduce a named, executable group of statements to a program.");?>
<h1>Method Declaration</h1>
<p class="description">Declares a method, (possibly with a body), so that it can be referenced
	via a method reference, called, and overridden.</p>
<p>A method is a named group of statements that can be referred to and
	executed via a method invocation statement. A method declaration
	introduces a method to the program. The group of statements that are
	executed are called the method's implementation. A method declaration
	includes the method's name (and formally, it's signature), which can be
	used to refer to the method elsewhere, though it is not always necessary for a
	declaration to include the implementation.</p>
<h2>Syntax</h2>
<p>A method declaration consists of:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece optional">modifier-list</span> <span
			class="syntax-piece">return-type</span> <span class="syntax-piece">name</span>
			<code>(</code> <span class="syntax-piece optional">parameter-list</span>
			<code>)</code> <span class="syntax-piece optional">array-dims</span>
			<span class="optional"><code>throws</code> <span class="syntax-piece">throw-list</span></span>
			<span class="syntax-piece">body</span></td>
	</tr>
	<tr>
		<td>2</td>
		<td><span class="syntax-piece optional">modifier-list</span> <code>&lt;</code>
			<span class="syntax-piece">type-parameter-list</span> <code>&gt;</code>
			<span class="syntax-piece">annotation-list</span> <span
			class="syntax-piece">return-type</span> <span class="syntax-piece">name</span>
			<code>(</code> <span class="syntax-piece optional">parameter-list</span>
			<code>)</code> <span class="optional syntax-piece">array-dims</span>
			<span class="optional"><code>throws</code> <span class="syntax-piece">throw-list</span></span>
			<span class="syntax-piece">body</span></td>
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
				<li>one of the three <i>access modifiers</i>: <code>public</code>, <code>protected</code>,
					and <code>private</code>,
				</li>
				<li>up to one of each of the following keywords: <code>final</code>,
					<code>static</code>, <code>strictfp</code>, <code>synchronized</code>,
					<code>abstract</code>, <code>native</code>, and <code>default</code>,
				</li>
				<li>any number of annotations that are applicable to the method (see
					<a href="#AnnotationRestrictions">below</a> for details).
				</li>
			</ul> intermixed and in any order.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">return-type</span></td>
		<td>is a type denoting what type of value, if any<sup info=1></sup>,
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
					modifier set can contain the keyword <code>final</code>, as well as
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
			optionally separated (e.g. <code style="white-space: pre;">[][] []</code>)
			and/or split (e.g. <code style="white-space: pre;">[][][ ]</code>) by
			whitespace. Each <code>[]</code> pair may be annotated with an
			annotation that targets type use. (Such annotations target the
			respective dimension of the array that the <code>[]</code>
			represents.)
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
	<tr>
		<td><span class="syntax-piece">type-parameter-list</span></td>
		<td>is a comma-separated list of type parameters. Each type parameter
			is an identifier. The identifier may be followed by the keyword <code>extends</code>
			and then a set of types to establish an upper bound. The set of types
			upper-bounding the parameter must be delimitted by the <code>&amp;</code>
			token, and all but the first must be <code>interface</code> types.
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
		</ul> then the method must have <code>;</code>
		for its <span class="syntax-piece">body</span>. Otherwise, the method
		must have a block statement as its <span
		class="syntax-piece">body</span>.
	</li>
</ul>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> A normal method declaration.
</p>
<p>
	<span class="syntax-number">2</span> A generic method declaration, with
	type parameters.
</p>
<h2>Components</h2>
<p>A method can be declared directly within a class or interface, or
	within an enum's body declaration (after the constant list). Method
	declarations can override methods inherited from a parent type.</p>
<h3 id="AnnotationRestrictions">Annotations</h3>
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
	references with an explicit instance. This is in contrast to instance
	methods, which, in their bodies, may access instance-specific members
	without explicit qualification. Instance methods additionally may refer
	to <code>this</code> and <code>super</code>.
</p>
<h4>
	<code>strictfp</code> Modifier
</h4>
<p>
	The <code>strictfp</code> modifier causes all floating point
	computations written in the body of a so modified method to
	consistently operate on the normal float/double value set (depending on
	expression type) across implementations. See <a
		href="/keywords/strictfp">strictfp</a> for details.
</p>
<h4>
	<code>synchronized</code> Modifier
</h4>
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
	Any non-<code>abstract</code> sub-type that inherits an <code>abstract</code>
	method from its immediate parent must override the abstract method and
	provide an implementation:
</p>
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
<h4>
	<code>default</code> Modifier
</h4>
<p>
	The default modifier allows a method declared in an <code>interface</code>
	to include an implementation. <code>default</code> methods are not
	abstract. A method declaration containing <code>default</code> must
	include a block as its body.
</p>
<h3>Return Type</h3>
<p>A method's return type determines the type of the method invocation
	statement that invokes it.</p>
<p>
	If a method has a return type other than <code>void</code>, it is
	required to execute at least 1<sup info=3></sup> <code>return</code>
	statement at the end of every possible path of execution that does <code>throw</code>
	a value.
</p>
<span info=3> With a <code>finally</code> block, a method may execute
	multiple of <code>return</code> statements. In such a case, the last <i>abrupt
		exit</i> from execution of the method takes precedence, i.e., the
	final <code>return</code> or <code>throw</code> that is executed is
	what the method completes with: <pre><code>int test() {
	try {
		return 5;
	} finally {
		return 10;
	}
}</code></pre> A call to <code>test()</code> returns <code>10</code>.
</span>
<h3>Parameter List</h3>
<p>A method's parameters are a list of inputs that must be provided upon
	a call to the method. The variables declared in the parameter list are
	accessible throughout the body of the method and are given values when
	the method is called.</p>
<h4>Overloads</h4>
<p>A method may be overloaded if there are two or more method
	declarations with its same name, but different signatures. A method's
	signature includes the ordered list of types of its parameters, and
	methods with different ordered lists of parameter types are considered
	different when resolving overloads to execute a method invocation
	statement. The presence of a receiver parameter has no effect on
	overload resolution, since method invocation statements cannot provide
	an argument for that parameter explicitly.</p>
<p>Overload resolution happens statically, so the type of the expression
	used as an argument in the method invocation is what determines the
	method to be called.</p>
<h4>Receiver Parameter</h4>
<p>
	The receiver parameter is a parameter whose type is that of the class
	the instance method belongs to and whose parameter name is the keyword
	<code>this</code>. It may be annotated as any other parameter, but it
	otherwise has no effect on the code; it does not change the method's
	signature or affect overloading or invoking. The <code>this</code>
	keyword is innately accessible in instance methods without needing to
	be declared.
</p>
<h4>Var-args Parameter</h4>
<p>
	The final parameter in a parameter list can optionally be a <i>variable-arity</i>
	parameter, by succeeding its type with the <code>...</code> token. Such
	a parameter allows any number of arguments, of the parameter's type, to
	be provided in a method invocation statement as the final arguments in
	the statement's argument list. An array is automatically created from
	the arguments provided, and in the body of the method, the varargs
	parameter is useable in the exact same way as an array.
</p>
<h3>Type Parameters</h3>
<p>
	Generic type parameters declared in the <span class="syntax-piece">type-parameter-list</span>
	can be referenced throughout the remainder of the method, including in
	the method's <span class="syntax-piece">parameter-list</span>, <span
		class="syntax-piece">body</span>, and even the method's <span
		class="syntax-piece">throw-list</span>. Any type parameters declared
	in the <span class="syntax-piece">type-parameter-list</span> may also
	be referenced anywhere else within the <span class="syntax-piece">type-parameter-list</span>.
	This allows for recursive type parameters.
</p>
<h4>
	Type parameters in the <span class="syntax-piece">parameter-list</span>
</h4>
<p>
	When used as a type in the <span class="syntax-piece">parameter-list</span>,
	a type parameter's <i>upper bound</i> is used for overload resolution.
</p>
<pre><code>   &lt;T&gt; void test(T input) {	}
// void test(Object input) {	} // Compiler error, generic method test(T) conflicts with this method.</code></pre>
<p>This conflict can be avoided in cases where it is possible to
	upper-bound the parameter:</p>
<pre><code>   &lt;T extends Dog&gt; void test(T input) {	}
   void test(Object input) {	} // Does not conflict; test(T) cannot be called with ANY object.</code></pre>
<p>However, the upper bound, if provided explicitly, can still conflict
	with other methods:</p>
<pre><code>   &lt;T extends Dog&gt; void test(T input) {	}
// void test(Dog input) {	} // Conflicts with test(T), since T's upper bound is Dog.</code></pre>
<h4>
	Type parameters in the <span class="syntax-piece">throw-list</span>
</h4>
<p>
	Type parameters may also be used in the <span class="syntax-piece">throw-list</span>
	to declare a method that throws a generic exception. This is only
	possible if the type parameter being used is bounded so that it is
	guaranteeably a type that can be thrown (<code>Throwable</code> or a
	subclass thereof).
</p>
<h4>
	Type parameters in the <span class="syntax-piece">body</span>
</h4>
<p>Type parameters can be used as any other type within the body of the
	method they are declared in.</p>
<h3>
	<span class="syntax-piece">array-dims</span> Component
</h3>
<p>
	The <span class="syntax-piece">array-dims</span> is a legacy
	syntactical element that allows the pairs of brackets (<code>[]</code>),
	used to declare a dimension of an array type for the return type of the
	method, to be placed after the parameter list of a method declaration.
	It can consist of any number of pairs of brackets. The array dims
	specified in this location are applied to the return type as if
	appended to the return type.
</p>
<h3>
	<code>throws</code> Clause
</h3>
<p>
	The <code>throws</code> clause declares what exceptions a method can
	throw. Any checked exceptions that are thrown in the method body under
	any path of execution must be assignable to at least one of the types
	listed in the <code>throws</code> clause, otherwise, the code will not
	compile. The same exception may be listed in the <span
		class="syntax-piece">throw-list</span> more than once. Additionally, <code>RuntimeException</code>s
	and <code>Error</code>s, (both of which are the root unchecked types),
	and their subtypes, do not need to be listed, but may be.
</p>
<p>
	The rules governing required types in the <span class="syntax-piece">throw-list</span>
	apply only to checked exceptions that the method may abruptly terminate
	due to the throwing of. Because of this, if a checked exception is
	thrown and caught within the method's body, the exception does not need
	to be listed in the <code>throws</code> clause.
</p>
<h2>Examples</h2>
<div class="example">
	<h4>
		<code>static</code> Method Restrictions
	</h4>
	<p>
		Example of inability to reference instance properties from a <code>static</code>
		method body:
	</p>
	<pre><code>class Dog {
	static Dog someDogInstance = new Dog();

	int age; // Instance field
	static void grow() {
		// age++; // Not allowed; no Dog instance to increment the age of.
		
		Dog x = new Dog(); // Make a Dog instance.
		x.age++;
		
		someDogInstance.age++;
	}
	
	void growThisDog() {
		age++; // Instance methods are called with an instance, and that instance is used implicitly here in the method body.
		this.age++; // Equivalent to age++
		
		someDogInstance.age++; // Instance methods can still access static data directly, but not vice versa.
	}
}</code></pre>
</div>
<div class="example">
	<h4>
		<code>abstract</code> Methods
	</h4>
	<p>An expression whose type is an abstract type can still be used to
		invoke abstract methods in that abstract type, though the
		implementation that gets executed depends on the concrete type of the
		value the expression evaluates to:</p>
	<pre><code>abstract class Animal {
	abstract void makeSound();
}

class Dog extends Animal {
	void makeSound() {
		System.out.println("Woof");
	}
}

class Cat extends Animal {
	void makeSound() {
		System.out.println("Meow");
	}
}

class Test {
	void test() {
		Animal a = Math.random() &lt; .5 ? new Dog() : new Cat();
		a.makeSound(); // May print "Meow" or "Woof"
	}
}</code></pre>
	<p>
		<code>abstract</code> methods must be implemented by any concrete
		subclasses that inherit them:
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
</div>
<div class="example">
	<h4>Method Invocations &amp; Return Type</h4>
	<p>Example of how return type affects method invocation statements:</p>
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
	<p>Example of return type imposing return requirements on method body:</p>
	<pre><code>int test() {
	if (Math.rand() &gt; 0.5) {
		return 4;
	}

	// Function may reach this point without returning a value; this is not allowed.
}</code></pre>
</div>
<div class="example">
	<h4>Overload Resolution</h4>
	<p>Method parameters determine which method gets invoked by a method
		call:</p>
	<pre><code>void test(int x) {
	System.out.println("Test was called with the number: " + x);
}

void test(String x) {
	System.out.println("Test was called with: " + x);
}

void runTest() {
	test("abc");
}</code></pre>
	<p>
		The output of invoking <code>runTest()</code> is:
	</p>
	<pre><code class="output">Test was called with: abc</code></pre>
	<p>Changing the type, but not the value, of an expression used as an
		argument for a method, can cause a different overload to be invoked:</p>
	<pre><code>void test(String x) {
	System.out.println("STRING VERSION CALLED");
}
void test(Object x) {
	System.out.println("OBJECT VERSION CALLED");
}

void runTest() {
	test((Object) "abc"); // Provide a String, but casted to type "Object."
}</code></pre>
	<p>
		In the above example, <code>test(Object)</code> will be invoked with a
		<code>String</code> as its argument, leading to the following output:
	</p>
	<pre><code class="output">OBJECT VERSION CALLED</code></pre>
</div>
<div class="example">
	<h4>Varargs Parameter</h4>
	<p>Any number of arguments can be provided in place of a varargs
		parameter:</p>
	<pre><code>void test(String... args) {
	System.out.println("TEST was called with: " + args.length + " argument(s).");
}

void runTest() {
	test(); // Provide no arguments.
	test("a", "b", "c"); // Provide three arguments.
	test("a"); // Provide one argument.
}</code></pre>
	<p>
		A call to <code>runTest()</code> prints:
	</p>
	<pre><code class="output">TEST was called with: 0 argument(s).
TEST was called with: 3 argument(s).
TEST was called with: 1 argument(s).</code></pre>
	<p>A var-args parameter can also be unambiguously provided an array
		argument:</p>
	<pre><code>test(new String[] {"a", "b", "c"});</code></pre>
	<p>Such method call prints:</p>
	<pre><code class="output">TEST was called with: 3 argument(s).</code></pre>
</div>
<div class="example">
	<h4>
		Type Parameters and <code>throws</code> Clause
	</h4>
	<p>
		Use of a type parameter in a <code>throws</code> clause:
	</p>
	<pre><code>&lt;T extends Exception&gt; void doSomethingThenThrow(T exception) throws T {
	if (Math.random() &lt; 0.5)
		throw exception;
}</code></pre>
	<p>This can allow callers to have to handle checked exceptions only
		when calling the method with checked exceptions:</p>
	<pre><code>doSomethingThenThrow(new RuntimeException()); // This invocation effectively declares "throws RuntimeException", so no need to wrap in try-catch.
try {
	doSomethingThenThrow(new Exception()); // This invocation effectively declares "throws Exception"
} catch (Exception e) {

}</code></pre>
</div>
<div class="example">
	<h4>
		<span class="syntax-piece">array-dims</span> Usage
	</h4>
	<p>
		Methods declared with <span class="syntax-piece">array-dims</span>
	
	
	<pre><code>// Two total array dims, both after parameter list.
int x()[][] {
	return new int[1][1];
}

// Three total array dims: two in return type, one after parameter-list.
int[][] x()[] {
	return new int[1][1][1];
}</code></pre>
</div>
<div class="example">
	<h4>
		<code>throw</code>ing Without <code>throws</code> Clause
	</h4>
	<p>
		A <code>throws</code> clause is only necessary if the method may
		terminate with a checked exception:
	</p>
	<pre><code>void riskyMethod() throws Exception {
	if (Math.random() &lt; .1)
		throw new Exception("Throwing an exception!");
}

void test() {
	try {
		riskyMethod();
	} catch (Exception e) {
		// Ignore the exception!
	}
}</code></pre>
	<p>
		The above example compiles since the body of the method <code>test()</code>
		does not have any code deemed to potentially complete abruptly due to
		a checked exception. If the <code>try</code>-<code>catch</code> were
		not used to wrap the call to <code>riskyMethod()</code>, <code>Exception</code>
		or its supertype, <code>Throwable</code>, would need to be listed in
		the <span class="syntax-piece">throw-list</span>.
	</p>
</div>
<h2>Notes</h2>
<ol>
	<li>The <code>final</code> modifier never has an effect on <code>private</code>
		methods, since such instance methods are not dynamically bound, and
		since such <code>static</code> methods cannot be overridden anyway.
	</li>
	<li><p>
			Type parameters can be used to throw a checked exception in an
			unchecked fashion by allowing the type of the expression provided to
			a <code>throw</code> statement to be an unchecked exception while the
			value itself remains a checked exception. This can be done by casting
			a checked exception to a generic type parameter, and then throwing
			the result:
		</p> <pre><code>public static @SuppressWarnings("unchecked") &lt;E extends Throwable&gt; void throwUnchecked(Throwable t) throws E {
	throw (E) t;
}</code></pre>
		<p>
			Any call to the method that does not explicitly provide type
			arguments will infer <code>E</code> to be <code>RuntimeException</code>,
			however, the exception provided to the method will still be thrown,
			even if it is a <code>Throwable</code> instance.
		</p>
		<p>
			The cast to <code>E</code> does not fail, since <code>E</code> is
			upper-bounded by <code>Throwable</code> and the argument to the
			method is any <code>Throwable</code> instance.
		</p></li>
	<li><p>The compiler prefers method overloads that are closer to the
			type of the expression being used to invoke a method. A call can be
			ambiguous if two or more overloads can plausibly be called by a
			single method invocation statement. There are many cases where this
			can happen, most often with a var-args overload or a null argument,
			but sometimes with overloads whose problematic parameters are sibling
			types in a type hierarchy:</p> <pre><code>void varargs(int... x) {	}
void varargs(Integer... x) {	}</code></pre>
		<p>
			Calling <code>varargs(1)</code> will fail. The caller is required to
			provide an array explicitly to pick which method is desired, such as
			through: <code>varargs(new int[] {1})</code>.
		</p>
		<p>Another example, involving a class hierarchy:</p> <pre><code>// Wrapper class
public class AmbiguityTest {
	interface X {	}
	interface Y {	}
	class Z implements X, Y {	}
	
	static void m(X x) {	}
	static void m(Y y) {	}
	
	public static void main(String[] args) {
		// m(new Z()); // Ambiguous method call; expression of type Z is equidistant from both X and Y. (X &amp; Y are the types of the parameters of the two method overloads of m.)
	}
}</code></pre>
		<p>
			Such can be resolved using a cast, e.g. <code>m((X) new Z())</code>
			will invoke <code>m(X)</code>. If a method overload is introduced to
			explicitly accept a <code>Z</code> parameter, such overload will be
			used instead, since the method invocation has an argument of type <code>Z</code>.
		</p>
		<p>
			The <code>null</code> literal can often lead to ambiguity, because it
			can directly exist as an expression of any reference type:
		</p> <pre><code>// Wrapper class
public class AmbiguityTest {
	interface X {	}
	interface Y {	}
	class Z implements X, Y {	}
	
	static void m(X x) {	}
	static void m(Y y) {	}
	
	public static void main(String[] args) {
		// m(null); // Ambiguous method call with null literal.
	}
}</code></pre>
		<p>
			A cast can clarify the type of the expression <code>null</code> in
			the method call and resolve the ambiguity in this case as well.
			Adding a more specific overload in the class hierarchy will cause the
			method invocation to prefer that as well:
		</p> <pre><code>// Wrapper class
public class AmbiguityTest {
	interface X {	}
	interface Y {	}
	class Z implements X, Y {	}
	
	static void m(X x) {	}
	static void m(Y y) {	}
	static void m(Z z) {	}
	
	public static void main(String[] args) {
		m(null); // Calls m(Z)
	}
}</code></pre>
		<p>However, if there is no overload that is a subtype of other
			overloads, the ambiguity will persist:</p> <pre><code>// Wrapper class
public class AmbiguityTest {
	static void m(String x) {	}
	static void m(Number y) {	}
	
	public static void main(String[] args) {
		// m(null); // Ambiguous
	}
}</code></pre></li>
</ol>
<?php

b();
