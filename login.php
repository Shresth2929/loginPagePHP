<?php
$error = "";
$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters long";
    } else {
        echo "<p class='text-green-500 text-center mt-2'>Login successful!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center mb-4">Login</h2>
        <form method="post" action="" class="space-y-4">
            <div>
                <label class="block font-medium">Email:</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" required 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block font-medium">Password:</label>
                <input type="password" name="password" required 
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <input type="submit" value="Login" 
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 cursor-pointer">
        </form>
        <?php if (!empty($error)) { echo "<p class='text-red-500 text-center mt-2'>$error</p>"; } ?>
    </div>
</body>
</html>