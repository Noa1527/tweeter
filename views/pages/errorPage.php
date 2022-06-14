<div id="contentError" class="container-fluid">
    <div class="error">
        <div class="signOnTop">
            <div class="backToHome">
                <div class="logo"><a class="btn-close btn-close-white" href="index.php"></a></div>
            </div>
            <div class="logoTwitos d-flex justify-content-center">
                <div class="logo d-flex justify-content-center">
                    <img class="imgHibouSign" src="views/resources/hiboux.svg" alt="un hibou, logo du site">  
                </div>
            </div>
        </div>
        <div class="bodyError">
            <div class="container">
                <div class="errorMessage">
                    <div class="alert alert-danger" role="alert">
                        <h3 class="alert-heading">Erreur</h3>
                        <?php 
                            echo $error; 
                        ?>
                        <p class="mb-0">Cliquer <a href="index.php" class="alert-link">ici</a> pour revenir en arrière.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>