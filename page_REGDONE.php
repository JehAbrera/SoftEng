<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleREGDONE.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>SJCP Registration</title>
</head>

<body>
    <div class="content-wrapper">
        <div class="card">
            <div class="message-wrapper">
                <div class="pop-icon">
                    <i class="fa-solid fa-bell shake"></i>
                </div>
                <div class="heading">
                    <span>Congratulations <?php echo $_SESSION['fname']
                                            ?>! You're all set up.
                    </span>
                </div>
                <div class="message-body">
                    <span>Log-in now to discover and explore all of SJCP's features. Set schedules, view your records, and do more with your account.</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            let count = 3;

            const redirect = () => {
                if (count == 0) {
                    location.href = 'page_HOME.php';
                } else {
                    count--;
                    setTimeout(redirect, 1000);
                }
            }

            redirect();
        })
    </script>
</body>

</html>