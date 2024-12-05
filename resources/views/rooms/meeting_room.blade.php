<x-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <x-slot:heading>
            Senarai Tempahan {{ $room }}
        </x-slot:heading>
    </head>

    <body>
        <div class="container mx-auto mt-2 px-8">
            <table class="w-3/4 mx-auto">
                <thead>
                    <tr>
                        <th class=" px-4 py-2">Jabatan</th>
                        <th class=" px-4 py-2">Tarikh</th>
                        <th class=" px-4 py-2">Mula</th>
                        <th class=" px-4 py-2">Hingga</th>
                        <th class=" px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <x-table-style>{{ $booking->department_name }}</x-table-style>
                            <x-table-style>{{ $booking->booking_date }}</x-table-style>
                            <x-table-style>{{ $booking->booking_time }}</x-table-style>
                            <x-table-style>{{ $booking->end_time }}</x-table-style>
                            <x-table-style>
                                <a href="{{ route('booking.edit', $booking->id) }}"
                                    class="text-blue-500 hover:text-blue-800">Edit</a>
                            </x-table-style>
                            <x-table-style>
                                <form action="{{ route('booking.delete', $booking->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-800">Delete</button>
                                </form>
                            </x-table-style>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('meeting.rooms') }}"
                class="mt-4 inline-block bg-red-500 text-white px-4 py-2 rounded">Kembali</a>
            <a href="{{ route('booking.create', $room) }}"
                class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Tempah Bilik Ini</a>
        </div>
    </body>

    </html>
</x-layout>
