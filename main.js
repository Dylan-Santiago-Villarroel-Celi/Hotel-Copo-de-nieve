// Espera a que la página se cargue completamente
document.addEventListener("DOMContentLoaded", function () {
    // Simula un retraso de 3 segundos (puedes ajustar el tiempo según tus necesidades)
    setTimeout(function () {
      // Agrega la clase 'loaded' al preloader para ocultarlo
      document.querySelector(".page-loader").classList.add("loaded");
  
      // Después de ocultar el preloader, redirige a la página principal
      setTimeout(function () {
        window.location.href = "index.php"; // Reemplaza con tu URL de página principal
      }, 500); // Puedes ajustar el tiempo de espera antes de la redirección
    }, 3000); // Puedes ajustar el tiempo de espera antes de ocultar el preloader
  });
  