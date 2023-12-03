<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voxel Zone</title>

    <link rel="stylesheet" href="front/css/index.css">
    <link href="https://acadserv.upaep.mx/proyecto_final/equipo2/front/css/header.css" rel="stylesheet" title="Estilos base"  >
    <link href="front/css/footer.css" rel="stylesheet" title="Estilos base" >
    
    <script src="https://kit.fontawesome.com/fd040e8c39.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="front/js/user.js"></script>
</head>
<body>
    <?php include 'front/header.html';?>

    <main>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="./front/img/juego1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./front/img/juego2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./front/img/juego3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h1>NOTICIAS RECIENTES</h1>

        <h2>ANÁLISIS</h2>

        <div class="nosotros" id="getNews">
            <h5 class="size" >Análisis</h5>
            

            

           
            
        </div>
    </main>
   
   
    <?php include 'front/footer.html';?>
</body>
</html>