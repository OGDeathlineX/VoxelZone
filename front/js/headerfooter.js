document.addEventListener("DOMContentLoaded", function () {
    function header() {
        const container = document.getElementById("header");
        const html = document.createElement("div");
        html.classList.add("header");

        html.innerHTML += `<a href="https://acadserv.upaep.mx/proyecto_final/equipo2/index.php" class="logo-header"> <img src="https://acadserv.upaep.mx/proyecto_final/equipo2/front/img/logo.png">
    </a>`;

        // if ($admin === 0) {
        //   html.innerHTML += `<a href="login.html" class="btn btn-primary" id="login">Login</a><br>`;
        // }
        // if ($admin === 1) {
        //   html.classList.add("botones-nav");
        //   html.innerHTML += `<a href="crear.html" class="btn btn-success">CREAR CV</button><br>`;
        //   html.innerHTML += `<button class="btn btn-danger" id="cerrar">Cerrar Sesión</button><br>`;
        // }
        container.appendChild(html);
    }
    function footer() {
        const container = document.getElementById("footer");
        const html = document.createElement("div");
        html.classList.add("waves");
        html.innerHTML = `
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social-icon">
            <li class="social-icon__item"><a class="social-icon__link" href="#" style="">
                <ion-icon name="logo-facebook"></ion-icon>
            </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                <ion-icon name="logo-twitter"></ion-icon>
            </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                <ion-icon name="logo-linkedin"></ion-icon>
            </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#">
                <ion-icon name="logo-instagram"></ion-icon>
            </a></li>
        </ul>
        <p>&copy;2023 Vozel Zone | All Rights Reserved</p>`;
        container.appendChild(html);
    }
    





    header();
    footer();
});  