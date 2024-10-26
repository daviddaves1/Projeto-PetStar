const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

document.addEventListener('DOMContentLoaded', function() {
    carregarCarrinho();
    var dateInput = document.getElementById('data-agendamento-servico');
    // Define a data mínima como a data atual
    var today = new Date().toISOString().split('T')[0];
    if (dateInput) {
        dateInput.setAttribute('min', today);
    }
});

function adicionarAoCarrinho() {
    const produto = document.getElementById('produto').value;
    const quantidade = parseInt(document.getElementById('quantidade').value);

    if (!quantidade || quantidade <= 0) {
        alert('Por favor, insira uma quantidade válida.');
        return;
    }

    const itemExistente = carrinho.find(item => item.produto === produto);
    if (itemExistente) {
        itemExistente.quantidade += quantidade;
    } else {
        carrinho.push({ produto, quantidade });
    }
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const listaCarrinho = document.getElementById('lista-carrinho');
    listaCarrinho.innerHTML = '';
    carrinho.forEach((item, index) => {
        const li = document.createElement('li');
        li.innerHTML = `${item.produto}: ${item.quantidade} <button class="botoes-remover" onclick="removerDoCarrinho(${index})">Remover</button>`;
        listaCarrinho.appendChild(li);
    });
}

function removerDoCarrinho(index) {
    carrinho.splice(index, 1);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    atualizarCarrinho();
}

function carregarCarrinho() {
    if (carrinho.length > 0) {
        atualizarCarrinho();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var cpfInput = document.getElementById('cpf-adm');
    if (cpfInput) {
        cpfInput.addEventListener('input', function(e) {
            var value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            e.target.value = value;
        });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    const mensagem = params.get('mensagem');
    if (mensagem) {
        const mensagemAlerta = document.getElementById('mensagem-alerta');
        if (mensagemAlerta) {
            mensagemAlerta.innerHTML = `<p class="alert">${mensagem}</p>`;
            mensagemAlerta.style.color = mensagem.includes('sucesso') ? 'green' : 'red';
        }
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    const mensagem = params.get('mensagem');
    if (mensagem) {
        const mensagemAlerta = document.getElementById('mensagem-alerta');
        if (mensagemAlerta) {
            mensagemAlerta.innerHTML = `<p>${mensagem}</p>`;
            mensagemAlerta.style.color = mensagem.includes('sucesso') ? 'green' : 'red';
            mensagemAlerta.style.fontWeight = 'bold';
        }
    }
});

function toggleUserMenu() {
    const userMenu = document.getElementById('userMenu');
    if (userMenu.style.maxHeight === "0px" || userMenu.style.maxHeight === "") {
        userMenu.style.display = "block";
        userMenu.style.maxHeight = userMenu.scrollHeight + "px";
    } else {
        userMenu.style.maxHeight = "0px";
        setTimeout(() => {
            userMenu.style.display = "none";
        }, 300);
    }
}