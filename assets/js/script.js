// Fonction pour retirer le loader du site au bout de 3 secondes
setTimeout(function() {
    let element = document.getElementById('loader');
    element.classList.add("hidden");
}, 3000);

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);
