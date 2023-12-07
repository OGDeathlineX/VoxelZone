document.addEventListener("DOMContentLoaded", function(event) 
{
	function validate()
    {
		const formData  = new FormData();
		fetch("php/validate.php", {
			method: "POST",
			body: formData
		}).then(res => {
			if (res.status != 200){ throw new Error("Bad Server Response"); }
			return res.json();
		}).then(res =>{
			if(res.status==500){
				alert(res.error);
				window.location.href = "https://acadserv.upaep.mx/alan/proyectoFinalPersonal/";
			}
		}).catch(err => console.error(err));
	}

    function getUsers(email)
    {
        fetch(`php/getUser.php?email=${email}`, 
        {
            method: "GET"
        }).then(res => {
            if(res.status != 200)
            {
                throw new Error("Bad Server Response");
            }
            return res.json();
        }).then(res => 
			{
				if(res.status == 200)
				{
                    console.log(res);
					const email = document.getElementById("email");
                    const usuario = document.getElementById("usuario");
                    const password = document.getElementById("password");
                    const rol = document.getElementById("rol");

                    email.value = res["0"]["email"];
                    usuario.value = res["0"]["user"];
                    password.value = res["0"]["pass"];
                    rol.value = res["0"]["rol"];
				}
			}).catch(err => console.error(err));
			return false;	
    }

    function modifyUsers(event)
    {
        event.preventDefault();
		var data = new FormData(document.getElementById("formulario"));
        console.log(data);
        fetch("php/modifyUsers.php", 
        {
            method: "POST",
            body: data
        }).then(res => {
            if(res.status != 200)
            {
                throw new Error("Bad Server Response");
            }
            return res.json();
        }).then(res => 
            {
                console.log(res);
                if(res.status == 200)
                {
                    document.location.href = './admin.html';
                }
            }).catch(err => console.error(err));
            return false;	
    }

    function addUser(event)
    {
        event.preventDefault();
		var data = new FormData(document.getElementById("formulario"));

        fetch("php/addUser.php", 
        {
            method: "POST",
            body: data
        }).then(res => {
            if(res.status != 200)
            {
                throw new Error("Bad Server Response");
            }
            return res.json();
        }).then(res => 
            {
                console.log(res);
                if(res.status == 200)
                {
                    document.location.href = './admin.html';
                }
            }).catch(err => console.error(err));
        return false;
    } 
    
	//validate();
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('email')) 
    {
        const email = urlParams.get('email');
        getUsers(email);

        const form = document.getElementById("formulario");
	    form.addEventListener("submit", modifyUsers);
    }
    else
    {
        const form = document.getElementById("formulario");
	    form.addEventListener("submit", addUser);
    }

    

});