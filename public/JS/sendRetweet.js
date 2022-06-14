import { apiFetch } from "./ajaxFetch.js"
import { handleTweets } from "./getTweets.js"

export const submitRetweet = async function(idRetweet) {

    let data = new FormData()
    data.append('id_tweet', idRetweet)

    let response = await apiFetch("?p=sendRetweet", "POST", data)
    
    if (response == 1) {
        
        const displayDiv = document.querySelector(".displayTweet")

        displayDiv.innerHTML = ""
        handleTweets(displayDiv)

    } else {

        alert("Vous avez déjà retweeter cet tweet !")
    }
}