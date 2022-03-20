<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de trafico aereo</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
    <!-- <script type="text/javascript" src="./js/popper.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="./js/index.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center"><h1 class="text-center">Control de Aeronaves</h1></div>
        <div class="row mb-5 ">
            <div class="col-12 ">
                <form action="#" method="post" id="agregarForm" class="form-inline ">
                    <label for="tipo" >Tipo de aeronave</label>
                    <select class="form-control " id="tipo">
                        <option value="0" selected disabled hidden>Selecion</option>
                        <option  value="1">Emergencia</option>
                        <option  value="2">Pasajero</option>
                        <option  value="3">Cargo</option>
                    </select>
                    <label for="tipo" >Tamaño de aeronave</label>
                    <select class="form-control " id="size">
                        <option value="0" selected disabled hidden>Selecion</option>
                        <option  value="1">Grande</option>
                        <option value="2">Chico</option>
                    </select>
                    <button type="submit" class="btn btn-primary "  id="addBtn"> Agregar aeronave</button>
                </form>
            </div>
        </div>
        <br>
        <div class="row mb-5 ">
            <div class="col-12 ">
                <form action="#" method="put" id="updateForm" class="form-inline ">
                    <label for="idUpd" >ID</label>
                    <input type="text" id="idUpd" >
                    <label for="tipoUpdate" >Tipo de aeronave</label>
                    <select class="form-control " id="tipoUpdate">
                        <option value="0" selected disabled hidden>Selecion</option>
                        <option  value="1">Emergencia</option>
                        <option  value="2">Pasajero</option>
                        <option  value="3">Cargo</option>
                    </select>
                    <label for="sizeUpdate" >Tamaño de aeronave</label>
                    <select class="form-control " id="sizeUpdate">
                        <option value="0" selected disabled hidden>Selecion</option>
                        <option  value="1">Grande</option>
                        <option value="2">Chico</option>
                    </select>
                    <button type="submit" class="btn btn-primary "  id="updbtn"> Editar aeronave</button>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            
        </div>
        <div class="row justify-content-center DivToScroll">
            <div class="col-8 DivWithScroll">
                <div class="table-responsive">
                    <table class="table" id="tablaA">
                        <thead>
                            <th>Id</th>
                            <th>Tipo</th>
                            <th>Tamaño</th>
                            <!-- <th>Editar</th> -->
                        </thead>

                        <tbody id="tbody">
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-warning "  id="liberar"> Liberar aeronaves</button>
        <br>
          
    </div>
</body>
</html>