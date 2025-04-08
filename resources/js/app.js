document.addEventListener('DOMContentLoaded', () => {
    // Seleciona todos os links que abrem modal
    const openModalLinks = document.querySelectorAll('.open-modal');
    const modals = document.querySelectorAll('.custom-modal');

    openModalLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const modalId = link.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if(modal) {
                modal.style.display = 'flex';
            }
        });
    });

    // Fecha modal quando clica no "x" ou fora da área do conteúdo
    modals.forEach(modal => {
        modal.addEventListener('click', (e) => {
            if(e.target.classList.contains('custom-modal') || e.target.classList.contains('close')){
                modal.style.display = 'none';
            }
        });
    });
});
