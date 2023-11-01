function lightTheme() {
	document.getElementById("LightThemeButton").style.display = 'none'
	document.getElementById("DarkThemeButton").style.removeProperty('display')
	document.documentElement.classList.add("light-theme")
}
function darkTheme() {
	document.getElementById("DarkThemeButton").style.display = 'none'
	document.getElementById("LightThemeButton").style.removeProperty('display')
	document.documentElement.classList.remove("light-theme")
}

function updateScrollbar() {
	document.getElementById("ProgressBar").style.height = (document.documentElement.scrollTop || document.body.scrollTop) / ((document.documentElement.scrollHeight || document.body.scrollHeight) - document.documentElement.clientHeight) * 100 + "%";
}
window.addEventListener("load", (e) => {
	for (let ref of document.querySelectorAll("sup[info]")) {
		let element = document.querySelector("span[info='" + ref.getAttribute("info") + "']");
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
	navigator.clipboard.writeText(text).then(() => { }, () => {
		alert("Failed to copy to clipboard: " + text);
	});
}