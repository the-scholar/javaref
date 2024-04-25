document.addEventListener('DOMContentLoaded', () => {
	if (localStorage.getItem('light-theme')) {
		document.documentElement.classList.toggle("light-theme")
		document.getElementById("LightThemeButton").style.display = 'none';
		document.getElementById("DarkThemeButton").style.removeProperty('display')
	}
});
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

function toggleTheme() {
	res = document.documentElement.classList.toggle("light-theme")
	document.getElementById(res ? "DarkThemeButton" : "LightThemeButton").style.removeProperty('display')
	document.getElementById(res ? "LightThemeButton" : "DarkThemeButton").style.display = 'none'
	if (res)
		localStorage.setItem("light-theme", "enabled")
	else
		localStorage.removeItem("light-theme")
}

function updateScrollbar() {
	document.getElementById("ProgressBar").style.height = (document.documentElement.scrollTop || document.body.scrollTop) / ((document.documentElement.scrollHeight || document.body.scrollHeight) - document.documentElement.clientHeight) * 100 + "%";
}
document.addEventListener("scroll", (e) => updateScrollbar());
function copyToClipboard(text) {
	navigator.clipboard.writeText(text).then(() => { }, () => {
		alert("Failed to copy to clipboard: " + text);
	});
}
function search(event) {
    if (event.key === "Enter") {
        var searchQuery = document.getElementById("Search").value.trim();
        if (searchQuery !== "") 
            window.location.href = "https://www.google.com/search?q=site:javaref.net+" + encodeURIComponent(searchQuery);
    }
}
