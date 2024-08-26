document.addEventListener("DOMContentLoaded", function() {
    const occupiedItems = document.querySelectorAll('.occupied');
    occupiedItems.forEach(function(item){
        const obsazeno = item.getAttribute('data-obsazeno');
        if (obsazeno === "Y") {
            item.style.backgroundColor = "#ff2d06";
        }
        else{
            item.style.backgroundColor = "#68ff00";
        }
    })
});