<html>

    <head>
        <meta charset="utf-8">


        <title>Página de cadastro e login</title>

        <style>
            a {
                text-decoration: none;
                /* Tira a underline dos links */
                color: #000;
                /* Remove a cor azul (Pode trocar de acordo com a fonte utilizada em seu site) */
            }
            .ocultar {
                display: none;
            }
            /* Esta parte é só para ajustar esta página */
            body, td {
                text-align: center;
            }
            .formularios {
                display: flex;
            }
            fieldset {
                width:50%;
            }
            table {
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div class="formularios">
            <fieldset>
                <legend>Formulário de cadastro</legend>
                <form method="get" action="cadastro.php">
                    <br>
                    <br>
                    <input type="text" name="login" placeholder="Login" />

                    <br>
                    <br>
                    <input type="password" name="senha" placeholder="Senha" />

                    <br>
                    <br>
                    <input type="submit" value="Cadastrar-se" />
                </form>
            </fieldset>

            <fieldset>
                <legend>Formulário de login</legend>
                <form method="get" action="login.php">
                    <br>
                    <br>
                    <input type="text" name="login" placeholder="Login" />

                    <br>
                    <br>
                    <input type="password" name="senha" placeholder="Senha" />

                    <br>
                    <br>
                    <input type="submit" value="Entrar" />
                </form>
            </fieldset>
        </div>
        <br>
    </body>

</html>