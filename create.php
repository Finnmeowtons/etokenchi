<!DOCTYPE html>
<html>
<title>Student Database</title>

<body>
  <h2>Secret Identity Form</h2>
  <form action="" method="POST">
    <fieldset>
      <legend>Personal Information</legend>
      Secret Identity:<br>
      <input type="text" name="secret_identity"><br><br>
      Planet of Origin:<br>
      <input type="text" name="planet_of_origin"><br><br>
      Superpower:<br>
      <input type="text" name="superpower"><br><br>
      Number of Cats Owned:<br>
      <input type="number" name="number_of_cats_owned"><br><br>
      Coffee or Tea:<br>
      <select name="coffee_or_tea">
        <option value="coffee">Coffee</option>
        <option value="tea">Tea</option>
      </select><br><br>
      Favorite Junk Food:<br>
      <input type="text" name="favorite_junk_food"><br><br>
      Zombie Survival Rating:<br>
      <input type="number" name="zombie_survival_rating"><br><br>
      Spirit Animal:<br>
      <input type="text" name="spirit_animal"><br><br>
      Number of Hours Wasted on TikTok:<br>
      <input type="number" name="number_of_hours_wasted_on_tiktok"><br><br>
      Preferred Weather Condition:<br>
      <input type="text" name="preferred_weather_condition"><br><br>
      <br><br>
      <input type="submit" name="submit" value="submit">
    </fieldset>
  </form>
</body>

</html>

<?php
include "db_connection.php";
if (isset($_POST['submit'])) {
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

  $sql = "INSERT INTO users (
    secret_identity, planet_of_origin, superpower, number_of_cats_owned, coffee_or_tea,
    favorite_junk_food, zombie_survival_rating, spirit_animal, number_of_hours_wasted_on_tiktok, preferred_weather_condition
  ) VALUES (
    '$secret_identity', '$planet_of_origin', '$superpower', '$number_of_cats_owned', '$coffee_or_tea',
    '$favorite_junk_food', '$zombie_survival_rating', '$spirit_animal', '$number_of_hours_wasted_on_tiktok', '$preferred_weather_condition'
  )";

  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "New record created successfully.";
    header('Location: read.php');
  } else {
    echo "Error:" . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>