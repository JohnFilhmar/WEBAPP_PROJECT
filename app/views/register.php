<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - JMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url(); ?>public/css/custom.css">
</head>

<body class="bg-dark">
    <div class="container text-center">
        <div class="card mt-5 bg-secondary">
            <div class="card-header">
                <h1>Create Account</h1>
            </div>
            <div class="card-body">
                <form action="/createaccount" method="post">
                    <div class="form-group mt-4">
                        <label for="username">Enter Username:</label>
                        <input required class="form-control" type="text" name="username" id="username">
                    </div>
                    <div class="form-group mt-4">
                        <label for="password">Enter Password:</label>
                        <input required minlength="8" class="form-control" type="password" name="password" id="password">
                    </div>
                    <button class="btn btn-primary w-100 mt-4" type="submit">Create Account</button>
                </form>
                <p class="mt-3"><a href="/login" class="btn btn-success w-100">Go Back to Login</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
