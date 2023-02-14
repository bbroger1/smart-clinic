const week = ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sáb']

function updateDate(year, month, day) {
    const url = new URL(window.location.href)
    
    url.searchParams.set('day', day)
    url.searchParams.set('month', month)
    url.searchParams.set('year', year)

    window.location.href = url.href
}

function handleClickCalendarDay(element) {
    const day = element.target.getAttribute('data-day'),
          month = element.target.getAttribute('data-month'),
          year = element.target.getAttribute('data-year')
    
    updateDate(year, month, day)
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


    leftButton.addEventListener('click', () => {
        date.setDate(date.getDate() - 1)
        updateDate(date.getFullYear(), date.getMonth(), date.getDate())
    })
    rightButton.addEventListener('click', () => {
        date.setDate(date.getDate() + 1)
        updateDate(date.getFullYear(), date.getMonth(), date.getDate())
    })
}


function getDateFromUrl() {
    const url = new URLSearchParams(window.location.search)
    const amountDate = new Date()

    const day = url.get('day') || amountDate.getDate(),
          month = url.get('month') || amountDate.getMonth(),
          year = url.get('year') || amountDate.getFullYear()

    return new Date(year, month, day)
}


function setDateOnLegend(date) {
    const p = document.querySelector('p.calendar-month')
    const monthName = date.toLocaleDateString('pt-br', { month: 'long' })

    p.innerText = `${monthName} de ${date.getFullYear()}`
}

function initCalendar() {
    const calendarButtons = document.querySelectorAll('button.calendar-button')

    const activeDate = getDateFromUrl()
    setDateOnLegend(activeDate)
    const { date, offset } = dateCalendar(Number(activeDate.getDate()))
    const icrementDate = new Date()

    icrementDate.setDate(date - offset)
    addEventToChangeButton(activeDate)

    calendarButtons.forEach(button => {
        button.getElementsByClassName('day-number')[0].innerText = icrementDate.getDate()
        button.setAttribute('data-day', icrementDate.getDate())
        button.setAttribute('data-month', icrementDate.getMonth())
        button.setAttribute('data-year', icrementDate.getFullYear())

        button.setAttribute('aria-label', `Botão para mudar para agenda do dia ${icrementDate.getDate()}`)
        if (button.getAttribute('data-day') == activeDate.getDate())
            button.classList.add('activate-date')

        icrementDate.setDate(icrementDate.getDate() + 1)
        button.addEventListener('click', handleClickCalendarDay)
    })
}


window.addEventListener('load', initCalendar)
