<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style-login.css">
</head>
<body>
    <main id="container">
        <form id="login_form" ACTION="autentication/login.php" METHOD="POST">
            <div id="form_header">
                <h1>Login</h1>
            </div>

            <div id="inputs">
                <div id="input-box">
                    <label for="name">
                        Container
                        <div id="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="login" id="login", placeholder="container0NN">
                        </div>
                    </label>
                </div>
                <div id="input-box">
                    <label for="password">
                        Senha
                        <div id="input-field">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="senha" id="senha", placeholder="1F(XXXXXX)">
                        </div>
                    </label>
                </div>
            </div>
            <button type="submit" id="login_button">
                Login
            </button>

        </form>

    </main>
</body>
</html>