<?php
include "db_connection.php";
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $secret_identity = $_POST['secret_identity'];
    $planet_of_origin = $_POST['planet_of_origin'];
    $superpower = $_POST['superpower'];
    $number_of_cats_owned = $_POST['number_of_cats_owned'];
    $coffee_or_tea = $_POST['coffee_or_tea'];
    $favorite_junk_food = $_POST['favorite_junk_food'];
    $zombie_survival_rating = $_POST['zombie_survival_rating'];
    $spirit_animal = $_POST['spirit_animal'];
    $number_of_hours_wasted_on_tiktok = $_POST['number_of_hours_wasted_on_tiktok'];
    $preferred_weather_condition = $_POST['preferred_weather_condition'];

    $sql = "UPDATE `users` SET
                `secret_identity`='$secret_identity',
                `planet_of_origin`='$planet_of_origin',
                `superpower`='$superpower',
                `number_of_cats_owned`='$number_of_cats_owned',
                `coffee_or_tea`='$coffee_or_tea',
                `favorite_junk_food`='$favorite_junk_food',
                `zombie_survival_rating`='$zombie_survival_rating',
                `spirit_animal`='$spirit_animal',
                `number_of_hours_wasted_on_tiktok`='$number_of_hours_wasted_on_tiktok',
                `preferred_weather_condition`='$preferred_weather_condition'
            WHERE `id`='$id'";

    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "Record updated successfully.";
        header('Location: read.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $secret_identity = $row['secret_identity'];
            $planet_of_origin = $row['planet_of_origin'];
            $superpower = $row['superpower'];
            $number_of_cats_owned = $row['number_of_cats_owned'];
            $coffee_or_tea = $row['coffee_or_tea'];
            $favorite_junk_food = $row['favorite_junk_food'];
            $zombie_survival_rating = $row['zombie_survival_rating'];
            $spirit_animal = $row['spirit_animal'];
            $number_of_hours_wasted_on_tiktok = $row['number_of_hours_wasted_on_tiktok'];
            $preferred_weather_condition = $row['preferred_weather_condition'];
        }


        ?>

        <h2>Personal Details Update Form</h2>
        <form action="" method="post">
            <fieldset>
                <legend>Personal information:</legend>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                Secret Identity:<br>
                <input type="text" name="secret_identity" value="<?php echo $secret_identity; ?>">
                <br><br>
                Planet of Origin:<br>
                <input type="text" name="planet_of_origin" value="<?php echo $planet_of_origin; ?>">
                <br><br>
                Superpower:<br>
                <input type="text" name="superpower" value="<?php echo $superpower; ?>">
                <br><br>
                Number of Cats Owned:<br>
                <input type="number" name="number_of_cats_owned" value="<?php echo $number_of_cats_owned; ?>">
                <br><br>
                Coffee or Tea:<br>
                <select name="coffee_or_tea">
                    <option value="coffee" <?php echo ($coffee_or_tea == 'coffee') ? 'selected' : ''; ?>>Coffee</option>
                    <option value="tea" <?php echo ($coffee_or_tea == 'tea') ? 'selected' : ''; ?>>Tea</option>
                </select><br><br>
                Favorite Junk Food:<br>
                <input type="text" name="favorite_junk_food" value="<?php echo $favorite_junk_food; ?>">
                <br><br>
                Zombie Survival Rating:<br>
                <input type="number" name="zombie_survival_rating" value="<?php echo $zombie_survival_rating; ?>">
                <br><br>
                Spirit Animal:<br>
                <input type="text" name="spirit_animal" value="<?php echo $spirit_animal; ?>">
                <br><br>
                Number of Hours Wasted on TikTok:<br>
                <input type="number" name="number_of_hours_wasted_on_tiktok"
                    value="<?php echo $number_of_hours_wasted_on_tiktok; ?>">
                <br><br>
                Preferred Weather Condition:<br>
                <input type="text" name="preferred_weather_condition" value="<?php echo $preferred_weather_condition; ?>">
                <br><br>
                <input type="submit" value="Update" name="update">
            </fieldset>
        </form>
        </body>

        </html>

        <?php
    } else {
        header('Location: read.php');
    }
}
?>