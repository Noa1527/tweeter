const connexionBtn = document.querySelector(".connexion__btn");

function generateFormSignIn() {
    const popupSignIn = document.createElement("div")
    popupSignIn.id = "contentSignIn"
    popupSignIn.innerHTML = `
    <div id="contentformIn" class="container-fluid w-50">
        <div class="signInTop d-flex">
            <div class="backToHome">
                <div class="logoCloseIn"><a class="btn-close btn-close-white closeButton" href="index.php"></a></div>
            </div>
            <div class="logoTwitos">
                <div class="logoHibouIn">
                    <img class="imgHibouSignIn" src="views/resources/hiboux.svg" alt="un hiboux, logo du site"  />
                </div>
            </div>
        </div>
        <div class="signInBottom">
            <div class="contenantFormSignIn">
                <div>
                    <p class="fs-4 text-white fw-bold">Connectez-vous à twittos</p>
                </div>
                <div class="">
                    <form id="formSignIn" class="d-flex flex-column" action="index.php?p=connection" method="POST">
                        <input class="inputText rounded mb-3" type="email" name="email" id="email" placeholder="Email" required="required">
                        <input class="inputText rounded mb-3" type="password" name="password" id="password" placeholder="Mot de passe" required="required">
                        <button class="boutton btn btn-primary" type="submit">Se connecter</button>
                    </form>
                </div>
                <div>
                    <a href=""><p>Mot de passe oublié ?</p></a>
                </div>
                <div>
                    <p class="text-white">Vous n'avez pas de compte ? <a href="index.php?p=formSignOn">Inscrivez-vous</a> </p>
                </div>
            </div>
        </div>
    </div>`
    document.body.insertBefore(popupSignIn, document.body.firstElementChild)
    addCloseEvent(popupSignIn)
}

function addCloseEvent(popupContainer) {
    const closeButton = document.querySelector(".closeButton")
    closeButton.addEventListener("click", function(e) {

        if (e.target == popupContainer) closePopup(popupContainer)
    })
    popupContainer.addEventListener("click", function(e) {
        
        if (e.target == popupContainer) closePopup(popupContainer)
    })
}

function closePopup(popupContainer) {
    document.body.removeChild(popupContainer)
}

connexionBtn.addEventListener("click", function(e) {
    e.preventDefault();
    generateFormSignIn();
})