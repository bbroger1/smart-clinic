const buttonOpenMenu = document.querySelector('button.button-menu')
const buttonCloseMenu = document.querySelector('button.button-close')

const menuElement = document.querySelector('nav.menu')

function handleClickButton() {
    menuElement.classList.add('open')
}

function handleCloseButton() {
    menuElement.classList.remove('open')
}

buttonOpenMenu.addEventListener('click', handleClickButton)
buttonCloseMenu.addEventListener('click', handleCloseButton)
