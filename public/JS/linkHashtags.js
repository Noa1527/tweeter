export function linkHashtags(tweetContent) {

    const hashtagReg = /#\S+/gi
    const hashtags = [...tweetContent.matchAll(hashtagReg)]
   
    if (hashtags.length == 0) {

        return tweetContent
    }
    let hashtagContent = []
    
    if (hashtags.length > 0) {
        
        for (const hashtag of hashtags) {

            hashtagContent = hashtag[0].substring(1)
            tweetContent = tweetContent.replace(hashtag[0], `<a href="index.php?p=searchHashtag&hashtag=${hashtagContent}" class="tweet__hashtag">${hashtag[0]}</a>`)   
        }
    }
    return tweetContent 
}