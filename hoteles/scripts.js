
document.addEventListener('DOMContentLoaded', function () {
    const habitacionInnerContainer = document.querySelector('.habitacion-inner-container');
    const scrollStep = window.innerWidth; // Ancho de la ventana
    let currentIndex = 0;

    window.addEventListener('resize', function () {
        currentIndex = 0;
        updateTransform();
    });

    function updateTransform() {
        const transformValue = -currentIndex * scrollStep;
        habitacionInnerContainer.style.transform = `translateX(${transformValue}px)`;
    }
});
