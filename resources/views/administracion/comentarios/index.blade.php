<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vista Estática de Opiniones</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }
    .container {
        width: 300px;
        margin: 20px auto;
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
    }
    .header {
        padding: 10px;
    }
    .title {
        font-weight: bold;
    }
    .stars {
        color: gold;
        font-size: 1.2em;
        margin-top: 5px;
    }
    .text {
        margin-top: 10px;
        font-size: 0.9em;
    }
    .actions {
        display: flex;
        justify-content: space-around;
        padding: 10px;
        border-top: 1px solid #ccc;
        color: #555;
    }
    .actions span {
        cursor: pointer;
    }
    .images {
        display: flex;
        gap: 2px;
        padding: 10px;
        border-top: 1px solid #ccc;
    }
    .images img {
        width: 48%;
        height: auto;
        border-radius: 4px;
    }
    .overlay {
        position: relative;
        width: 48%;
    }
    .overlay::after {
        content: "3 más";
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 2px 5px;
        font-size: 0.8em;
        border-radius: 0 0 4px 0;
    }
</style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="title">Hotel Cortez</div>
        <div>Av. Cristóbal De Mendoza 280, Santa Cruz de la Sierra</div>
        <div class="stars">★★★★★</div>
        <div class="text">Hace un mes</div>
        <p class="text">Que nivel de servicio que manejan... te hacen sentir como parte del mismo Hotel, es increíble la amabilidad con la que te reciben y la buena vibra que transmite cada una de las personas que trabajan en el lugar...</p>
    </div>
    <div class="actions">
        <span>Me gusta</span>
        <span>Compartir</span>
    </div>

    <div class="header">
        <div class="title">Catedral Basílica de Nuestra Señora de Guadalupe</div>
        <div>Pl. 25 de Mayo esquina, Sucre</div>
        <div class="stars">★★★★★</div>
        <div class="text">Hace 5 meses</div>
    </div>
    <div class="images">
        <img src="https://via.placeholder.com/150" alt="Imagen Catedral">
        <div class="overlay">
            <img src="https://via.placeholder.com/150" alt="Imagen Catedral">
        </div>
    </div>
    <div class="actions">
        <span>Me gusta</span>
        <span>Compartir</span>
    </div>
</div>

</body>
</html>

