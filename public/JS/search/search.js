import { apiFetch } from "../ajaxFetch.js"
import { getCookie } from "../getTweets.js"
import { linkHashtags } from "../linkHashtags.js"

const searchInput = document.querySelector(".search__input")
const displayDiv = document.querySelector(".search__displayMemberResult")
const submitButton = document.querySelector(".search__submitBtn")
const resultDiv = document.querySelector(".result")
let startCapture = false
let search = ''

function cancelSearch(inputValue) {

    startCapture = false
    search = ""
}

const searchMember = async function (search, displayDiv) {

    let data = new FormData()
    data.append('member', search)

    let members = await apiFetch("?p=searchMember", "POST", data)
    
    displayDiv.innerHTML = ""
    for (const member of members) {

        displayMember(displayDiv, member)
    }
}

function displayMember(displayDiv, member) {

    const wrapper = document.createElement("div")
    const profileName = document.createElement("p")
    const pseudoName = document.createElement("span")

    wrapper.className = "member member--" + member.id
    profileName.className = "text-white member__profileName member__profileName--" + member.id
    pseudoName.className = "text-white member__pseudoName member__pseudoName--" + member.id

    profileName.textContent = member.firstname + " " + member.lastname
    pseudoName.textContent = member.username

    wrapper.appendChild(profileName)
    wrapper.appendChild(pseudoName)

    wrapper.addEventListener("click", function() {

        window.location.href = "index.php?p=memberAccount&memberId=" + member.id;
    })
    displayDiv.appendChild(wrapper)
}

function displaySearch(resultDiv, tweet) {

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

    resultDiv.appendChild(wrapper)
}

async function getTweetWithContent(content, resultDiv) {

    let data = new FormData()
    data.append('content', content)

    const tweets = await apiFetch("?p=getTweetWithContent", "POST", data)

    resultDiv.innerHTML = ""
    
    for (const tweet of tweets) {

        displaySearch(resultDiv, tweet)
    }    
}

searchInput.addEventListener("keydown", function (e) {

    const isAltGraphPressed = e.getModifierState("AltGraph")

    if (this.value == "") {

        cancelSearch(this.value)
    }

    if (startCapture) {

        if (e.key == ' ') {

            startCapture = false

        } else {

            if ((e.keyCode >= 48 && e.keyCode <= 90)) {

                search += e.key
                searchMember(search, displayDiv)

            } else if (e.keyCode == 8) {

                search = search.slice(0, -1)
                searchMember(search, displayDiv)
            }
        }
    } else {

        if (isAltGraphPressed && e.key == "@") {

            startCapture = true

            search += e.key
            searchMember(search, displayDiv)
        }
    }
})

submitButton.addEventListener("click", function(e) {
    
    getTweetWithContent(searchInput.value, resultDiv)  
})