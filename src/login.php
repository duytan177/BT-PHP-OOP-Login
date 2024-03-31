<?php
require_once('Controller.php');
new Controller();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Login</title>
    <style>
        body {
            background-color: #f8f9fa;
            /* Background color */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            /* Adjust as needed */
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 40px;
        }

        .card-title {
            font-weight: 700;
            color: #333;
        }

        .form-control {
            border-radius: 20px;
            padding: 15px;
            font-size: 16px;
        }

        .btn-primary {
            border-radius: 20px;
            padding: 12px 30px;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center md-4">Đăng nhập</h3>
                        <form action="index.php" method="POST">
                            <?php if (isset($_GET['error'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo htmlspecialchars($_GET['error']); ?>
                                </div>
                            <?php endif; ?>D
                            <div class="mb-3">
                                <label for="email" class="form-label">Tên người dùng</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="text-center">
                                <input type="hidden" name="action" value="login">
                                <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>