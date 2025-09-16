// --- Desplazamiento suave ---
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const targetId = this.getAttribute('href').substring(1);
      const targetSection = document.getElementById(targetId);
  
      if (targetSection) {
        window.scrollTo({
          top: targetSection.offsetTop - 60, // Ajustado al header fijo
          behavior: 'smooth'
        });
      }
    });
  });
  
  // --- Resaltar enlace activo en el menú ---
  window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const scrollPosition = window.scrollY + 70;
  
    sections.forEach(section => {
      if (
        scrollPosition >= section.offsetTop &&
        scrollPosition < section.offsetTop + section.offsetHeight
      ) {
        document.querySelectorAll('nav a').forEach(link => link.classList.remove('active'));
        const currentLink = document.querySelector(`nav a[href="#${section.id}"]`);
        if (currentLink) currentLink.classList.add('active');
      }
    });
  });
  
  
  // --- Verificar existencia de un elemento ---
  document.addEventListener("DOMContentLoaded", () => {
    const elemento = document.querySelector('.mi-clase');
    if (elemento) {
      elemento.classList.add('nueva-clase');
    } else {
      console.warn('El elemento con la clase ".mi-clase" no se encontró.');
    }
  });
  