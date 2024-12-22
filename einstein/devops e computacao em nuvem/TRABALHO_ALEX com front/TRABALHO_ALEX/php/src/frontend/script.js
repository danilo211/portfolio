// Arquivo: frontend/script.js

// Função para listar pessoas
function listarPessoas() {
    fetch('http://localhost/TRABALHO_ALEX/backend/api_listar.php')
        .then(response => response.json())
        .then(data => {
            let tabela = document.getElementById('tabela-pessoas');
            tabela.innerHTML = '';

            data.forEach(pessoa => {
                tabela.innerHTML += `
                    <tr>
                        <td>${pessoa.id}</td>
                        <td>${pessoa.nome}</td>
                        <td>${pessoa.idade}</td>
                        <td>
                            <button onclick="excluirPessoa(${pessoa.id})">Excluir</button>
                            <button onclick="editarPessoa(${pessoa.id})">Editar</button>
                        </td>
                    </tr>
                `;
            });
        });
}

// Função para adicionar pessoa
function adicionarPessoa() {
    const nome = document.getElementById('nome').value;
    const idade = document.getElementById('idade').value;

    fetch('http://localhost/TRABALHO_ALEX/backend/api_adicionar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `nome=${nome}&idade=${idade}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.mensagem || data.erro);
        listarPessoas();
    });
}

// Função para excluir pessoa
function excluirPessoa(id) {
    fetch('http://localhost/TRABALHO_ALEX/backend/api_excluir.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.mensagem || data.erro);
        listarPessoas();
    });
}

// Função para editar pessoa (não implementado no front-end)
function editarPessoa(id) {
    const novoNome = prompt('Digite o novo nome:');
    const novaIdade = prompt('Digite a nova idade:');

    fetch('http://localhost/TRABALHO_ALEX/backend/api_atualizar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}&nome=${novoNome}&idade=${novaIdade}`
    })
    .then(response => response.json())
    .then(data => {
        alert(data.mensagem || data.erro);
        listarPessoas();
    });
}

// Inicializa a lista de pessoas ao carregar a página
listarPessoas();
