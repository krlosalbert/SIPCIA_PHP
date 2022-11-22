<?php 
    
    $user = filter_input(INPUT_POST,'user'); 
    $password = filter_input(INPUT_POST,'password'); 
   
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="static/css/styleHead.css"/>
        <!-- <script src="../Js/jquery-3.4.1.min.js"></script> -->
        <title>SIPCIA</title>
    </head>
    <body>
        <!-- inicio formulario del login en codigo html -->
        <div class="container"></br></br>
            <div class="row"> 
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                </br></br></br></br>
                                <img src="static/Images/logo_2.jpg" class="" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <form action="" method="POST" id="formLogin">
                                        <div class="form-group"><div class="m-5"></div>
                                            <label for="user"><b>Usuario</b></label>
                                            <input type="number" class="form-control" name="user" id="user">
                                            <small id="userHelp" class="form-text text-muted">Ingrese por favor su numero de documento sin comas, ni puntos</small>
                                            <p class="text-danger mb-2 d-none" id="alertUser"></p>
                                        </div></br>
                                        <div class="form-group">
                                            <label for="password"><b>Contraseña</b></label>
                                            <input type="password" class="form-control" name="password" id="password">
                                            <p class="text-danger mb-2 d-none" id="alertPassword"></p>
                                        </div></br>
                                        <?php 

                                            if(isset($_POST['btn1'])){ 
                                                                                           
                                                $ModelUser = new ModelUser();  
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>
                                                <?php 
                                                    echo $ModelUser->validacion($user,$password);  } 
                                                ?> 
                                            </strong>
                                        </div>

                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                                        </div>
                                        <button type="submit" name="btn1" class="btn btn-primary">
                                            Entrar
                                        </button>
                                        <div class="m-5"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>


