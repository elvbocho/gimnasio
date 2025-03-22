    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GymPro - Sistema de Gestión Integral para Gimnasios</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <style>
            :root {
                --primary: #3498db;
                --secondary: #2ecc71;
                --accent: #e74c3c;
                --dark: #2c3e50;
                --light: #ecf0f1;
                --text-dark: #34495e;
                --text-light: #ffffff;
                --transition: all 0.3s ease;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            body {
                line-height: 1.6;
                color: var(--text-dark);
                overflow-x: hidden;
            }

            header {
                background: linear-gradient(135deg, var(--primary), var(--dark));
                color: var(--text-light);
                padding: 1rem 0;
                position: fixed;
                width: 100%;
                z-index: 999;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 5%;
            }

            .logo {
                font-size: 1.8rem;
                font-weight: 700;
                letter-spacing: 1px;
            }

            .logo span {
                color: var(--secondary);
            }

            nav ul {
                display: flex;
                list-style: none;
            }

            nav ul li {
                margin-left: 2rem;
            }

            nav ul li a {
                color: var(--text-light);
                text-decoration: none;
                font-weight: 500;
                transition: var(--transition);
                padding: 0.5rem 1rem;
                border-radius: 4px;
            }

            nav ul li a:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }

            .cta-button {
                background-color: var(--secondary);
                color: var(--text-light);
                padding: 0.7rem 1.5rem;
                border-radius: 30px;
                text-decoration: none;
                font-weight: 600;
                transition: var(--transition);
                display: inline-block;
            }

            .cta-button:hover {
                background-color: #27ae60;
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }

            .hero {
                padding: 8rem 5% 5rem;
                display: flex;
                align-items: center;
                min-height: 100vh;
                background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/api/placeholder/1920/1080') center/cover no-repeat;
                color: var(--text-light);
                position: relative;
            }

            .hero-content {
                max-width: 600px;
                margin-right: auto;
            }

            .hero h1 {
                font-size: 3.5rem;
                margin-bottom: 1.5rem;
                line-height: 1.2;
            }

            .hero p {
                font-size: 1.2rem;
                margin-bottom: 2rem;
                opacity: 0.9;
            }
            
            .hero-buttons {
                display: flex;
                gap: 1rem;
            }
            
            .secondary-button {
                background-color: transparent;
                border: 2px solid var(--secondary);
                color: var(--text-light);
                padding: 0.7rem 1.5rem;
                border-radius: 30px;
                text-decoration: none;
                font-weight: 600;
                transition: var(--transition);
            }
            
            .secondary-button:hover {
                background-color: rgba(46, 204, 113, 0.2);
                transform: translateY(-3px);
            }

            .section {
                padding: 5rem 5%;
            }

            .section-title {
                text-align: center;
                margin-bottom: 3rem;
                position: relative;
                font-size: 2.5rem;
            }

            .section-title:after {
                content: '';
                display: block;
                width: 100px;
                height: 4px;
                background-color: var(--primary);
                margin: 1rem auto;
                border-radius: 2px;
            }

            .features {
                background-color: var(--light);
            }

            .features-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
            }

            .feature-card {
                background-color: white;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                transition: var(--transition);
                text-align: center;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .feature-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            }

            .feature-icon {
                background: linear-gradient(135deg, var(--primary), var(--secondary));
                color: white;
                width: 70px;
                height: 70px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                font-size: 1.8rem;
            }

            .feature-card h3 {
                margin-bottom: 1rem;
                font-size: 1.5rem;
            }

            .feature-card p {
                color: #777;
                flex-grow: 1;
            }

            .benefits {
                background-color: white;
            }

            .benefits-container {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 3rem;
            }

            .benefits-image {
                flex: 1;
                min-width: 300px;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }

            .benefits-image img {
                width: 100%;
                height: auto;
                display: block;
            }

            .benefits-content {
                flex: 1;
                min-width: 300px;
            }

            .benefit-item {
                margin-bottom: 1.5rem;
                display: flex;
                align-items: flex-start;
            }

            .benefit-icon {
                color: var(--secondary);
                margin-right: 1rem;
                font-size: 1.5rem;
            }

            .benefit-text h4 {
                margin-bottom: 0.5rem;
                font-size: 1.3rem;
            }

            .testimonials {
                background: linear-gradient(135deg, var(--primary), var(--dark));
                color: var(--text-light);
            }

            .testimonial-slider {
                max-width: 800px;
                margin: 0 auto;
                padding: 2rem;
                border-radius: 8px;
                background-color: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
            }

            .testimonial {
                text-align: center;
            }

            .testimonial-text {
                font-size: 1.2rem;
                font-style: italic;
                margin-bottom: 2rem;
            }

            .testimonial-author {
                font-weight: bold;
                font-size: 1.1rem;
            }

            .testimonial-position {
                font-size: 0.9rem;
                opacity: 0.8;
            }

            .pricing {
                background-color: var(--light);
            }

            .pricing-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 2rem;
                max-width: 1200px;
                margin: 0 auto;
            }

            .pricing-plan {
                background-color: white;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                overflow: hidden;
                transition: var(--transition);
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .pricing-plan:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            }

            .pricing-header {
                padding: 2rem;
                background: linear-gradient(135deg, var(--primary), var(--dark));
                color: white;
                text-align: center;
            }

            .pricing-title {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }

            .pricing-price {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .pricing-period {
                font-size: 0.9rem;
                opacity: 0.8;
            }

            .pricing-features {
                padding: 2rem;
                flex-grow: 1;
            }

            .pricing-feature {
                margin-bottom: 1rem;
                display: flex;
                align-items: center;
            }

            .pricing-feature i {
                color: var(--secondary);
                margin-right: 0.5rem;
            }

            .pricing-cta {
                text-align: center;
                padding: 0 2rem 2rem;
            }
            
            .popular-plan {
                position: relative;
                transform: scale(1.05);
                z-index: 1;
            }
            
            .popular-badge {
                position: absolute;
                top: 0;
                right: 0;
                background-color: var(--accent);
                color: white;
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
                font-weight: bold;
                border-radius: 0 0 0 8px;
            }

            .contact {
                background-color: white;
            }

            .contact-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 3rem;
            }

            .contact-info h3 {
                margin-bottom: 1.5rem;
                font-size: a1.8rem;
            }

            .contact-item {
                display: flex;
                align-items: flex-start;
                margin-bottom: 1.5rem;
            }

            .contact-icon {
                margin-right: 1rem;
                font-size: 1.5rem;
                color: var(--primary);
            }

            .contact-form {
                padding: 2rem;
                background-color: var(--light);
                border-radius: 8px;
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-control {
                width: 100%;
                padding: 0.8rem;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 1rem;
            }

            textarea.form-control {
                min-height: 150px;
                resize: vertical;
            }

            .form-submit {
                width: 100%;
                background-color: var(--primary);
                color: white;
                border: none;
                padding: 1rem;
                font-size: 1rem;
                border-radius: 4px;
                cursor: pointer;
                transition: var(--transition);
            }

            .form-submit:hover {
                background-color: #2980b9;
            }
            
            .whatsapp-button {
                background-color: #25D366;
                color: white;
                border: none;
                padding: 1rem;
                font-size: 1rem;
                border-radius: 4px;
                cursor: pointer;
                transition: var(--transition);
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 0.5rem;
                text-decoration: none;
            }
            
            .whatsapp-button:hover {
                background-color: #128C7E;
                transform: translateY(-3px);
            }

            footer {
                background-color: var(--dark);
                color: var(--text-light);
                padding: 3rem 5%;
                text-align: center;
            }

            .footer-content {
                max-width: 600px;
                margin: 0 auto;
            }

            .social-links {
                display: flex;
                justify-content: center;
                margin: 2rem 0;
            }

            .social-link {
                color: var(--text-light);
                font-size: 1.5rem;
                margin: 0 1rem;
                transition: var(--transition);
            }

            .social-link:hover {
                color: var(--secondary);
                transform: translateY(-5px);
            }

            .copyright {
                opacity: 0.7;
                font-size: 0.9rem;
            }
            
            .module-section {
                padding: 5rem 0;
                background-color: white;
            }
            
            .module-title {
                text-align: center;
                margin-bottom: 3rem;
                font-size: 2.5rem;
                position: relative;
            }
            
            .module-title:after {
                content: '';
                display: block;
                width: 100px;
                height: 4px;
                background-color: var(--primary);
                margin: 1rem auto;
                border-radius: 2px;
            }
            
            .modules-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 5%;
            }
            
            .module-card {
                background-color: var(--light);
                border-radius: 8px;
                padding: 2rem;
                box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                transition: var(--transition);
                display: flex;
                flex-direction: column;
            }
            
            .module-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            }
            
            .module-icon {
                font-size: 2.5rem;
                color: var(--primary);
                margin-bottom: 1rem;
            }
            
            .module-card h3 {
                margin-bottom: 1rem;
                font-size: 1.5rem;
            }
            
            .module-card ul {
                margin-left: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .module-card li {
                margin-bottom: 0.5rem;
            }
            
            .demo-section {
                background: linear-gradient(to right, rgba(52, 152, 219, 0.8), rgba(44, 62, 80, 0.8)), url('/api/placeholder/1920/1080') center/cover no-repeat;
                color: white;
                text-align: center;
                padding: 5rem 5%;
            }
            
            .demo-content {
                max-width: 800px;
                margin: 0 auto;
            }
            
            .demo-title {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
            }
            
            .demo-text {
                font-size: 1.2rem;
                margin-bottom: 2rem;
                opacity: 0.9;
            }
            
            .highlight {
                background-color: rgba(46, 204, 113, 0.2);
                padding: 0.2rem 0.5rem;
                border-radius: 4px;
                font-weight: bold;
                color: var(--secondary);
            }

            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2.5rem;
                }
                
                .hero p {
                    font-size: 1rem;
                }
                
                .section-title {
                    font-size: 2rem;
                }
                
                .navbar {
                    flex-direction: column;
                    padding: 1rem 5%;
                }
                
                nav ul {
                    margin-top: 1rem;
                }
                
                nav ul li {
                    margin-left: 1rem;
                }
                
                .hero-buttons {
                    flex-direction: column;
                }
                
                .popular-plan {
                    transform: scale(1);
                }
            }
        </style>
    </head>
    <body>
        <header>
            <div class="navbar">
                <div class="logo">Gym<span>Pro</span></div>
                <nav>
                    <ul>
                        <li><a href="#features">Características</a></li>
                        <li><a href="#modules">Módulos</a></li>
                        <li><a href="#benefits">Beneficios</a></li>
                        <li><a href="#pricing">Precios</a></li>
                        <li><a href="#contact">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </header>

    <section class="hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/img/recepcion4.jpg') center/cover no-repeat;">
        <div class="hero-content">
                <h1>Revoluciona tu gimnasio con GymPro</h1>
                <p>Sistema integral de gestión diseñado específicamente para gimnasios. Optimiza operaciones, aumenta la retención de clientes y maximiza ingresos en una sola plataforma.</p>
                <div class="hero-buttons">
                    <a href="https://api.whatsapp.com/send?phone=9931125602&text=Hola%20Ing.%20Jorge%20Emanuel,%20estoy%20interesado%20en%20obtener%20una%20demostración%20de%20GymPro." class="cta-button">
                        <i class="fab fa-whatsapp"></i> Solicitar Demo
                    </a>
                    <a href="#pricing" class="secondary-button">Ver Planes</a>
                </div>
            </div>
        </section>
        
        <section id="features" class="section features">
            <h2 class="section-title">Características Principales</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Gestión de Miembros</h3>
                    <p>Control completo de información de usuarios con perfiles detallados, historial de compras y pagos.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <h3>Control de Membresías</h3>
                    <p>Creación y gestión de múltiples tipos de membresías con renovaciones automáticas, notificaciones de vencimiento y planes personalizados por cliente.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Estadísticas y Reportes</h3>
                    <p>Datos y métricas en tiempo real sobre asistencia, ventas,  rentabilidad para tomar decisiones estratégicas basadas en información real.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3>Control de Asistencia</h3>
                    <p>Seguimiento de asistencia mediante Numero de cliente o Crendenciales. Genera reportes de frecuencia y envía recordatorios automáticos a miembros inactivos.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <h3>Gestión de Rutinas</h3>
                    <p>Crea, asigna y modifica rutinas de entrenamiento personalizadas.El Instructor del Gym Puede Agregar Planes de entrenamiento para cada usuario.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>Sistema de Pagos</h3>
                    <p>Gestión completa de pagos, Separacion de cuentas por mes y usuarios, recordatorios automáticos y múltiples opciones de pago para tus clientes con historial detallado.</p>
                </div>
            </div>
        </section>
        
        <section id="modules" class="module-section">
            <h2 class="module-title">Módulos del Sistema</h2>
            <div class="modules-container">
                <div class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h3>Administración de Miembros</h3>
                    <ul>
                        <li>Registro completo </li>
                        <li>Historial</li>
                        <li>Gestión de datos personales</li>
                        <li>Notas y observaciones</li>
                    </ul>
                </div>
                <div class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h3>Gestión de Asistencia</h3>
                    <ul>
                        <li>Control Numero de Socios o Crendenciales</li>
                        <li>Horarios de entrada/salida</li>
                        <li>Alertas de Membresias y pagos </li>
                        <li>Estadísticas de frecuencia</li>
                        <li>Reportes por periodos</li>
                    </ul>
                </div>
                <div class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3>Sistema de Pagos</h3>
                    <ul>
                        <li>Seleccion de Cobros</li>
                        <li>Recordatorios de pago</li>
                        <li>Múltiples métodos de pago</li>
                        <li>Reportes financieros</li>
                    </ul>
                </div>
                <div class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <h3>Rutinas y Entrenamientos</h3>
                    <ul>
                        <li>Creación de rutinas personalizadas a usuarios</li>
                        <li>Seguimiento de progreso</li>
                        <li>Asignación por nivel y objetivo</li>
                        <li>Historial de rutinas anteriores</li>
                    </ul>
                </div>
                
                <div class="module-card">
                    <div class="module-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Control Total de Tu Gimnasio</h3>
                    <ul>
                        <li>Estadisticas Claras</li>
                        <li>Historial de asistencia</li>
                        <li>Recordatorio de Promociones</li>
                        <li>Publicidad Personalizada</li>
                       
                    </ul>
                </div>
            </div>
        </section>

    <section id="benefits" class="section benefits">
        <h2 class="section-title">Beneficios Clave</h2>
        <div class="benefits-container">
        <div class="benefits-image">
        <img src="/img/recepcion1.jpg" alt="Imagen de beneficios">
    </div>
                <div class="benefits-content">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="benefit-text">
                            <h4>Automatización Completa</h4>
                            <p>Olvida de llevar tus cuentas , Historial y Toma de asistencia de tus clientes de manera manual. Automatiza cobros, recordatorios, renovaciones y comunicaciones con los clientes para que te enfoques en hacer crecer tu negocio.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <div class="benefit-text">
                            <h4>Estatus y Facilidad</h4>
                            <p>Incrementa la permanencia de tus clientes hasta un 40% con seguimiento personalizado, recordatorios, notificaciones y un sistema de fidelización que mantiene a tus usuarios motivados.</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="benefit-text">
                            <h4>Control Total y Seguridad</h4>
                            <p>Accede a toda la información de tu gimnasio de manera facil y rapida, ademas de llevar poder guardar toda la informacion importante</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="benefit-text">
                            <h4>Incrementa tus Ingresos</h4>
                            <p>Nuestros clientes reportan un aumento promedio del 35% en sus ingresos al implementar GymPro, gracias a mejor retención, disminución de morosidad y nuevas oportunidades de venta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="demo-section">
            <div class="demo-content">
                <h2 class="demo-title">¿Listo para transformar tu gimnasio?</h2>
                <p class="demo-text">   Incorpora esta nueva forma de trabajar con GymPro. Solicita una demostración personalizada hoy mismo y descubre cómo nuestro sistema puede adaptarse perfectamente a tus necesidades.</p>
                <a href="https://api.whatsapp.com/send?phone=9931125602&text=Hola%20Ing.%20Jorge%20Emanuel,%20estoy%20interesado%20en%20obtener%20una%20demostración%20de%20GymPro." class="cta-button">
                    <i class="fab fa-whatsapp"></i> Solicitar Demo Gratis
                </a>
            </div>
        </section>

        <section id="testimonials" class="section testimonials">
            <h2 class="section-title">Lo que Dicen Nuestros Clientes</h2>
            <div class="testimonial-slider">
                <div class="testimonial">
                    <p class="testimonial-text">"GymPro ha transformado completamente la forma en que gestionamos nuestro gimnasio. La automatización de cobros y control de asistencia nos ha ahorrado más de 30 horas semanales de trabajo administrativo. La plataforma es intuitiva y ha mejorado significativamente nuestro servicio al cliente. ¡Recomendada al 100%!"</p>
                    <p class="testimonial-author">Juan Pérez</p>
                    <p class="testimonial-position">Propietario, Fitness Zone</p>
                </div>
            </div>
        </section>

        <section id="pricing" class="section pricing">
            <h2 class="section-title">Planes y Precios</h2>
            <div class="pricing-container">
                <div class="pricing-plan">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Renta Mensual</h3>
                        <p class="pricing-price">$3,000
                            <span class="pricing-period">/mes</span>
                        </p>
                    </div>
                    <div class="pricing-features">
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Gestión completa de miembros</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Control de asistencia</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Sistema de pagos integrado</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Gestion de rutinas</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Soporte técnico Presencial</p>
                        </div>
                    </div>
                    <div class="pricing-cta">
                        <a href="#contact" class="cta-button">Contratar</a>
                    </div>
                </div>
                <div class="pricing-plan popular-plan">
                    <div class="popular-badge">Más Popular</div>
                    <div class="pricing-header">
                        <h3 class="pricing-title">Renta Anual</h3>
                        <p class="pricing-price">$25,000
                            <span class="pricing-period">/año</span>
                        </p>
                    </div>
                    <div class="pricing-features">
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Todas las características del plan mensual</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>2 meses gratis</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Capacitación personalizada</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Actualizaciones Anual</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Soporte Preventivo y Gestion de cuentas de membresias</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Pagos Mensuales</p>
                        </div>
                    </div>
                    <div class="pricing-cta">
                        <a href="#contact" class="cta-button">Contratar</a>
                    </div>
                </div>
                <div class="pricing-plan">
                    <div class="pricing-header">
                        <h3 class="pricing-title">Personalizado</h3>
                        <p class="pricing-price">Cotización</p>
                    </div>
                    <div class="pricing-features">
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Soluciones a medida</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Integraciones personalizadas</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Soporte dedicado</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Desarrollo de características exclusivas</p>
                        </div>
                        <div class="pricing-feature">
                            <i class="fas fa-check"></i>
                            <p>Implementación completa</p>
                        </div>
                    </div>
                    <div class="pricing-cta">
                        <a href="#contact" class="cta-button">Contactar</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="section contact">
            <h2 class="section-title">Contacto</h2>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Información de Contacto</h3>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <p>Dirección: Fracc. Bosque de Saloya. Nac.Tab. Mexico✔️🌐🗺️</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <p>Teléfono: +52 993 112 5602</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p>Email: info@gympro.com</p>
                        </div>
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=9931125602&text=Hola%20Ing.%20Jorge%20Emanuel,%20estoy%20interesado%20en%20obtener%20una%20demostración%20de%20GymPro." class="whatsapp-button">
                        <i class="fab fa-whatsapp"></i> Escríbenos por WhatsApp
                    </a>
                </div>
                <div class="contact-form">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" placeholder="Teléfono" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Mensaje" required></textarea>
                        </div>
                        <button type="submit" class="form-submit">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
        </section>
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 GymPro. Todos los derechos reservados.</p>
            <div class="social-links">
        <a href="https://www.facebook.com/EmanuelML2002/" class="social-link">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="https://api.whatsapp.com/send?phone=9931125602" class="social-link">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://www.instagram.com/vbochito_3/" class="social-link">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="mailto:laraveldesarrollador@gmail.com" class="social-link">
            <i class="fas fa-envelope"></i>
        </a>
    </div>

            <p class="copyright">Desarrollador:Ing.Jorge Emanuel Morales Lopez 9931125602</p>
        </div>
    </footer>
    </body> 
    </html>