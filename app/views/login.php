<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container text-center">
        <div class="card mt-5 bg-secondary">
            <div class="card-header">
                <h1>LOGIN</h1>
            </div>
            <div class="card-body">
                <form action="/auth" method="post">
                    <div class="form-control mt-5 bg-secondary">
                        <label for="username form-label">Enter userName:</label>
                        <input required class="w-100" type="text" name="username" id="username">
                    </div>
                    <div class="form-control mt-5 bg-secondary">
                        <label for="password">Enter password:</label>
                        <input required minlength="8" class="w-100" type="text" name="password" id="password">
                    </div>
                    <input class="btn btn-primary w-100 mt-5" type="submit" value="Submit">
                    <a href="/register" class="btn btn-success w-100 mt-2">Create Account</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>