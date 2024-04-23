<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Multiple Email Input</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="email-container">
                <div class="email-header">
                    <h3>HYTEC Deals</h3>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Enter Email Addresses:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputEmail" placeholder="Enter email addresses" aria-label="Enter email addresses" aria-describedby="btnAdd">
                        <button class="btn btn-primary" type="button" id="btnAdd">Add</button>
                    </div>
                </div>
                <div id="emailList"></div>
                <button type="button" class="btn btn-success" id="btnSave">Save Emails</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#btnAdd").click(function() {
        var emailInput = $("#inputEmail").val().trim();
        if (emailInput !== "") {
            var isValid = validateEmail(emailInput);
            if (isValid) {
                var emailTag = '<span class="badge bg-secondary">' + emailInput + '<button type="button" class="btn-close" aria-label="Remove"></button></span>';
                $("#emailList").append(emailTag);
                $("#inputEmail").val(""); // Clear input after adding
            } else {
                alert("Invalid email address!");
            }
        } else {
            alert("Please enter an email address!");
        }
    });

    // Remove email on close button click
    $(document).on("click", ".btn-close", function() {
        $(this).parent().remove();
    });

    $("#btnSave").click(function() {
        var emails = [];
        $("#emailList .badge").each(function() {
            emails.push($(this).text().trim());
        });
        // Now you can save the 'emails' array to your database using AJAX or form submission
        console.log(emails);
        alert("Emails saved successfully!");
    });

    // Function to validate email address
    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
});
</script>

</body>
</html>
