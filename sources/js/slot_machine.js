// Sélecteurs des éléments
const reel1 = document.getElementById("reel1");
const reel2 = document.getElementById("reel2");
const reel3 = document.getElementById("reel3");
const result = document.getElementById("result");
const spinButton = document.getElementById("spinButton");
// Fonction pour lancer les rouleaux
async function spin() {
    try {
        // Envoyer une requête au contrôleur PHP
        const response = await fetch("/slot-machine/play");
        const data = await response.json();
        // Vérifier si la réponse est valide
        if (data.success) {
            // Mettre à jour les rouleaux
            reel1.textContent = data.reels[0];
            reel2.textContent = data.reels[1];
            reel3.textContent = data.reels[2];
            // Afficher le résultat
            if (data.gain > 0) {
                result.textContent = `✨ Félicitations ! Vous avez gagné
                ${data.gain} points ! ✨`;
                result.style.color = "#ffcc00";
            } else {
                result.textContent = "😢 Pas de gain cette fois. Réessayez !";
                result.style.color = "white";
            }
        } else {
            result.textContent = "Erreur : Impossible de lancer la machine.";
            result.style.color = "red";
        }
    } catch (error) {
        console.error("Erreur lors de la requête :", error);
        result.textContent = "Erreur réseau. Veuillez réessayer.";
        result.style.color = "red";
    }
}
// Ajouter un écouteur sur le bouton
spinButton.addEventListener("click", spin);
