<div class="email-container" style="margin-bottom: 20px;">
    <div class="form-group">
        <label for="inputEmail">Item Deals:</label>
        <div class="input-group">

            <input type="text" class="form-control" id="inputEmail" placeholder="Enter deals here" aria-label="Enter deals here" aria-describedby="btnAdd" onkeydown="return dealsEnter(event)">
            <button class="btn btn-primary" type="button" id="btnAdd">Add</button>

        </div>
    </div>
    <div id="emailList"></div>
    <button type="button" hidden class="btn btn-success" id="btnSave" style="margin-top: 10px;">Save Deals</button>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#btnAdd").click(function() {
            var emailInput = $("#inputEmail").val().trim();
            if (emailInput !== "") {
                var isValid = validateEmail(emailInput);
                var isValid = true;
                if (isValid) {
                    var emailTag = '<span class="badge bg-secondary" style="margin: 5px;">' + emailInput + '<button type="button" class="btn-close" aria-label="Remove"></button></span>';
                    $("#emailList").append(emailTag);
                    $("#inputEmail").val(""); // Clear input after adding
                } else {
                    console.log("Invalid email address!");
                }
            } else {
                console.log("Please enter an email address!");
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
            // Send the email variable to PHP using AJAX
            $.ajax({
                type: "POST",
                url: "test3_process.php", // Path to your PHP script
                data: {
                    emails: JSON.stringify(emails)
                }, // Data to send
                success: function(response) {
                    console.log(response); // Display response from PHP script
                }
            });
            console.log("Emails saved successfully!");
        });

        // Function to validate email address
        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
    });
</script>

<script>
    // for entering in input deals auto click add
    function dealsEnter(event) {
        if (event.key === "Enter") {
            document.getElementById("btnAdd").click();
            return true;
        }

    }
</script>