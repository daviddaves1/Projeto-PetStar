document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('form-agendamento');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            var servico = document.getElementById('servico');
            var data = document.getElementById('data-agendamento-servico');

            if (!servico) {
                console.error("Elemento de serviço não encontrado.");
            } else {
                console.log("Serviço: " + servico.value);
            }

            if (!data) {
                console.error("Elemento de data não encontrado.");
            } else {
                console.log("Data: " + data.value);
            }

            if (servico && data) {
                alert(`Serviço de ${servico.value} agendado para ${data.value}!`);
                form.submit(); // Envia o formulário após a depuração
            }
        });
    } else {
        console.error("Formulário não encontrado.");
    }
});
