document.addEventListener("DOMContentLoaded", function(event) 
{
	const toastLiveExample2 = document.getElementById('liveToast2');
	const toastBootstrap2 = bootstrap.Toast.getOrCreateInstance(toastLiveExample2);
	const textoToast = document.getElementById("escribirToast");

	function logSubmit(event) 
	{
		event.preventDefault();
		var data = new FormData(document.getElementById("registro"));

		fetch("php/registro.php", 
		{
			method: "POST",
			body: data
            
		}).then(res => {
			if (res.status != 200)
			{ 
				throw new Error("Bad Server Response " + res.status); 
			}
			return res.json();
           
		}).then(res =>{
            console.log(res);
			if (res.status==200) 
			{
                console.log("Registro exitoso");
                document.location.href ="https://acadserv.upaep.mx/proyecto_final/equipo2/";
            }
            if (res.status==400) {
                textoToast.innerHTML = "Correo invalido";
                toastBootstrap2.show();
                
            }
            if (res.status==402) {
				textoToast.innerHTML = "Las contraseñas no coinciden";
                toastBootstrap2.show();
               
            }
            if (res.status==401) {
                textoToast.innerHTML = "Todos los campos son obligatorios";
                toastBootstrap2.show();
               
            }

		}).catch(err => console.error(err));
		return false;	
	}
    
	const form = document.getElementById("registro");	
    form.addEventListener("submit", logSubmit);
});