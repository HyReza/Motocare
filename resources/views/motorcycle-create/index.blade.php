<x-layout>
    <div class="flex justify-center items-center m-4">
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-3xl">
            <h2 class="text-2xl font-bold mb-6 text-center text-white">Tambah Motor</h2>

            @if (session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('motorcycle.store') }}" method="POST" enctype="multipart/form-data"
                id="motorcycle-form">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-300 mb-2" for="owner_name">Nama Pemilik</label>
                        <input type="text" name="owner_name" id="owner_name" required
                            class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2" for="brand">Merek</label>
                        <input type="text" name="brand" id="brand" required
                            class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2" for="model">Model</label>
                        <input type="text" name="model" id="model" required
                            class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2" for="type">Tipe</label>
                        <select name="type" id="type" required
                            class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>Pilih Tipe Motor</option>
                            <option value="Motor Kopling">Motor Kopling</option>
                            <option value="Motor Matic">Motor Matic</option>
                            <option value="Motor Gigi">Motor Gigi</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2" for="number_plate">Plat Nomor</label>
                        <input type="text" name="number_plate" id="number_plate" required
                            class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2" for="first_kilometer">Kilometer Awal</label>
                        <input type="number" name="first_kilometer" id="first_kilometer" required min="0"
                            class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2" for="last_kilometer">Kilometer Terakhir</label>
                        <input type="number" name="last_kilometer" id="last_kilometer" required min="0"
                            class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-gray-300 mb-2" for="picture">Gambar Motor</label>
                        <input type="file" name="picture" id="picture"
                            class="w-full text-gray-300 bg-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            accept="image/*">
                    </div>
                </div>
                <!-- Image Preview Section -->
                <div class="mt-6 hidden" id="img-preview">
                    <div class="w-full h-64 bg-gray-700 rounded flex items-center justify-center">
                        <img id="image-preview" src="#" alt="Preview Gambar"
                            class="hidden max-h-full max-w-full rounded">
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded transition duration-300">
                        Tambah Motor
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk Preview Gambar dan SweetAlert -->
    <script>
        // Preview Gambar
        document.getElementById('picture').addEventListener('change', function(event) {
            const preview = document.getElementById('img-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.classList.add('hidden');
            }
        });
        document.getElementById('picture').addEventListener('change', function(event) {
            const preview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.classList.add('hidden');
            }
        });

        // SweetAlert Konfirmasi
        document.getElementById('motorcycle-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form submit secara default

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan menambahkan data motor ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Tambah!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, submit form
                    this.submit();
                }
            });
        });
    </script>
</x-layout>
