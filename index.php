<?php require_once 'Core/CreditCardValidator.php'?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Credit Card Validator</title>
    <!-- Bootstrap stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome stylesheet TODO: Delete if there is no use -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <!-- Header text -->
    <h1 class="page-header text-center">Credit Card Validator</h1>
    <!-- Content starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <!-- Form starts -->
                <form class="form-horizontal" role="form" id="cardEntryForm" action="index.php" method="post">
                    <!-- Telephone number input -->
                    <div class="form-group">
                        <label for="inputNumber" class="col-sm-4 control-label">Credit card number</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="inputNumber" name="inputNumber">
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                    </div>
                    <!-- Send feedback -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success pull-right">Validate</button>
                        </div>
                    </div>
                </form>
                <!-- Form ends -->
            </div>
            <?php
                if (isset($_POST['inputNumber']) && is_numeric($_POST['inputNumber'])) {
                    $validation = new CreditCardValidator();
                    $validation->validate($_POST['inputNumber']);
            ?>
            <!-- Result of validation starts -->
            <div class="col-sm-12 text-center">
            <h3><strong>Your card type is:</strong> <?= $validation->result['cardType']; ?></h3>
            <h3><strong>Result of validation:</strong> <?= $validation->result['validationMessage']; ?></h3>

        </div>
            <!-- Result of validation ends -->
            <?php
                }
			?>
        </div>
    </div>
    <!-- Content ends -->

    <!-- JQuery script -->
    <script src="js/jquery-3.1.0.min.js"></script>
    <!-- Bootstrap script -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>