document.addEventListener("DOMContentLoaded", function() {
    const cleanedItems = document.querySelectorAll('.cleaned');
    cleanedItems.forEach(function(item){
        const uklizeno = item.getAttribute('data-uklizeno');
        if (uklizeno === "Y") {
            item.style.backgroundColor = "#68ff00";
        }
        else{
            item.style.backgroundColor = "#ff2d06";
        }
    });
});
