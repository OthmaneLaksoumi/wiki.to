<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
</head>

<body>

    <form action="" method="post" style="display: flex; flex-direction: column; max-width: 500px; margin: 50px auto;">
        <input type="text" name="nom" id="nom">
        <input type="text" name="description" id="description">
        <input type="submit" value="Entrer">
    </form>

    <?php
    
    // function add_catg() {
    $conn = new PDO("mysql:host=localhost;dbname=wiki.to", "root", "");
    $query = "INSERT INTO test (`nom`, `description`) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    // if(!empty($_POST)) {
    // $stmt->execute([$_POST['catg']]);
    // }

    try {
        if (!empty($_POST)) $stmt->execute([$_POST['nom'], $_POST['description']]);
    } catch (PDOException $e) {
       
    }


    // }   

    // add_catg()



    ?>

    <script>
    </script>
</body>

</html>