import { submitTweet } from "./sendTweet.js"
import { handleTweets } from "./getTweets.js"

const submitBtn = document.querySelector(".btn.btn-primary.submit")
const displayDiv = document.querySelector(".displayTweet")

submitBtn.addEventListener("click", (e) => {

    e.preventDefault()
    const inputTweet = document.querySelector(".form-control.postTweet__input")
    const content = inputTweet.value
    
    inputTweet.value = ""
    submitTweet(content)
})

window.addEventListener("load", function () {

    handleTweets(displayDiv)
})