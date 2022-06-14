import { apiFetch } from "./ajaxFetch.js"
import { linkHashtags } from "./linkHashtags.js"
import { submitRetweet } from "./sendRetweet.js"

export const handleTweets = async function (displayDiv) {

    let tweets = await apiFetch("?p=getTweets", "POST")

    if (typeof tweets == "object") {
        
        for (const tweet of tweets) {

            if (tweet.is_retweet == 1) displayRetweet(tweet, displayDiv)
            
            else displayTweet(tweet, displayDiv)
        }
    }
}

export function displayTweet(tweet, displayDiv) {

    const wrapper = document.createElement("div")
    const main = document.createElement("div")
    const head = document.createElement("div")
    const body = document.createElement("div")
    const foot = document.createElement("div")
    const name = document.createElement("span")
    const firstname = document.createElement("span")
    const date = document.createElement("span")
    const pseudo = document.createElement("span")
    const content = document.createElement("span")
    const upVote = document.createElement("span")
    const userId = getCookie("user")
    const retweet = document.createElement("img")
    const tweetId = document.createElement("input")

    if (tweet.content) {

        tweet.content =  linkHashtags(tweet.content)
    }
   
    wrapper.className = "tweet"
    main.className = "tweet__main"
    head.className = "tweet__head"
    body.className = "tweet__body"
    foot.className = "tweet__foot"
    date.className = "tweet__date"
    firstname.className = "tweet__firstname"
    pseudo.className = "tweet__pseudo"
    content.className = "tweet__content"
    upVote.className = "tweet__upVote"
    name.className = "tweet__name"
    retweet.className = "tweet__retweet"
    tweetId.className = "tweet__id"
    
    date.textContent = tweet.creat_tweet
    firstname.textContent = tweet.firstname
    name.textContent = tweet.lastname
    pseudo.textContent = tweet.username
    upVote.textContent = tweet.upvote
    content.innerHTML = tweet.content
    tweetId.value = tweet.id

    retweet.setAttribute("src", "views/resources/retweet.svg")
    retweet.setAttribute("alt", "A retweet icon")
    retweet.style.width = "20px"
    retweet.style.height = "20px"

    tweetId.setAttribute("type", "hidden")

    retweet.addEventListener("click", () => {

        submitRetweet(tweet.id)
    })

    if (tweet.id_user == userId) {
        
        head.appendChild(firstname)
        head.appendChild(name)
        head.appendChild(pseudo)

    } else {

        const linkToMember = document.createElement('a')

        linkToMember.className = "tweet__tweeterLink"
        linkToMember.setAttribute("href", `index.php?p=memberAccount&memberId=${tweet.id_user}`)

        linkToMember.appendChild(firstname)
        linkToMember.appendChild(name)
        linkToMember.appendChild(pseudo)
        head.appendChild(linkToMember)
    }
    head.appendChild(date)

    body.appendChild(content)

    foot.appendChild(upVote)
    foot.appendChild(retweet)
    foot.appendChild(tweetId)

    main.appendChild(head)
    main.appendChild(body)
    main.appendChild(foot)

    wrapper.appendChild(head)
    wrapper.appendChild(body)
    wrapper.appendChild(foot)

    displayDiv.appendChild(wrapper)
}

export function displayRetweet(tweet, displayDiv) {

    const wrapper = document.createElement("div")
    const main = document.createElement("div")
    const head = document.createElement("div")
    const body = document.createElement("div")
    const foot = document.createElement("div")
    const name = document.createElement("span")
    const firstname = document.createElement("span")
    const date = document.createElement("span")
    const pseudo = document.createElement("span")
    const content = document.createElement("span")
    const upVote = document.createElement("span")
    const userId = getCookie("user")
    const retweetImg = document.createElement("img")
    const tweetId = document.createElement("input")

    tweet.content = linkHashtags(tweet.content)

    wrapper.className = "tweet"
    main.className = "tweet__main"
    head.className = "tweet__head"
    body.className = "tweet__body"
    foot.className = "tweet__foot"
    date.className = "tweet__date"
    firstname.className = "tweet__firstname"
    pseudo.className = "tweet__pseudo"
    content.className = "tweet__content"
    upVote.className = "tweet__upVote"
    name.className = "tweet__name"
    retweetImg.className = "tweet__retweet"
    tweetId.className = "tweet__id"
    
    date.textContent = tweet.creat_tweet
    firstname.textContent = tweet.firstname
    name.textContent = tweet.lastname
    pseudo.textContent = tweet.username
    upVote.textContent = tweet.upvote
    content.innerHTML = tweet.content
    tweetId.value = tweet.id

    retweetImg.setAttribute("src", "views/resources/retweet.svg")
    retweetImg.setAttribute("alt", "A retweet icon")
    retweetImg.style.width = "20px"
    retweetImg.style.height = "20px"

    tweetId.setAttribute("type", "hidden")

    retweetImg.addEventListener("click", () => {

        submitRetweet(tweet.id)
    })

    if (tweet.real_id_user == userId) {
        
        const retweetPhrase = document.createElement("p")

        retweetPhrase.className = "tweet__retweetLink"
        retweetPhrase.textContent = tweet.user_firstname + " " + tweet.user_lastname + " Retweeted"

        head.appendChild(retweetPhrase)
        head.appendChild(firstname)
        head.appendChild(name)
        head.appendChild(pseudo)
        
    } else {
        
        const linkToMember = document.createElement('a')
        const retweetLink = document.createElement("a")

        linkToMember.className = "tweet__tweeterLink"
        linkToMember.setAttribute("href", `index.php?p=memberAccount&memberId=${tweet.id_user}`)

        linkToMember.appendChild(firstname)
        linkToMember.appendChild(name)
        linkToMember.appendChild(pseudo)

        retweetLink.className = "tweet__retweetLink"
        retweetLink.setAttribute("href", `index.php?p=memberAccount&memberId=${tweet.id_user}`)
        retweetLink.textContent = tweet.user_firstname + " " + tweet.user_lastname + " Retweeted"
        
        head.append(retweetLink)
        head.appendChild(linkToMember)
    }
    head.appendChild(date)

    body.appendChild(content)

    foot.appendChild(upVote)
    foot.appendChild(retweetImg)
    foot.appendChild(tweetId)

    main.appendChild(head)
    main.appendChild(body)
    main.appendChild(foot)

    wrapper.appendChild(head)
    wrapper.appendChild(body)
    wrapper.appendChild(foot)

    displayDiv.appendChild(wrapper)
}

export function getCookie(cName) {
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie); 
    const cArr = cDecoded.split('; ');
    let res;
    cArr.forEach(val => {
      if (val.indexOf(name) === 0) res = val.substring(name.length);
    })
    return res
}