var course_selectd = [];
var data_form;
const url = window.location.protocol + '//' + window.location.host + '/aform/';

$(document).ready(function() {
    $('#button_send').click(function() {
        var inputs = document.getElementsByClassName('required');
        var errors = 0;
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].value === '') {
                toggle_erro(1, inputs[i].id);
                errors++;
            } else {
                toggle_erro(2, inputs[i].id);
            }
        }

        if (!validation_cpf($('#cpf').val())) {
            toggle_erro(1, 'cpf');
            $('#error_cpf').show();
            errors++;
        } else {
            $('#error_cpf').hide();
            toggle_erro(2, 'cpf');
        }

        if (errors === 0) {
            data_form = {
                'livro': $('#livro').val(),
                'nome': $('#nome').val(),
                'cpf': $('#cpf').val(),
                'endereco': $('#endereco').val(),
                'relacao': $('#relacao').val(),
                'opiniao': $('#opiniao').val(),
            }
            send()
        } else {
            $('#msg_erro').fadeIn(800);
            setTimeout(function() {
                $('#msg_erro').fadeOut(800);
            }, 3000);
        }
    });
})

function toggle_erro(type, id) {
    if (type == 1) {
        $('#' + id).css({ 'border-color': ' #f65959' });
    } else if (type == 2) {
        $('#' + id).css({ 'border-color': ' #ced4da' });
    }
}

function send() {
    axios.post(url + 'home/save', data_form).then((response) => {
            if (response.data.success == 1) {

                $('#msg_cad').fadeIn(800);
                setTimeout(function() {
                    $('#msg_cad').fadeOut(800);
                    window.location.href = url + 'home'
                }, 2000);

            } else if (response.data.success == 0) {
                $('#msg_cpf').fadeIn(800);
                setTimeout(function() {
                    $('#msg_cpf').fadeOut(800);
                }, 3000);
            }
        })
        .catch((error) => {
            $('#loading').hide();
        })
        .finally(() => ($('#loading').hide()));
}


function validation_cpf(cpf) {
    if (typeof cpf !== "string") return false
    cpf = cpf.replace(/[\s.-]*/igm, '')
    if (!cpf ||
        cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999"
    ) {
        return false
    }
    var soma = 0
    var resto
    for (var i = 1; i <= 9; i++) {
        soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i)
    }
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11)) resto = 0
    if (resto != parseInt(cpf.substring(9, 10))) return false
    soma = 0
    for (var i = 1; i <= 10; i++) {
        soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i)
    }
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11)) resto = 0
    if (resto != parseInt(cpf.substring(10, 11))) return false
    return true
}