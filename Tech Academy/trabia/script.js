const modal = new bootstrap.Modal(document.getElementById('modalMatricula'));

document.querySelectorAll('.btn-matricular').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('cursoId').value = btn.dataset.id;
        document.getElementById('cursoNome').textContent = btn.dataset.nome;
        document.getElementById('modalPreco').textContent = parseFloat(btn.dataset.preco).toLocaleString('pt-BR');
        modal.show();
    });
});

document.getElementById('btnConfirmar').addEventListener('click', () => {
    const formData = new FormData();
    formData.append('curso_id', document.getElementById('cursoId').value);
    formData.append('nome', document.getElementById('nomeAluno').value);
    formData.append('email', document.getElementById('emailAluno').value);
    formData.append('telefone', document.getElementById('telefoneAluno').value);

    fetch('salvar_matricula.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        modal.hide();
        document.getElementById('formMatricula').reset();
    });
});