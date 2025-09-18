document.addEventListener('DOMContentLoaded', function() {
//modal partie add-music
    // Obtenir le modal
var modal = document.getElementById("myModal");


// Obtenir le bouton qui ouvre le modal
var btn = document.getElementById("openModalBtn");


// Obtenir l'élément <span> qui ferme le modal
var span = document.getElementById("close_modal_music");

// Lorsque l'utilisateur clique sur le bouton, ouvrir le modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// Lorsque l'utilisateur clique sur <span> (x), fermer le modal
span.onclick = function() {
    modal.style.display = "none";
}


// Ajouter un gestionnaire d'événements pour le formulaire
document.getElementById("popupForm").onsubmit = function(event) {
    // Empêcher la soumission du formulaire pour démonstration
    alert("Musique ajouter avec succès");
    modal.style.display = "none";
}

// modal profil utilisateur
var spanProfil = document.getElementById("close_modal_user");
var modalProfil = document.getElementById("myModalUser");
var btnProfil = document.getElementById("openProfil");

btnProfil.onclick = function(){
    modalProfil.style.display = "block";
}

spanProfil.onclick  = function(){
    modalProfil.style.display = "none";
}


    


document.getElementById("popupFormProfil").onsubmit = function(event) {
    // Empêcher la soumission du formulaire pour démonstration
    alert("profil modifier avec succès");
    modalProfil.style.display = "none";
}


// Modal pour la confirmation de suppression d'un album
let deleteButtons = document.querySelectorAll(".deleteButton");
let deleteModal = document.getElementById("deleteModal");
let closeDeleteModal = document.getElementById("closedeleteModal");
let confirmDelete = document.getElementById("confirmDelete");
let cancelDelete = document.getElementById("cancelDelete");
let formToSubmit = null;

deleteButtons.forEach(button => {
    button.addEventListener("click", function() {
        formToSubmit = this.closest("form");
        deleteModal.style.display = "block";
    });
});

closeDeleteModal.onclick = function() {
    deleteModal.style.display = "none";
}

cancelDelete.onclick = function() {
    deleteModal.style.display = "none";
}

confirmDelete.onclick = function() {
    if (formToSubmit) {
        formToSubmit.submit();
    }
}

// window.onclick = function(event) {
//     if (event.target == deleteModal) {
//         deleteModal.style.display = "none";
//     }
// }
window.onclick = function(event) {
    if (event.target == modalProfil) {
        modalProfil.style.display = "none";
    } else if (event.target == modal) {
        modal.style.display = "none";
    } else if (event.target == deleteModal) {
        deleteModal.style.display = "none";
    }
}
});