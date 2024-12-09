<x-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <x-slot:heading>
            Senarai Bilik Mesyuarat
        </x-slot:heading>
        <script>
            function closeMessage(element) {
                element.parentElement.style.display = 'none';
            }
        </script>
    </head>

    <body>
        @if (session('success'))
            <div class="w-64 alert alert-success font-medium text-sm bg-green-300 text-black text-center">
                {{ session('success') }}
                <button onclick="closeMessage(this)"
                    class="top-0 right-0 mt-1 mb-1 ml-1.5 text-red-500 text-lg font-bold">&times;</button>
            </div>
        @endif

        @if (session('updated'))
            <div class="w-64 alert alert-success font-medium text-sm bg-green-300 text-black text-center">
                {{ session('updated') }}
                <button onclick="closeMessage(this)"
                    class="top-0 right-0 mt-1 mb-1 ml-1.5 text-red-500 text-lg font-bold">&times;</button>
            </div>
        @endif

        @if (session('deleted'))
            <div class="w-64 alert alert-success font-medium text-sm bg-green-300 text-black text-center">
                {{ session('deleted') }}
                <button onclick="closeMessage(this)"
                    class="top-0 right-0 mt-1 mb-1 ml-1.5 text-red-500 text-lg font-bold">&times;</button>
            </div>
        @endif

        <div class="container mx-auto px-8">
            <table class="w-3/4 mx-auto">
                <thead>
                    <tr>
                        <th class=" px-4 pb-1">Bilik / Dewan</th>
                        <th class=" px-4 pb-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <x-table-style>{{ $room->name }}</x-table-style>
                            <x-table-style>
                                <a href="{{ route('meeting.room', $room->name) }}"
                                    class=" text-blue-600 font-bold">Lihat</a>
                            </x-table-style>
                        </tr>
                    @endforeach

                    @if (session('error'))
                        <p class="text-red-500 text-center mt-2">{{ session('error') }}</p>
                    @endif


                </tbody>
            </table>
        </div>
    </body>

    </html>
</x-layout>
