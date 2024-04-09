const cbxDepartamento = document.getElementById('departamentosEdit')

cbxDepartamento.addEventListener('change', getMunicipios)

const cbxMunicipio = document.getElementById('municipioEdit')


function fetchAndSetData(url, formData, targetElement) {
    return fetch(url, {
        method: "POST",
        body: formData,
        mode: 'cors'
    })
        .then(response => response.json())
        .then(data => {
            targetElement.innerHTML = data
        })
        .catch(err = console.log(err))
}

function getMunicipios() {
    let departamento = cbxDepartamento.value
    let url = 'getMunicipiosEdit.php'
    let formData = new FormData()

    formData.append('id_departamento', departamento)

    fetchAndSetData(url, formData, cbxMunicipio)
}

/*
getMunicipios();

function addmun(muni) {
    $("municipioEdit").val(muni).trigger("change");
}*/