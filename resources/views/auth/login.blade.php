<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #12263A;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 50px;
            margin: 0;
        }

        main.login-form {
            width: 100%;
            max-width: 400px;
        }

        .btn-login {
            background: #06BCC1;
            color: #12263A;
            font-weight: bold;
        }

        .foot {
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center; color:white">Sumber Abadi</h2>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login.custom') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Username" id="email" class="form-control"
                                        name="email" required autofocus>
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" required>
                                    @if ($errors->has('emailPassword'))
                                        <span class="text-danger">{{ $errors->first('emailPassword') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-block btn-login">Signin</button>
                                </div>
                                <p style="text-align: center">Belum ada akun? <a
                                        href="{{ route('register-user') }}">Daftar</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="foot">
        <p>Copyright &copy; 2024, Sumber Abadi Ponorogo</p>
    </footer>
</body>

</html>
