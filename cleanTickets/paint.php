<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genera el acceso a tu voucher</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

</head>

<body>
    <?php
    $nameRandom = rand()."_imageCajero.png";
    ?>

    <style type="text/css">
        canvas {
            border: solid 1px;
            cursor: url('./lapiz.png'), default;

        }

        .herramientas {
            width: 100px;
        }

        .herramientas div {
            background-color: black;
        }

        .herramientas div:hover {
            border: solid red 1px;
        }

        .herramientas img:hover {
            border: solid red 1px;
        }

    </style>

    <script>
        var color = "#00000";

        var tamano = 20;
        var pintura = false;

        function pintar(e) {
            var canvas = document.getElementById("canvas");

            var context = canvas.getContext("2d");
            var x = e.clientX;
            var y = e.clientY;
            if (pintura) {
                context.fillStyle = color;
                context.fillRect(x, y, tamano, tamano);
            } else {

            }
        }

        function activar() {
            pintura = true;
        }

        function desactivar() {
            pintura = false;

        }

        function goma() {

            const context = canvas.getContext('2d');

            context.clearRect(0, 0, canvas.width, canvas.height);

        }

        function lapiz() {

            setTimeout(function() {
                color = "#00000";

            }, 100);

        }


        function guardar() {
            var canvas = document.getElementById("canvas");
            var imagen = canvas.toDataURL("image/png");
            this.href = imagen;
            const context = canvas.getContext('2d');

            context.clearRect(0, 0, canvas.width, canvas.height);

            
              var d = "<?php echo $nameRandom;?>";
            $.ajax({
                data : {"imagen": d },
                type : "post",
                url : "http://localhost:8080/phpClean/index.php/cControl/insertarImagenCajero",
                success : function(response){
                    console.log(response);
                }
            });
        }

    </script>
    <table>
        <tr>
            <td><canvas width="1200" onmousemove="pintar(event)" onmousedown="activar()" onmouseup="desactivar()" height="500" id="canvas"></canvas></td>
            <td class="herramientas">

                <a href="#"><img src="./lapiz.png" onclick="lapiz()" height="60px"></a><br>
                <a href="#"><img src="./goma.png" onclick="goma()" height="90px"></a><br>





                <br>
                <a id="guardar" class="btn btn-primary btn-block" download=" <?= $nameRandom?>" href="#">Guardar</a>
            </td>
        </tr>
    </table>


    <script>
        document.getElementById("guardar").addEventListener("click", guardar, false);

    </script>
</body>

</html>
