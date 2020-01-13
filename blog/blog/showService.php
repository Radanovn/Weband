<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Service</title>
</head>

<body>

    <?php

    require_once('db.php');

    $sql = "SELECT * FROM services WHERE id='" . $_GET['cid'] . "'";

    $result = mysqli_query($con, $sql);

    $services = mysqli_fetch_assoc($result);

    ?>

    <h2><?= $services['name'] ?></h2>
    <p><?= $services['description'] ?></a></p>



    <div>
    <form method='POST' action="saveReservation.php?service_id=<?=$services['id']?>">

    <input name='name' type="text"><br>
    <input name='email' type="email"><br>
    <input name='tel' type="tel"><br>
    <button type='submit'>Reservation</button>


    </form>
    </div>
</body>

</html>