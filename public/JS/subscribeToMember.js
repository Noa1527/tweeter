import { apiFetch } from "./ajaxFetch.js"

const link = document.querySelector(".profil_link")
const submitBtn = document.querySelector(".btn.btn-primary.submit")
const formElement = document.querySelector(".formSendTweet")

function buildParams(params) {
    const output = new URLSearchParams();
    for (const [k, v] of Object.entries(params)) {
        if (Array.isArray(v)) {
            v.map((value) => output.append(k, value))
        } else {
            output.append(k, v)
        }
    }
    return output;
}

const subscribeToMember = async function(link) {

    const href = link.getAttribute("href")
    const url = "http://localhost/W-WEB-090-NCY-1-1-academie-mickael.raveneau/" + href
    
    let response = await apiFetch(url, "GET")

    if (response == "Success") {
        
        alert("Abonnement effectué.")

    } else {

        alert("Vous êtes déjà abonné !")
    }
}

link.addEventListener("click", (e) => {
    
    e.preventDefault()
    subscribeToMember(e.target)
})