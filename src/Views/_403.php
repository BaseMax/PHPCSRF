<?php if (!defined("LOADED")) exit; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Invalid CSRF Token</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <div class="alert alert-danger">
            <h4>Invalid CSRF Token</h4>
            <p>The CSRF token submitted in the form is invalid. Please try again.</p>
        </div>
        <a href="/login" class="btn btn-primary">Back to Login</a>
    </div>
</body>

</html>