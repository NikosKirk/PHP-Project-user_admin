<html>
    <head>
        <title>Register and Login</title>
    </head>
    <body>
        <h2>Register</h2>
        <form action="register_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <select name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br>
            <button type="submit" name="register">Register</button>
        </form>

        <h2>Login</h2>
        <form action="register_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
    </body>
</html>