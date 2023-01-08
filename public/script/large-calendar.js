const week = ['dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sáb']

function getParamFromUrl(paramName) {
    const searchQuery = window.location.search,
          urlParams = new URLSearchParams(searchQuery)

    return urlParams.get(paramName)
}

function getAmountDate(date) {
    const weekFirstDay = date.toLocaleDateString('pt-BR', { weekday: 'short' }).slice(0, 3)
    const offset = week.indexOf(weekFirstDay)

    return  offset == 0 ? 7 : offset
}


function handleClickDay(element) {
    const [day, month, year] = element.target.getAttribute('data-date').split('/')

    const newURL = new URL(window.location.href)

    newURL.searchParams.set('year', year)
    newURL.searchParams.set('month', Number(month) - 1)
    newURL.searchParams.set('day', day)

    window.location.href = newURL.href
}

function createCalendarBody(amountDate) {
    let row = null
    const tableBody = document.querySelector('tbody.table-body'),
          dayToViewSchedule = getParamFromUrl('day') || new Date().getDate()

    const offset = getAmountDate(amountDate)

    const icrementDate = new Date(amountDate.getFullYear(), amountDate.getMonth(), 1 - offset)
    for (let r = 0; r < 6; r++) {
        row = document.createElement('tr')

        for (let c = 0; c < 7; c++) {
            const td = document.createElement('td')

            const day = icrementDate.getDate()

            const applyGrayColor = icrementDate.getMonth() != amountDate.getMonth(),
                  activeDay = !applyGrayColor && day == dayToViewSchedule

            
            const button = document.createElement('button')
            button.classList.add('calendar-day')
            button.classList.add(applyGrayColor ? 'gray' : 'c')
            button.classList.add(activeDay ? 'activate-day' : 'x')

            button.setAttribute('data-date', icrementDate.toLocaleDateString('pt-BR'))

            button.innerText = day

            button.addEventListener('click', handleClickDay)

            td.appendChild(button)

            icrementDate.setDate(day + 1)
            row.appendChild(td)
        }

        tableBody.appendChild(row)
    }
}

function getDateFromUrlParams() {
    const date = new Date()
    
    const year  = getParamFromUrl('year')  || date.getFullYear(),
          month = getParamFromUrl('month') || date.getMonth()

    return new Date(year, month, 1)
}

function applyTitleCalendar(date) {
    const titleDOMElement = document.querySelector('#calendar-title')

    const monthName = date.toLocaleDateString('pt-BR', { month: 'long' })
    titleDOMElement.innerText = `${date.getFullYear()}, ${monthName}`
}


function handleChangeMonth(date) {
    const url = new URL(window.location.href)
    url.searchParams.set('month', date.getMonth())
    url.searchParams.set('year', date.getFullYear())

    window.location.href = url.href
}

function addHandleClickChangeMonth(date) {
    const changeOldMonth = document.querySelector('button#left')
    const changeNextMonth = document.querySelector('button#right')

    const newdate = new Date(date.getFullYear(), date.getMonth(), 1)
    
    changeOldMonth.addEventListener('click', () => { 
        newdate.setMonth(date.getMonth() - 1)
        handleChangeMonth(newdate) 
    })
    changeNextMonth.addEventListener('click', () => {
        newdate.setMonth(date.getMonth() + 1)
        handleChangeMonth(newdate)
    })
}

window.addEventListener('load', () => {
    const date = getDateFromUrlParams()

    addHandleClickChangeMonth(date)
    applyTitleCalendar(date)
    createCalendarBody(date)
})