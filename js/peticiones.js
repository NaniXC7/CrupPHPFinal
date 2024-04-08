const cbxDepartamento = document.getElementById('departamentos')

cbxDepartamento.addEventListener('change', getMunicipios)

const cbxMunicipio = document.getElementById('municipio')


function fetchAndSetData(url, formData, targetElement){
    return fetch(url, {
        method: "POST",
        body: formData,
        mode: 'cors'
    })
    .then(response => response.json())
    .then(data =>{
        targetElement.innerHTML = data
    })
    .catch(err = console.log(err))
}

function getMunicipios(){
    let departamento = cbxDepartamento.value
    let url = 'getMunicipios.php'
    let formData = new FormData()

    formData.append('id_departamento', departamento)

    fetchAndSetData(url, formData, cbxMunicipio)
}