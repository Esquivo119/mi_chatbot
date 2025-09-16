<?php
// Configuración general
$title = 'Colegio I.E. 4018 "Abraham Valdelomar" - Educación de Primaria y Secundaria';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Colegio I.E. 4018 Abraham Valdelomar - Educación integral de primaria y secundaria en Lima.">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- Encabezado -->
  <?php include 'header.php'; ?>

  <main>
    <!-- Inicio -->
    <section id="inicio" class="section">
      <div class="intro">
        <h1>Bienvenido al I.E. Nº 4018 Abraham Valdelomar</h1>
        <p>Tu mejor opción para educación de primaria y secundaria.</p>
        <p>Explora nuestras instalaciones y descubre lo que tenemos para ofrecer a nuestros estudiantes.</p>
      </div>
      <div class="banner">
        <img src="estudiantes.png" alt="Estudiantes en clase" width="350">
      </div>
    </section>

    <!-- Facebook Embed -->
    <aside class="social-feed">
      <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fabrahamvaldelomar4018%3Flocale%3Des_LA&tabs=timeline&width=500&height=600&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"
        width="500" height="600" style="border:none;overflow:hidden" frameborder="0"
        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
      </iframe>
    </aside>

    <!-- Nosotros -->
    <section id="nosotros" class="section">
      <h2>Nosotros</h2>
      <p>El colegio I.E. Nº 4018 Abraham Valdelomar fue fundado en 1973, ofreciendo una educación integral que forma a los líderes del mañana.</p>
      <article>
        <h3>Nuestro Equipo Directivo</h3>
        <p>Comprometido con la excelencia académica y el desarrollo humano.</p>
      </article>
    </section>

    <!-- Información Académica -->
    <section id="academica" class="section">
      <h2>Información Académica</h2>
      <article>
        <h3>Primaria</h3>
        <p>Desarrollamos habilidades fundamentales con una metodología activa y participativa.</p>
      </article>
      <article>
        <h3>Secundaria</h3>
        <p>Formamos estudiantes críticos y analíticos preparados para el futuro.</p>
      </article>
    </section>
    
    <!-- Sección Recursos para Estudiantes -->
    <section id="estudiantes" class="section">
        <h2>Recursos para Estudiantes</h2>
        <ul>
            <li><a href="materiales.php">Materiales de Estudio</a></li>
        </ul>
    </section>


    <!-- Contacto -->
    <section id="contacto" class="section">
      <h2>Contacto</h2>
      <p>Comunícate con nosotros:</p>
      <p><strong>Secretaría Primaria - Mirtha:</strong> <a href="tel:+51993919324">+51 993 919 324</a></p>
      <p><strong>Secretaría Secundaria - Verónica:</strong> <a href="tel:+51957970869">+51 957 970 869</a></p>
      <p><strong>bibliotea</strong><a href="solicitar.php">ddddddddddddddddddddd
      </a></p>
    </section>
  </main>

  <!-- Pie de página -->
  <?php include 'footer.php'; ?>

  <script src="script.js"></script>
</body>
</html>
