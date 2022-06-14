<div class="postTweet row h-100">
    <!-- middle page -->
    <div class="middleTweet col-4 h-100 pe-0"> 
        <div class="scrollMiddle h-100">
            <div class="bottomTopSearch pb-2 ">
                <div class="messagesStatick">
                    <h1 class="text-white">Messages</h1>
                </div>
                <div class="postMessages">
                    <form action="" class=" formSendTweet w-100" method="POST">
                        <div class="w-100 d-flex me-2 mt-2 mb-2">
                            <div class=" postTweet__inputWrapper input-group ">
                                <input type="text" class="form-control findSomeOne ms-1 me-1" placeholder="rechercher des personnes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container friend">
                <?php foreach ($conversations as $conversation) : ?>
                <div class="row conversation">
                    <div class="col-2">
                        <div class="imgRounded me-2 ms-2 ">
                            <img class="imgProfile rounded-pill" src="views/resources/kirous.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-8">
                        <div>
                            <span class="ms-3 text-white"><?= $conversation["firstname"]; ?></span>
                            <span class="text-white"><?= $conversation["lastname"]; ?></span>
                        </div>
                        <div>
                            <span class="ms-3"><?= $conversation["username"]; ?></span>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <input type="hidden" class="conversation__idReceiver" id="<?= $conversation['id']; ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- right page -->
    <div class="rightMsn col-8 ps-0 pe-0">
        <div class="acceuilStatickMsn">
            <div class="imgRoundedMsn d-flex align-items-center h-100 me-2 ms-2 ">
                <img class="imgProfileMsn rounded-pill" src="views/resources/kirous.jpeg" alt="">
            </div>
            <div class="conversationId"></div>
        </div>
        <div class="rightMsnScrollStatick">
            <div id="messageFromUserAndFriends" class="scrollRightMsn"> 
                <!-- les messages -->
            </div>
        </div>
        <div class="boxwriteMsn">
            <div class="d-flex">
                <form class="d-flex w-100" action="" method="post">
                    <div class="imgMsn">
                        <label class="svgFile" for="file-input">
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="">
                                <g fill="blue">
                                    <path d="M19.75 2H4.25C3.01 2 2 3.01 2 4.25v15.5C2 20.99 3.01 22 4.25 22h15.5c1.24 0 2.25-1.01 2.25-2.25V4.25C22 3.01 20.99 2 19.75 2zM4.25 3.5h15.5c.413 0 .75.337.75.75v9.676l-3.858-3.858c-.14-.14-.33-.22-.53-.22h-.003c-.2 0-.393.08-.532.224l-4.317 4.384-1.813-1.806c-.14-.14-.33-.22-.53-.22-.193-.03-.395.08-.535.227L3.5 17.642V4.25c0-.413.337-.75.75-.75zm-.744 16.28l5.418-5.534 6.282 6.254H4.25c-.402 0-.727-.322-.744-.72zm16.244.72h-2.42l-5.007-4.987 3.792-3.85 4.385 4.384v3.703c0 .413-.337.75-.75.75z"></path>
                                    <circle cx="8.868" cy="8.309" r="1.542"></circle>
                                </g>
                            </svg>
                        </label>
                        <input type="file" name="" id="file-input">
                    </div>
                    <div class="textMsn">
                        <input type="text" class="textMsnInput rounded-pill form-control" name="" id="" placeholder="Démarrer une nouvelle conversation">
                    </div>
                    <div class="btnMsn">
                        <button class="bg-black btnBorder submitButton">
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="">
                                <g fill="blue">
                                    <path d="M21.13 11.358L3.614 2.108c-.29-.152-.64-.102-.873.126-.23.226-.293.577-.15.868l4.362 8.92-4.362 8.92c-.143.292-.08.643.15.868.145.14.333.212.523.212.12 0 .24-.028.35-.087l17.517-9.25c.245-.13.4-.386.4-.664s-.155-.532-.4-.662zM4.948 4.51l12.804 6.762H8.255l-3.307-6.76zm3.307 8.26h9.498L4.948 19.535l3.307-6.763z"></path>
                                </g>
                            </svg>
                        </button>
                    </div>  
                </form>               
            </div>
        </div>
    </div>    
</div>