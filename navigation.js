window.onload = function () {
    var nav = document.getElementById("navbar");
    //var ul = nav.getElementsByTagName("ul")[0];
    var tabs = nav.getElementsByTagName("a");
    
    // set current tab
    var navitem = tabs[0];
    var ident = navitem.id.split("_")[1];  // number
    // parent of tabs hold identity of the current tab
    nav.setAttribute("data-current", ident);
    
    navitem.setAttribute("style",
    "background-color: teal; color: white;");
    
    // hide all but first page
    var pages = document.getElementsByTagName("section")[0].setAttribute('style', 'display: initial');
    
    // connect click handler to each tab
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].onclick = displayPage;
    }
}

function showSection(id, page){
    $(function(){
    $("#" + id).load(page); 
    });
}

function displayPage() {
    // hide the current tab
    var current = this.parentNode.getAttribute("data-current");  // number
    document.getElementById("tabnav_" + current)
            .setAttribute("style", "background-color: light-gray; color: black;");
    document.getElementById("tabpage_" + current).style.display = "none";
    // make new tab appear
    var ident = this.id.split("_")[1];  // number
    
    this.setAttribute("style", "background-color: teal; color: white");
    document.getElementById ("tabpage_" + ident).style.display = "block";
    console.log(ident);
    
    this.parentNode.setAttribute("data-current", ident);
}		