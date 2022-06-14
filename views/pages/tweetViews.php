<div class="postTweet row h-100">
    <!-- middle page -->
    <div class="middleTweet col-8 h-100">
        <div class="acceuilStatick">
            <h1 class="text-white">Acceuil</h1>
        </div>
        <div class="scrollMiddle h-100"> 
            <div class="postTweet__main">
                <form action="index.php?p=sendTweet" class="col-6 formSendTweet w-100" method="POST">
                    <div class="w-100 d-flex me-2 mt-2 mb-2">
                        <div class="imgRounded me-2 ms-2 ">
                            <?php if ($infos["image"]) : ?>
                                <img class="imgUserSmall rounded-circle" src="data:image/jpg;base64, <?= base64_encode($infos['image']); ?>" />
                            <?php else: ?>
                                <img class="imgUserSmall rounded-circle" src="views/resources/kirous.jpeg" alt="kirikou">
                            <?php endif; ?>
                        </div>
                        <div class=" postTweet__inputWrapper input-group ">
                            <input type="text" class="form-control postTweet__input ms-1 me-1" placeholder="What's happening ?">
                        </div>
                    </div>
                    <div class="mt-3 mb-3 d-flex justify-content-between">
                        <input class="ms-2 me-2" type="file" id="image" name="image" accept="image/png, image/jpeg">
                        <button class="tweetbtn me-1 btn btn-primary rounded-pill submit">Tweet</button>
                    </div>
                </form>
            </div>
            <div class="displayTweet row ">

            </div>
        </div>
    </div>
    <!-- right page -->
    <div class="col-5">
    </div> 
</div>
    