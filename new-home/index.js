function handleSearch(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById('Search').submit();
    }
}