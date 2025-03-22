<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GymPro - Sistema Integral de Gestión para Gimnasios</title>
  <style>
    /* CSS para el anuncio web de GymPro */
    body {
      font-family: 'Montserrat', 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
      color: #333;
      line-height: 1.6;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    .hero {
      background: linear-gradient(135deg, rgb(13 15 25 / 70%), #1c255e), url(/img/13.jpg);
  background-size: cover; /* Ajusta la imagen para cubrir todo el espacio */
  background-position: center; /* Centra la imagen */
  background-repeat: no-repeat; /* Evita que se repita */
  color: white;
  padding: 80px 0 60px;
  text-align: center;
  position: relative;
  overflow: hidden;
}

    .hero::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 250px;
      background: url('/api/placeholder/1200/250') center bottom no-repeat;
      background-size: cover;
      opacity: 0.1;
    }
    
    .logo-container {
      margin: 0 auto 30px auto;
      text-align: center;
    }
    
    .logo-placeholder {
      width: 140px;
      height: 140px;
      background-color: rgba(255,255,255,0.2);
      border-radius: 70px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      position: relative;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .hero h1 {
      font-size: 48px;
      margin-bottom: 5px;
      text-transform: uppercase;
      font-weight: 800;
      letter-spacing: 1px;
    }
    
    .hero h2 {
      font-size: 24px;
      margin-top: 0;
      margin-bottom: 20px;
      font-weight: 400;
    }
    
    .tagline {
      font-style: italic;
      margin: 15px 0;
      font-size: 18px;
      font-weight: 300;
      letter-spacing: 1px;
    }
    
    .hero-features {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 30px;
    }
    
    .hero-feature {
      margin: 0 20px;
      text-align: center;
    }
    
    .hero-feature i {
      font-size: 32px;
    }
    
    .hero-feature div {
      margin-top: 8px;
      font-size: 14px;
    }
    
    * Estilos para el contenedor de la clase cta-button */
.cta-button {
  display: inline-block;
  background-color: #25D366; /* Color oficial de WhatsApp */
  color: white;
  padding: 12px 20px;
  border-radius: 6px;
  font-weight: bold;
  text-decoration: none;
  font-size: 16px;
  transition: background 0.3s, transform 0.2s;
  text-align: center;
  margin-top: 20px; /* Asegura que el botón no esté pegado a otros elementos */
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

.cta-button:hover {
  background-color: #1ebe57;
  transform: scale(1.05);
}

.whatsapp-button {
  display: inline-block;
  background-color: #25D366;
  color: white !important;
  padding: 12px 20px;
  border-radius: 6px;
  font-weight: bold;
  text-decoration: none !important;
  font-size: 16px;
  transition: background 0.3s, transform 0.2s;
  margin-top: 20px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
  border: none;
  cursor: pointer;
}

.whatsapp-button:hover {
  background-color: #1ebe57;
  transform: scale(1.05);
  color: white !important;
}

    /* Main Sections */
    .section {
      padding: 60px 0;
    }
    
    .section-dark {
      background-color: #f5f5f5;
    }
    
    .section-content {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: flex-start;
    }
    
    .section-title {
      text-align: center;
      margin-bottom: 40px;
    }
    
    h3 {
      font-size: 28px;
      margin-top: 0;
      margin-bottom: 20px;
      padding-bottom: 10px;
      color: #1e2761;
      position: relative;
      text-transform: uppercase;
      font-weight: 700;
      display: inline-block;
    }
    
    h3::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 3px;
      background-color: #0575e6;
    }
    
    /* Feature Blocks */
    .feature-col {
      flex: 1;
      min-width: 300px;
      margin: 0 15px 30px;
    }
    
    .feature {
      margin-bottom: 30px;
    }
    
    .feature-title {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 10px;
      color: #1e2761;
      display: flex;
      align-items: center;
    }
    
    .feature-title i {
      margin-right: 10px;
      color: #0575e6;
      font-size: 22px;
    }
    
    .feature p {
      font-size: 14px;
      line-height: 1.6;
      margin: 0;
      color: #555;
    }
    
    /* Module Lists */
    .module-list {
      list-style-type: none;
      padding-left: 0;
      margin: 0 0 20px 0;
    }
    
    .module-list li {
      margin-bottom: 10px;
      position: relative;
      padding-left: 25px;
      font-size: 14px;
      color: #555;
    }
    
    .module-list li::before {
      content: "✓";
      position: absolute;
      left: 0;
      color: #0575e6;
      font-weight: bold;
    }
    
    /* Benefit Boxes */
    .benefit-box {
      background-color: white;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.05);
      border-left: 3px solid #0575e6;
    }
    
    .highlight {
      color: #0575e6;
      font-weight: bold;
    }
    
    /* Pricing Section */
    .pricing-section {
      background: linear-gradient(to bottom, #fff 0%, #f9f9f9 100%);
      padding: 60px 0;
    }
    
    .pricing-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin: 0 -15px;
    }
    
    .price-box {
      background-color: white;
      border-radius: 5px;
      padding: 25px;
      margin: 15px;
      box-shadow: 0 3px 12px rgba(0,0,0,0.1);
      position: relative;
      transition: transform 0.3s ease;
      border-top: 4px solid #0575e6;
      flex: 1;
      min-width: 280px;
      max-width: 350px;
    }
    
    .price-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0,0,0,0.15);
    }
    
    .popular-price-box {
      border-top: 4px solid #ffc107;
      background: linear-gradient(to bottom, #fff 0%, #f9f9f9 100%);
    }
    
    .price-title {
      font-weight: 700;
      font-size: 18px;
      color: #1e2761;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
    }
    
    .price-title i {
      margin-right: 10px;
      color: #0575e6;
    }
    
    .popular-price-box .price-title i {
      color: #ffc107;
    }
    
    .price {
      font-size: 32px;
      font-weight: 800;
      margin: 15px 0 20px 0;
      color: #1e2761;
    }
    
    .popular {
      position: absolute;
      top: -12px;
      right: 20px;
      background-color: #ffc107;
      color: #333;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    /* Contact Section */
    .contact-section {
      background-color: #f8f8f8;
      padding: 60px 0;
    }
    
    .contact-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    
    .contact-info {
      flex: 1;
      min-width: 300px;
      margin-right: 30px;
    }
    
    .contact-form {
      flex: 1;
      min-width: 300px;
    }
    
    .contact-item {
      display: flex;
      align-items: flex-start;
      margin-bottom: 20px;
    }
    
    .contact-item i {
      margin-right: 15px;
      color: #0575e6;
      font-size: 20px;
      min-width: 25px;
      text-align: center;
    }
    
    .qr-container {
      text-align: center;
      margin: 30px 0;
    }
    
    .qr-placeholder {
      width: 120px;
      height: 120px;
      background-color: #ddd;
      margin: 15px auto;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      border: 3px solid white;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
/* Contenedor de la galería */
.gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Columnas dinámicas */
  gap: 15px;
  justify-content: center;
  padding: 20px;
  max-width: 1200px;
  margin: auto;
}

/* Elementos de la galería */
.gallery-item {
  background-color: #222;
  border-radius: 8px;
  overflow: hidden;
  text-align: center;
  padding: 10px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

/* Imágenes */
.gallery-item img {
  width: 100%;
  aspect-ratio: 16 / 9;
  object-fit: contain;
  background-color: #333;
  transition: transform 0.3s ease, opacity 0.3s ease;
}

/* Títulos debajo de cada imagen */
.gallery-item p {
  margin-top: 10px;
  font-size: 16px;
  font-weight: bold;
  color: #ddd;
  text-transform: uppercase;
}

/* Efecto hover */
.gallery-item:hover img {
  transform: scale(1.05);
  opacity: 0.9;
}

.gallery-item:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
  transform: translateY(-5px);
}




    /* Footer */
    .footer {
      background-color: #1e2761;
      color: white;
      padding: 40px 0 20px;
      text-align: center;
    }
    
    .footer-content {
      max-width: 800px;
      margin: 0 auto;
    }
    
    .copyright {
      margin-top: 30px;
      font-size: 12px;
      color: rgba(255,255,255,0.7);
    }
    
    /* CTA Button */
    .cta-button {
      display: inline-block;
      background: linear-gradient(to right, #0575e6, #1e2761);
      color: white;
      padding: 12px 30px;
      border-radius: 30px;
      font-weight: bold;
      text-decoration: none;
      margin-top: 20px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(5, 117, 230, 0.3);
      border: none;
      cursor: pointer;
      font-size: 16px;
    }
    
    .cta-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(5, 117, 230, 0.4);
    }
    
    /* Media Queries */
    @media (max-width: 768px) {
      .section-content {
        flex-direction: column;
      }
      
      .feature-col, .contact-info, .contact-form {
        margin-right: 0;
        margin-bottom: 30px;
      }
      
      .hero h1 {
        font-size: 36px;
      }
      
      .hero h2 {
        font-size: 20px;
      }
    }
     /*Imagen de la morra esa*/
  /* Estilos para acomodar la imagen y el contenido */
.flex-container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 20px;
}

.image-container {
  flex: 1;
  min-width: 300px;
}

.image-container img {
  width: 100%;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.modules-container {
  flex: 2;
  min-width: 300px;
}

.feature-row {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

.feature-col {
  flex: 1;
  min-width: 250px;
}

/* Estilos responsivos para pantallas pequeñas */
@media (max-width: 768px) {
  .flex-container {
    flex-direction: column;
  }
  
  .image-container, .modules-container {
    width: 100%;
  }
}

    
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<!-- Header / Hero Section -->
<section class="hero">
  <div class="container">
    <div class="logo-container">
      <div class="logo-placeholder">
        <i class="fas fa-dumbbell" style="font-size: 60px;"></i>
      </div>
    </div>
    
    <h1>GymPro</h1>
    <h2>Sistema Integral de Gestión para Gimnasios</h2>
    
    <div style="margin: 20px 0;">
      <strong style="font-size: 22px; text-transform: uppercase;">Revoluciona tu gimnasio</strong>
      <p class="tagline">Optimiza operaciones, aumenta la retención de clientes y maximiza ingresos</p>
    </div>
    
    <div class="hero-features">
      <div class="hero-feature">
        <i class="fas fa-users"></i>
        <div>Control de Miembros</div>
      </div>
      <div class="hero-feature">
        <i class="fas fa-chart-line"></i>
        <div>Estadísticas</div>
      </div>
      <div class="hero-feature">
        <i class="fas fa-money-bill-wave"></i>
        <div>Pagos</div>
      </div>
      <div class="hero-feature">
        <i class="fas fa-calendar-check"></i>
        <div>Asistencia Automática</div>
      </div>
      <div class="hero-feature">
        <i class="fas fa-file-alt"></i>
        <div>Reportes Detallados</div>
      </div>
      <div class="hero-feature">
        <i class="fas fa-dumbbell"></i>
        <div>Rutinas Personalizadas</div>
      </div>
      <div class="hero-feature">
        <i class="fas fa-calendar-alt"></i>
        <div>Pagina Publicitaria</div>
      </div>
    </div>

    <!-- Botón de WhatsApp -->
    <a href="https://api.whatsapp.com/send?phone=529931125602&text=Hola,%20estoy%20interesado%20en%20GymPro" target="_blank" class="whatsapp-button">
  <i class="fab fa-whatsapp"></i> Contactar por WhatsApp
</a>

  </div>
</section>


  <!-- Features Section -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <h3>CARACTERÍSTICAS</h3>
      </div>
      
      <div class="section-content">
        <div class="feature-col">
          <div class="feature">
            <div class="feature-title">
              <i class="fas fa-users"></i> Gestión de Miembros
            </div>
            <p>Control completo de información de usuarios con perfiles detallados, historial de compras y pagos.</p>
          </div>
          
          <div class="feature">
            <div class="feature-title">
              <i class="fas fa-id-card"></i> Control de Membresías
            </div>
            <p>Creación y gestión de múltiples tipos de membresías con renovaciones automáticas y planes personalizados.</p>
          </div>
          
          <div class="feature">
            <div class="feature-title">
              <i class="fas fa-chart-bar"></i> Estadísticas y Reportes
            </div>
            <p>Datos y métricas en tiempo real sobre asistencia, ventas y rentabilidad para tomar decisiones estratégicas.</p>
          </div>
        </div>
        
        <div class="feature-col">
          <div class="feature">
            <div class="feature-title">
              <i class="fas fa-clipboard-check"></i> Control de Asistencia
            </div>
            <p>Seguimiento mediante número de cliente o credenciales. Genera reportes de frecuencia y recordatorios automáticos.</p>
          </div>
          
          <div class="feature">
            <div class="feature-title">
              <i class="fas fa-running"></i> Gestión de Rutinas
            </div>
            <p>Crea, asigna y modifica rutinas de entrenamiento personalizadas para cada usuario.</p>
          </div>
          
          <div class="feature">
            <div class="feature-title">
              <i class="fas fa-credit-card"></i> Sistema de Pagos
            </div>
            <p>Gestión completa de pagos, separación de cuentas, recordatorios automáticos y múltiples opciones de pago.</p>
          </div>
        </div>
      </div>
       <!-- Features Section -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <h3>GALERIA DEL PROGRMA</h3>
      </div>

      <div class="gallery">
  <div class="gallery-item">
    <img src="/img/lap1.png" alt="Dashboard del sistema">
    <p>Asistencia Automática</p>
  </div>
  <div class="gallery-item">
    <img src="/img/lap2.png" alt="Gestión de miembros">
    <p>Gestión de Membresías</p>
  </div>
  <div class="gallery-item">
    <img src="/img/lap3.png" alt="Control de asistencia">
    <p>Página de Bienvenida</p>
  </div>
  <div class="gallery-item">
    <img src="/img/lap4.png" alt="Lista de pagos">
    <p>Lista de Pagos Mensual</p>
  </div>
  <div class="gallery-item">
    <img src="/img/lap5.png" alt="Lista de asistencia">
    <p>Lista de Asistencia</p>
  </div>
  <div class="gallery-item">
    <img src="/img/lap6.png" alt="Datos del gimnasio">
    <p>Datos del Gimnasio</p>
  </div>
</div>


  <!-- Modules Section -->
   
  <section class="section section-dark">     
  <div class="container">       
    <div class="section-title">         
      <h3>MÓDULOS DEL SISTEMA</h3>       
    </div>      
    
    <div class="section-content">
      <!-- Estructura invertida: contenido a la izquierda, imagen a la derecha -->
      <div class="flex-container">
        <!-- Contenido de módulos a la izquierda -->
        <div class="modules-container">
          <div class="feature-row">         
            <div class="feature-col">           
              <div class="feature">             
                <div class="feature-title">               
                  <i class="fas fa-database"></i> Administración de Miembros             
                </div>             
                <ul class="module-list">               
                  <li>Registro completo</li>               
                  <li>Historial</li>               
                  <li>Gestión de datos personales</li>               
                  <li>Notas y observaciones</li>             
                </ul>           
              </div>                      
              
              <div class="feature">             
                <div class="feature-title">               
                  <i class="fas fa-qrcode"></i> Gestión de Asistencia             
                </div>             
                <ul class="module-list">               
                  <li>Control por número de socios</li>               
                  <li>Horarios de entrada/salida</li>               
                  <li>Alertas de membresías y pagos</li>               
                  <li>Estadísticas de frecuencia</li>             
                </ul>           
              </div>         
            </div>                  
            
            <div class="feature-col">           
              <div class="feature">             
                <div class="feature-title">               
                  <i class="fas fa-hand-holding-usd"></i> Sistema de Pagos             
                </div>             
                <ul class="module-list">               
                  <li>Selección de cobros</li>               
                  <li>Recordatorios de pago</li>               
                  <li>Múltiples métodos de pago</li>               
                  <li>Reportes financieros</li>             
                </ul>           
              </div>                      
              
              <div class="feature">             
                <div class="feature-title">               
                  <i class="fas fa-dumbbell"></i> Rutinas y Entrenamientos             
                </div>             
                <ul class="module-list">               
                  <li>Creación de rutinas personalizadas</li>               
                  <li>Seguimiento de progreso</li>               
                  <li>Asignación por nivel y objetivo</li>               
                  <li>Historial de rutinas anteriores</li>             
                </ul>           
              </div>         
            </div>
          </div>       
        </div>
        
        <!-- Imagen a la derecha -->
        <div class="image-container">
          <img src="/img/recepcion1.jpg" alt="Recepción del Gimnasio">
        </div>
      </div>
    </div>     
  </div> 
</section>

  </section>

  <!-- Benefits Section -->
  <section class="section">
    <div class="container">
      <div class="section-title">
        <h3>BENEFICIOS CLAVE</h3>
      </div>
      
      <div class="section-content">
        <div class="feature-col">
          <div class="benefit-box">
            <div class="feature-title">
              <i class="fas fa-robot"></i> Automatización Completa
            </div>
            <p>Olvídate de llevar cuentas, historial y asistencia de forma manual. Automatiza cobros, recordatorios y comunicaciones.</p>
          </div>
          
          <div class="benefit-box">
            <div class="feature-title">
              <i class="fas fa-heart"></i> Fidelización de Clientes
            </div>
            <p>Incrementa la permanencia hasta un <span class="highlight">40%</span> con seguimiento personalizado y un sistema que mantiene a tus usuarios motivados.</p>
          </div>
        </div>
        
        <div class="feature-col">
          <div class="benefit-box">
            <div class="feature-title">
              <i class="fas fa-shield-alt"></i> Control Total y Seguridad
            </div>
            <p>Accede a toda la información de tu gimnasio de manera fácil y rápida, con respaldo seguro de datos.</p>
          </div>
          
          <div class="benefit-box">
            <div class="feature-title">
              <i class="fas fa-chart-line"></i> Incrementa tus Ingresos
            </div>
            <p>Aumento promedio del <span class="highlight">35%</span> en ingresos gracias a mejor retención, disminución de morosidad y nuevas oportunidades de venta.</p>
          </div>
        </div>
      </div>
      
      <div style="text-align: center; margin-top: 40px;">
        <strong style="color: #1e2761; font-size: 22px; display: block;">ELEVA TU GIMNASIO AL SIGUIENTE NIVEL</strong>
        <p style="font-size: 16px;">Con la tecnología más avanzada del mercado</p>
        <a href="#contact" class="cta-button">Contáctanos Ahora</a>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section id="pricing" class="pricing-section">
    <div class="container">
      <div class="section-title">
        <h3>PLANES Y PRECIOS</h3>
      </div>
      
      <div class="pricing-container">
        <div class="price-box">
          <div class="price-title"><i class="fas fa-dumbbell"></i> Renta Mensual</div>
          <div class="price">$3,000 <span style="font-size: 16px; font-weight: normal;">/mes</span></div>
          <ul class="module-list">
            <li>Gestión completa de miembros</li>
            <li>Control de asistencia</li>
            <li>Sistema de pagos integrado</li>
            <li>Gestión de rutinas</li>
            <li>Soporte técnico presencial</li>
          </ul>
          <div style="text-align: center;">
            <a href="#contact" class="cta-button">Solicitar</a>
          </div>
        </div>
        
        <div class="price-box popular-price-box">
          <div class="popular">MÁS POPULAR</div>
          <div class="price-title"><i class="fas fa-award"></i> Renta Anual</div>
          <div class="price">$25,000 <span style="font-size: 16px; font-weight: normal;">/año</span></div>
          <ul class="module-list">
            <li>Todas las características del plan mensual</li>
            <li>2 meses gratis</li>
            <li>Capacitación personalizada</li>
            <li>Actualizaciones anuales</li>
            <li>Soporte preventivo</li>
          </ul>
          <div style="text-align: center;">
            <a href="#contact" class="cta-button">Solicitar</a>
          </div>
        </div>
        
        <div class="price-box">
          <div class="price-title"><i class="fas fa-cogs"></i> Personalizado</div>
          <div class="price">Solicite cotización</div>
          <ul class="module-list">
            <li>Soluciones a medida</li>
            <li>Integraciones personalizadas</li>
            <li>Soporte dedicado</li>
            <li>Desarrollo de características exclusivas</li>
          </ul>
          <div style="text-align: center;">
            <a href="#contact" class="cta-button">Solicitar</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact-section">
    <div class="container">
      <div class="section-title">
        <h3>CONTACTO</h3>
      </div>
      
      <div class="contact-container">
        <div class="contact-info">
          <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <div>
              Fracc. Bosque de Saloya<br>
              Nacajuca, Tabasco, México
            </div>
          </div>
          
          <div class="contact-item">
            <i class="fas fa-phone"></i>
            <div>+52 993 112 5602</div>
          </div>
          
          <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <div>info@gympro.com</div>
          </div>
          
          <div class="contact-item">
            <i class="fab fa-whatsapp"></i>
            <div>+52 993 112 5602</div>
          </div>
          
          <div class="qr-container">
            <h4>Escanea para más información</h4>
            <div style="margin-top: 15px;">
      <img src="/img/QR.jpg" alt="Código QR de WhatsApp" style="max-width: 150px; height: auto;">
    </div>
          </div>
        </div>
        
        <div class="contact-form">
          <h4>Solicite una demostración gratuita</h4>
          <p>Complete el formulario y nos pondremos en contacto con usted a la brevedad.</p>
          
          <!-- Formulario simulado - No es funcional en este ejemplo -->
          <form style="margin-top: 20px;">
  <div style="margin-bottom: 15px;">
    <input type="text" placeholder="Nombre" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
  </div>
  <div style="margin-bottom: 15px;">
    <input type="email" placeholder="Correo electrónico" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
  </div>
  <div style="margin-bottom: 15px;">
    <input type="tel" placeholder="Teléfono" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
  </div>
  <div style="margin-bottom: 15px;">
    <select style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
      <option value="" disabled selected>Plan de interés</option>
      <option value="mensual">Renta Mensual</option>
      <option value="anual">Renta Anual</option>
      <option value="personalizado">Personalizado</option>
    </select>
  </div>
  <div style="margin-bottom: 20px;">
    <textarea placeholder="Mensaje" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
  </div>
  <a href="https://wa.me/529931125602" target="_blank" style="text-decoration: none; display: block; width: 100%;">
    <button type="button" class="cta-button" style="width: 100%; background-color: #25D366; color: white; border: none; padding: 12px; border-radius: 4px; font-weight: bold; cursor: pointer;">
      Contactar por WhatsApp
    </button>
  </a>
  <div style="margin-top: 20px; text-align: center;">
    <p>Desarrollador: Jorge Emanuel Morales Lopez</p>
    <p>Teléfono: 9931125602</p>
   
  </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <div class="logo-placeholder" style="width: 80px; height: 80px; background-color: rgba(255,255,255,0.1);">
        <i class="fas fa-dumbbell" style="font-size: 40px;"></i>
      </div>
      
      <p>GymPro - Sistema Integral de Gestión para Gimnasios</p>
      
      <div style="margin: 20px 0;">
        <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-facebook fa-lg"></i></a>
        <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-instagram fa-lg"></i></a>
        <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-whatsapp fa-lg"></i></a>
        <a href="#" style="color: white; margin: 0 10px;"><i class="fab fa-youtube fa-lg"></i></a>
      </div>
      
      <div class="copyright">
        © 2025 GymPro. Todos los derechos reservados.<br>
        Desarrollador: Ing. Jorge Emanuel Morales Lopez
      </div>
    </div>
  </footer>
</body>
</html>