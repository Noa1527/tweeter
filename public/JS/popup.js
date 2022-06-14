let user = document.getElementById('userPop')
let pop = document.querySelector('#popup')
let hide = document.getElementById('popup')

user.addEventListener('click', () => {
    popuppage = () => {
        pop.style.display = "block";
    }
    popuppage()
})
hide.addEventListener('click', () => {
    hidenpage = () => {
        pop.style.display = "none";
    }
    hidenpage()
})