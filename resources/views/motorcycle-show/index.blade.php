<x-layout>
    <div class="min-h-screen bg-gray-900 text-white flex justify-center items-center p-6">
        <div class="w-full max-w-3xl bg-gray-800 rounded-lg shadow-lg p-8">
            <h2 class="text-4xl font-bold text-center mb-10">Detail Motor</h2>

            <!-- Section Gambar Motor -->
            <div class="mb-8">
                <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ asset('motorcycles/' . $motorcycle->picture) }}" alt="Motorcycle Image"
                        class="w-full h-64 object-cover" />
                </div>
            </div>

            <!-- Section Detail Motor -->
            <div class="space-y-6">
                <!-- Card Detail -->
                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Pemilik:</h3>
                    <p class="text-lg text-gray-300">{{ $motorcycle->owner_name }}</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Merek:</h3>
                    <p class="text-lg text-gray-300">{{ $motorcycle->brand }}</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Model:</h3>
                    <p class="text-lg text-gray-300">{{ $motorcycle->model }}</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Tipe:</h3>
                    <p class="text-lg text-gray-300">{{ $motorcycle->type }}</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Plat Nomor:</h3>
                    <p class="text-lg text-gray-300">{{ $motorcycle->number_plate }}</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Kilometer Awal:</h3>
                    <p class="text-lg text-gray-300">{{ $motorcycle->first_kilometer }} km</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Kilometer Terakhir:</h3>
                    <p class="text-lg text-gray-300">{{ $motorcycle->last_kilometer }} km</p>
                </div>

                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Status Servis:</h3>
                    @if ($needsService)
                        <p class="text-red-500 font-bold">Perlu servis!</p>
                    @else
                        <p class="text-green-500 font-bold">Tidak perlu servis</p>
                    @endif
                </div>

                <div class="bg-gray-900 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-3">Prediksi Servis Berikutnya:</h3>
                    <p class="text-yellow-400 font-bold">{{ $nextServiceKilometer }} km</p>
                </div>
            </div>

            <div class="mt-8 text-center space-x-4 flex justify-center">
                <!-- Tombol Kembali -->
                <a href="{{ route('motorcycle.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Kembali ke Daftar Motor
                </a>

                <!-- Tombol Edit -->
                <a href="{{ route('motorcycle.edit', $motorcycle->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                    Edit
                </a>

                <!-- Tombol Hapus dengan SweetAlert -->
                <button type="button" onclick="confirmDelete({{ $motorcycle->id }})"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg">
                    Hapus
                </button>

                <!-- Form Hapus (Disembunyikan) -->
                <form id="delete-form-{{ $motorcycle->id }}"
                    action="{{ route('motorcycle.destroy', $motorcycle->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</x-layout>
