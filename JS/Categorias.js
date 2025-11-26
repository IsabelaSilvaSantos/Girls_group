const searchInput = document.querySelector('.search-input');
const clearIcon = document.querySelector('.clear-icon');
const productCols = document.querySelectorAll('.product-col');
const noResultsMessage = document.querySelector('.no-results-message');
const productDetailModal = document.getElementById('productDetailModal');

const filterProducts = (searchTerm) => {
    const term = searchTerm.toLowerCase().trim();
    let foundProducts = false;

    productCols.forEach(col => {
        const nameElement = col.querySelector('.name');
        if (nameElement) {
            const name = nameElement.textContent.toLowerCase();

            if (name.includes(term)) {
                col.style.display = 'block';
                foundProducts = true;
            } else {
                col.style.display = 'none';
            }
        }
    });

    const generalErrorMessage = document.querySelector('.col-12.text-center.my-5:not(.no-results-message)');

    if (term.length > 0 && !foundProducts) {
        noResultsMessage.style.display = 'block';
        noResultsMessage.querySelector('p').innerHTML = `Nenhum resultado encontrado para "<strong>${searchTerm}</strong>".`;
        if (generalErrorMessage) {
            generalErrorMessage.style.display = 'none'; 
        }
    } else {
        noResultsMessage.style.display = 'none';
        if (generalErrorMessage) {
            const initialErrorMessage = generalErrorMessage.querySelector('p').textContent.trim();
            if (initialErrorMessage !== '' && initialErrorMessage.includes('Nenhum produto cadastrado')) {
                generalErrorMessage.style.display = 'block';
            } else if (initialErrorMessage !== '' && initialErrorMessage.includes('ID de categoria inválido')) {
                generalErrorMessage.style.display = 'block';
            }
        }
    }
};

searchInput.addEventListener('input', (e) => {
    const searchTerm = e.target.value;
    if (searchTerm.length > 0) {
        clearIcon.style.display = 'block';
    } else {
        clearIcon.style.display = 'none';
    }
    filterProducts(searchTerm);
});

clearIcon.addEventListener('click', () => {
    searchInput.value = '';
    clearIcon.style.display = 'none';
    searchInput.focus();
    filterProducts('');
});

productDetailModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const name = button.getAttribute('data-name');
    const formattedHtml = JSON.parse(button.getAttribute('data-description'));
    const price = button.getAttribute('data-price');
    const modalTitle = productDetailModal.querySelector('.modal-title');
    const modalProductName = productDetailModal.querySelector('#modalProductName');
    const modalProductDescription = productDetailModal.querySelector('#modalProductDescription');
    const modalProductPrice = productDetailModal.querySelector('#modalProductPrice');

    modalTitle.textContent = `Detalhes de ${name}`;
    modalProductName.textContent = name;
    modalProductDescription.innerHTML = formattedHtml;
    modalProductPrice.textContent = price;
});