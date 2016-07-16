/*
 * Thisi is javascript custom
 * Copyright by rafles nainggolan

 */// Get the modal by class
var modal= document.getElementsByClassName("modal")[0];
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function showmodal() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it activated it if u want

/*window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/