<div class="container-fluid">
    <div class="accountPage">
        <div class="leftPage">
            <!-- LIEN POUR LE HEADER -->
        </div>
        <div class="midPage">
            <div class="backHome col-md-6 offset-md-3">
                <p><a href="index.php?=userHome"><-</a><?php echo $infos["username"]; ?></p>
                <p><?php echo $infos["nb_tweet"] ?> Tweets</p>
            </div>
            <div class="profil_banner col-md-6 offset-md-3">
                <!-- BANNIERE DE PROFIL -->
            </div>
            <div class="profil_img col-md-6 offset-md-3">
                <!-- IMAGE DE PROFIL -->
                <a href="index.php?p=memberSubscription&memberId=<?= $infos['id_user'] ?>" class="profil_link">S'abonner</a>
            </div>
            <div class="info_profil col-md-6 offset-md-3">
                <p><?php echo $infos["username"]; ?></p>
                <p><?php echo $infos["mail"]; ?></p>
                <p>A rejoint Tweetos le 
                    <?php 
                        $date = $infos["creation"];
                        echo date('d/m/Y', strtotime($date));
                    ?>
                </p>
            </div>
            <div class="follows col-md-6 offset-md-3">
                <p><a href="#"><?php echo $infos["follows"] ?> abonnements</a></p>
                <p><a href="#"><?php echo $infos["followers"] ?> abonnés</a></p>
            </div>
            <div class="tweet_feed">
                
            </div>
        </div>
        <div class="rightPage">
            <!-- BARRE DE RECHERCHE/COMPTE A SUIVRE/# LES PLUS UTILISES-->
        </div>
    </div>
</div>