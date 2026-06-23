document.addEventListener('DOMContentLoaded', function () {
    const inputBusca = document.getElementById('buscarEdital');
    const cards = document.querySelectorAll('.edital-card');

    if (!inputBusca) return;

    inputBusca.addEventListener('input', function () {
        const termo = inputBusca.value.toLowerCase();

        cards.forEach(function (card) {
            const texto = card.innerText.toLowerCase();

            if (texto.includes(termo)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });
});