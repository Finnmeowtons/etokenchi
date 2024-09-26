<?php
include "db_connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Secret Identities Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<div class="mx-5">
        <h2>Personal Details</h2>
        <table class="table table-dark table-striped-columns table-hover ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Secret Identity</th>
                    <th>Planet of Origin</th>
                    <th>Superpower</th>
                    <th>Number of Cats Owned</th>
                    <th>Coffee or Tea</th>
                    <th>Favorite Junk Food</th>
                    <th>Zombie Survival Rating</th>
                    <th>Spirit Animal</th>
                    <th>Number of Hours Wasted on TikTok</th>
                    <th>Preferred Weather Condition</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['Id']; ?></td>
                            <td><?php echo $row['secret_identity']; ?></td>
                            <td><?php echo $row['planet_of_origin']; ?></td>
                            <td><?php echo $row['superpower']; ?></td>
                            <td><?php echo $row['number_of_cats_owned']; ?></td>
                            <td><?php echo $row['coffee_or_tea']; ?></td>
                            <td><?php echo $row['favorite_junk_food']; ?></td>
                            <td><?php echo $row['zombie_survival_rating']; ?></td>
                            <td><?php echo $row['spirit_animal']; ?></td>
                            <td><?php echo $row['number_of_hours_wasted_on_tiktok']; ?></td>
                            <td><?php echo $row['preferred_weather_condition']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update.php?id=<?php echo $row['Id']; ?>">Edit</a>
                                &nbsp;
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['Id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>