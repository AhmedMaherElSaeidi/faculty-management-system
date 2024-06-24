<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "admin") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registered students</title>
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="../images/assets/logo.png" />
        <link rel="stylesheet" href="../css/tables.css">
    </head>

    <body>
        <div class="navbar">
            <div class="logo">
                <a href=""><img src="../images/assets/helwan.jpg" alt="" width="80px"></a>
            </div>
            <nav class="the rest">
                <ul id="MenuItems">
                    <li><a href="admin_view.php" title="return"><i class="fa fa-arrow-left"></i></a></li>
                    <li><a href="#" title="home"><i class="fas fa-home"></i></a></li>
                    <li><a href="" title="contact us"><i class="fas fa-phone"></i></a></li>
                    <li><a href="" title="about us"><i class="fas fa-info"></i></a></li>
                </ul>

            </nav>

        </div>

        <br><br><br><br>
        <h2 style="text-align: center;">Registered students table</h2>

        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Phone_number</th>
                    <th>Level</th>
                    <th>E-mail</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once '../include/DatabaseClass.php';
                $db = new database();

                $sql = "SELECT * FROM student JOIN level ON student.level_id=level.id";
                $result = $db->selectQuery($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td nowrap><?php echo $row["fullname"]; ?></td>
                            <td><?php echo $row["age"]; ?></td>
                            <td><?php echo $row["phone_number"]; ?></td>
                            <td nowrap><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <td align="center" colspan="6"><?php echo "Zero results*"; ?></td>";
                <?php }
                $db->close(); ?>
            </tbody>
        </table>
        <footer>
            <p style="color:white;">Copyright &copy; 2021, Code Addict</p>
        </footer>
    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
?>