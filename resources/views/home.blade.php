<x-layout>
    <x-slot:heading>
        Kalendar
    </x-slot:heading>

    <head>
        <!-- Include FullCalendar CSS -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


    </head>

    <body>
        <div class="container mx-auto mt-5 px-8 pb-14">
            <div id='calendar'></div>

        </div>

        <script>
            console.log(@json($bookings));

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth', // Default view
                    headerToolbar: {
                        left: 'prev,next today', // Buttons (previous, next, and today)
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay' // Buttons (switch month/week/day views)
                    },
                    views: {
                        timeGrid: {
                            slotMinTime: '08:00:00', // Start time
                            slotMaxTime: '20:00:00', // End time
                        }
                    },
                    events: @json($bookings), // Data here

                    aspectRatio: 1.9,

                    //Booking description
                    eventClick: function(info) {
                        // Get event details
                        var date = info.event.start.toLocaleDateString();
                        var department = info.event.extendedProps.department;
                        var title = info.event.title;
                        var start = info.event.start.toLocaleString([], {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true
                        });
                        var end = info.event.end ? info.event.end.toLocaleString([], {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: true
                            }) :
                            'N/A';

                        // Create a table for the modal
                        var htmlContent = `
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid black; padding: 8px;">Ditempah oleh</th>
                <td style="border: 1px solid black; padding: 8px;">${department}</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px;">Bilik</th>
                <td style="border: 1px solid black; padding: 8px;">${title}</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px;">Tarikh</th>
                <td style="border: 1px solid black; padding: 8px;">${date}</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px;">Masa Mula</th>
                <td style="border: 1px solid black; padding: 8px;">${start}</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px;">Hingga</th>
                <td style="border: 1px solid black; padding: 8px;">${end}</td>
            </tr>
        </table>
    `;

                        // Show the modal with the table
                        Swal.fire({
                            title: 'Maklumat Mesyuarat',
                            html: htmlContent,
                            confirmButtonText: 'Tutup'
                        });
                    },

                    //Change cursor to pointer
                    eventMouseEnter: function(info) {
                        info.el.style.cursor = 'pointer';
                    },
                    //Reset cursor
                    eventMouseLeave: function(info) {
                        info.el.style.cursor = '';
                    }
                });

                calendar.render();
            });
        </script>
    </body>
</x-layout>
