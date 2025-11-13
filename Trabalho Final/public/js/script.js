document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('form-avaliacao');
  const mensagem = document.getElementById('mensagem');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData();

    let valido = true;

    // coletar respostas obrigatórias
    document.querySelectorAll('.escala').forEach(div => {
        const pid = div.dataset.pergunta;
        const obrig = div.dataset.obrigatoria === "1"; // vindo do banco
        const selected = div.querySelector('input[type="radio"]:checked');

        if (selected) {
            formData.append('resposta_' + pid, selected.value);
        } else {
            if (obrig) {
                valido = false; // só bloqueia se for obrigatória
            }
        }
    });


    if (!valido) {
      alert("Por favor, responda todas as perguntas obrigatórias.");
      return;
    }

    formData.append('comentario', document.getElementById('comentario').value || '');

    try {
      const resp = await fetch('../src/respostas.php', {
        method: 'POST',
        body: formData
      });
      const json = await resp.json();
      if (json.success) {
        form.style.display = 'none';
        mensagem.classList.remove('oculto');
        mensagem.textContent =
          'O Estabelecimento agradece sua resposta e ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.';
      } else {
        alert('Erro: ' + (json.message || 'Problema ao enviar avaliação.'));
      }
    } catch (err) {
      alert('Erro ao enviar: ' + err.message);
    }
  });
});
