document.addEventListener("DOMContentLoaded", function(event) {
	
	function jwt(){
		const formData  = new FormData();
		formData.append("jwt", true);
		fetch("php/jwt/", {
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
		fetch("php/header.php", {
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
	jwt();
    getHeader()
	
	
});