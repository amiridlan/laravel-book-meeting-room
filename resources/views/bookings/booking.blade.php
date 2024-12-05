<x-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <x-slot:heading>
            Tempah {{ $room }}
        </x-slot:heading>
    </head>

    <body>
        <div class="container mx-auto mt-1">
            <form class="px-1" action="{{ route('booking.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="meeting_room" class="block mb-2 text-sm font-medium">Bilik Mesyuarat</label>
                    <input type="text" name="meeting_room" id="meeting_room" value="{{ $room }}" readonly
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="" />
                </div>

                <div class="mb-6">
                    <label for="department_name" class="block text-sm font-medium">Jabatan</label>
                    <select name="department_name" id="department_name"
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="Jabatan Teknologi Maklumat">Jabatan Teknologi Maklumat</option>
                        <option value="Jabatan Khidmat Pengurusan">Jabatan Khidmat Pengurusan</option>
                        <option value="Jabatan Perancangan Korporat">Jabatan Perancangan Korprorat</option>
                        <option value="Jabatan Perbendaharaan">Jabatan Perbendaharaan</option>
                        <option value="Jabatan Perakaunan">Jabatan Perakaunan</option>
                        <option value="Jabatan Kawalan Pembangunan">Jabatan Kawalan Pembangunan</option>
                        <option value="Jabatan Kerja dan Bangunan">Jabatan Kerja dan Bangunan</option>
                        <option value="Jabatan Perkhidmatan Komuniti">Jabatan Perkhidmatan Komuniti</option>
                        <option value="Jabatan Kesihatan Persekitaran">Jabatan Kesihatan Persekitaran</option>
                        <option value="Jabatan Pelesenan">Jabatan Pelesenan</option>
                        <option value="Jabatan Pengurusan Fakulti">Jabatan Pengurusan Fakulti</option>
                        <option value="Jabatan Penilaian dan Pengurusan Harta">Jabatan Penilaian dan Pengurusan Harta
                        </option>
                        <option value="Jabatan Perancangan Bandar">Jabatan Perancangan Bandar</option>
                        <option value="Jabatan Perkhidmatan Perbandaran">Jabatan Perkhidmatan Perbandaran</option>
                        <option value="Jabatan Taman dan Landskap">Jabatan Taman dan Landskap</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="booking_date" class="block mb-2 text-sm font-medium">Tarikh</label>
                    <input type="date" name="booking_date" id="booking_date"
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required />
                </div>

                <div class="mb-6">
                    <label for="booking_time" class="block mb-2 text-sm font-medium">Masa Mula</label>
                    <input type="time" name="booking_time" id="booking_time"
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required />
                </div>

                <div class="mb-6">
                    <label for="end_time" class="block mb-2 text-sm font-medium">Hingga</label>
                    <input type="time" name="end_time" id="end_time"
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required />
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tempah</button>
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
