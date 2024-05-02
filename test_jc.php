<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Input Form in Modal</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Dynamic Input Form</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="myForm" method="post" action="process_form.php">
                        <div id="inputsContainer" class="form-group">
                            <!-- Initial input field -->
                            <input type="text" name="input_text[]" class="form-control mb-2" placeholder="Enter text...">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addInput()">Add Input</button>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional if you need JavaScript components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function addInput() {
            var container = document.getElementById('inputsContainer');
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'input_text[]';
            input.className = 'form-control mb-2';
            input.placeholder = 'Enter text...';
            container.appendChild(input);
        }
    </script>
</body>
</html>
