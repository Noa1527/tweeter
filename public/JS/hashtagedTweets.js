import { linkHashtags } from "./linkHashtags.js"

const tweetsContents = document.querySelectorAll(".tweet__content")

for (const tweetContent of tweetsContents) {

    const newContent = linkHashtags(tweetContent.textContent)
    
    tweetContent.innerHTML = newContent
}