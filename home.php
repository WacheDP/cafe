<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="./recursos/taza_cafe.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Página de Inicio</title>
</head>

<body>
    <!-- Encabezado -->
    <header>
        <div class="header">
            <img src="./recursos/Logo.png" class="logo" alt="Logo">

            <div class="inicio">
                <h5 class="card-title" style="font-size: 14px;">Inicio De Sesion</h5>
                <form action="./php/procesar_login.php" method="post">
                    <div class="form-group row">
                        <label for="ID" class="col-sm-4 col-form-label">Identificación</label>
                        <div class="col-sm-8 nivel">
                            <input type="text" class="form-control" id="ID" name="ID" placeholder="user21 - ejemplo@gmail.com" style="font-size: 12px; height: 25px;"> <!-- Ajusta la altura del input -->
                            <small id="help" class="form-text text-muted" style="font-size: 10px;">* para la identificación puedes utilizar tu nombre de usuario o tu correo electrónico *</small> <!-- Texto reducido -->
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                        <div class="col-sm-8 nivel">
                            <input type="password" class="form-control" id="password" name="password" placeholder="****" style="font-size: 12px; height: 25px;"> <!-- Ajusta la altura del input -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-outline-success" name="btn" value="Entrar" style="font-size: 12px; height: 30px;"> <!-- Ajusta la altura del bot�n -->
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <h1>Bienvenido a Cafe Don Belen</h1>
            <nav>
                <ul>
                    <li><a href="#carouselExampleDark">Sobre Nosotros</a></li>
                    <li><a href="#socios">Socios</a></li>
                    <li><a href="#contact-form">Contactanos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="./recursos/img/img1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>En un pequeño pueblo del municipio lobatera, llamado borota</h5>
                    <p>Se encuentra la finca de café "Don Belén". Esta finca no es solo un lugar de producción, sino un homenaje a Don Belén, el abuelo de la matriarca de la familia, quien dedicó su vida a trabajar esta tierra con amor y dedicación..</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="./recursos/img/img2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>La historia de la finca "Don Belén"</h5>
                    <p>Se remonta a la cuarentena de 2020, cuando la pandemia de COVID-19 azotó a Venezuela y al mundo entero. Durante este tiempo de incertidumbre, una familia compuesta por un padre, una madre y sus dos hijos decidió aprovechar el tiempo en aislamiento para restaurar y revitalizar la finca que alguna vez fue un basurero, pero que en sus días de gloria fue el orgullo de Don Belén. <br><br> Con determinación y un profundo sentido de honor hacia su ancestro, la familia se mudó a la finca. Día tras día, trabajaron incansablemente para recuperar el terreno, limpiando y preparando la tierra para el cultivo de café. A través de arduo trabajo y sacrificio, lograron transformar el lugar en un próspero campo de café, reflejando el espíritu laborioso de Don Belén...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./recursos/img/img3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>El renacimiento de la finca</h5>
                    <p>Simboliza el profundo respeto y gratitud hacia las generaciones pasadas. En honor a Don Belén, la finca y el café que hoy en día distribuyen llevan su nombre, asegurando que su legado perdure y siga inspirando a futuras generaciones. <br><br> La finca de café "Don Belén" es ahora un testimonio de la evolución y el esfuerzo conjunto de una familia que, en medio de una pandemia global, encontró fuerza en sus raíces y creó algo hermoso y significativo. Cada grano de café cultivado y cada taza servida cuenta una historia de dedicación, honor y evolución...</p>
                </div>
            </div>
        </div>
        <button id="boton" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button id="boton" class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section id="socios" class="socios">
        <div class="container">
            <h2>Nuestros Fundadores</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img src="recursos/img/so.jpg" alt="Socio 1" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">David Parra</h3>
                            <p class="card-text">Fundador con el 40% de la Acciones.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="recursos/img/so.jpg" alt="Socio 2" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">Daniel Parra</h3>
                            <p class="card-text">Fundador con el 40% de la Acciones.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="recursos/img/so.jpg" alt="Socio 3" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">Jose Morales</h3>
                            <p class="card-text">CO-Fundador con el 10% de la Acciones.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="recursos/img/so.jpg" alt="Socio 4" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">Enyi Safir</h3>
                            <p class="card-text">CO-Fundador con el 10% de la Acciones.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="contact-form" class="contact-form">
            <div class="form-container">
                <h2>Contactanos</h2>
                <form action="#" method="POST">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Telefono:</label>
                    <input type="tel" id="phone" name="phone">

                    <label for="message">Mensaje:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit" class="submit-button">Enviar</button>
                </form>
            </div>
        </section>
    </section>
    <footer>
        <p>&copy; 2024 Don Belen. Todos los derechos reservados.</p>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>