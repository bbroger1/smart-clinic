
function getParamFromURL(param) {
    const searchParams = new URLSearchParams(window.location.search)
    return searchParams.get(param)
}

function setParamFromURL(param, value) {
    const url = new URL(window.location.href)
    url.searchParams.set(param, value)

    return url.href
}

function handlePageNavigation() {
    const page = getParamFromURL('page')

    const newValue = page && page > 1 ? Number(page) : 1

    document.querySelector('p.page-count').innerText = newValue

    const oldPage = document.querySelector('button#old-page')
    const nextPage = document.querySelector('button#next-page')

    oldPage.disabled = newValue == 1

    oldPage.addEventListener('click', () => window.location.href = setParamFromURL('page', newValue - 1))
    nextPage.addEventListener('click', () => window.location.href = setParamFromURL('page', newValue + 1))
}


function handlePageLoad() {
    handlePageNavigation()

    const buttonCloseProfileElement = document.querySelector('button#close-modal'),
          profileModalElement = document.querySelector('aside.profile-view')

    buttonCloseProfileElement.addEventListener('click', () => {
        profileModalElement.classList.remove('open')
    })

    const idDoctorView = getParamFromURL('view')
    if (!idDoctorView) return

    profileModalElement.classList.add('open')
}

function handleViewProfile(id) {
    window.location.href = setParamFromURL('view', id)
}

window.addEventListener('load', handlePageLoad)