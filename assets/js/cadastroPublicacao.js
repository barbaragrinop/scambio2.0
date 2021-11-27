
const form = document.querySelector("#frmRecuperaCodigo"),
    btnCad = document.querySelector("#btnCadastrar"),
    toast = document.querySelector("#myToast")

form.onsubmit = (e) => {
    e.preventDefault();
}

btnCad.onclick = () => {
    let nome = document.getElementById('nomeDigitado').value.trim();
    let descricao = document.getElementById('descricaoDigitado').value.trim();
    let genero = document.getElementById('genero').value;
    let autor = document.getElementById('autorDigitado').value.trim();
    let foto1 = document.getElementById('file1').value;
    let foto2 = document.getElementById('file2').value;
    let foto3 = document.getElementById('file3').value;

    if (nome == '') {
        document.getElementById('spanNome').style.display = 'contents';
    } else {
        document.getElementById('spanNome').style.display = 'none';
    }

    if (descricao == '') {
        document.getElementById('spanDescricao').style.display = 'contents';
    } else {
        document.getElementById('spanDescricao').style.display = 'none';
    }

    if (genero == '--') {
        document.getElementById('spanGenero').style.display = 'contents';
    } else {
        document.getElementById('spanGenero').style.display = 'none';
    }

    if (autor == '') {
        document.getElementById('spanAutor').style.display = 'contents';
    } else {
        document.getElementById('spanAutor').style.display = 'none';
    }

    if (foto1 != '' || foto2 != '' || foto3 != '') {
        document.getElementById('spanImagem').style.display = 'none';
    } else {
        document.getElementById('spanImagem').style.display = 'contents';
    }


    if ((nome == '' && descricao == '' && autor == '') && (foto1 != '' || foto2 != '' || foto3 != '')) {
        alert('Preencha os dados em vermelho')
    }

    if ((nome != '' && descricao != '' && genero != '--' && autor != '') && (foto1 != '' || foto2 != '' || foto3 != '')) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", '../home/PHP/cadastra-livro.php', true)
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                let data = xhr.response
                console.log(data);
                $('.return').html(data);
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);

        document.getElementById('nomeDigitado').value = '';
        document.getElementById('descricaoDigitado').value = '';
        document.getElementById('genero').value = '--';
        document.getElementById('autorDigitado').value = '';
        document.getElementById('file1').value = '';
        document.getElementById('file2').value = '';
        document.getElementById('file3').value = '';
        document.getElementById('my-modal').style.display = 'none';
    }


}