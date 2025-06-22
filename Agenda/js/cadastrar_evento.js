document.addEventListener('DOMContentLoaded', function () {
    const formCadEvento = document.getElementById("formCadEvento");
    const msg = document.getElementById("msg");
    const msgCadEvento = document.getElementById("msgCadEvento");
    const btnCadEvento = document.getElementById("btnCadEvento");

    if (formCadEvento) {
        formCadEvento.addEventListener("submit", async (e) => {
            e.preventDefault();
            btnCadEvento.value = "Salvando...";

            const dadosForm = new FormData(formCadEvento);
            const dados = await fetch("cadastrar_evento.php", {
                method: "POST",
                body: dadosForm
            });

            const resposta = await dados.json();

            if (!resposta['status']) {
                msgCadEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;
            } else {
                msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
                msgCadEvento.innerHTML = "";
                formCadEvento.reset();

                // Verificar se deve adicionar ao calendário
                const user_id = document.getElementById('user_id').value;
                const inputClienteId = document.getElementById('client_id');
                const client_id = inputClienteId.getAttribute('data-target-pesq-client-id');

                if ((user_id == "" || resposta['user_id'] == user_id) && (client_id == "" || resposta['client_id'] == client_id)) {
                    const novoEvento = {
                        id: resposta['id'],
                        title: resposta['title'],
                        color: resposta['color'],
                        start: resposta['start'],
                        end: resposta['end'],
                        obs: resposta['obs'],
                        user_id: resposta['user_id'],
                        name: resposta['name'],
                        phone: resposta['phone'],
                        client_id: resposta['client_id'],
                        client_name: resposta['client_name'],
                        client_phone: resposta['client_phone']
                    };
                    calendar.addEvent(novoEvento);
                    calendar.render();
                }

                removerMsg();
                cadastrarModal.hide();
            }
            btnCadEvento.value = "Cadastrar";
        });
    }
});