<!doctype html>
<html lang="pt-BR">
    
<head>
    <title>Teste</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1;" />
    
    <script>
        window.onload = () => {
            
            let inEmail = document.getElementById("inEmail");
            let inPassword = document.getElementById("inPassword");
            let showPassword = document.getElementById("showPassword");
            let btLogin = document.getElementById("btLogin");
            let btTheme = document.getElementById("btTheme");

            function ajax(x) {
                let xhr = new XMLHttpRequest(),
                    fd = new FormData();
                xhr.open(x.method, x.url, true);
                xhr.onload = (e) => {
                    x.success(e);
                    console.log(e)
                }
                if (x.data) {
                    for (let key of x.data) {
                        fd[key] = x.data[key];
                    }
                }
                xhr.send(fd)
            }

            btTheme.value = "branco";
            btTheme.onclick = () => {
                if (btTheme.value == "branco") {
                    document.body.classList.add("dark");
                    btTheme.value = "preto";
                    localStorage.setItem("theme", "dark");
                } else {
                    document.body.classList.remove("dark");
                    btTheme.value = "branco";
                    localStorage.setItem("theme", "light");
                }
            }
            if (localStorage.getItem("theme")) {
                let theme = localStorage.getItem("theme");
                if (theme == "dark") {
                    document.body.classList.add("dark");
                    btTheme.value = "preto";
                }
            }

            showPassword.onchange = () => {
                if (showPassword.checked) {
                    inPassword.type = "text";
                } else {
                    inPassword.type = "password";
                }
            }

            btLogin.onclick = () => {
            ajax({
                method: "GET",
                url: "CRUD Modalidades/read.php",
                success: (e) => {
                    alert(e);
                }
            });
            };
        };
    </script>

    <style>
        * {
            background: transparent;
            color: inherit;
            transition: 0.3s;
        }

        .dark {
            background: black;
            color: white;
        }

        input {
            border: 1px solid black;
            border-radius: 5px;
        }

        .dark input {
            border: 1px solid white;
        }
    </style>

</head>

<body>

    <input type="button" id="btTheme" />
    <br>
    <br>
    Email:
    <input type="text" id="inEmail" />
    <br>
    <br>
    Password:
    <input type="password" id="inPassword" />
    <input type="checkbox" id="showPassword" /> Show
    <br>
    <br>
    <input type="button" value="login" id="btLogin"/>

</body>

</html>