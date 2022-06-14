<div class="container-fluid">
    <div class="formToUpdate">
        <form enctype="multipart/form-data" method="POST">
            <div class="updateImgProfile">
                <div class="profilBanner">
                    <?php if ($infos["banner"]) : ?>
                        <img class="profilBanner__image" src="data:image/jpg;base64, <?= base64_encode($infos['banner']); ?>" />
                    <?php endif; ?>
                    <label class="text-white" for="update_banner">Modifier votre banniere :</label><br>
                    <input type="file" name="update_banner">
                </div>
                <div class="profilImg">
                    <?php if ($infos["image"]) : ?>
                        <img class="profilImg__image" src="data:image/jpg;base64, <?= base64_encode($infos['image']); ?>" />
                    <?php endif; ?>
                    <label class="text-white" for="update_image">Modifier votre image de profil :</label><br>
                    <input type="file" name="update_image">
                </div>
                <input type="submit" value="Envoyer">
            </div>
        </form>
        <form method="POST">
            <div class="updatePseudo">
                <label class="text-white" for="pseudo">Modifier votre Pseudo :</label>
                <input type="text" name="pseudo" placeholder="<?= $infos["username"]; ?>" value="<?= $infos["username"]; ?>">
            </div>
            <div class="updateBio">
                <label class="text-white" for="bio">Modifier la Bio :</label>
                <?php if (isset($infos["bio"])) : ?>
                    <textarea type="text" name="bio"><?= $infos["bio"]; ?></textarea>
                <?php else : ?>
                    <textarea type="text" name="bio">Votre bio...</textarea>
                <?php endif; ?>
            </div>
            <div class="updateCity">
                <label class="text-white" for="city">Modifier votre Ville :</label>
                <?php if (isset($infos["city"])) : ?>
                    <input type="text" name="city" placeholder="<?= $infos["city"]; ?>" value="<?= $infos["city"]; ?>">
                <?php else : ?>
                    <input type="text" name="city" placeholder="Votre ville...">
                <?php endif; ?>
            </div>
            <div class="updatePhone">
                <label class="text-white" for="phone">Modifier votre numéro de téléphone :</label>
                <input type="tel" name="phone" placeholder="<?= $infos["phone"]; ?>" value="<?= $infos["phone"]; ?>">
            </div>
            <div class="updateMail">
                <label class="text-white" for="mail">Modifier votre Mail :</label>
                <input type="email" name="mail" placeholder="<?= $infos["mail"]; ?>" value="<?= $infos["mail"]; ?>">
            </div>
            <div class="submitBtnInfo">
                <input type="submit" value="Envoyer" name="update">
            </div>
        </form>
    </div>
</div>