<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Compose Message</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .email-container {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 15px;
        margin-top: 20px;
    }

    .email-header {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .email-header h3 {
        margin: 0;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .recipient {
        display: inline-block;
        background-color: #f0f0f0;
        border-radius: 5px;
        padding: 5px 10px;
        margin-right: 5px;
    }

    .remove-recipient {
        cursor: pointer;
        color: red;
        margin-left: 5px;
    }

    /* Remove input border and placeholder */
    #inputEmail {
        border: none;
        outline: none;
        background: none;
        box-shadow: none;
        padding: 0;
    }

    #inputEmail::placeholder {
        color: transparent;
    }
</style>
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
                    <label for="inputEmail">Deals:</label>
                    <div id="recipientList"></div>
                    <input type="email" class="form-control" id="inputEmail" placeholder=" ">
                </div>
                <div class="email-footer">
                    <button type="button" class="btn btn-primary btn-send">Add</button>
                    <button type="button" class="btn btn-secondary" id="btnDiscard">Discard</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btnDiscard').addEventListener('click', function() {
            document.getElementById('inputEmail').value = '';
            document.getElementById('recipientList').innerHTML = '';
        });

        document.querySelector('.btn-send').addEventListener('click', function() {
            const email = document.getElementById('inputEmail').value;

            // Here, you can implement the logic to send the email (e.g., using AJAX)
            console.log('Email sent to:', email);

            // Clear the form after sending
            document.getElementById('inputEmail').value = '';
            document.getElementById('recipientList').innerHTML = '';

            alert('Deals added successfully!');
        });

        document.getElementById('inputEmail').addEventListener('keypress', function(event) {
            if (event.key === 'Enter' && this.value.trim() !== '') {
                const recipient = this.value.trim();
                const span = document.createElement('span');
                span.classList.add('recipient');
                span.textContent = recipient;

                const removeButton = document.createElement('span');
                removeButton.classList.add('remove-recipient');
                removeButton.textContent = '×';
                removeButton.addEventListener('click', function() {
                    this.parentElement.remove();
                });

                span.appendChild(removeButton);
                document.getElementById('recipientList').appendChild(span);
                this.value = '';
            }
        });
    });
</script>

</body>
</html>