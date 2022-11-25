// //toda a resposta através do servidor:
// async function insertEventos(event) {
//     event.preventDefault() //tira a forma padrão.
//     const formData = new FormData(event.target)
//     const response = await fetch('backend/insertEventos.php', {
//         method: 'POST',
//         body: formData
//     })
//     const result = await response.json()
//     if (result?.success) {
//         alert('Seu Evento '+result.data.nome+' foi cadastrado com sucesso!');
//         loadEventos();
//     }
// }

// async function loadEventos() {
//     const response = await fetch('login/backend/list-eventos.php')
//     const result = await response.json()
//     if (result?.success) {
//         const listaClientes = document.querySelector('#festas')
//         listaClientes.innerHTML = ''
//         const clientes = result.data
//         clientes.map((cliente) => {
//             listaClientes.innerHTML += `
//                     ${cliente.nome}
//                     ${cliente.descricao}
//                     ${cliente.dia}
//                     ${cliente.horario}`
     
//         })

//     }else{
//         alert('Erro ao cadastrar a função')
//     }       
// }