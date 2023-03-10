<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/style.css">
    <title>Forget Password</title>
</head>

<body>
    <div class="container main-container">
        <h1>Forget Password</h1>
        <?php if (isset($validation)) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($flash_message) && $flash_message === true) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    reset password link </div>
            </div>
        <?php endif; ?>

        <form action="/forgetpassword" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="mb-3 form-button">
                <div id="btnHelp" class="form-text">Wanna Try Again ? Back to LogIn.</div>
                <a href="<?php echo base_url() ?>"> <label class="form-button-label">Log In </label> </a>
            </div>
        </form>
    </div>

</body>

</html>