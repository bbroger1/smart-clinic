const week = ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sáb']

function updateDate(date) {
    const url = new URL(window.location.href)
    url.searchParams.set('day', date)
    window.location.href = url.href
}

function handleClickCalendarDay(element) {
    const day = element.target.getElementsByClassName('day-number')[0].innerText
    updateDate(day)
}

function dateCalendar(date) {
    const amountDate = new Date()
    amountDate.setDate(date)

    const weekday = amountDate.toLocaleDateString('pt-br', { weekday: 'short' }).slice(0, 3)

    const offset = week.indexOf(weekday)
    return { date: amountDate.getDate(), offset }
}


function addEventToChangeButton(date) {
    const leftButton = document.querySelector('button.left')
    const rightButton = document.querySelector('button.right')

    const newDate = new Date()

    leftButton.addEventListener('click', () => {
        newDate.setDate(date - 1)
        updateDate(newDate.getDate())
    })
    rightButton.addEventListener('click', () => {
        newDate.setDate(date + 1)
        updateDate(newDate.getDate())
    })
}

function initCalendar() {
    const calendarButtons = document.querySelectorAll('button.calendar-button')
    const querySearch = window.location.search

    const activeDate = new URLSearchParams(querySearch).get('day') || new Date().getDate()
    const { date, offset } = dateCalendar(Number(activeDate))
    const icrementDate = new Date()

    icrementDate.setDate(date - offset)
    addEventToChangeButton(date)

    calendarButtons.forEach(button => {
        button.getElementsByClassName('day-number')[0].innerText = icrementDate.getDate()
        button.setAttribute('data-day', icrementDate.getDate())

        button.setAttribute('aria-label', `Botão para mudar para agenda do dia ${icrementDate.getDate()}`)
        if (button.getAttribute('data-day') == activeDate)
            button.classList.add('activate-date')

        icrementDate.setDate(icrementDate.getDate() + 1)
        button.addEventListener('click', handleClickCalendarDay)
    })
}


window.addEventListener('load', initCalendar)
