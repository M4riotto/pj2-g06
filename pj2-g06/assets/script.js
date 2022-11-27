function showModal(idModal){ 
    //idModal é usado para avisar que há um parâmetro lá no html, o texto pode ser qualquer coisa para avisar que o parâmetro será um texto.
    const modal = document.querySelector(idModal)
    modal.style.display = "flex"
}

//deicar o modal escondido
function hideModal(idModal, event) {
    if(event.target.className === 'modal'){
        const modal = document.querySelector(idModal)
        modal.style.display = 'none'
    }
}

//forçar o fechamento após receber a mensagem de alerta
function closeAllModal() {
    const modais = document.querySelectorAll('.modal')
    modais.forEach(modal => {
        modal.style.display = 'none'
    })
}

//toda a resposta através do servidor:
async function insertEventos(event) {
    event.preventDefault() //tira a forma padrão.
    const formData = new FormData(event.target)
    const response = await fetch('../backend/insertEventos.php', {
        method: 'POST',
        body: formData
    })
    const result = await response.json()
    if (result?.success) {
        alert('Seu Evento '+result.data.nome+' foi cadastrado com sucesso!');
        loadEventos();
    }
}

async function insertCadastro(event) {
    event.preventDefault() //tira a forma padrão.
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

async function loadEventos() {
    const response = await fetch('backend/list-eventos.php')
    const result = await response.json()
    if (result?.success) {
        const listaClientes = document.querySelector('#festas')
        listaClientes.innerHTML = ''
        const clientes = result.data
        clientes.map((eventos) => {
            listaClientes.innerHTML += `
                    <div class="col-sm-3 col-lg-3">
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
                            <div class="card-footer text-right card-rodape-empresa text-muted">EMPRESA QUE ESTÁ FAZENDO O EVENTO
                            </div>
                          </div><!--card-->
                        </div><!--col do car--> `              
        })
    }else{
        alert('Erro ao cadastrar a função')
    }       
}
