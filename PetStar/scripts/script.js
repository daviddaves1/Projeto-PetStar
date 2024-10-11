document.getElementById('form-agendamento').addEventListener('submit', function(event) {
    event.preventDefault();
    const servico = document.getElementById('servico').value;
    const data = document.getElementById('data').value;
    alert(`Serviço de ${servico} agendado para ${data}!`);
});