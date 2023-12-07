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

    function getUsers()
    {
        fetch("php/admin.php", 
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
                    let html = '';
                    for (const key in res["Users"]) 
                    {
						if(!isNaN(key))
						{
							const userItem = res["Users"][key];
							html += '<tr><th>';
							html += userItem.email;
							html += '</th><th>';
							html += userItem.user;
							html += '</th><th>';
							html += userItem.name;
							html += '</th><th>';
							html += userItem.pass;
							html += '</th><th>';
							html += userItem.rol;
							html += '</th><th>';
							html += userItem.profilepic;
							html += '</th><th>';
							html += '<a href="./adminUsers.html?email='+userItem.email+'"><button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>';
							html += '</th><th>';
							html += '<button onClick="deleteUsers(\''+userItem.email+'\')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>';
							html += '</th></tr>';  
						}                                 
                    }
				    const elemento = document.getElementById("body-users");
                    elemento.innerHTML = html;
					new DataTable('#example1');
				}
			}).catch(err => console.error(err));
			return false;	
    }

	function getRols()
    {
        fetch("php/admin.php", 
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
				console.log(res);
				if(res.status == 200)
				{
					console.log(res);
                    let html = '';
                    for (const key in res["Rols"]) 
                    {
						if(!isNaN(key))
						{
							const userItem = res["Rols"][key];
							console.log(userItem);
							html += '<tr><th>';
							html += userItem.id;
							html += '</th><th>';
							html += userItem.nombre;
							html += '</th><th>';
							html += '<a href="./adminRols.html?id='+userItem.id+'"><button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>';
							html += '</th><th>';
							html += '<button onClick="deleteRols('+userItem.id+')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>';
							html += '</th></tr>';  
						}                                 
                    }
				    const elemento = document.getElementById("body-rols");
                    elemento.innerHTML = html;
					new DataTable('#example2');
				}
			}).catch(err => console.error(err));
			return false;	
    }

	function getContent()
    {
        fetch("php/admin.php", 
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
				console.log(res);
				if(res.status == 200)
				{
					console.log(res);
                    let html = '';
                    for (const key in res["Content"]) 
                    {
						if(!isNaN(key))
						{
							const userItem = res["Content"][key];
							console.log(userItem);
							html += '<tr><th>';
							html += userItem.id;
							html += '</th><th>';
							html += userItem.email_author;
							html += '</th><th>';
							html += userItem.date;
							html += '</th><th>';
							html += userItem.category;
							html += '</th><th>';
							html += userItem.title;
							html += '</th><th>';
							html += userItem.body;
							html += '</th><th>';
							html += userItem.front_image;
							html += '</th><th>';
							html += '<button onClick="modifyContents('+userItem.id+')" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>';
							html += '</th><th>';
							html += '<button onClick="deleteContents('+userItem.id+')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>';
							html += '</th></tr>';  
						}                                 
                    }
				    const elemento = document.getElementById("body-contents");
                    elemento.innerHTML = html;
					new DataTable('#example3');
				}
			}).catch(err => console.error(err));
			return false;	
    }

	function getCategory()
    {
        fetch("php/admin.php", 
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
				console.log(res);
				if(res.status == 200)
				{
					console.log(res);
                    let html = '';
                    for (const key in res["Category"]) 
                    {
						if(!isNaN(key))
						{
							const userItem = res["Category"][key];
							console.log(userItem);
							html += '<tr><th>';
							html += userItem.id;
							html += '</th><th>';
							html += userItem.name;
							html += '</th><th>';
							html += userItem.description;
							html += '</th><th>';
							html += '<button onClick="modifyCategory('+userItem.id+')" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>';
							html += '</th><th>';
							html += '<button onClick="deleteCategory('+userItem.id+')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>';
							html += '</th></tr>';  
						}                                 
                    }
				    const elemento = document.getElementById("body-category");
                    elemento.innerHTML = html;
					new DataTable('#example4');
				}
			}).catch(err => console.error(err));
			return false;	
    }
    
	//validate();
    getUsers();
    getRols();
	getContent();
	getCategory();

	
});

function cerrar_session()
{
	const formData = new FormData();
	formData.append("salir", true);
	fetch("php/close.php", {
		method: "POST",
		body: formData
	}).then(res => {
		if (res.status != 200){ throw new Error("Bad Server Response"); }
		return res.json();
	}).then(res =>{
		if(res.status==200)
		{
			window.location.href = "https://acadserv.upaep.mx/alan/proyectoFinalPersonal/";
		}else{
			alert("Error al intentar cerrar la sesión");
		}
	}).catch(err => console.error(err));		
}

function deleteUsers(email)
{
	var resultado = window.confirm('¿Estas seguro de que quieres eliminar al usuario '+email+'?');
	if (resultado === false)
		return false;

	const formData = new FormData();
    formData.append("email", email);

	fetch("php/deleteUsers.php", 
	{
		method: "POST",
		body: formData
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
				document.location.reload();
			}
		}).catch(err => console.error(err));
		return false;	
}

function modifyRols(id)
{
	fetch("php/modifyRols.php", 
	{
		method: "POST",
		body: id
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

			}
		}).catch(err => console.error(err));
		return false;	
}

function deleteRols(id)
{
	var resultado = window.confirm('¿Estas seguro de que quieres eliminar el rol con el id: '+id+'?');
	if (resultado === false)
		return false;

	const formData = new FormData();
    formData.append("id", id);

	fetch("php/deleteRols.php", 
	{
		method: "POST",
		body: formData
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
				document.location.reload();
			}
		}).catch(err => console.error(err));
		return false;	
}

function modifyContents(id)
{
	fetch("php/modifyContents.php", 
	{
		method: "POST",
		body: id
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

			}
		}).catch(err => console.error(err));
		return false;	
}

function deleteContents(id)
{
	var resultado = window.confirm('¿Estas seguro de que quieres eliminar el rol con el id: '+id+'?');
	if (resultado === false)
		return false;

	const formData = new FormData();
	formData.append("id", id);

	fetch("php/deleteContents.php",
	{
		method: "POST",
		body: formData
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
				document.location.reload();
			}
		}).catch(err => console.error(err));
		return false;	
}

function modifyCategory(id)
{
	fetch("php/modifyCategory.php", 
	{
		method: "POST",
		body: id
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

			}
		}).catch(err => console.error(err));
		return false;	
}

function deleteCategory(id)
{
	var resultado = window.confirm('¿Estas seguro de que quieres eliminar la categoria con el id: '+id+'?');
	if (resultado === false)
		return false;

	const formData = new FormData();
	formData.append("id", id);

	fetch("php/deleteCategory.php",
	{
		method: "POST",
		body: formData
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
				document.location.reload();
			}
		}).catch(err => console.error(err));
		return false;	
}