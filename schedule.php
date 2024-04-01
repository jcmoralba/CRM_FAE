<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include "sidebar.php";
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include "navbar.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Schedule</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div id="calendar" class="container fixposition"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function dateString(info) {
                var dateString = info;
                var date = new Date(dateString);
                var year = date.getFullYear();
                var month = ('0' + (date.getMonth() + 1)).slice(-2);
                var day = ('0' + date.getDate()).slice(-2);
                var formattedDate = year + "-" + month + "-" + day;
                return formattedDate;
            }
            var eventsArray = [];
            var calendarEl = document.getElementById('calendar');
            $.ajax({
                url: 'query.php?id=getEvents',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(i, e) {
                        eventsArray.push({
                            title: i[1],
                            start: i[4],
                            end: i[5],
                            description: i[2],
                            eventId: i[0]
                        })
                    })

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        height: 600,
                        plugins: ['dayGrid', 'interaction'],
                        eventClick: function(info) {
                            Swal.fire({
                                title: info.event.title,
                                text: info.event.extendedProps.description,
                                confirmButton: true,
                                confirmButtonText: 'Update',
                                showCancelButton: true,
                                cancelButtonText: 'Close',
                                showDenyButton: true,
                                denyButtonText: 'Delete',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Update event logic
                                } else if (result.isDenied) {
                                    // Delete event logic
                                }
                            })
                        },
                        dateClick: function(info) {
                            let eventTitle, description;
                            Swal.fire({
                                title: 'Fill out all the fields',
                                html: `
                            <div style="text-align: left">
                                Event Title<span class="text-danger">*</span>
                                <input type="text" name="title" id="title" class="form-control"><br>
                                Description<span class="text-danger">*</span><br>
                                <textarea name="description" id="description" class="form-control"></textarea><br>
                                Date Start<span class="text-danger">*</span><br>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="${info.dateStr}"><br>
                                Date End<span class="text-danger">*</span><br>
                                <input type="date" name="end_date" id="end_date" class="form-control"><br>
                            </div>`,
                                confirmButtonText: 'Add Event',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                focusConfirm: false,
                                didOpen: () => {
                                    const popup = Swal.getPopup();
                                    eventTitle = popup.querySelector('#title');
                                    description = popup.querySelector('#description');
                                    start_date = popup.querySelector('#start_date');
                                    end_date = popup.querySelector('#end_date');
                                    eventTitle.onkeyup = (event) => event.key === 'Enter' && Swal.clickConfirm();
                                    description.onkeyup = (event) => event.key === 'Enter' && Swal.clickConfirm();
                                    start_date.onkeyup = (event) => event.key === 'Enter' && Swal.clickConfirm();
                                    end_date.onkeyup = (event) => event.key === 'Enter' && Swal.clickConfirm();
                                },
                                preConfirm: () => {
                                    const eventTitleValue = eventTitle.value;
                                    const descriptionValue = description.value;
                                    const startDateValue = start_date.value;
                                    const endDateValue = end_date.value;
                                    if (!descriptionValue || !eventTitleValue || !startDateValue || !endDateValue) {
                                        Swal.showValidationMessage(`Please fill out all required fields`);
                                        return false;
                                    }

                                    // Prepare form data
                                    const formData = new FormData();
                                    formData.append('title', eventTitleValue || 'no value');
                                    formData.append('description', descriptionValue || 'no desc');
                                    formData.append('start_date', startDateValue);
                                    formData.append('end_date', endDateValue);

                                    $.ajax({
                                        url: 'query.php?id=addEvent',
                                        method: 'POST',
                                        data: formData,
                                        dataType: 'json',
                                        processData: false,
                                        contentType: false,
                                        success: function(data) {
                                            if (data.data == "success") {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Success!',
                                                    text: 'Event Added',
                                                }).then(() => {
                                                    window.location.reload();
                                                })

                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error!',
                                                    text: 'Something went Wrong',
                                                })
                                            }

                                        },
                                        error: function(xhr, status, error) {
                                            console.error(xhr.responseText);
                                            console.error('Error:', error);
                                        }
                                    });

                                    return true;
                                }
                            });
                        },
                        events: eventsArray
                    });

                    calendar.render();
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
