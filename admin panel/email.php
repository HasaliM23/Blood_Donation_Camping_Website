<?php 
session_start();
include("./db.php");
include("./sms/send_sms_impl.php");

if (!isset($_SESSION['admin_username'])) {
    echo "<script>window.open('login.php','_self')</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile = $_POST['mobile'];
    $text = $_POST['text']; // Retrieve the message text from the form

    if (strlen($mobile) > 11 || strlen($mobile) < 9) {
        $_SESSION['checkContact'] = 0;
        echo "<script>window.history.back()</script>";
        exit();
    }

    if (strlen($mobile) == 11) {
        $fnum2 = substr($mobile, 0, 2);
        if ($fnum2 == '94') {
            $mobile = substr($mobile, 2);
        } else {
            $_SESSION['checkContact'] = 0;
            echo "<script>window.history.back()</script>";
            exit();
        }
    } elseif (strlen($mobile) == 10) {
        $mobile = substr($mobile, 1);
    }

    $sql = "SELECT * FROM donors WHERE contact='{$mobile}'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['alreadyRegisterd'] = 0;
        echo "<script>window.history.back()</script>";
        exit();
    } else {
        $rand1 = rand(100, 999);
        $rand2 = rand(100, 999);
        $_SESSION['stotp'] = $rand1 . $rand2;
        $trId = $mobile . $rand1;
        $stotp = $_SESSION['stotp'];

        $sendSmsImpl = new SendSMSImpl();
        $sendTextBody = new SendTextBody();
        $tokenBody = new TokenBody();
        $tokenBody->setUsername("nipunt");
        $tokenBody->setPassword("Demo@456");
        $sendTextBody->setMsisdn($sendSmsImpl->setMsisdns(array("{$mobile}")));
        $sendTextBody->setTransactionId("{$trId}");
        $sendTextBody->setMessage($text); // Use the message text from the form
        $transactionBody = new TransactionBody();
        $transactionBody->setTransactionId("{$trId}");
        $response = $sendSmsImpl->sendText($sendTextBody, $sendSmsImpl->getToken($tokenBody)->getToken())->getData()->getUserId();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="email.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include("includes/nav.php"); ?>
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h1 class="mt-3">Mobile Notifications</h1>
                <p class="lead">Compose and manage Mobile notifications for donors.</p>

                <!-- Compose Email Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Compose New Message</h5>
                    </div>
                    <div class="card-body">
                        <form id="emailForm" method="POST" action="">
                            <div class="mb-3">
                                <label for="emailRecipient" class="form-label">Donor Phone number</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter donor number" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailRecipient" class="form-label">Enter Text</label>
                                <input type="text" class="form-control" id="text" name="text" placeholder="Enter text" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
