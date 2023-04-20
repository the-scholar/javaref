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