  var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(function() {
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({ id: row.id, title: row.title, start: row.start_datetime, end: row.end_datetime });
            })
        }
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        calendar = new Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'prev,next today',
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            selectable: true,
            dateClick: function(info) {
              var clickedDate = info.date;
              var currentDate = new Date();
              if (clickedDate.getDate() === currentDate.getDate() &&
                  clickedDate.getMonth() === currentDate.getMonth() &&
                  clickedDate.getFullYear() === currentDate.getFullYear()) {
                  // Trigger modal on date click only if it's the current date
                  $('#staticBackdroppp').modal('show');
              }
          },
            
            
            themeSystem: 'bootstrap',
            //Random default events
            events: events,
            eventClick: function(info) {
                var _details = $('#event-details-modal')
                var id = info.event.id
                if (!!scheds[id]) {
                    _details.find('#title').text(scheds[id].title)
                    _details.find('#description').text(scheds[id].description)
                    _details.find('#start').text(scheds[id].sdate)
                    _details.find('#end').text(scheds[id].edate)
                    _details.find('#edit,#delete,#asDone').attr('data-id', id)
                    _details.modal('show')
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function(info) {
                // Do Something after events mounted
            },
            editable: false,
        });

        calendar.render();

        

        // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })

        // Edit Button
        // $('#edit').click(function() {
        //     var id = $(this).attr('data-id')
        //     if (!!scheds[id]) {
        //         var _form = $('#schedule-form')
        //         console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
        //         _form.find('[name="id"]').val(id)
        //         _form.find('[name="title"]').val(scheds[id].title)
        //         _form.find('[name="description"]').val(scheds[id].description)
        //         _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
        //         _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
        //         $('#event-details-modal').modal('hide')
        //         _form.find('[name="title"]').focus()
        //     } else {
        //         alert("Event is undefined");
        //     }
        // })

        $('#edit').click(function() {
            var id = $(this).attr('data-id');
            if (!!scheds[id]) {
                var event = scheds[id];
                $('#event-details-modal').modal('hide')
                $('#editEventId').val(id);
                $('#editEventTitle').val(event.title);
                $('#editEventDescription').val(event.description);
                $('#editEventStartDateTime').val(event.start_datetime);
                $('#editEventEndDateTime').val(event.end_datetime);
                $('#editEventModal').modal('show');
            } else {
                alert("Event is undefined");
            }
        });
        
        

        // Delete Button / Deleting an Event
        // $('#delete').click(function() {
        //     var id = $(this).attr('data-id')
        //     if (!!scheds[id]) {
        //         var _conf = confirm("Are you sure to delete this scheduled event?");
        //         if (_conf === true) {
        //             location.href = "./event-calendar-delete.php?id=" + id;
        //         }
        //     } else {
        //         alert("Event is undefined");
        //     }
        // })
        $('#delete').click(function() {
            var id = $(this).attr('data-id');
            if (!!scheds[id]) {
                $('#event-details-modal').modal('hide')
                $('#confirmationModal').modal('show');
                $('#confirmDelete').click(function() {
                    location.href = "./event-calendar-delete.php?id=" + id;
                });
            } else {
                alert("Event is undefined");
            }
        });


        $('#asDone').click(function() {
            var id = $(this).attr('data-id');
            if (!!scheds[id]) {
                $('#event-details-modal').modal('hide')
                $('#confirm').modal('show');
                $('#markAsDone').click(function() {
                    location.href = "./event-calendar-done.php?id=" + id;
                });
            } else {
                alert("Event is undefined");
            }
        });
        
    })

    