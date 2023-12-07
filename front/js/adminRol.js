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

    function getRols(id)
    {
        fetch(`php/getRol.php?id=${id}`, 
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
                    const id = document.getElementById("id");
					const nombre = document.getElementById("rol_name");

                    id.value = res[0]["id"];
                    nombre.value = res[0]["nombre"];
				}
			}).catch(err => console.error(err));
			return false;	
    }

    function modifyRols(event)
    {
        event.preventDefault();
		var data = new FormData(document.getElementById("formulario"));
        console.log(data);
        fetch("php/modifyRols.php", 
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

    function addRols(event)
    {
        event.preventDefault();
		var data = new FormData(document.getElementById("formulario"));

        fetch("php/addRol.php", 
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

    if (urlParams.has('id')) 
    {
        const id = urlParams.get('id');
        getRols(id);

        const form = document.getElementById("formulario");
	    form.addEventListener("submit", modifyRols);
    }
    else
    {
        const form = document.getElementById("formulario");
	    form.addEventListener("submit", addRols);
    }

    

});