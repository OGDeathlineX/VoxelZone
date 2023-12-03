document.addEventListener("DOMContentLoaded", function(event) {
	const toastLiveExample = document.getElementById('liveToast2');
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
    
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


	function logSubmit(event) {
		event.preventDefault();
		var data = new FormData(document.getElementById("registro"));
        
        for (var pair of data.entries()) {
            console.log(pair[0] + ": " + pair[1]);
        }
		fetch("php/registro.php", {
			method: "POST",
			body: data
            
		}).then(res => {
			if (res.status != 200){ 
				throw new Error("Bad Server Response " + res.status); 
			}
            ;
			return res.json();
           
		}).then(res =>{
            console.log(res);
			if (res.status==200) {
                console.log("Registro exitoso");
                //toastBootstrap.show();
                //document.location.href ="perfiles.html";
            }
            if (res.status==400) {
                console.log("Correo invalido");
                //toastBootstrap.show();
                
            }
            if (res.status==402) {
                console.log("Las contraseñas no coinciden");
                //toastBootstrap.show();
               
            }
            if (res.status==401) {
                console.log("Todos los campos son obligatorioss");
                //toastBootstrap.show();
               
            }

		}).catch(err => console.error(err));
		return false;	
	}

	
	jwt();
    
	const form = document.getElementById("registro");	
    form.addEventListener("submit", logSubmit);
        
   
  


	
});