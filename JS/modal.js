document.addEventListener('DOMContentLoaded', function() {
    const detalhesModal = document.getElementById('detalhesModal');
    
    if (detalhesModal) {
        detalhesModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const nome = button.getAttribute('data-nome');
            const preco = button.getAttribute('data-preco');
            const desc = button.getAttribute('data-desc');
            const unidmed = button.getAttribute('data-unidmed');
            const imgUrl = button.getAttribute('data-img');

            detalhesModal.querySelector('#modal-nome').textContent = nome;
            detalhesModal.querySelector('#modal-preco').textContent = preco;
            detalhesModal.querySelector('#modal-desc').textContent = desc;
            detalhesModal.querySelector('#modal-unidmed').textContent = unidmed;

            const imgElement = detalhesModal.querySelector('#modal-img');
            imgElement.src = imgUrl;
            imgElement.alt = "Imagem de " + nome;
        });
    }
});