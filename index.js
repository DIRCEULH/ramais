$(function() {
    $('.ui.dropdown').dropdown();
});


const showUsers =  (dataFilter) => {

    const res =  $.ajax({
        method: 'get',
        url: "ad_connect.php",
        data: { filtro: dataFilter }
        
    }).then(function (data) {
       
        return JSON.parse(data)
    })

    return res

}


const filter = (filterData)=>{


$('#message').hide()
$( "#messageAlert" ).fadeIn()

const dataFilter = $('#search-input').val()

const digitado = dataFilter ? dataFilter : filterData

showUsers(digitado).then(function (data, indice) {

    const responseUser = data

    const HtmlTable = responseUser.map((user, indice) => {

        if (user.nome != undefined) {

        return `<tr id="dataTr">
                    <td id="selectedId">${user.nome}</td>
                    <td id="selectedId">${user.departamento}</td>
                    <td id="selectedId">${user.cargo}</td>
                    <td id="selectedId">${user.ramal}</td>   
                </tr>`  
        }
    })


    $('.users').html(HtmlTable)

})

$( "#messageAlert" ).fadeOut(5000)
}


const totals = ()=>{
    const dataInput = $('#search-input').val()
    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('')
}

const vendas = ()=>{
    const dataInput = $('#search-input').val()
    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Administrativo Vendas')
}

const ti = ()=>{
    const dataInput = $('#search-input').val()
    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('TI')
}

const televendas = ()=>{
    const dataInput = $('#search-input').val()
    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Televendas')
}

const diretoria = ()=>{
    const dataInput = $('#search-input').val()
    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Diretoria')
}

const recursoshumanos = ()=>{
    const dataInput = $('#search-input').val()
    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Recursos Humanos')
}

const engenharia = ()=>{
    const dataInput = $('#search-input').val()
    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Engenharia')
}

const marketing = ()=>{
    const dataInput = $('#search-input').val()
    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Marketing')
}

const expedicao = ()=>{
    const dataInput = $('#search-input').val()

    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Expedição')
}

const qualidade = ()=>{
    const dataInput = $('#search-input').val()

    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Qualidade')
}

const logistica = ()=>{
    const dataInput = $('#search-input').val()

    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Logistica')
}

const laboratorio = ()=>{
    const dataInput = $('#search-input').val()

    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Laboratório')
}

const almoxarifado = ()=>{
    const dataInput = $('#search-input').val()

    if (dataInput) {
        $('#alertMessage').modal({
            escapeClose: false,
            clickClose: false,
            showClose: true,
            closeClass: 'icon-remove'
          })
          $('#alertMessage').draggable()
    }
    filter('Almoxarifado')
}






