<!-- views/rename.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Rename Page</title>
</head>
<body>
    <h1>Rename Page</h1>
    <form method="POST" action="rename.php">
        <input type="hidden" name="oldName" value="<?= htmlspecialchars($_GET['page']) ?>">
        <label for="newName">New Page Name:</label>
        <input type="text" id="newName" name="newName" required>
        <button type="submit">Rename Page</button>
    </form>
</body>
</html>
