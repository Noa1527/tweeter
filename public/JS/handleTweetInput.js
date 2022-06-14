const tweetInput = document.querySelector(".postTweet__input")

tweetInput.addEventListener("keydown", function(e) {

    const value = this.value

    if (value.length > 140 && e.keyCode != 8) {

        e.preventDefault()
        this.classList. add("text-danger")
        
    } else {

        if (this.classList.contains("text-danger")) {

            this.classList.remove("text-danger")
        }
    }
})