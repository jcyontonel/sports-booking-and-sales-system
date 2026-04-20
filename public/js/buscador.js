function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    if(input.value.trim() == ""){
        document.getElementById("myDropdown").classList.remove("show");
        return;
    }
    document.getElementById("myDropdown").classList.add("show");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}