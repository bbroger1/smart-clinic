
async function handleSelect(element) {
    const uf = element.target.value
    const select = document.querySelector('select#city')
    select.innerHTML = '<option selected>Cidade</option>'

    const citys = await (await fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${uf}/municipios`)).json()

    citys.forEach(city => {
        const option = document.createElement('option')

        option.value = city.nome
        option.innerText = city.nome

        select.appendChild(option)
    })
}

async function getCitys() {
    const ufs = await (await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')).json()

    const select = document.querySelector('select#ufs')
    ufs.forEach(uf => {
        const option = document.createElement('option')

        option.value = uf.sigla
        option.innerText = uf.nome

        select.appendChild(option)
    })

    select.addEventListener('change', handleSelect)
}

window.addEventListener('load', getCitys)