<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web - Servicios Profesionales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            padding: 20px;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        h1 {
            color: #444;
        }

        p, ul {
            margin-bottom: 20px;
        }

        ul {
            list-style-type: square;
            padding-left: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        form input, form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        form button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="?page=inicio">Inicio</a></li>
                <li><a href="?page=sobre">Sobre Nosotros</a></li>
                <li><a href="?page=servicios">Servicios</a></li>
                <li><a href="?page=contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'inicio') {
                echo '<h1>Bienvenido a Servicios Profesionales</h1>';
                echo '<p>Somos líderes en ofrecer servicios especializados para empresas y particulares, garantizando calidad y excelencia en cada proyecto.</p>';
                echo '<p>Con años de experiencia, nuestro equipo de expertos está comprometido en proporcionar soluciones personalizadas que superen tus expectativas.</p>';
                echo '<p>Explora nuestras secciones para conocer más sobre lo que podemos hacer por ti.</p>';
                echo '<p>Gracias por elegirnos, estamos aquí para ayudarte a alcanzar tus objetivos.</p>';
            } elseif ($page == 'sobre') {
                echo '<h1>Sobre Nosotros</h1>';
                echo '<p>Servicios Profesionales fue fundado en 2010 con la misión de brindar soluciones integrales en consultoría y desarrollo de proyectos.</p>';
                echo '<p>Nuestro enfoque está en la innovación, la calidad y la satisfacción del cliente. Nos enorgullece trabajar de la mano con nuestros clientes para lograr resultados que marcan la diferencia.</p>';
                echo '<ul>
                        <li>Calidad: Productos y servicios de primera clase.</li>
                        <li>Innovación: Siempre a la vanguardia de las tendencias.</li>
                        <li>Responsabilidad: Comprometidos con la sostenibilidad y la ética.</li>
                        <li>Integridad: Operamos con transparencia y honestidad.</li>
                      </ul>';
                echo '<p>Somos un equipo multidisciplinario dedicado a ofrecerte el mejor servicio en cada etapa de tu proyecto.</p>';
            } elseif ($page == 'servicios') {
                echo '<h1>Nuestros Servicios</h1>';
                echo '<p>Ofrecemos una gama completa de servicios para satisfacer todas tus necesidades:</p>';
                echo '<ul>
                        <li><strong>Consultoría Empresarial:</strong> Estrategias personalizadas para el crecimiento de tu negocio.</li>
                        <li><strong>Desarrollo Web:</strong> Creación de sitios web modernos y funcionales.</li>
                        <li><strong>Marketing Digital:</strong> Campañas efectivas para aumentar tu presencia online.</li>
                        <li><strong>Gestión de Proyectos:</strong> Planificación y ejecución de proyectos complejos con éxito garantizado.</li>
                      </ul>';
                echo '<p>Nos adaptamos a tus necesidades específicas, asegurando que recibas el mejor servicio posible.</p>';
            } elseif ($page == 'contacto') {
                echo '<h1>Contacto</h1>';
                echo '<p>¿Tienes alguna pregunta o quieres saber más sobre nuestros servicios? Contáctanos a través del siguiente formulario, y nos pondremos en contacto contigo lo antes posible.</p>';
                echo '<form action="?page=send_mail" method="POST">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" required placeholder="Ingresa tu nombre completo">

                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electrónico">

                        <label for="message">Mensaje:</label>
                        <textarea id="message" name="message" required placeholder="Escribe tu mensaje aquí"></textarea>

                        <button type="submit">Enviar</button>
                      </form>';
                echo '<p>Síguenos en nuestras redes sociales para estar al tanto de nuestras últimas novedades:</p>';
                echo '<ul>
                        <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
                        <li><a href="https://twitter.com" target="_blank">Twitter</a></li>
                        <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
                      </ul>';
            } elseif ($page == 'send_mail' && $_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                $to = "info@serviciosprofesionales.com";  // Correo ficticio
                $subject = "Nuevo mensaje de $name";
                $headers = "From: $email\r\n";
                $headers .= "Reply-To: $email\r\n";

                $body = "Nombre: $name\nCorreo Electrónico: $email\n\nMensaje:\n$message";

                if (mail($to, $subject, $body, $headers)) {
                    echo "<p>Gracias, $name. Tu mensaje ha sido enviado con éxito. Nos pondremos en contacto contigo pronto.</p>";
                } else {
                    echo "<p>Lo sentimos, ocurrió un error al intentar enviar tu mensaje. Por favor, intenta de nuevo más tarde.</p>";
                }
            } else {
                echo '<h1>Página no encontrada</h1>';
                echo '<p>Lo sentimos, la página que estás buscando no existe. Por favor, verifica la URL o navega utilizando el menú superior.</p>';
            }
        } else {
            echo '<h1>Bienvenido a Servicios Profesionales</h1>';
            echo '<p>Somos líderes en ofrecer servicios especializados para empresas y particulares, garantizando calidad y excelencia en cada proyecto.</p>';
            echo '<p>Con años de experiencia, nuestro equipo de expertos está comprometido en proporcionar soluciones personalizadas que superen tus expectativas.</p>';
            echo '<p>Explora nuestras secciones para conocer más sobre lo que podemos hacer por ti.</p>';
            echo '<p>Gracias por elegirnos, estamos aquí para ayudarte a alcanzar tus objetivos.</p>';
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 Servicios Profesionales. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
