<?php
  include "sidebar.php";
  include "navbar-TEST.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Prospect</title> 
</head>
<body class="bg-gray-100">

  <div class="ml-64">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <p class="text-2xl font-bold mb-4">New Prospect</p>
      <div class="relative ">
        <div class="absolute top-0 right-10 h-16 w-16 flex items-center justify-center">
          <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Prospect</button>
        </div>
      </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold mb-4">Example Datatable</h2>
    <table id="example" class="table-auto w-full">
        <thead>
          <tr>
            <th class="px-4 py-2">COMPANY NAME</th>
            <th class="px-4 py-2">ITEM DEALS</th>
            <th class="px-4 py-2">STATUS</th>
            <th class="px-4 py-2">REMARKS</th>
            <th class="px-4 py-2">PDF LINK</th>
            <th class="px-4 py-2">ACTION</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $sql="SELECT * FROM new_prospect";
            $stmt=$con->prepare($sql);
            $stmt->execute();
            while($row=$stmt->fetch()){
            ?>
            <tr>
                <td class="border px-4 py-2"><?php echo $row['company_name']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['item_deals']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['status']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['remark']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['pdf']; ?></td>
                <td class="border px-4 py-2">
                    <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#update_prospect<?php echo $row['prospect_id']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                    <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#delete_prospect<?php echo $row['prospect_id']; ?>"><span class="glyphicon glyphicon-edit"></span> Delete</button>
                </td>
            </tr>
            <?php
                include 'new_prospect_update.php';
            }
            ?>
        </tbody>
    </table>
  </div>
</div>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // Add any customization options here
        });
    });
</script>



</body>
</html>