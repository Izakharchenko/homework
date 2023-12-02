<html>

<head></head>

<body>

    <form action="../index.php">
        <label for="search">Search: </label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Submit">
    </form>
    <table>
        <tbody>
            <tr>
                <td>Title</td>
                <td>Author</td>
                <td>Description</td>
            </tr>
        </tbody>
        <?php

        foreach ($books as $title => $book) {
            echo '<tr><td><a href="index.php?book=' . $book->title . '">' . $book->title . '</a></td><td>' . $book->author . '</td><td>' . $book->description . '</td></tr>';
        }
        ?>
    </table>
</body>

</html>