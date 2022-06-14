import { apiFetch } from "./ajaxFetch.js"
import { handleTweets } from "./getTweets.js"

export const submitTweet = async function(content) {

    let data = new FormData()
    data.append('content', content)

    let response = await apiFetch("?p=sendTweet", "POST", data)

    if (response == 1) {
        
        const displayDiv = document.querySelector(".displayTweet")

        displayDiv.innerHTML = ""
        handleTweets(displayDiv)

    } else {
        alert("Votre tweet n'a pas pu être ajouté.")
    }
}