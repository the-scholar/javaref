function toggleTheme() {
	res = document.documentElement.classList.toggle("light-theme")
	document.getElementById(res ? "DarkThemeButton" : "LightThemeButton").style.display = 'none';
	document.getElementById(res ? "LightThemeButton" : "DarkThemeButton").style.removeProperty('display')
}

function updateScrollbar() {
	document.getElementById("ProgressBar").style.height = (document.documentElement.scrollTop || document.body.scrollTop) / ((document.documentElement.scrollHeight || document.body.scrollHeight) - document.documentElement.clientHeight) * 100 + "%";
}
window.addEventListener("load", (e) => {
	for (let ref of document.querySelectorAll("sup[info]")) {
		let element = document.querySelector("span[info='" + ref.getAttribute("info") + "']");
		ref.onclick = function() {
			element.classList.toggle("visible")
			updateScrollbar();
		};
	}
	for (let ref of document.querySelectorAll("span.shrink")) {
		let clicker = document.createElement("span");
		ref.appendChild(clicker);
		clicker.onclick = function() {
			ref.classList.toggle("expanded")
			updateScrollbar();
		};
	}
});
document.addEventListener("scroll", (e) => updateScrollbar());
function copyToClipboard(text) {
	navigator.clipboard.writeText(text).then(() => { }, () => {
		alert("Failed to copy to clipboard: " + text);
	});
}