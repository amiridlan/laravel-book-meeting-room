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
                        // Modal
                        var description = info.event.extendedProps.description; // Get description
                        Swal.fire({
                            title: 'Maklumat Mesyuarat',
                            html: description,
                            confirmButtonText: 'Tutup'
                            // icon: 'info'
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
