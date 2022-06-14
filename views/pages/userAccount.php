<div class="accountPage row h-100">
    <div class="midPage col-sm-10">

        <div class="backHome d-flex">
            <a href="index.php?=userHome">
                <img class="arrowleft" src="views/resources/arrow.svg" alt="flèch">
            </a>
            <div class="ms-3">
                <p class="text-white mb-1"><?php echo $infos["username"]; ?></p>
                <p class="text-white mb-1"><?php echo $infos["nb_tweet"] ?> tweets</p>
            </div>
        </div>
        <?php if ($infos["banner"] || $infos["image"]) : ?>
            <div class="scrollProfil">
                <div class="profil_banner">
                    <?php if ($infos["banner"]) : ?>
                        <?= '<img src="data:image/jpg;base64,' . base64_encode($infos['banner']) . '"/>'; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($infos["image"]) : ?>
                <div class="profil_img">
                    <div class="profil_image">
                        <?= '<img src="data:image/jpg;base64,' . base64_encode($infos['image']) . '"/>'; ?>
                    </div>
                <?php endif; ?>
                <div class="d-flex justify-content-end mt-2">
                    <div class="btn btn-primary rounded-pill me-2"><a href="index.php?p=formToUpdate" class="badge badge-primary">Editer le profil</a></div>
                </div>

                <?php if (!isset($infos["image"]) || !isset($infos["banner"])) : ?>
                    <form enctype="multipart/form-data" method="POST">
                        <div class="updateImgProfile">
                            <?php if (!isset($infos["banner"])) : ?>
                                <label class="text-white" for="profile_banner">Modifier votre banniere :</label><br>
                                <input type="file" class="text-white" name="profile_banner"><br>
                            <?php endif; ?>
                            <?php if (!isset($infos["image"])) : ?>
                                <label class="text-white" for="profile_image">Modifier votre image de profil :</label><br>
                                <input type="file" class="text-white" name="profile_image"><br>
                            <?php endif; ?>
                            <input type="submit" value="Envoyer">
                        </div>
                    </form>
                <?php endif; ?>

                </div>

                <div class="info_profil">
                    <p class="text-white"><?php echo $infos["username"]; ?></p>
                    <p class="text-white"><?php echo $infos["mail"]; ?></p>
                    <p class="text-white"><?php if (isset($infos["bio"])) echo $infos["bio"]; ?></p>
                    <p class="text-white">A rejoint Tweetos le
                        <?php
                        $date = $infos["creation"];
                        echo date('d/m/Y', strtotime($date));
                        ?>
                    </p>
                </div>
                <div class="follows">
                    <p class="text-white"><a href="#"><?php echo $infos["follows"] ?> abonnements</a></p>
                    <p class="text-white"><a href="#"><?php echo $infos["followers"] ?> abonnés</a></p>
                </div>
                <div class="tweet_feed">

                </div>
            </div>
    </div>
</div>