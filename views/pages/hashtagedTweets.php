<div class="postTweet row">
    <div class="postTweet__main">
        <div class="postTweet__imageWrapper">
            <!-- Nous mettrons une image ici, ne pas supprimmer -->
        </div>
        <form action="index.php?p=sendTweet" class="col-6 d-flex justify-content-center formSendTweet" method="POST">
            <div class="postTweet__inputWrapper input-group">
                <input type="text" class="form-control postTweet__input" placeholder="What's happening ?">
            </div>
            <button class="btn btn-primary rounded-pill submit">Tweet</button>
        </form>
    </div>
</div>
<div class="displayTweet row">
    <?php foreach ($tweets as $tweet) : ?>
        <div class="tweet">
            <?php if ($tweet["id_user"] == $_COOKIE["user"]) : ?>
                <div class="tweet__head">
                    <span class="tweet__firstname"><?= $tweet["firstname"]; ?></span>
                    <span class="tweet__name"><?= $tweet["lastname"]; ?></span>
                    <span class="tweet__pseudo"><?= $tweet["username"]; ?></span>
                    <span class="tweet__date"><?= $tweet["creat_tweet"]; ?></span>
                </div>
            <?php else : ?>
                <div class="tweet__head">
                    <a href="index.php?p=memberAccount&memberId=<?= $tweet['id_user']; ?>" class="tweet__tweeterLink">
                        <span class="tweet__firstname"><?= $tweet["firstname"]; ?></span>
                        <span class="tweet__name"><?= $tweet["lastname"]; ?></span>
                        <span class="tweet__pseudo"><?= $tweet["username"]; ?></span>
                    </a>
                    <span class="tweet__date"><?= $tweet["creat_tweet"]; ?></span>
                </div>
            <?php endif; ?>
            <div class="tweet__body">
                <span class="tweet__content"><?= $tweet["content"]; ?></span>
            </div>
            <div class="tweet__foot">
                <span class="tweet__upVote"><?= $tweet["upvote"]; ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</div>