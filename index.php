
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="./img/logo.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <title>Login Alutsista</title>

  </head>
  <body style="background-color: #001524; font-family: 'Poppins';">
    <div class="login-container">
        <form action="./login/proses_login.php" method="post" class="w-25 mx-auto text-center py-5">
            <img src="./img/logo.png" class="rounded mx-auto d-block w-75 py-3" alt="...">
            <div class="contaier">
                <div class="mb-3">
                  <label for="username" class="form-label text-light">Username</label>
                  <input type="username" class="form-control" id="username" name="username" style="border-radius: 10px; background-color: #D6CC99;" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label text-light">Password</label>
                  <input type="password" class="form-control" id="password" name="password" style="border-radius: 10px; background-color: #D6CC99;" required>
                </div>
                <button type="submit" class="btn text-light mb-5" style="background-color: #445D48; width: 40%; border-radius: 10px;">Submit</button>
            </div>
          </form>
    </div>
  </body>
</html>