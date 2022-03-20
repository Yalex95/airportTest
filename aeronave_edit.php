<?php 

if (!isset($_GET["id"])) exit("No id provided");
$id = $_GET["id"];

?>
<div class="row">
    <div class="col-12">
        <h1 class="text-center">Editar Aeronave</h1>
    </div>
    <div class="col-12">
        <form action="" method="POST">
            <input type="hidden" name="Id" value="1">
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input value="Emergencia" name="tipo" placeholder="Tipo" type="text" id="tipo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="size">Tamaño</label>
                <input value="Grande" name="size" placeholder="Tamaño" type="text" id="size" class="form-control" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success"> Guardar </button>
            </div>

        </form>
    </div>
</div>