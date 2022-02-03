<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css "href="../../Atlantis/assets/css/style.css">
    <link rel="stylesheet" type="text/css "href="../../Atlantis/assets/css/css/all.min.css">
    <link rel="stylesheet" href="../../Atlantis/assets/css/sweetalert.css">
	<link rel="icon" href="../../Atlantis/assets/img/logo.png" type="image/x-icon"/>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
   <!--  <img class="wave"src="../assets/img/wave.png" alt="">  -->
    <div class="contenedor">
        <div class="img">
            <img src="../../Atlantis/assets/img/bg.svg" alt="">
        </div>
        <div class="contenido-login">

            <form method="POST" action="/login">
                @csrf
                <img src="../../Atlantis/assets/img/logo.png" alt="">
                <h2>Login</h2>
                <div class="input-div nit">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">

                        <input type="email"  id="email" name="email"  required placeholder="CORREO O USUARIOS">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">

                        <input type="password" placeholder="CONTRASEÑA"  id="password" name="password" required >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <input type="submit" class="btn" name="button" id="login" value="Iniciar sesion">
        
            </form>

        </div>
    </div>
     <script src="../../Atlantis/assets/js/jquery.js"></script>
    <script src="../../Atlantis/assets/js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="../../Atlantis/assets/js/operaciones.js"></script>
	
</body>

</html>
