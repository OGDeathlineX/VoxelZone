document.addEventListener("DOMContentLoaded", function () {
    function header() 
    {
        const container = document.getElementById("header");

        container.innerHTML += `<div class="header"><a href="https://acadserv.upaep.mx/proyecto_final/equipo2/front/index.html" class="logo-header"> <img src="https://acadserv.upaep.mx/proyecto_final/equipo2/front/img/logo.png"></a></div>`;

        container.innerHTML += `<nav class="navbar navbar-expand-lg navbar-light bg-light"><div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" id="headerPrincipal">
          <li class="nav-item">
          <a class="nav-link" href="#">hola</a></li>
          </ul></div></nav>`;

        // if ($admin === 0) {
        //   html.innerHTML += `<a href="login.html" class="btn btn-primary" id="login">Login</a><br>`;
        // }
        // if ($admin === 1) {
        //html.classList.add("botones-nav");
        //html.innerHTML += `<a href="crear.html" class="btn btn-success">CREAR CV</button><br>`;
        //html.innerHTML += `<button class="btn btn-danger" id="cerrar">Cerrar Sesión</button><br>`;
        // }
    }

    function footer() 
    {
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
            <li class="social-icon__item"><a class="social-icon__link" href="#" id="Facebook">
            </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#" id="Twitter">
            </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#" id="LinkedIn">
            </a></li>
            <li class="social-icon__item"><a class="social-icon__link" href="#" id="Instagram">
            </a></li>
        </ul>
        <p id="footerText"></p>`;
        container.appendChild(html);
    }

    function footerInfo() 
    {
		fetch("php/footer.php", {
			method: "GET",
		}).then(res => {
			if (res.status != 200)
            { 
				throw new Error("Bad Server Response"); 
			}
			return res.json();
		}).then(res =>{
			console.log(res);
			if(res.status==200)
            {
                const elem = document.getElementById("footerText");
                let socialMedia;

                res.icons.forEach(function(element)
                {
                    socialMedia = document.getElementById(element.name);
                    socialMedia.innerHTML = element.icon;
                });
                console.log(res["text"][0].foot_text)            
                elem.innerHTML = res["text"][0].foot_text;
			}

		}).catch(err => console.error(err));
		return false;	
	}
    
    header();
    footer();

    footerInfo();

});  