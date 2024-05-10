<?php
session_start() ?>
<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body style="margin: 20px;">


    <h5>NOTE: Delete the textfile named['Item Name.txt', '.txt', 'N A.txt']</h5>
    <a href="https://drive.google.com/file/d/1WMwsgOLp_RrYvB0_JkoX1UzTwvx9u91p/view?usp=sharing" download> pdf link </a>
    <form action="test3_process.php" method="post">
        <button name="all" id="reload" type="convert" class="btn btn-danger" onclick="">convert all</button>
    </form>
    <?php
    $link = $_GET['dl_link'] ?? '1';
    echo $_SESSION['dl_link'];
    ?>
   <br> <a href="<?php echo $_SESSION['dl_link']; ?>">jc <3</a>
   <img src="img/cat.gif" 
   style="
   height: 100px; width:auto; border-radius:5%;  margin-left: auto;margin-right: 0; margin-top:-100px;display:block;" 
   alt="JC">
    <table id="example" class="table table-bordered" style="width:100%; border:1px solid black;">
        <thead>
            <tr class="bg-dark table-bordered border-dark">
                <th class="text-black">#</th>
                <th class="text-black">MODEL ID</th>
                <th class="text-black">ITEM NAME</th>
                <th class="text-black">DESCRIPTION</th>
                <th class="text-black">SPECIFICATION</th>
                <th class="text-black">PICTURE</th>
               

                <th class="text-black">ACTION</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM norbar WHERE stat='0' LIMIT 40";
            $stmt = $con1->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
            ?>
                <form action="test3_process.php" method="post">
                    <tr>
                        <td>
                            <input type="text" name="id" value="<?php echo $row['id']; ?>">
                        </td>
                        <td>
                            <input type="text" name="model_id" value="<?php echo $row['COL 1']; ?>">
                        </td>
                        <td>
                            <!-- <input type="text" name="item_name" value="<?php echo $row['COL 2']; ?>"> -->
                            <textarea name="item_name" id="" cols="30" rows="10"><?php echo $row['COL 2']; ?></textarea>
                        </td>
                        <td>
                            <textarea name="desc" id="" cols="30" rows="10"><?php echo nl2br($row['COL 4']); ?></textarea>
                        </td>
                        <!-- <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['COL 4']); ?></textarea>
                            <input type="text" name="specs1" value="<?php echo nl2br($row['COL 4']); ?>">    
                        </td> -->
                        <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['COL 3']); ?></textarea>

                        </td>
                        <td>
                            <input type="text" name="pics" value="<?php echo $row['COL 5']; ?>">
                        </td>
                        <!-- <td>
                            <input type="text" name="status" value="<?php echo $row['COL 6']; ?>">
                        </td> -->
                        <td>
                            <button name="submit" type="submit" id="123" onclick="jc()" class="btn btn-success">convert</button>
                        </td>
                    </tr>
                </form>
            <?php } ?>

        </tbody>

    </table>

</body>


<script>
document.getElementById('123').addEventListener('click', function() {
    document.getElementById('reload').click();
});
</script>

<script>
   
        document.getElementById('123').addEventListener('click', function() {
    // Create a new KeyboardEvent with the key code for F5
    var event = new KeyboardEvent('keydown', {
        key: 'F5',
        keyCode: 116,
        code: 'F5',
        which: 116,
        keyCode: 116,
        charCode: 116,
        bubbles: true,
        cancelable: true
    });

    // Dispatch the event to simulate pressing the F5 key
    document.dispatchEvent(event);
});
  
</script>
<!-- 
<script>
   
        // Loop through button IDs from "1" to "5"
        for (var i = 1; i <= 5; i++) {
            // Get the button element by its ID
            var button = document.getElementById(String(i));

            // Trigger a click event on the button if it exists
            if (button) {
                button.click();
            }
        }
  
</script> -->

<!-- <script>
$(document).ready(function() {
    // Function to fetch data from server
    function fetchData() {
        $.ajax({
            url: 'test3_fetch.php', // Path to server-side script
            method: 'GET',
            success: function(response) {
                $('#example').html(response); // Update table content
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Fetch data initially when page loads
    fetchData();

    // Poll the server every 5 seconds for updates
    setInterval(fetchData, 5000); // Adjust the interval as needed
});
</script> -->

</html>