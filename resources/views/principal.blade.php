<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gimnasio - Tu mejor versión comienza aquí</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ff4d4d;
            --secondary-color: #333;
            --text-color: #fff;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navegación */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.9);
            padding: 1rem 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            color: var(--text-color);
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        /* Hero Section con Slider */
        .hero-slider {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: var(--text-color);
            z-index: 2;
            width: 90%;
            max-width: 800px;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: fadeInUp 1s ease;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease 0.3s;
        }

        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            background: var(--primary-color);
            color: var(--text-color);
            text-decoration: none;
            border-radius: 5px;
            transition: var(--transition);
            text-transform: uppercase;
            font-weight: bold;
            animation: fadeInUp 1s ease 0.6s;
            margin: 0.5rem;
        }

        .btn:hover {
            background: #ff3333;
            transform: translateY(-3px);
        }

        /* Información */
        .info-section {
            padding: 5rem 2rem;
            background: #f8f9fa;
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--secondary-color);
            text-transform: uppercase;
            position: relative;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-color);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .info-card {
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: var(--transition);
        }

        .info-card:hover {
            transform: translateY(-10px);
        }

        .info-card i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mapa */
        .map-section {
            padding: 5rem 0;
            background: #eee;
        }

        .map-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
        }

        .map-container iframe {
            width: 100%;
            max-width: 800px;
            height: 450px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            margin-top: 2rem;
        }

        /* Planes y Precios */
        .pricing-section {
            padding: 5rem 2rem;
            background: #f1f1f1;
            text-align: center;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 2rem auto 0;
        }

        .pricing-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: var(--transition);
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .pricing-header {
            background: var(--secondary-color);
            color: var(--text-color);
            padding: 2rem;
            position: relative;
        }

        .best-value {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
            font-weight: bold;
            border-bottom-left-radius: 10px;
            z-index: 1;
        }

        .pricing-title {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .price {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .price span {
            font-size: 1rem;
            font-weight: normal;
        }

        .pricing-features {
            padding: 2rem;
            list-style: none;
        }

        .pricing-features li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pricing-features i {
            color: var(--primary-color);
            margin-right: 0.5rem;
        }

        .pricing-footer {
            padding: 2rem;
            background: #f9f9f9;
        }

        /* Promociones */
        .promo-section {
            padding: 5rem 2rem;
            background: linear-gradient(to right, #ff4d4d, #ff6b6b);
            color: white;
            text-align: center;
        }

        .promo-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .promo-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
        }

        .promo-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .promo-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .promo-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 2rem;
            backdrop-filter: blur(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: var(--transition);
        }

        .promo-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .promo-price {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .promo-old-price {
            position: absolute;
            top: -10px;
            right: -60px;
            font-size: 1rem;
            text-decoration: line-through;
            color: rgba(255, 255, 255, 0.7);
        }

        .promo-card h3 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .promo-card p {
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .btn-outline {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            color: white;
            text-decoration: none;
            border: 2px solid white;
            border-radius: 5px;
            transition: var(--transition);
            text-transform: uppercase;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .btn-outline:hover {
            background: white;
            color: var(--primary-color);
        }

        /* Testimonios */
        .testimonial-section {
            padding: 5rem 2rem;
            background: #fff;
            text-align: center;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 3rem auto 0;
        }

        .testimonial-card {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: var(--transition);
            position: relative;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-card:before {
            content: '\201C';
            font-size: 5rem;
            position: absolute;
            top: -10px;
            left: 20px;
            color: var(--primary-color);
            opacity: 0.2;
            line-height: 1;
        }

        .testimonial-text {
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-author {
            font-weight: bold;
        }

        .testimonial-author span {
            display: block;
            font-weight: normal;
            font-size: 0.9rem;
            color: #777;
            margin-top: 0.2rem;
        }

        /* Galería */
        .gallery-section {
            padding: 5rem 0;
            background: #f8f8f8;
        }

        .gallery-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
            margin-top: 3rem;
        }

        .gallery-item {
            height: 250px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            transition: var(--transition);
        }

        .gallery-item:hover {
            transform: scale(1.03);
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover .gallery-img {
            transform: scale(1.1);
        }

        /* Sección de Contacto */
        .contact-section {
            padding: 5rem 2rem;
            background: #222;
            color: var(--text-color);
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-title {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--primary-color);
        }

        .contact-subtitle {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            opacity: 0.8;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .contact-item {
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            transition: var(--transition);
        }

        .contact-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .contact-item i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .contact-item h3 {
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .contact-item a {
            color: var(--text-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .contact-item a:hover {
            color: var(--primary-color);
        }

        .contact-form {
            max-width: 600px;
            margin: 3rem auto 0;
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Enlaces sociales flotantes */
        .social-links {
            position: fixed;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 1000;
        }

        .social-links a {
            background: var(--primary-color);
            color: var(--text-color);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            transform: scale(1.1);
            background: #ff3333;
        }

        /* Footer */
        .footer {
            background: #111;
            padding: 3rem 2rem;
            color: #ccc;
            text-align: center;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: left;
        }

        .footer-column h3 {
            color: white;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .copyright {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #333;
            font-size: 0.9rem;
        }

        /* Whatsapp floating button */
        .whatsapp-button {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 999;
            transition: var(--transition);
        }

        .whatsapp-button a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: #25d366;
            color: white;
            border-radius: 50%;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
            transition: var(--transition);
        }

        .whatsapp-button i {
            font-size: 2rem;
        }

        .whatsapp-button a:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .nav-links {
                display: none;
            }

            .social-links {
                position: fixed;
                bottom: 20px;
                right: 20px;
                top: auto;
                transform: none;
                flex-direction: row;
            }
            
            .whatsapp-button {
                bottom: 90px;
            }
        }
    </style>
</head>
<body>
    <!-- Navegación -->
    <nav class="navbar">
        <div class="navbar-content">
            <a href="http://127.0.0.1:8000/principal" class="logo">SISTEMA DE GYM </a>
            <div class="nav-links">
                <a href="#inicio">Inicio</a>
                <a href="#servicios">Servicios</a>
                <a href="#precios">Precios</a>
                <a href="#promociones">Promociones</a>
                <a href="#galeria">Galería</a>
                <a href="#horarios">Horarios</a>
                <a href="#ubicacion">Ubicación</a>
                <a href="#contacto">Contacto</a>
                <a class="nav-link {{ request()->routeIs('usuarios.index') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
                    <i class="fas fa-users"></i> Usuarios
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section con Slider -->
    <div class="hero-slider" id="inicio">
        <!-- Cargar todas las imágenes como slides -->
        <div class="slide active">
            <img src="{{ url('img/1.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/2.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/3.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/4.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/5.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/6.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/7.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/8.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/9.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/10.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/11.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/12.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/13.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/14.jpg') }}" alt="Gimnasio">
        </div>
        <div class="slide">
            <img src="{{ url('img/15.jpg') }}" alt="Gimnasio">
        </div>

        <!-- Contenido principal -->
        <div class="hero-content">
            <h1>Tu transformación comienza aquí</h1>
            <p>Entrenamiento de calidad con sala de pesas, máquinas, cardio y más.</p>
            <p>Horario: Lunes a Viernes 6 AM a 10 PM | Sábados 1 PM a 8 PM</p>
            <div>
                <a href="http://127.0.0.1:8000/usuarios/create" class="btn">Inscríbete por solo $350/mes</a>
                <a href="http://127.0.0.1:8000/asistencias/registro" class="btn">Registra tu asistencia Aquí</a>
            </div>
        </div>
    </div>

    <!-- Sección de Servicios -->
    <section class="info-section" id="servicios">
        <h2 class="section-title">Nuestros Servicios</h2>
        <div class="info-grid">
            <div class="info-card">
                <i class="fas fa-dumbbell"></i>
                <h3>Equipo de Primera</h3>
                <p>Máquinas y equipo de última generación para tu entrenamiento. Contamos con prensas, bancos, mancuernas, barras, discos, cable-poleas y todo lo necesario para un entrenamiento completo.</p>
            </div>
            <div class="info-card">
                <i class="fas fa-clock"></i>
                <h3>Horario Flexible</h3>
                <p>Abierto todos los días con amplios horarios para tu comodidad. Entendemos tu ocupada agenda, por eso ofrecemos un horario extendido que se adapta a tus necesidades.</p>
            </div>
            <div class="info-card">
                <i class="fas fa-users"></i>
                <h3>Entrenadores Expertos</h3>
                <p>Personal capacitado para guiarte en tu journey fitness. Nuestros entrenadores cuentan con certificaciones y amplia experiencia en diferentes disciplinas del fitness.</p>
            </div>
            <div class="info-card">
                <i class="fas fa-heartbeat"></i>
                <h3>Área de Cardio</h3>
                <p>Zona equipada con caminadoras, elípticas, bicicletas estáticas y escaladoras para mejorar tu resistencia cardiovascular y quemar calorías de manera efectiva.</p>
            </div>
            <div class="info-card">
                <i class="fas fa-tshirt"></i>
                <h3>Vestidores</h3>
                <p>Cómodos vestidores con duchas, lockers y todo lo necesario para que puedas prepararte antes y después de tu entrenamiento en un ambiente limpio y seguro.</p>
            </div>
            <div class="info-card">
                <i class="fas fa-glass-whiskey"></i>
                <h3>Bar de Proteínas</h3>
                <p>Complementa tu entrenamiento con nuestra variedad de suplementos, batidos proteicos, bebidas isotónicas y snacks saludables para maximizar tus resultados.</p>
            </div>
        </div>
    </section>

    <!-- Sección de Precios y Planes -->
    <section class="pricing-section" id="precios">
        <h2 class="section-title">Planes y Precios</h2>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3 class="pricing-title">Plan Básico</h3>
                    <div class="price">$350 <span>/mes</span></div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Acceso a todas las áreas</li>
                    <li><i class="fas fa-check"></i> Horario completo</li>
                    <li><i class="fas fa-check"></i> Uso de vestidores</li>
                    <li><i class="fas fa-check"></i> Programa básico de entrenamiento</li>
                    <li><i class="fas fa-times"></i> Asesoría nutricional</li>
                    <li><i class="fas fa-times"></i> Entrenador personal</li>
                </ul>
                <div class="pricing-footer">
                    <a href="http://127.0.0.1:8000/usuarios/create" class="btn">Inscríbete Ahora</a>
                </div>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <div class="best-value">Más Popular</div>
                    <h3 class="pricing-title">Plan Premium</h3>
                    <div class="price">$500 <span>/mes</span></div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Acceso a todas las áreas</li>
                    <li><i class="fas fa-check"></i> Horario completo</li>
                    <li><i class="fas fa-check"></i> Uso de vestidores</li>
                    <li><i class="fas fa-check"></i> Programa personalizado</li>
                    <li><i class="fas fa-check"></i> Asesoría nutricional básica</li>
                    <li><i class="fas fa-check"></i> 2 sesiones con entrenador/mes</li>
                </ul>
                <div class="pricing-footer">
                    <a href="http://127.0.0.1:8000/usuarios/create" class="btn">Inscríbete Ahora</a>
                </div>
            </div>
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3 class="pricing-title">Plan Familiar</h3>
                    <div class="price">$800 <span>/mes</span></div>
                </div>
                <ul class="pricing-features">
                    <li><i class="fas fa-check"></i> Acceso para 3 miembros</li>
                    <li><i class="fas fa-check"></i> Horario completo</li>
                    <li><i class="fas fa-check"></i> Uso de vestidores</li>
                    <li><i class="fas fa-check"></i> Programas personalizados</li>
                    <li><i class="fas fa-check"></i> 10% descuento en bar</li>
                    <li><i class="fas fa-check"></i> 1 sesión familiar con entrenador</li>
                </ul>
                <div class="pricing-footer">
                    <a href="http://127.0.0.1:8000/usuarios/create" class="btn">Inscríbete Ahora</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Promociones -->
    <section class="promo-section" id="promociones">
        <div class="promo-container">
            <h2 class="promo-title">¡Grandes Promociones!</h2>
            <p class="promo-subtitle">Aprovecha estas ofertas por tiempo limitado</p>
            <div class="promo-cards">
                <div class="promo-card">
                    <div class="promo-price">$250 <span class="promo-old-price">$350</span></div>
                    <h3>Primer Mes</h3>
                    <p>Inscríbete ahora y obtén tu primer mes con 30% de descuento. Incluye acceso completo a instalaciones.</p>
                    <a href="http://127.0.0.1:8000/usuarios/create" class="btn-outline">Aprovechar Oferta</a>
                </div>
                <div class="promo-card">
                    <div class="promo-price">$1,800 <span class="promo-old-price">$2,100</span></div>
                    <h3>Semestral</h3>
                    <p>Paga 6 meses por adelantado y ahorra el equivalente a un mes completo. Incluye una playera del gimnasio.</p>
                    <a href="http://127.0.0.1:8000/usuarios/create" class="btn-outline">Aprovechar Oferta</a>
                </div>
                <div class="promo-card">
                    <div class="promo-price">$3,500 <span class="promo-old-price">$4,200</span></div>
                    <h3>Anual</h3>
                    <p>El mejor valor. Paga el año completo y obtén 2 meses gratis más una consulta nutricional.</p>
                    <a href="http://127.0.0.1:8000/usuarios/create" class="btn-outline">Aprovechar Oferta</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Testimonios -->
    <section class="testimonial-section">
        <h2 class="section-title">Lo que dicen nuestros miembros</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p class="testimonial-text">Desde que me inscribí en Gym Vbochos mi vida cambió por completo. Los entrenadores son excelentes y el ambiente es muy motivador. He perdido 15 kilos en 6 meses.</p>
                <p class="testimonial-author">María González <span>Miembro desde 2022</span></p>
            </div>
            <div class="testimonial-card">
                <p class="testimonial-text">Lo que más me gusta de este gimnasio es la flexibilidad de horarios y la calidad del equipo. Todo siempre está limpio y funcionando perfectamente.</p>
                <p class="testimonial-author">Carlos Rodríguez <span>Miembro desde 2021</span></p>
            </div>
            <div class="testimonial-card">
                <p class="testimonial-text">El plan familiar ha sido genial para nosotros. Ahora toda la familia hace ejercicio y hemos mejorado nuestra salud y calidad de vida.</p>
                <p class="testimonial-author">Familia Martínez <span>Miembros desde 2023</span></p>
            </div>
        </div>
    </section>

    <!-- Sección de Galería -->
    <section class="gallery-section" id="galeria">
        <div class="gallery-container">
            <h2 class="section-title">Nuestra Galería</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="{{ url('img/19.jpg') }}" alt="Instalaciones del gimnasio" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ url('img/16.jpg') }}" alt="Área de pesas" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ url('img/13.jpg') }}" alt="Área de cardio" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ url('img/21.jpg') }}" alt="Vestidores" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ url('img/23.jpg') }}" alt="Bar de proteínas" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ url('img/24.jpg') }}" alt="Entrenamiento personal" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="{{ url('img/22.jpg') }}" alt="Entrenamiento personal" class="gallery-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Horarios -->
    <section class="info-section" id="horarios">
        <h2 class="section-title">Nuestros Horarios</h2>
        <div class="info-grid">
            <div class="info-card">
                <i class="fas fa-calendar-alt"></i>
                <h3>Lunes a Viernes</h3>
                <p>6:00 AM - 10:00 PM</p>
            </div>
            <div class="info-card">
                <i class="fas fa-calendar-day"></i>
                <h3>Sábados</h3>
                <p>1:00 PM - 8:00 PM</p>
            </div>
            <div class="info-card">
                <i class="fas fa-calendar-day"></i>
                <h3>Domingos</h3>
                <p>Cerrado</p>
            </div>
        </div>
    </section>

    <!-- Sección de Ubicación y Mapa -->
    <section class="map-section" id="ubicacion">
        <div class="map-container">
            <h2 class="section-title">Nuestra Ubicación</h2>
            <p>Estamos ubicados en una zona céntrica y de fácil acceso</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.1911581675183!2d-99.12545858507896!3d19.428913486889134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f98ff3fc72b3%3A0x7b23c338181e01ba!2sCentro%20Deportivo%20Mexicano!5e0!3m2!1ses-419!2smx!4v1644325871522!5m2!1ses-419!2smx" allowfullscreen="" loading="lazy"></iframe>
            <p>Dirección: Av. Principal #123, Colonia Centro, CP 12345</p>
            <p>Estacionamiento disponible para clientes</p>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section class="contact-section" id="contacto">
        <div class="contact-container">
            <h2 class="contact-title">Contáctanos</h2>
            <p class="contact-subtitle">Estamos aquí para responder todas tus preguntas. No dudes en ponerte en contacto con nosotros.</p>
            
            <div class="contact-grid">
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <h3>Teléfono</h3>
                    <p><a href="tel:+5215551234567">9931125602</a></p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:info@gymvbochos.com">info@gymvbochos.com</a></p>
                </div>
                <div class="contact-item">
                    <i class="fab fa-whatsapp"></i>
                    <h3>WhatsApp</h3>
                    <p><a href="https://wa.me/9931125602">9931125602</a></p>
                </div>
            </div>
            
            <div class="contact-form">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea id="message" name="message" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Enlaces sociales flotantes -->
    <div class="social-links">
        <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>

    <!-- Botón de WhatsApp flotante -->
    <div class="whatsapp-button">
        <a href="https://wa.me/9931125602" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>Gym Vbochos</h3>
                    <p>Tu mejor versión comienza aquí. Instalaciones de primera calidad y personal capacitado para ayudarte a alcanzar tus metas fitness.</p>
                </div>
                <div class="footer-column">
                    <h3>Enlaces Rápidos</h3>
                    <ul class="footer-links">
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#servicios">Servicios</a></li>
                        <li><a href="#precios">Precios</a></li>
                        <li><a href="#promociones">Promociones</a></li>
                        <li><a href="#galeria">Galería</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Información Legal</h3>
                    <ul class="footer-links">
                        <li><a href="#">Términos y Condiciones</a></li>
                        <li><a href="#">Política de Privacidad</a></li>
                        <li><a href="#">Aviso Legal</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Horarios</h3>
                    <p>Lunes a Viernes: 6 AM - 10 PM</p>
                    <p>Sábados: 1 PM - 8 PM</p>
                    <p>Domingos: Cerrado</p>
                </div>
            </div>
            <div class="copyright">
                &copy; 2025 Gym Vbochos - Todos los derechos reservados
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Script para el slider
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            slides[n].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Cambiar slide cada 5 segundos
        setInterval(nextSlide, 5000);

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(0, 0, 0, 0.95)';
                navbar.style.padding = '0.5rem 0';
            } else {
                navbar.style.background = 'rgba(0, 0, 0, 0.9)';
                navbar.style.padding = '1rem 0';
            }
        });
    </script>
</body>
</html>