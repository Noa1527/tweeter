const logoutBtn = document.querySelector("#btnLogoutUser");

function generateLogout() {
    const popupLogout = document.createElement("div")
    popupLogout.id = "contentLogout"
    popupLogout.innerHTML = `
    <div id="closeCont" class="container-fluid">
        <div class=""> 
            <div class="blackBoxLogout">  
                <div class="logoutTop">
                    <div class="logoTwitos d-flex justify-content-center">
                        <div class="logoLogout d-flex justify-content-center">
                            <img class="imgHibouLogout" src="views/resources/hiboux.svg" alt="un hibou, logo du site">  
                        </div>
                    </div>
                </div>
                <div class="logoutBottom">
                    <div class="contenantLogout">
                        <div>
                            <p  class="fs-4 text-white fw-bold">Se déconnecter de Twitter ?</p>
                        </div>
                        <div>
                            <p class="text-white">Vous pouvez toujours vous reconnecter à tout moment. Si vous voulez simplement changer de compte, vous pouvez le faire en ajoutant un compte existant. </p>
                        </div>
                        <div>
                            <div>
                                <button class="logout__btn btn btn-primary btn-round"><a class="text-white text-decoration-none" href="index.php?p=logout">Se déconnecter</a></button>
                            </div>
                            <div>
                                <button class="cancel__btn btn btn-outline-primary"> <a class="text-white text-decoration-none" href="index.php?p=userHome">Annuler</a></button>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>    
    </div>`
    document.body.appendChild( popupLogout)
    addCloseEvent( popupLogout)
}

function addCloseEvent(popupContainer) {
    const closeButton = document.querySelector("#closeCont")
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

logoutBtn.addEventListener("click", function(e) {
    e.preventDefault();
    generateLogout();
})