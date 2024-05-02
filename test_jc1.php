<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Duplicate Input Form in Modals</title>
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Duplicate Input Form in Modals</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Open Modal 1</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Open Modal 2</button>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal 1</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="modal1Form" method="post" action="process_form.php">
                    <div id="modal1InputsContainer" class="form-group">
                        <!-- Initial input field for Modal 1 -->
                        <input type="text" class="form-control mb-2" name="modal1_input_text[]" placeholder="Enter text...">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="duplicateInput('myModal1')">Duplicate</button>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal 2</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="modal2Form" method="post" action="process_form.php">
                    <div id="modal2InputsContainer" class="form-group">
                        <!-- Initial input field for Modal 2 -->
                        <input type="text" class="form-control mb-2" name="modal2_input_text[]" placeholder="Enter text...">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="duplicateInput('myModal2')">Duplicate</button>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS (Optional if you need JavaScript components) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Function to duplicate input field in the specified modal
    function duplicateInput(modalId) {
        var container = document.getElementById(modalId + 'InputsContainer');
        var input = container.querySelector('input');
        var clonedInput = input.cloneNode(true);
        clonedInput.value = ''; // Clear the value of the cloned input
        container.appendChild(clonedInput);

    }
</script>
</body>
</html>
