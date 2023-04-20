<?php t("Javaref - Receiver Parameters");?>
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
			annotation. The <code>@</code> symbol and annotation name may be
			separated by whitespace.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">type</span></td>
		<td>is the type of the <code>this</code> receiver parameter.
		</td>
	</tr>
	<tr>
		<td><span class="syntax-piece">identifier</span></td>
		<td>is the name of the containing type, used to clarify which <code>this</code>
			instance is being declared in the receiver parameter.
		</td>
	</tr>
</table>