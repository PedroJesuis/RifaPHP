document.addEventListener('DOMContentLoaded', function () {
    const accordionButton = document.querySelector('.accordion-button');
    const accordionContent = document.querySelector('.accordion-content');

    accordionButton.addEventListener('click', function () {
        // Alterna a classe 'active' no botão para mudar o símbolo de + para -
        accordionButton.classList.toggle('active');

        // Expande ou contrai o conteúdo do acordeão
        if (accordionContent.style.maxHeight) {
            accordionContent.style.maxHeight = null;
        } else {
            accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
        }
    });
});
    