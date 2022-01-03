<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ URL::asset('css/createDatastyles.css') }}">

    <script>
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.requires-validation')
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })();
    </script>
</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Registre Novo Usuário</h3>
                        <p>Preencha os campos abaixo.</p>
                        <form class="requires-validation" method="POST" action="/createdNewUser">
                            @csrf
                            {{--Nome--}}
                            <div class="col">
                                <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                                <div class="valid-feedback">Username field is valid!</div>
                                <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                                <div class="valid-feedback">Email field is valid!</div>
                                <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                            <div class="col">
                                <select class="form-select" name="access_level_enum" required>
                                    <option selected disabled value="asd">Access Level</option>
                                    <option value="ADM">ADM</option>
                                    <option value="EMPLOYEE">Employee</option>
                                    <option value="COMPOSER">Composer</option>
                                    <option value="USER">User</option>
                                </select>
                                <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div>
                            </div>


                            <div class="col-md-7">
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                                <div class="valid-feedback">Password field is valid!</div>
                                <div class="invalid-feedback">Password field cannot be blank!</div>
                            </div>

                            <div class="col-md-7">
                                <input class="form-control" type="text" name="phone" placeholder="Phone number" required>
                                <div class="valid-feedback">Phone field is valid!</div>
                                <div class="invalid-feedback">Phone field cannot be blank!</div>
                            </div>

                            <div class="col-md-7">
                                <label for="birthday">Birthday:</label>
                                <input class="form-control" type="date" name="birthday" placeholder="Birthday" required>
                                <div class="valid-feedback">Birthday field is valid!</div>
                                <div class="invalid-feedback">Birthday field cannot be blank!</div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label">I confirm that all data are correct</label>
                                <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                            </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
