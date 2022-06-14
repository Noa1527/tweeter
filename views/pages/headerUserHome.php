<div id="popup" class="container-fluid popoop position-absolute " >
    <div class=" position-relative">
        <div class=" thePop position-fixed">
            <div tabindex="0"></div>
            <div role="group" tabindex="0">
                <div class="popuneSvg">
                    <svg  class="svg2" viewbox="0 0 32 32" >
                        <g>
                            <path d="M12.538 6.478c-.14-.146-.335-.228-.538-.228s-.396.082-.538.228l-9.252 9.53c-.21.217-.27.538-.152.815.117.277.39.458.69.458h18.5c.302 0 .573-.18.69-.457.118-.277.058-.598-.152-.814l-9.248-9.532z"></path>
                        </g>  
                    </svg>
                    <div>
                        <div class="mt-2 mb-2">
                            <div class="px-2 py-2 d-flex">
                                <div class="me-4 w-25">
                                    <div>
                                    <?php if ($infos["image"]) : ?>
                                        <img class="imgUserSmall rounded-circle" src="data:image/jpg;base64, <?= base64_encode($infos['image']); ?>" />
                                    <?php else: ?>
                                        <img class="imgUserSmall rounded-circle" src="views/resources/kirous.jpeg" alt="kirikou">
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class=" d-flex w-100">
                                    <div class="username ">
                                        <div>
                                            <div>
                                                <div>
                                                    <span class="text-white fw-bold"><?= $infos["firstname"]; ?> </span>
                                                    <span class="text-white fw-bold"><?= $infos["lastname"]; ?></span>
                                                </div>
                                                <div>
                                                    <span style="color:#adb5bd"><?= $infos["username"]; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <svg class="checked" viewbox="0 0 24 24" aria-hidden="true">
                                            <g fill="#0d6efd">
                                                <path d="M9 20c-.264 0-.52-.104-.707-.293l-4.785-4.785c-.39-.39-.39-1.023 0-1.414s1.023-.39 1.414 0l3.946 3.945L18.075 4.41c.32-.45.94-.558 1.395-.24.45.318.56.942.24 1.394L9.817 19.577c-.17.24-.438.395-.732.42-.028.002-.057.003-.085.003z"></path>
                                            </g>  
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <a id="btnLogoutUser" class=" text-decoration-none" href="./views/template/template.php">
                                <div class="deconected px-3 py-4 text-white">
                                    Se déconnecter de </br>
                                    <span>
                                        <span><?= $infos["username"]; ?></span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div tabindex="0"></div>
        </div>
    </div>
</div>
<div class="header">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12">
                <div>
                    <div class="container h-100">
                        <div class="mb-5">
                            <div class="logoTwitos d-flex justify-content-start">
                                <div class="logo d-flex justify-content-center">
                                    <img class="imgHibouheader w-50 " src="views/resources/hiboux.svg" alt="un hibou, logo du site">  
                                </div>
                            </div>
                            <div class="navigateur mb-3 ">  
                                <nav>
                                    <a class=" d-flex justify-content-center text-decoration-none mt-4 mb-4" href="index.php?p=userHome">
                                        <div  class=" iconeNav d-flex justify-content-start pb-2 pt-2 mb-1 mt-1 rounded">
                                            <div class="contentImg ">
                                                <img class="img" src="views/resources/home.svg" alt="un arbre">
                                            </div>
                                            <div class="ms-3">
                                                <span class="fs-5 ">Acceuil</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="d-flex justify-content-center text-decoration-none mt-4 mb-4" href="index.php?p=search">
                                        <div  class=" iconeNav d-flex justify-content-start pb-2 pt-2 rounded">
                                            <div class="contentImg">
                                                <img class="img" src="views/resources/spaceship.svg" alt="vesseau">
                                            </div>
                                            <div class="ms-3">
                                                    <span class="fs-5 ">Explore</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class=" d-flex justify-content-center text-decoration-none mt-4 mb-4" href="index.php?p=messagePage">
                                        <div  class=" iconeNav d-flex justify-content-start pb-2 pt-2 rounded">
                                            <div class="contentImg">
                                                <img class="img" src="views/resources/email.svg" alt="lettre">
                                            </div>
                                            <div class="ms-3">
                                                <span class="fs-5 ">Messages</span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class=" d-flex justify-content-center text-decoration-none mt-4 mb-4" href="index.php?p=userAccount">
                                        <div  class=" iconeNav d-flex justify-content-start pb-2 pt-2 rounded">
                                            <div class="contentImg">
                                                <img class="img" src="views/resources/unicorn.svg" alt="licorne">
                                            </div>
                                            <div class="ms-3">
                                                <span class="fs-5 ">Profil</span>
                                            </div>
                                        </div>
                                    </a>
                                </nav>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div id="tweeterbtn" class="btn btn-primary rounded-pill">
                                    <p class="mt-1 fs-5">Tweeter</p>
                                </div>
                            </div>
                        </div>
                        <div class="userBar  mb-3">
                            <div id="userPop" class="hoverUser d-flex ">
                                <div class="picturs">
                                    <div id="yourPicturs">
                                    <?php if ($infos["image"]) : ?>
                                        <img class="imgUserSmall rounded-circle" src="data:image/jpg;base64, <?= base64_encode($infos['image']); ?>" />
                                    <?php else: ?>
                                        <img class="imgUserSmall rounded-circle" src="views/resources/kirous.jpeg" alt="kirikou">
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mx-3">
                                    <div class="container p-0">
                                        <div>
                                            <span class="text-white fs-6"><?= $infos["firstname"]; ?> </span>
                                            <span class="text-white fs-6"><?= $infos["lastname"]; ?></span>
                                        </div>
                                        <div>
                                            <span class="fs-6 text-white"><?= $infos["username"]; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-25">        
                                    <img class="inputPoint w-50 " src="views/resources/menu.svg" alt="un hibou, logo du site">  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>