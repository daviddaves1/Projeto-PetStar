document.addEventListener('DOMContentLoaded', function() {
    var dateInput = document.getElementById('data-agendamento-servico');
    // Define a data mínima como a data atual
    var today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);
});

const carrinho = [];

function adicionarAoCarrinho() {
    const produto = document.getElementById('produto').value;
    const quantidade = document.getElementById('quantidade').value;

    if (!quantidade || quantidade <= 0) {
        alert('Por favor, insira uma quantidade válida.');
        return;
    }

    const itemExistente = carrinho.find(item => item.produto === produto);

    if (itemExistente) {
        itemExistente.quantidade += parseInt(quantidade);
    } else {
        carrinho.push({ produto, quantidade: parseInt(quantidade) });
    }

    atualizarCarrinho();
}

function atualizarCarrinho() {
    const listaCarrinho = document.getElementById('lista-carrinho');
    listaCarrinho.innerHTML = '';

    carrinho.forEach((item, index) => {
        const li = document.createElement('li');
        li.innerHTML = `${item.produto}: ${item.quantidade} <button class="botao-remover" onclick="removerDoCarrinho(${index})">Remover</button>`;
        listaCarrinho.appendChild(li);
    });
}

function removerDoCarrinho(index) {
    carrinho.splice(index, 1);
    atualizarCarrinho();
}