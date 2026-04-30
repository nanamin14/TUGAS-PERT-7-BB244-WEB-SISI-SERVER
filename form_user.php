<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Input User </h2>
    <form action="proses_user.php" method="POST">
        <label for="nama"> Nama : </label> <br>
        <input type="text" name="nama"> <br><br>
        <label for="email"> Email : </label> <br>
        <input type="email" name="email"> <br><br>
        <label for="password"> Password : </label> <br>
        <input type="password" name="password"> <br><br>
        <input type="submit" value="Simpan">
    </form>
    <hr> 
    <h2> Data User </h2>
    <table> 
        <tr>
            <th> NIM </th>
            <th> Nama </th>
            <th> Email </th>
            <th> Action </th>
        </tr>
        <?php
            require_once 'classes/mahasiswa.php';
            $mhs= new Mahasiswa();
            $data= $mhs->read();

            while ($row= $data->fetch_assoc()) {
                echo "
                    <tr>
                        <td>{$row['nim']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='editUser.php?nim={$row['nim']}'>Edit</a> |
                            <a href='deleteUser.php?nim={$row['nim']}'>Delete</a>
                        </td>
                    </tr>
                ";
            }
        ?>
    </table>
</body>
</html>


<!-- http://localhost/project_crud/form_user.php -->
