let search_input = document.getElementById('search');

search_input.addEventListener('keyup', function () {
    let myRequest = new XMLHttpRequest();
    myRequest.open("GET", "Public/ajax/ajax_search.php?search=" + search_input.value, true);
    



});