<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/67781df9f7.js" crossorigin="anonymous"></script>
    <title>Cosmori Lab</title>
    <style>


        .card-img-left {
            width: 45%;
            /* Link to your background image using in the property below! */
            background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
            background-size: cover;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .btn-google {
            color: white !important;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white !important;
            background-color: #3b5998;
        }
    </style>

</head>

<body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-img-left d-none d-md-flex">
                            <!-- Background image for card set in CSS! -->
                        </div>
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Crie uma nova conta!</h5>
                            <form>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInputUsername" placeholder="myusername" required autofocus>
                                    <label for="floatingInputUsername">Nome de Usuário</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com">
                                    <label for="floatingInputEmail">Email</label>
                                </div>

                                <hr>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Senha</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password">
                                    <label for="floatingPasswordConfirm">Confirme sua senha</label>
                                </div>

                                <div class="d-grid mb-2">
                                    <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Registrar</button>
                                </div>

                                <a class="d-block text-center mt-2 small" href="login">Já possui uma conta? Logue aqui!</a>

                                <hr class="my-4">

                                <div class="d-grid mb-2">
                                    <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase" type="submit">
                                        <i class="fab fa-google me-2"></i> Registre-se com Google
                                    </button>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
                                        <i class="fab fa-facebook-f me-2"></i> Registre-se com Facebook
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>



</body>

</html>
