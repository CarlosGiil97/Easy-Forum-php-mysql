<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foro</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <?php include __DIR__. '/header.php'?>

  </head>
  <?php include 'header.php'?>
  <?php /*include './components/navbar.php' */?>
  <body>
    <main>
    <section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registro</p>

                    <form class="mx-1 mx-md-4">

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        
                        <label class="form-label" for="form3Example1c">Nombre de usuario</label>
                        <input type="text" id="username" name="username" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        
                        <label class="form-label" for="form3Example1c">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        
                        <label class="form-label" for="form3Example3c">Email</label>
                        <input type="email" id="email" name="email" id="form3Example3c" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                        
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                        </div>
                    </div>

                    

                    
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="button" class="btn btn-primary btn-lg" onclick="createUser()">Crear</button>
                        <a type="button" class="btn btn-warning " href="login.php">Iniciar sesión</a>
                    </div>

                    </form>

                </div>
                
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    </main>

  </body>
</html>

