const modal = document.getElementById("myModal");

const btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    toggle(modal);
    header.adjust();
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    toggle(modal);
    header.adjust();
}

window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
}