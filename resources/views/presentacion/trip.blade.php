<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: 'Montserrat', 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
      color: #333;
    }
    
    .instructions {
      max-width: 800px;
      margin: 20px auto;
      padding: 15px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .triptico-container {
      width: 795px; /* Tamaño carta en píxeles (ancho) */
      height: 900px; /* Tamaño carta en píxeles (alto) */
      margin: 100px auto;
      display: flex;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      background-color: white;
    }
    
    .panel {
      width: 400px;
      height: 950px;
      box-sizing: border-box;
      position: relative;
      overflow: hidden;
    }
    
    /* Estilos para el panel frontal */
    .front-panel {
      background: linear-gradient(135deg, #1e2761, #0575e6);
      color: white;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 60px 60px;
    }
    
    .front-panel::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 250px;
      background: url('/api/placeholder/265/250') center bottom no-repeat;
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
    
    .tagline {
      font-style: italic;
      margin: 15px 0;
      font-size: 14px;
      font-weight: 300;
      letter-spacing: 1px;
    }
    
    /* Estilos para los paneles interiores */
    .left-panel, .center-panel, .right-panel {
      padding: 30px 20px;
    }
    
    .left-panel {
      background-color: white;
      background-image: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url('/api/placeholder/265/612');
      background-size: cover;
      border-right: 1px solid #eee;
    }
    
    .center-panel {
      background-color: #f9f9f9;
      border-right: 1px solid #eee;
    }
    
    .right-panel {
      background: linear-gradient(to bottom, #fff 0%, #f2f2f2 100%);
    }
    
    /* Estilos para los paneles posteriores */
    .back-panel-left {
      background-color: #f8f8f8;
      border-right: 1px solid #eee;
      padding: 30px 20px;
    }
    
    .back-panel-right {
      background-color: #f2f2f2;
      padding: 30px 20px;
    }
    
    /* Estilos para textos */
    h1 {
      font-size: 32px;
      margin-bottom: 5px;
      color: inherit;
      text-transform: uppercase;
      font-weight: 800;
      letter-spacing: 1px;
    }
    
    h2 {
      font-size: 18px;
      margin-top: 0;
      margin-bottom: 20px;
      color: inherit;
      font-weight: 400;
    }
    
    h3 {
      font-size: 18px;
      margin-top: 0;
      margin-bottom: 20px;
      padding-bottom: 8px;
      color: #1e2761;
      position: relative;
      text-transform: uppercase;
      font-weight: 700;
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
    
    .section-title {
      font-size: 14px;
      font-weight: 700;
      margin-top: 20px;
      margin-bottom: 5px;
      color: #1e2761;
      display: flex;
      align-items: center;
    }
    
    .section-title i {
      margin-right: 8px;
      color: #0575e6;
      font-size: 18px;
    }
    
    p {
      font-size: 12px;
      line-height: 1.5;
      margin: 5px 0 15px 0;
      color: #555;
    }
    
    ul {
      font-size: 12px;
      padding-left: 20px;
      margin: 5px 0 15px 0;
      color: #555;
      list-style-type: none;
    }
    
    ul li {
      margin-bottom: 5px;
      position: relative;
      padding-left: 15px;
    }
    
    ul li::before {
      content: "✓";
      position: absolute;
      left: 0;
      color: #0575e6;
      font-weight: bold;
    }
    
    /* Estilos para los precios */
    .price-box {
      background-color: white;
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 15px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      position: relative;
      transition: transform 0.2s ease;
      border-top: 3px solid #0575e6;
    }
    
    .price-box:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }
    
    .popular-price-box {
      border-top: 3px solid #ffc107;
      background: linear-gradient(to bottom, #fff 0%, #f9f9f9 100%);
    }
    
    .price-title {
      font-weight: 700;
      font-size: 14px;
      color: #1e2761;
      margin-bottom: 5px;
    }
    
    .price {
      font-size: 20px;
      font-weight: 800;
      margin: 5px 0 10px 0;
      color: #1e2761;
    }
    
    .popular {
      position: absolute;
      top: -10px;
      right: 10px;
      background-color: #ffc107;
      color: #333;
      padding: 3px 8px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: bold;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    /* Estilos para la información de contacto */
    .contact-info {
      font-size: 12px;
      line-height: 1.6;
      color: #555;
    }
    
    .contact-item {
      display: flex;
      align-items: flex-start;
      margin-bottom: 15px;
    }
    
    .contact-item i {
      margin-right: 10px;
      color: #0575e6;
      font-size: 16px;
      min-width: 20px;
      text-align: center;
    }
    
    .qr-placeholder {
      width: 100px;
      height: 100px;
      background-color: #ddd;
      margin: 15px auto;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 10px;
      border: 3px solid white;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .footer {
      font-size: 10px;
      position: absolute;
      bottom: 20px;
      width: calc(100% - 40px);
      text-align: center;
      color: #777;
    }
    
    .view-selector {
      display: flex;
      justify-content: center;
      margin: 20px 0;
    }
    
    .view-button {
      padding: 10px 20px;
      margin: 0 10px;
      background-color: #1e2761;
      color: white;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.2s ease;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .view-button:hover {
      background-color: #0575e6;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    .divider {
      height: 1px;
      background-color: #eee;
      margin: 20px 0;
    }
    
    .feature-icon {
      background-color: #f2f7ff;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      color: #0575e6;
      vertical-align: middle;
    }
    
    .benefit-box {
      background-color: white;
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 15px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.05);
      border-left: 3px solid #0575e6;
    }
    
    .top-accent {
      height: 5px;
      background: linear-gradient(to right, #1e2761, #0575e6);
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
    }
    
    .highlight {
      color: #0575e6;
      font-weight: bold;
    }
    
    .gym-image {
      width: 100%;
      height: 120px;
      background-color: #ddd;
      margin: 15px 0;
      border-radius: 5px;
      overflow: hidden;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
  <div class="instructions">
    <h3>Diseño de Tríptico GymPro - Tamaño Carta</h3>
    <p>Este es un diseño visual interactivo para un tríptico en tamaño carta. Use los botones a continuación para ver las diferentes caras del tríptico.</p>
  </div>

  <div class="view-selector">
    <button class="view-button" onclick="showView('front')"><i class="fas fa-book-open"></i> Vista Frontal</button>
    <button class="view-button" onclick="showView('inside')"><i class="fas fa-tablet"></i> Vista Interior</button>
    <button class="view-button" onclick="showView('back')"><i class="fas fa-book"></i> Vista Posterior</button>
  </div>

  <!-- Vista Frontal -->
  <div id="front-view" class="triptico-container">
    <div class="panel back-panel-right">
      <div class="top-accent"></div>
      <h3>CONTACTO</h3>
      
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
      
      <div class="divider"></div>
      
      <div style="text-align: center;">
        <h3 style="display: inline-block;">CONTÁCTENOS</h3>
        <p>Solicite una demostración gratuita</p>
        
        <div class="qr-placeholder">
          <i class="fas fa-qrcode" style="font-size: 40px; color: #888;"></i>
        </div>
      </div>
      
      <div class="footer">
        © 2025 GymPro. Todos los derechos reservados.<br>
        Desarrollador: Ing. Jorge Emanuel Morales Lopez
      </div>
    </div>
    
    <div class="panel back-panel-left">
      <div class="top-accent"></div>
      <h3>PLANES Y PRECIOS</h3>
      
      <div class="price-box">
        <div class="price-title"><i class="fas fa-dumbbell"></i> Renta Mensual</div>
        <div class="price">$3,000 <span style="font-size: 14px; font-weight: normal;">/mes</span></div>
        <ul>
          <li>Gestión completa de miembros</li>
          <li>Control de asistencia</li>
          <li>Sistema de pagos integrado</li>
          <li>Gestión de rutinas</li>
          <li>Soporte técnico presencial</li>
        </ul>
      </div>
      
      <div class="price-box popular-price-box">
        <div class="popular">MÁS POPULAR</div>
        <div class="price-title"><i class="fas fa-award"></i> Renta Anual</div>
        <div class="price">$25,000 <span style="font-size: 14px; font-weight: normal;">/año</span></div>
        <ul>
          <li>Todas las características del plan mensual</li>
          <li>2 meses gratis</li>
          <li>Capacitación personalizada</li>
          <li>Actualizaciones anuales</li>
          <li>Soporte preventivo</li>
        </ul>
      </div>
      
      <div class="price-box">
        <div class="price-title"><i class="fas fa-cogs"></i> Personalizado</div>
        <div class="price">Solicite cotización</div>
        <ul>
          <li>Soluciones a medida</li>
          <li>Integraciones personalizadas</li>
          <li>Soporte dedicado</li>
          <li>Desarrollo de características exclusivas</li>
        </ul>
      </div>
    </div>
    
    <div class="panel front-panel">
      <div class="logo-container">
        <div class="logo-placeholder">
          <i class="fas fa-dumbbell" style="font-size: 60px;"></i>
        </div>
      </div>
      
      <h1>GymPro</h1>
      <h2>Sistema Integral de Gestión para Gimnasios</h2>
      
      <div style="margin: 20px 0;">
        <strong style="font-size: 18px; text-transform: uppercase;">Revoluciona tu gimnasio</strong>
        <p class="tagline">Optimiza operaciones, aumenta la retención de clientes y maximiza ingresos</p>
      </div>
      
      <div style="margin-top: 30px;">
        <div style="display: inline-block; margin: 0 10px;">
          <i class="fas fa-users" style="font-size: 24px;"></i>
          <div style="font-size: 12px; margin-top: 5px;">Control de Miembros</div>
        </div>
        
        <div style="display: inline-block; margin: 0 10px;">
          <i class="fas fa-chart-line" style="font-size: 24px;"></i>
          <div style="font-size: 12px; margin-top: 5px;">Estadísticas</div>
        </div>
        
        <div style="display: inline-block; margin: 0 10px;">
          <i class="fas fa-money-bill-wave" style="font-size: 24px;"></i>
          <div style="font-size: 12px; margin-top: 5px;">Pagos</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Vista Interior -->
  <div id="inside-view" class="triptico-container" style="display: none;">
    <div class="panel left-panel">
      <div class="top-accent"></div>
      <h3>CARACTERÍSTICAS</h3>
      
      <div class="section-title">
        <i class="fas fa-users"></i> Gestión de Miembros
      </div>
      <p>Control completo de información de usuarios con perfiles detallados, historial de compras y pagos.</p>
      
      <div class="section-title">
        <i class="fas fa-id-card"></i> Control de Membresías
      </div>
      <p>Creación y gestión de múltiples tipos de membresías con renovaciones automáticas y planes personalizados.</p>
      
      <div class="section-title">
        <i class="fas fa-chart-bar"></i> Estadísticas y Reportes
      </div>
      <p>Datos y métricas en tiempo real sobre asistencia, ventas y rentabilidad para tomar decisiones estratégicas.</p>
      
      <div class="section-title">
        <i class="fas fa-clipboard-check"></i> Control de Asistencia
      </div>
      <p>Seguimiento mediante número de cliente o credenciales. Genera reportes de frecuencia y recordatorios automáticos.</p>
      
      <div class="section-title">
        <i class="fas fa-running"></i> Gestión de Rutinas
      </div>
      <p>Crea, asigna y modifica rutinas de entrenamiento personalizadas para cada usuario.</p>
      
      <div class="section-title">
        <i class="fas fa-credit-card"></i> Sistema de Pagos
      </div>
      <p>Gestión completa de pagos, separación de cuentas, recordatorios automáticos y múltiples opciones de pago.</p>
      
      <div class="gym-image">
        <img src="/api/placeholder/225/120" alt="Equipo de gimnasio" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
    </div>
    
    <div class="panel center-panel">
      <div class="top-accent"></div>
      <h3>MÓDULOS DEL SISTEMA</h3>
      
      <div class="section-title">
        <i class="fas fa-database"></i> Administración de Miembros
      </div>
      <ul>
        <li>Registro completo</li>
        <li>Historial</li>
        <li>Gestión de datos personales</li>
        <li>Notas y observaciones</li>
      </ul>
      
      <div class="section-title">
        <i class="fas fa-qrcode"></i> Gestión de Asistencia
      </div>
      <ul>
        <li>Control por número de socios</li>
        <li>Horarios de entrada/salida</li>
        <li>Alertas de membresías y pagos</li>
        <li>Estadísticas de frecuencia</li>
      </ul>
      
      <div class="section-title">
        <i class="fas fa-hand-holding-usd"></i> Sistema de Pagos
      </div>
      <ul>
        <li>Selección de cobros</li>
        <li>Recordatorios de pago</li>
        <li>Múltiples métodos de pago</li>
        <li>Reportes financieros</li>
      </ul>
      
      <div class="section-title">
        <i class="fas fa-dumbbell"></i> Rutinas y Entrenamientos
      </div>
      <ul>
        <li>Creación de rutinas personalizadas</li>
        <li>Seguimiento de progreso</li>
        <li>Asignación por nivel y objetivo</li>
        <li>Historial de rutinas anteriores</li>
      </ul>
      
      <div class="gym-image">
        <img src="/api/placeholder/225/120" alt="Dashboard del sistema" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
    </div>
    
    <div class="panel right-panel">
      <div class="top-accent"></div>
      <h3>BENEFICIOS CLAVE</h3>
      
      <div class="benefit-box">
        <div class="section-title">
          <i class="fas fa-robot"></i> Automatización Completa
        </div>
        <p>Olvídate de llevar cuentas, historial y asistencia de forma manual. Automatiza cobros, recordatorios y comunicaciones.</p>
      </div>
      
      <div class="benefit-box">
        <div class="section-title">
          <i class="fas fa-heart"></i> Fidelización de Clientes
        </div>
        <p>Incrementa la permanencia hasta un <span class="highlight">40%</span> con seguimiento personalizado y un sistema que mantiene a tus usuarios motivados.</p>
      </div>
      
      <div class="benefit-box">
        <div class="section-title">
          <i class="fas fa-shield-alt"></i> Control Total y Seguridad
        </div>
        <p>Accede a toda la información de tu gimnasio de manera fácil y rápida, con respaldo seguro de datos.</p>
      </div>
      
      <div class="benefit-box">
        <div class="section-title">
          <i class="fas fa-chart-line"></i> Incrementa tus Ingresos
        </div>
        <p>Aumento promedio del <span class="highlight">35%</span> en ingresos gracias a mejor retención, disminución de morosidad y nuevas oportunidades de venta.</p>
      </div>
      
      <div style="text-align: center; margin-top: 20px;">
        <strong style="color: #1e2761; font-size: 14px;">ELEVA TU GIMNASIO AL SIGUIENTE NIVEL</strong>
        <p style="font-size: 12px;">Con la tecnología más avanzada del mercado</p>
      </div>
    </div>
  </div>

  <!-- Vista Posterior -->
  <div id="back-view" class="triptico-container" style="display: none;">
    <div class="panel right-panel">
      <div class="top-accent"></div>
      <h3>BENEFICIOS CLAVE</h3>
      
      <div class="benefit-box">
        <div class="section-title">
          <i class="fas fa-robot"></i> Automatización Completa
        </div>
        <p>Olvídate de llevar cuentas, historial y asistencia de forma manual. Automatiza cobros, recordatorios y comunicaciones.</p>
      </div>
      
      <div class="benefit-box">
        <div class="section-title">
          <i class="fas fa-heart"></i> Fidelización de Clientes
        </div>
        <p>Incrementa la permanencia hasta un <span class="highlight">40%</span> con seguimiento personalizado y un sistema que mantiene a tus usuarios motivados.</p>
      </div>
      
      <div class="benefit-box">
        <div class="section-title">
          <i class="fas fa-shield-alt"></i> Control Total y Seguridad
        </div>
        <p>Accede a toda la información de tu gimnasio de manera fácil y rápida, con respaldo seguro de datos.</p>
      </div>
      
      <div class="benefit-box">
        <div class="section-title">
          <i class="fas fa-chart-line"></i> Incrementa tus Ingresos
        </div>
        <p>Aumento promedio del <span class="highlight">35%</span> en ingresos gracias a mejor retención, disminución de morosidad y nuevas oportunidades de venta.</p>
      </div>
      
      <div style="text-align: center; margin-top: 20px;">
        <strong style="color: #1e2761; font-size: 14px;">ELEVA TU GIMNASIO AL SIGUIENTE NIVEL</strong>
        <p style="font-size: 12px;">Con la tecnología más avanzada del mercado</p>
      </div>
    </div>
    
    <div class="panel center-panel">
      <div class="top-accent"></div>
      <h3>MÓDULOS DEL SISTEMA</h3>
      
      <div class="section-title">
        <i class="fas fa-database"></i> Administración de Miembros
      </div>
      <ul>
        <li>Registro completo</li>
        <li>Historial</li>
        <li>Gestión de datos personales</li>
        <li>Notas y observaciones</li>
      </ul>
      
      <div class="section-title">
        <i class="fas fa-qrcode"></i> Gestión de Asistencia
      </div>
      <ul>
        <li>Control por número de socios</li>
        <li>Horarios de entrada/salida</li>
        <li>Alertas de membresías y pagos</li>
        <li>Estadísticas de frecuencia</li>
      </ul>
      
      <div class="section-title">
        <i class="fas fa-hand-holding-usd"></i> Sistema de Pagos
      </div>
      <ul>
        <li>Selección de cobros</li>
        <li>Recordatorios de pago</li>
        <li>Múltiples métodos de pago</li>
        <li>Reportes financieros</li>
      </ul>
      
      <div class="section-title">
        <i class="fas fa-dumbbell"></i> Rutinas y Entrenamientos
      </div>
      <ul>
        <li>Creación de rutinas personalizadas</li>
        <li>Seguimiento de progreso</li>
        <li>Asignación por nivel y objetivo</li>
        <li>Historial de rutinas anteriores</li>
      </ul>
      
      <div class="gym-image">
        <img src="/api/placeholder/225/120" alt="Dashboard del sistema" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
    </div>
    
    <div class="panel left-panel">
      <div class="top-accent"></div>
      <h3>CARACTERÍSTICAS</h3>
      
      <div class="section-title">
        <i class="fas fa-users"></i> Gestión de Miembros
      </div>
      <p>Control completo de información de usuarios con perfiles detallados, historial de compras y pagos.</p>
      
      <div class="section-title">
        <i class="fas fa-id-card"></i> Control de Membresías
      </div>
      <p>Creación y gestión de múltiples tipos de membresías con renovaciones automáticas y planes personalizados.</p>
      
      <div class="section-title">
        <i class="fas fa-chart-bar"></i> Estadísticas y Reportes
      </div>
      <p>Datos y métricas en tiempo real sobre asistencia, ventas y rentabilidad para tomar decisiones estratégicas.</p>
      
      <div class="section-title">
        <i class="fas fa-clipboard-check"></i> Control de Asistencia
      </div>
      <p>Seguimiento mediante número de cliente o credenciales. Genera reportes de frecuencia y recordatorios automáticos.</p>
      
      <div class="section-title">
        <i class="fas fa-running"></i> Gestión de Rutinas
      </div>
      <p>Crea, asigna y modifica rutinas de entrenamiento personalizadas para cada usuario.</p>
      
      <div class="section-title">
        <i class="fas fa-credit-card"></i> Sistema de Pagos
      </div>
      <p>Gestión completa de pagos, separación de cuentas, recordatorios automáticos y múltiples opciones de pago.</p>
      
      <div class="gym-image">
        <img src="/api/placeholder/225/120" alt="Equipo de gimnasio" style="width: 100%; height: 100%; object-fit: cover;">
      </div>
    </div>
  </div>

  <script>
    function showView(view) {
  document.getElementById('front-view').style.display = 'none';
  document.getElementById('inside-view').style.display = 'none';
  document.getElementById('back-view').style.display = 'none';
  
  document.getElementById(view + '-view').style.display = 'flex';
}

// Mostrar la vista frontal por defecto cuando carga la página
window.onload = function() {
  showView('front');
};
</script>
</body>
</html>