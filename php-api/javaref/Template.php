<?php
function t($title) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/index.css">
<script type="text/javascript">
window.onload = function() {
	for (let ref of document.querySelectorAll("sup[info]")) {
		let element = document.querySelector("span[info='"+ref.getAttribute("info")+"']");
		ref.onclick = function() {
	   		if (element.classList.contains("visible"))
	   			element.classList.remove("visible");
	   		else
	   			element.classList.add("visible");
		};
	}
	for (let ref of document.querySelectorAll("span.shrink")) {
		ref.onclick = function() {
			if (ref.classList.contains("expanded"))
				ref.classList.remove("expanded");
			else
				ref.classList.add("expanded");
		};
	}
};
document.addEventListener("scroll", (e) => {
	var scrp = (document.documentElement.scrollTop || document.body.scrollTop) / ((document.documentElement.scrollHeight || document.body.scrollHeight) - document.documentElement.clientHeight);
	document.getElementById("ProgressBar").style.height = scrp*100+"%";
});

</script>
<title><?php echo$title;?></title>
</head>
<body>
	<div id="Header">
		<div style="font-size: 2em; font-weight: bold;">Java Reference</div>
		<div id="Menu">
			<a href="/" style="color: white;">Home</a>
		</div>
	</div>
	<div id="ProgressBar"></div>
	<div id="Content">
		<?php 
}
function b() {?>
	</div>
</body>
</html><?php 
}