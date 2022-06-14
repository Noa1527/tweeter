function generateFormSignOn() {

    const popupSignOn = document.createElement("div")

    popupSignOn.id = "contentSignOn"
    popupSignOn.className = "container-fluid"
    popupSignOn.innerHTML = `
    <div id="contentformOn" class="container-fluid  w-50 ">
        <div class="signOnTop d-flex">
            <div class="backToHome">
                <div class="logoCloseOn"><a class="btn-close btn-close-white closeButtonSignOn" href="index.php"></a></div>
            </div>
            <div class="logoTwitos">
                <div class="logoHibouOn">
                    <img class="imgHibouSignOn" src="views/resources/hiboux.svg" alt="un hibou, logo du site">
                </div>
            </div>
        </div>
        <div class="signInBottom">
            <div class="contenantFormSignIn">
                <div>
                    <p class="fs-4 text-white fw-bold">Créer votre compte</p>
                </div>
                <div>
                    <form id="formSignOn" class="d-flex flex-column" action="index.php?p=subscription" method="POST">
                        <div class="d-flex flex-column">
                            <input class="inpouteOn mb-3 rounded" type="text" name="lastname" id="lastname" placeholder="Nom"
                                required="required">
                            <input class="inpouteOn mb-3 rounded" type="text" name="firstname" id="firstname"
                                placeholder="Prénom" required="required">
                            <input class="inpouteOn mb-3 rounded" type="text" name="pseudo" id="pseudo" placeholder="Pseudo"
                                required="required">
                        </div>
                        <div class="d-flex flex-column mt-5 mb-3">
                            <input class="inpouteOn mb-3 rounded" type="tel" name="phonnbr" id="phonnbr" placeholder="Téléphone"
                                required="required">
                            <input class="inpouteOn mb-3 rounded" type="email" name="email" id="email" placeholder="Email"
                                required="required">
                        </div>
                        <div>
                            <!-- ( ou email par js) -->
                            <a href=""> Utiliser un <span>"téléphone"</span></a>
                        </div>
                        <div class="mt-3">
                            <p class="text-white mb-0 fw-bold">Date de naissance</p>
                            <p class="text-secondary"> Cette information ne sera pas affichée publiquement. Confirmez votre âge,
                                même si ce compte est pour une entreprise, un animal de compagnie ou autre chose.</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <select class="day " name="day" id="month" required="required">
                                <option value='01' name='day'>1</option>
                                <option value='02' name='day'>2</option>
                                <option value='03' name='day'>3</option>
                                <option value='04' name='day'>4</option>
                                <option value='05' name='day'>5</option>
                                <option value='06' name='day'>6</option>
                                <option value='07' name='day'>7</option>
                                <option value='08' name='day'>8</option>
                                <option value='09' name='day'>9</option>
                                <option value='10' name='day'>10</option>
                                <option value='11' name='day'>11</option>
                                <option value='12' name='day'>12</option>
                                <option value='13' name='day'>13</option>
                                <option value='14' name='day'>14</option>
                                <option value='15' name='day'>15</option>
                                <option value='16' name='day'>16</option>
                                <option value='17' name='day'>17</option>
                                <option value='18' name='day'>18</option>
                                <option value='19' name='day'>19</option>
                                <option value='20' name='day'>20</option>
                                <option value='21' name='day'>21</option>
                                <option value='22' name='day'>22</option>
                                <option value='23' name='day'>23</option>
                                <option value='24' name='day'>24</option>
                                <option value='25' name='day'>25</option>
                                <option value='26' name='day'>26</option>
                                <option value='27' name='day'>27</option>
                                <option value='28' name='day'>28</option>
                                <option value='29' name='day'>29</option>
                                <option value='30' name='day'>30</option>
                                <option value='31' name='day'>31</option>
                            </select>
                            <select class="month me-3 ms-3" name="month" id="day" required="required">
                                <option value='01' name='month'>Janvier</option>
                                <option value='02' name='month'>Février</option>
                                <option value='03' name='month'>Mars</option>
                                <option value='04' name='month'>Avril</option>
                                <option value='05' name='month'>Mai</option>
                                <option value='06' name='month'>Juin</option>
                                <option value='07' name='month'>Juillet</option>
                                <option value='08' name='month'>Aout</option>
                                <option value='09' name='month'>Septembre</option>
                                <option value='10' name='month'>Octobre</option>
                                <option value='11' name='month'>Novembre</option>
                                <option value='12' name='month'>Décembre</option>
                            </select>
                            <select class="year" name="year" id="year" required="required">
                                <option value='1950' name='year'>1950</option>
                                <option value='1951' name='year'>1951</option>
                                <option value='1952' name='year'>1952</option>
                                <option value='1953' name='year'>1953</option>
                                <option value='1954' name='year'>1954</option>
                                <option value='1955' name='year'>1955</option>
                                <option value='1956' name='year'>1956</option>
                                <option value='1957' name='year'>1957</option>
                                <option value='1958' name='year'>1958</option>
                                <option value='1959' name='year'>1959</option>
                                <option value='1960' name='year'>1960</option>
                                <option value='1961' name='year'>1961</option>
                                <option value='1962' name='year'>1962</option>
                                <option value='1963' name='year'>1963</option>
                                <option value='1964' name='year'>1964</option>
                                <option value='1965' name='year'>1965</option>
                                <option value='1966' name='year'>1966</option>
                                <option value='1967' name='year'>1967</option>
                                <option value='1968' name='year'>1968</option>
                                <option value='1969' name='year'>1969</option>
                                <option value='1970' name='year'>1970</option>
                                <option value='1971' name='year'>1971</option>
                                <option value='1972' name='year'>1972</option>
                                <option value='1973' name='year'>1973</option>
                                <option value='1974' name='year'>1974</option>
                                <option value='1975' name='year'>1975</option>
                                <option value='1976' name='year'>1976</option>
                                <option value='1977' name='year'>1977</option>
                                <option value='1978' name='year'>1978</option>
                                <option value='1979' name='year'>1979</option>
                                <option value='1980' name='year'>1980</option>
                                <option value='1981' name='year'>1981</option>
                                <option value='1982' name='year'>1982</option>
                                <option value='1983' name='year'>1983</option>
                                <option value='1984' name='year'>1984</option>
                                <option value='1985' name='year'>1985</option>
                                <option value='1986' name='year'>1986</option>
                                <option value='1987' name='year'>1987</option>
                                <option value='1988' name='year'>1988</option>
                                <option value='1989' name='year'>1989</option>
                                <option value='1990' name='year'>1990</option>
                                <option value='1991' name='year'>1991</option>
                                <option value='1992' name='year'>1992</option>
                                <option value='1993' name='year'>1993</option>
                                <option value='1994' name='year'>1994</option>
                                <option value='1995' name='year'>1995</option>
                                <option value='1996' name='year'>1996</option>
                                <option value='1997' name='year'>1997</option>
                                <option value='1998' name='year'>1998</option>
                                <option value='1999' name='year'>1999</option>
                                <option value='2000' name='year'>2000</option>
                                <option value='2001' name='year'>2001</option>
                                <option value='2002' name='year'>2002</option>
                                <option value='2003' name='year'>2003</option>
                                <option value='2004' name='year'>2004</option>
                                <option value='2005' name='year'>2005</option>
                                <option value='2006' name='year'>2006</option>
                                <option value='2007' name='year'>2007</option>
                                <option value='2008' name='year'>2008</option>
                                <option value='2009' name='year'>2009</option>
                                <option value='2010' name='year'>2010</option>
                                <option value='2011' name='year'>2011</option>
                                <option value='2012' name='year'>2012</option>
                                <option value='2013' name='year'>2013</option>
                                <option value='2014' name='year'>2014</option>
                                <option value='2015' name='year'>2015</option>
                                <option value='2016' name='year'>2016</option>
                                <option value='2017' name='year'>2017</option>
                                <option value='2018' name='year'>2018</option>
                                <option value='2019' name='year'>2019</option>
                                <option value='2020' name='year'>2020</option>
                                <option value='2021' name='year'>2021</option>
                                <option value='2022' name='year'>2022</option>
                            </select>
                        </div>
                        <div class="mt-4 d-flex flex-column">
                            <input class="inpouteOn mb-3 rounded" type="password" name="password" id="password"
                                placeholder="Mot de passe" required="required">
                            <input class="inpouteOn mb-3 rounded" type="password" name="confirmedPassword"
                                id="confirmedPassword" placeholder="Comfirmer" required="required">
                        </div>
                        <div>
                            <button id="bouttonOn" class="btn btn-primary mt-4 mb-4 fs-5" type="submit">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>`
document.body.insertBefore(popupSignOn, document.body.firstElementChild)
    addCloseEvent(popupSignOn)
}

function addCloseEvent(popupContainer) {

    const closeButton = document.querySelector(".closeButtonSignOn")
    
    closeButton.addEventListener("click", function (e) {

        if (e.target == popupContainer) closePopup(popupContainer)
    })
    popupContainer.addEventListener("click", function (e) {

        if (e.target == popupContainer) closePopup(popupContainer)
    })
}

function closePopup(popupContainer) {
    document.body.removeChild(popupContainer)
}

const subscriptionBtn = document.querySelector(".subscription__btn")

subscriptionBtn.addEventListener("click", function (e) {
    e.preventDefault();
    generateFormSignOn();
})

