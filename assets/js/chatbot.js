const sendChatBtn = document.querySelector(".chat-input span");
const chatInput = document.querySelector(".chat-input textarea");
const chatbox = document.querySelector(".chatbox");
const chatbotToggler = document.querySelector(".chatbot-toggler");
const chatbotCloseBtn = document.querySelector(".close-btn");
const inputValue = document.querySelector("textarea");
const clearChatBtn = document.querySelector(".clear-chat-btn");



let userMessage;
const API_KEY = "Bearer api-key"

const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;
    return chatLi;
}

// Ajout d'un gestionnaire d'événements pour le bouton "Effacer le chat"
clearChatBtn.addEventListener("click", () => {
    // Supprimer tous les éléments enfants de la boîte de chat
    while (chatbox.firstChild) {
        chatbox.removeChild(chatbox.firstChild);
    }
});


const generateResponse = (incomingChatLi) => {
    const API_URL = "https://api.openai.com/v1/chat/completions";
    const messageElement = incomingChatLi.querySelector("p");

    // Vérifier si le message de l'utilisateur contient le mot-clé "scanai"
    const containsScanai = userMessage.toLowerCase().includes("scanai");

    if (!containsScanai) {
        // Message d'erreur si le mot-clé "scanai" n'est pas trouvé
        messageElement.textContent = "Erreur : Veuillez mentionner 'scanai' pour obtenir des informations sur le site.";
        messageElement.style.color = "red"; // Texte en rouge pour l'erreur
        chatbox.scrollTo(0, chatbox.scrollHeight);
        return; // Arrêter le traitement
    }

    // Demander des informations supplémentaires à l'utilisateur
    const userPrompt = "Nom du site : scanai\n" +
                       "Description : Une IA de traduction de webtoon automatique\n" +
                       "Fonctionnalités : L'utilisateur peut sélectionner la langue de traduction pour son webtoon. Trois abonnements disponibles.\n" +
                       "Abonnements : Trois abonnements disponibles avec un système de prix.\n" +
                       "Tu es un expert de scanai donc tu te nommes helperScanai\n" 
                       "  - Abonnement standard\n" +
                       "  - Abonnement premium\n" +
                       "  - Abonnement VIP\n" +
                       "Prix : Les prix varient en fonction de l'abonnement choisi.\n" +
                       "  - Abonnement Classc : 5€ par mois/25 requêtes par jour\n" +
                       "  - Abonnement Premium : 10€ par mois/50 requêtes par jour\n" +
                       "  - Abonnement King : 15€ par mois/requêtes illimité";

    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
            model: "gpt-3.5-turbo",
            messages: [
                {role: "user", content: userMessage},
                {role: "system", content: userPrompt} // Ajouter prompt comme message système
            ]
        })
    }

    fetch(API_URL, requestOptions)
        .then(res => res.json())
        .then(data => {
            messageElement.textContent = data.choices[0].message.content;
        })
        .catch((error) => {
            messageElement.textContent = "Oops ! Something went wrong. Please try again."
        })
        .finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
}



const handleChat = () => {
    userMessage = chatInput.value.trim();
    if(!userMessage) return;

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(() => {
        const incomingChatLi = createChatLi("Thinking...", "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
    }, 600)
    inputValue.value = "";

}
chatbotCloseBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"))
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
sendChatBtn.addEventListener("click", handleChat);
