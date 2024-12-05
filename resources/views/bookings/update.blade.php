<x-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <x-slot:heading>
            Update Bookings
        </x-slot:heading>
    </head>

    <body>
        <div class="container mx-auto mt-1">
            <form class="px-1" action="{{ route('booking.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4 w-1/2">
                    <label for="department_name" class="block text-sm font-medium">Nama Jabatan</label>
                    <select name="department_name" id="department_name"
                        class="mt-1 block w-full border-gray-300 rounded-md">
                        <option value="Jabatan Teknologi Maklumat"
                            {{ $booking->department_name == 'Jabatan Teknologi Maklumat' ? 'selected' : '' }}>Jabatan
                            Teknologi Maklumat</option>
                        <option value="Jabatan Khidmat Pengurusan"
                            {{ $booking->department_name == 'Jabatan Khidmat Pengurusan' ? 'selected' : '' }}>Jabatan
                            Khidmat Pengurusan</option>
                        <option value="Jabatan Perancangan Korporat"
                            {{ $booking->department_name == 'Jabatan Perancangan Korporat' ? 'selected' : '' }}>Jabatan
                            Perancangan Korporat</option>
                        <option value="Jabatan Perbendaharaan"
                            {{ $booking->department_name == 'Jabatan Perbendaharaan' ? 'selected' : '' }}>Jabatan
                            Perbendaharaan</option>
                        <option value="Jabatan Perakaunan"
                            {{ $booking->department_name == 'Jabatan Perakaunan' ? 'selected' : '' }}>Jabatan Perakaunan
                        </option>
                        <option value="Jabatan Kawalan Pembangunan"
                            {{ $booking->department_name == 'Jabatan Kawalan Pembangunan' ? 'selected' : '' }}>Jabatan
                            Kawalan Pembangunan</option>
                        <option value="Jabatan Kerja dan Bangunan"
                            {{ $booking->department_name == 'Jabatan Kerja dan Bangunan' ? 'selected' : '' }}>Jabatan
                            Kerja dan Bangunan</option>
                        <option value="Jabatan Perkhidmatan Komuniti"
                            {{ $booking->department_name == 'Jabatan Perkhidmatan Komuniti' ? 'selected' : '' }}>Jabatan
                            Perkhidmatan Komuniti</option>
                        <option value="Jabatan Kesihatan Persekitaran"
                            {{ $booking->department_name == 'Jabatan Kesihatan Persekitaran' ? 'selected' : '' }}>
                            Jabatan Kesihatan Persekitaran</option>
                        <option value="Jabatan Pelesenan"
                            {{ $booking->department_name == 'Jabatan Pelesenan' ? 'selected' : '' }}>Jabatan Pelesenan
                        </option>
                        <option value="Jabatan Pengurusan Fakulti"
                            {{ $booking->department_name == 'Jabatan Pengurusan Fakulti' ? 'selected' : '' }}>Jabatan
                            Pengurusan Fakulti</option>
                        <option value="Jabatan Penilaian dan Pengurusan Harta"
                            {{ $booking->department_name == 'Jabatan Penilaian dan Pengurusan Harta' ? 'selected' : '' }}>
                            Jabatan Penilaian dan Pengurusan Harta</option>
                        <option value="Jabatan Perancangan Bandar"
                            {{ $booking->department_name == 'Jabatan Perancangan Bandar' ? 'selected' : '' }}>Jabatan
                            Perancangan Bandar</option>
                        <option value="Jabatan Perkhidmatan Perbandaran"
                            {{ $booking->department_name == 'Jabatan Perkhidmatan Perbandaran' ? 'selected' : '' }}>
                            Jabatan Perkhidmatan Perbandaran</option>
                        <option value="Jabatan Taman dan Landskap"
                            {{ $booking->department_name == 'Jabatan Taman dan Landskap' ? 'selected' : '' }}>Jabatan
                            Taman dan Landskap</option>
                    </select>
                </div>
                <div class="mb-4 w-1/2">
                    <label for="meeting_room" class="block text-sm font-medium">Bilik Mesyuarat</label>
                    <input type="text" name="meeting_room" id="meeting_room" value="{{ $booking->meeting_room }}"
                        readonly class="mt-1 block w-full border-gray-300 rounded-md">
                </div>
                <div class="mb-4 w-1/2">
                    <label for="booking_date" class="block text-sm font-medium">Tarikh</label>
                    <input type="date" name="booking_date" id="booking_date" value="{{ $booking->booking_date }}"
                        class="mt-1 block w-full border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4 w-1/2">
                    <label for="booking_time" class="block text-sm font-medium">Mula</label>
                    <input type="time" name="booking_time" id="booking_time" value="{{ $booking->booking_time }}"
                        class="mt-1 block w-full border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4 w-1/2">
                    <label for="end_time" class="block text-sm font-medium">Hingga</label>
                    <input type="time" name="end_time" id="end_time" value="{{ $booking->end_time }}"
                        class="mt-1 block w-full border-gray-300 rounded-md" required>
                </div>
                <a href="{{ route('meeting.room', $booking->meeting_room) }}"
                    class="mt-4 inline-block bg-red-500 text-white px-4 py-2 rounded">Kembali</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ubah Tempahan</button>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger text-red-600 font-bold text-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </body>

    </html>
</x-layout>
