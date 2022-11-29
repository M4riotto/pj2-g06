//ABRIR O MODAL CADASTRAR-SE
function showModal(idModal){ 
    //IDMODAL: é usado para avisar que há um parâmetro lá no html, o texto pode ser qualquer coisa avisando que o parâmetro será um texto.
    const modal = document.querySelector(idModal)
    modal.style.display = "flex"
}

//ESCONDER O MODAL/OCULTAR A DIV DO MODAL
function hideModal(idModal, event) {
    if(event.target.className === 'modal'){
        const modal = document.querySelector(idModal)
        modal.style.display = 'none'
    }
}

//FORÇAR O FECHAMENTO APÓS RECEBER A MSG DE ALERTA
function closeAllModal() {
    const modais = document.querySelectorAll('.modal')
    modais.forEach(modal => {
        modal.style.display = 'none'
    })
}

//APÓS INSERIR DADOS NO insertCadastro.php 
async function insertCadastro(event) {
    //EVENT.PREVENTDEFAULT(): tira a forma padrão do carregamento, ou seja, o delay quando algo é adicionado na tela dando um flesh não acontecerá mais.
    event.preventDefault() 
    const formData = new FormData(event.target)
    const response = await fetch('../pj2-g06/backend/insertCadastro.php', {
        method: 'POST',
        body: formData
    })
    const result = await response.json()
    if (result?.success) {
        alert('Seu cadastro foi efetuado com sucesso!');
        loadEventos();
    }
}

//APÓS INSERIR DADOS NO insertEventos.php, todas as respostas através do servidor que está o BDD
async function insertEventos(event) {
    //EVENT.PREVENTDEFAULT(): tira a forma padrão do carregamento, ou seja, o delay quando algo é adicionado na tela dando um flesh não acontecerá mais.
    event.preventDefault()
    const formData = new FormData(event.target)
    const response = await fetch('../backend/insertEventos.php', {
        method: 'POST',
        body: formData
    })
    const result = await response.json()
    if (result?.success) {
        alert('Seu evento '+result.data.nome+' foi cadastrado com sucesso!');
        loadEventos();
    }
}

//FUNÇÃO CHAMADA QUANDO ATUALIZA O SITE, USADA PARA ADICIONAR OS EVENTOS QUE ESTÃO LISTADOS LÁ NO list-eventos.php
async function loadEventos() {
    const response = await fetch('backend/list-eventos.php')
    const result = await response.json()
    if (result?.success) {
        const listaClientes = document.querySelector('#festas')
        const listaClientes2 = document.querySelector('#palestras')
        const listaClientes3 = document.querySelector('#halloween')
        const listaClientes4 = document.querySelector('#standUP')
        const listaClientes5 = document.querySelector('#workshops')
        listaClientes.innerHTML = ''
        listaClientes2.innerHTML = ''
        listaClientes3.innerHTML = ''
        listaClientes4.innerHTML = ''
        listaClientes5.innerHTML = ''
        const clientes = result.data
        clientes.map((eventos) => {
            if (result.data.categoria === 'festas') {
                listaClientes.innerHTML += `
                <div class="col-sm-3 col-lg-4">
                    <div class="card">
                        <div class="card-header col text-center p-2">Evento</div>
                        <img src="${eventos.capa}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">${eventos.nome}</h5>
                            <h6 class="card-sub-title mb-2 text-muted">${eventos.descricao}</h6>
                            <p>${eventos.categoria}</p>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">Dia: ${eventos.dia}</li>
                            <li class="list-group-item">Horário: ${eventos.horario}</li>
                            <li class="list-group-item">Local: ${eventos.endereco}</li>
                            <li class="list-group-item">Município: ${eventos.municipio}</li>
                            <li class="list-group-item">UF: ${eventos.uf}</li>
                        </ul>
                        <div class="card-body p-2">
                            <p>Limite de pessoas: ${eventos.limiteP}</p>
                            <a href="#" class="card-link">SEPARAR VAGA</a>
                        </div>
                        <div class="card-footer text-right card-rodape-empresa text-muted">
                            EMPRESA QUE ESTÁ FAZENDO O EVENTO
                        </div>
                    </div><!--card-->
                </div><!--col do car--> 
            `  
            console.log('teste');         
            } else if (result.data.categoria === 'palestras') {
                listaClientes2.innerHTML += `
                <div class="col-sm-3 col-lg-4">
                    <div class="card">
                        <div class="card-header col text-center p-2">Evento</div>
                        <img src="${eventos.capa}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">${eventos.nome}</h5>
                            <h6 class="card-sub-title mb-2 text-muted">${eventos.descricao}</h6>
                            <p>${eventos.categoria}</p>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">Dia: ${eventos.dia}</li>
                            <li class="list-group-item">Horário: ${eventos.horario}</li>
                            <li class="list-group-item">Local: ${eventos.endereco}</li>
                            <li class="list-group-item">Município: ${eventos.municipio}</li>
                            <li class="list-group-item">UF: ${eventos.uf}</li>
                        </ul>
                        <div class="card-body p-2">
                            <p>Limite de pessoas: ${eventos.limiteP}</p>
                            <a href="#" class="card-link">SEPARAR VAGA</a>
                        </div>
                        <div class="card-footer text-right card-rodape-empresa text-muted">
                            EMPRESA QUE ESTÁ FAZENDO O EVENTO
                        </div>
                    </div><!--card-->
                </div><!--col do car--> 
            ` 
            }
        })
    }else{
        alert('Erro ao cadastrar a função')
    }       
}

function botoes(){
    var paragraf = document.getElementById('numero');
    var num = parseFloat(paragraf.textContent) + 1;
    if (num == 2) {
        paragraf.textContent = num;
    }
    else if (num == 3) {
        paragraf.textContent = num;
    }
    else if (num == 4) {
        paragraf.textContent = num;
    } else if (num == 5) {
        var texto = document.getElementById('cx');
        paragraf.textContent = num;
        texto.textContent = "Seu limite de cadastro acabou, só é permitido cinco :(";
    } else if (num > 5) {
        window.location.href = "../index.html";
    }
}   
   
