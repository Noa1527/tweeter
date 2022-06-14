import { apiFetch } from "../ajaxFetch.js"
import { getCookie } from "../getTweets.js"

async function getConversation(displayDiv, userId, receiverId) {

    const url = "?p=getConversation&receiverId=" + receiverId
    
    let conversation = await apiFetch(url, "GET")

    for (const message of conversation) {
        
        displayMessage(message, displayConversationDiv, userId)
    }
}

function displayMessage(message, displayDiv, userId) {

    const messageWrapper = document.createElement("div")
    const content = document.createElement("p")

    messageWrapper.className = "message rounded"

    if (message.id_receiver == userId) {

        messageWrapper.classList.add("bg-primary")

    } else {

        messageWrapper.classList.add("bg-secondary") 
    }
    content.className = "message__content"

    content.textContent = message.content

    messageWrapper.appendChild(content)

    displayDiv.appendChild(messageWrapper)
}

function generateIdElement(id) {

    const input = document.createElement("input")

    input.type = "hidden"
    input.value = id

    return input
}

async function sendMessage(input, conversationId, displayDiv, userId) {

    if (!input.value || !conversationId.firstElementChild) {

        return
    }
    const id = conversationId.firstElementChild.value
    let data = new FormData()
    data.append('content', input.value)
    data.append('id_receiver', id)

    let response = await apiFetch("?p=sendMessage", "POST", data)

    if (response == 1) {
        
        console.log("Message added")
        displayDiv.innerHTML = ""
        input.value = ""
        getConversation(displayDiv, userId, id)
        
    } else {

        alert("Votre message n'a pas pu être envoyé !") 
    }
}

const conversations = document.querySelectorAll(".conversation")
const displayConversationDiv = document.getElementById("messageFromUserAndFriends")
const conversationId = document.querySelector(".conversationId")
const input = document.querySelector(".textMsnInput")
const submitButton = document.querySelector(".submitButton")
const userId = getCookie("user")

for (const conversation of conversations) {
    
    conversation.addEventListener("click", function() {

        displayConversationDiv.innerHTML = "";
        const userId = getCookie("user")
        const childElements = this.children
        let receiverId = null

        for (const element of childElements) {
            
            if (element.classList.contains("conversation__idReceiver")) {

                receiverId = element.id
            }
        }
        const idElement = generateIdElement(receiverId)

        if (conversationId.firstElementChild) {
            
            conversationId.removeChild(conversationId.firstElementChild)
            conversationId.appendChild(idElement)

        } else {

            conversationId.appendChild(idElement)
        }
        getConversation(displayConversationDiv, userId, receiverId)
    })
}

submitButton.addEventListener("click", function(e) {

    e.preventDefault()
    sendMessage(input, conversationId, displayConversationDiv, userId)
})



