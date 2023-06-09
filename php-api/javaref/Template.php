<?php
function d(){} // Dummy func
// Template modifiers. Allows pages to include custom functionality at certain points within the template.
// By default, each key executes the dummy function. Keys can be defined to point to anonymous functions.
$tmods = [
    "head_top" => "d",
    "head_bottom" => "d",
    "head_after_stylesheet" => "d"
];
function t($title) { global $tmods;
?><!DOCTYPE html>
<html lang="en">
<head>
<?php $tmods["head_top"]();?>
<meta name="viewport" content="width=1000" />
<meta charset="UTF-8">
<meta name="description" content="<?php echo$desc;?>">
<link rel="stylesheet" type="text/css" href="/index.css">
<?php $tmods["head_after_stylesheet"]();?>
<script type="text/javascript">
function updateScrollbar() {
	document.getElementById("ProgressBar").style.height = (document.documentElement.scrollTop || document.body.scrollTop) / ((document.documentElement.scrollHeight || document.body.scrollHeight) - document.documentElement.clientHeight)*100+"%";
}
window.addEventListener("load", (e) => {
	for (let ref of document.querySelectorAll("sup[info]")) {
		let element = document.querySelector("span[info='"+ref.getAttribute("info")+"']");
		ref.onclick = function() {
	   		if (element.classList.contains("visible"))
	   			element.classList.remove("visible");
	   		else
	   			element.classList.add("visible");
	   		updateScrollbar();
		};
	}
	for (let ref of document.querySelectorAll("span.shrink")) {
		let clicker = document.createElement("span");
		ref.appendChild(clicker);
		clicker.onclick = function() {
			if (ref.classList.contains("expanded"))
				ref.classList.remove("expanded");
			else
				ref.classList.add("expanded");
			updateScrollbar();
		};
	}
});
document.addEventListener("scroll", (e) => updateScrollbar());
function copyToClipboard(text) {
	navigator.clipboard.writeText(text).then(() => {}, () => {
		alert("Failed to copy to clipboard: " + text);
	});
}
</script>
<title><?php echo$title;?></title>
<?php $tmods["head_bottom"]();?>
</head>
<body>
	<div id="Header">
		<div style="font-size: 2em; font-weight: bold; color: white;">Javaref.net</div>
		<div id="Menu">
			<a href="/" style="color: darkgray;">Home</a>
		</div>
	</div>
	<div id="Copybar"
		onclick="copyToClipboard('<?php
    $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (($sp = strpos($url, '?')) !== false)
        $url = substr($url, 0, $sp);
    $url = rtrim($url, '/');

    echo $url . "?q=" . hash("sha256", $url)?>');">Click to copy
		permalink</div>
	<div id="ProgressBar"></div>
	<div id="Content">
		<?php 
}
function b() {?>
	</div>
</body>
</html><?php 
}