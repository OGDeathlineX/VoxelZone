document.addEventListener("DOMContentLoaded", function(event) {
	
	function jwt(){
		const formData  = new FormData();
		formData.append("jwt", true);
		fetch("front/php/jwt/", {
			method: "POST",
			body: formData
		}).then(res => {
			if (res.status != 200){ throw new Error("Bad Server Response"); }
			return res.json();
		}).then(res =>{
			if(res.status==200){
				document.getElementById('jwt').value = res.jwt;
			}
		}).catch(err => console.error(err));
	}
	
	function getHeader() {
		event.preventDefault();
		fetch("front/php/header.php", {
			method: "GET",
		}).then(res => {
			if (res.status != 200){ 
				throw new Error("Bad Server Response"); 
			}
			return res.json();
		}).then(res =>{
			console.log(res);
			if(res.status==200){
				let html='';
				for(const [key, value] of Object.entries(res)) {
					if (!isNaN(key) && key !== '5' && key !== '6' && key !== '7' && key !== '8' && value.publicado === '1') {
						html += '<li class="nav-item active">';
						html += '<a class="nav-link" href="' + value.url + '">' + value.nombre + '</a>';
						html += '</li>';
					
					}
					
				}	
					
                const elem = document.getElementById("headerPrincipal");
                elem.innerHTML = html;
			}else if(res.status==400){
				
			}else{
				
			}
		}).catch(err => console.error(err));
		return false;	
	}
	function getNews() {
		event.preventDefault();
		fetch("front/php/initialPage.php", {
			method: "GET",
		}).then(res => {
			if (res.status != 200){ 
				throw new Error("Bad Server Response"); 
			}
			return res.json();
		}).then(res =>{
			console.log(res);
			if(res.status==200){
				let html='';
				let a =0;
				for(let i = 0; i <res.News.length; i++) {
					
					        console.log("Número de noticias:", res.News.length);
							
						    res.News.forEach(newsItem => {
							
								
                            if(a==0){
							html += '<h5 class="size">Análisis</h5>';
							}
							html += '<div class="dos-columnas">';
							html += '    <!-- Columna 1 con una imagen -->';
							html += '    <div class="columna columna1">';
							html += '        <img src="https://acadserv.upaep.mx/proyecto_final/equipo2/front/img/' + newsItem.front_image + '" alt="Descripción de la imagen"> <!-- Imagen de contenido-->';
							html += '    </div>';
							html += '    <div class="columna columna2">';
							html += '        <a>Análisis</a>';
							html += '        <a class="resume">' + newsItem.title + '</a>';
							html += '        <div class="autor">';
							html += '            <img src="https://acadserv.upaep.mx/proyecto_final/equipo2/front/img/juego1.jpg" alt="Imagen de perfil" class="circulo"> <!-- Logo de usuario-->';
							html += '            <div class="info-autor">';
							html += '                <p> Subido por <br>' + newsItem.email_author + '</p>';
							html += '                <p>' + newsItem.date + '</p>';
							html += '            </div>';        
							html += '        </div>';
							html += '    </div>';
							html += '</div>';
							a++;
							i++;
						
						});

					

					
				}		
                const elem = document.getElementById("getNews");
                elem.innerHTML = html;
			}else if(res.status==400){
				
			}else{
				
			}
		}).catch(err => console.error(err));
		return false;	
	}
	jwt();
    getHeader()
	getNews()
	
});