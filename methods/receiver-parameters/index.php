<?php t("Javaref - Receiver Parameters", "Reference page about receiver method parameters in Java.");?>
<h1>Receiver Parameters</h1>
<p class="description">Optional informal parameter added at the
	beginning of the parameter list of a method or constructor.</p>
<p>
	The receiver parameter syntactically expresses the access that a
	constructor or an instance method has to the surrounding instance's <code>this</code>
	keyword<sup info=1></sup>, which in turn represents the state of the
	object that the instance method or constructor is called on. Its
	primary use of a receiver parameter is in allowing the type of the
	keyword <code>this</code> to be annotated.
</p>
<span info=1>Instance methods and constructors in inner classes
	implicitly have access to the <code>this</code> keyword and the state
	it represents. Utilizing a receiver parameter does not give additional
	access privilege to the construct.
</span>
<h2>Syntax</h2>
<p>A receiver parameter consists of:</p>
<table class="syntax">
	<tr>
		<td>1</td>
		<td><span class="syntax-piece optional">annotation-list</span> <span
			class="syntax-piece">type</span> <code>this</code></td>
	</tr>
	<tr>
		<td>2</td>
		<td><span class="syntax-piece optional">annotation-list</span> <span
			class="syntax-piece">type</span> <span class="optional"><span
				class="syntax-piece">identifier</span> <code>.</code></span> <code>this</code></td>
	</tr>
</table>
<p>
	<i>where...</i>
</p>
<table class="syntax-breakdown">
	<tr>
		<td><span class="syntax-piece">annotation-list</span></td>
		<td>is a list of annotations applied to the following type. Each
			annotation is the <code>@</code> symbol followed by the name of the
			annotation. The <code>@</code> can be followed by whitespace.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">type</span></td>
		<td>is the type of the <code>this</code> receiver parameter.
			<ul>
				<li>For <span class="syntax-number inline">1</span>, the type must
					be exactly the method's containing class.
				</li>
				<li>For <span class="syntax-number inline">2</span>, the type must
					be exactly the immediate outer type of the constructor's containing
					class.
				</li>
			</ul>
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">identifier</span></td>
		<td>is the name of the containing type, used to clarify which <code>this</code>
			instance is being declared in the receiver parameter. The identifier
			must be the <i>simple name</i> of the immediate outer type of the
			constructor's containing class.
		</td>
	</tr>
</table>
<h3>Syntax Elements</h3>
<p>
	<span class="syntax-number">1</span> A receiver parameter in an
	instance method.
</p>
<p>
	<span class="syntax-number">2</span> A receiver parameter in an inner
	class constructor.
</p>
<h2>Usage</h2>
<p>Receiver parameters are not formal parameters. They do not alter the
	behavior of a method, change the method's signature, nor change the
	override-equivalence of a method. Other than allowing the presence of
	an annotation, they do not affect the rest of a program. In fact, a
	method or constructor with a receiver parameter that has no annotation,
	is equivalent to one without the receiver parameter.</p>
<p>
	Receiver parameters can either be for a non-<code>static</code> method
	(instance method) or a constructor in a non-<code>static</code> inner
	class. Their only functional purpose is to allow annotations, though
	they can be included in a method or constructor without having
	annotations. A receiver parameter must be first in a parameter list.
</p>
<h2>Examples</h2>
<div class="example">
	<h4>In an Instance Method</h4>
	<pre><code>class Test {
	void someMethod(Test this) {

	}
}</code></pre>
	<p>The type of the receiver parameter may be fully qualified:</p>
	<pre><code>package net.javaref.examples;
class ReceiverParameterExample {
	void someMethod(net.javaref.examples.ReceiverParameterExample this) {

	}
}</code></pre>
</div>
<div class="example">
	<h4>In a Constructor</h4>
	<pre><code>class Outer {
	class Inner {
		Inner(Outer Outer.this) {

		}
	}
}</code></pre>
	<p>
		The type of the receiver parameter may be fully qualified, but the
		identifier prefixing <code>this</code> may <b>not</b>. This is
		therefore valid:
	</p>
	<pre><code>package net.javaref.examples;
class Outer {
	class Inner {
		Inner(net.javaref.examples.Outer Outer.this) {
		
		}
	}
}</code></pre>
	<p>whereas the fully-qualified name in the following example is not:</p>
	<pre><code>package net.javaref.examples;
class Outer {
	class Inner {
//		Inner(Outer net.javaref.examples.Outer.this) { // Does not compile; expected "Outer.this", not "net.javaref.examples.Outer.this"
		
//		}
	}
}</code></pre>
	<p>
		Such simple-name restriction on the identifier prefixing <code>this</code>
		restricts even against semi-qualified names:
	</p>
	<pre><code>package net.javaref.examples;
class Top {
	class Middle {
		class Bottom {
			Bottom(Middle Top.Middle.this) { // Does not compile; expected "Middle.this", not "Top.Middle.this"
			
			}
		}
	}
}</code></pre>
</div>
<div class="example">
	<h4>With Other Parameters</h4>
	<p>Receiver parameters may also be used with other parameters.</p>
	<pre><code>class Test {
	void test(Test this, int first, int second, double third, String fourth, String... fifth) {	}
}</code></pre>
	<p>In such cases that other parameters are used, the receiver parameter
		must be first in the parameter list.</p>
</div>