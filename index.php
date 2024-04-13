<?php
$tmods['header_button_config'][0][2] = true;
$tmods["head_after_stylesheet"] = function () {
    ?><style>
div.sec {
	font-weight: bold;
	color: var(--C1);
	margin-top: .5em;
	margin-bottom: .1em;
}

ul {
	list-style-type: none;
	padding: .3em 1em;
	margin: .2em 0;
	background-color: #ffffff0a;
	font-size: .87em;
}

.u {
	color: firebrick;
}
</style><?php
};
t("Javaref.net", "The unofficial reference for Java syntax.");
?>
<h1>Java Reference</h1>
<div class="sec">General</div>
<ul>
	<li><a href="/identifiers">Identifiers</a></li>
	<li><a href="/initializers">Static &amp; Instance Initializers</a></li>
</ul>
<div class="sec">Concepts</div>
<ul>
	<li><a href="/concepts/capture-conversion">Capture Conversion</a></li>
</ul>
<div class="sec">Literals</div>
<ul>
	<li><a href="/literals/integer">Integer Literal</a></li>
	<li><a href="/literals/floating-point">Floating Point Literals</a></li>
	<li><a href="/literals/boolean">Boolean Literals</a></li>
	<li><a href="/literals/null">Null Literals</a></li>
</ul>
<div class="sec">Statements</div>
<ul>
	<li><a href="/statements/for-loops">For Loops</a></li>
	<li><a href="/statements/expression-statements">Expression Statements</a></li>
	<li><a href="/statements/local-variable-declarations">Local Variable
			Declarations</a></li>
</ul>
<div class="sec">Methods</div>
<ul>
	<li><a href="/methods/declarations">Method Declarations</a></li>
	<li><a href="/methods/receiver-parameters">Receiver Parameters</a></li>
</ul>
<div class="sec">Operators</div>
<ul>
	<li>
		<div class="sec">Unary</div>
		<ul>
			<li><a href="/operators/unary/cast">Cast Operator</a></li>
			<li><a href="/operators/unary/minus">Unary Minus</a></li>
			<li><a href="/operators/unary/plus">Unary Plus</a></li>
		</ul>
	</li>
	<li><div class="sec">Ternary</div>
		<ul>
			<li><a class="u" href="/operators/ternary/conditional">Conditional
					Operator</a></li>
		</ul></li>
</ul>
<div class="sec">Annotations</div>
<ul>
	<li><a href="annotations">Annotations</a></li>
	<li><a href="annotations/declarations">Annotation Declarations</a></li>
	<li><a href="annotations/elements">Annotation Element Declarations</a></li>
</ul>
<?php

b();