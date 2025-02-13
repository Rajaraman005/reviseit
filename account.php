
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReviseIt - Account Settings</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="./src/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            -webkit-tap-highlight-color: transparent;
            -webkit-focus-ring-color: transparent;
            outline: none;
            font-family: 'Roboto', sans-serif; 
        }
        
        body {
            background-color: #EEF1F8;
            margin: 0;
            padding: 0;
            color: black;
        }

        .container {
            width: 50%;
            background-color: #FFFFFF;
            margin: 50px auto;
            padding: 30px;
            box-shadow: 2px 2px 30px rgba(66, 57, 238, .2);
            border-radius: 20px;
        }

        .heading {
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        .form-group {
            margin: 15px 0;
        }

        label {
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(-30deg, rgb(0, 0, 0), rgb(0, 0, 0) 55%);
            color: #FFFFFF;
            font-weight: 600;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            transition: all .3s ease;
        }

        .submit-btn:hover {
            background: rgb(0, 0, 0);
        }

        .logout {
            text-align: center;
            margin-top: 15px;
        }

        .logout a {
            text-decoration: none;
            color: red;
            font-weight: bold;
        }

        @media screen and (max-width: 768px) {
            .container {
                width: 80%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="heading">Account Settings</h2>

        <form action="" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            </div>

            <div class="form-group">
                <label>New Password (Leave blank if not changing)</label>
                <input type="password" name="new_password">
            </div>

            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password">
            </div>

            <button type="submit" class="submit-btn">Update Profile</button>
        </form>

        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>

</body>
</html>
