<x-layout>
    <div class="mx-4">
        <div class="grid grid-cols-12 gap-8 m-4">
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 2000
                    });
                </script>
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
            @if ($motorcycles->isEmpty())
                <div class="col-span-12">
                    <div class="text-center text-gray-400 bg-gray-800 px-8 py-10 rounded-md">
                        <p class="text-lg">No motorcycles found. The data hasn't been created yet.</p>
                    </div>
                </div>
            @else
                @foreach ($motorcycles as $motorcycle)
                    <div class="col-span-12 md:col-span-4 lg:col-span-4">
                        <article class="overflow-hidden rounded-lg border border-gray-700 bg-gray-800 shadow-sm">
                            <img alt="Motorcycle Image" src="{{ asset('motorcycles/' . $motorcycle->picture) }}"
                                class="h-56 w-full object-cover" />

                            <div class="p-4 sm:p-6">
                                <a href="#">
                                    <h3 class="text-lg font-medium text-white">
                                        {{ $motorcycle->brand }} - {{ $motorcycle->model }}
                                    </h3>
                                </a>

                                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-300">
                                    Owner: {{ $motorcycle->owner_name }} <br>
                                    Type: {{ $motorcycle->type }} <br>
                                    Number Plate: {{ $motorcycle->number_plate }}
                                </p>

                                <a href="{{ route('motorcycle.show', $motorcycle->id) }}"
                                    class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-400">
                                    Details
                                    <span aria-hidden="true"
                                        class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                                        &rarr;
                                    </span>
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Pagination -->
        @if ($motorcycles->hasPages())
            <div class="mt-8 flex justify-center">
                {{ $motorcycles->links('vendor.pagination.default') }}
            </div>
        @endif
    </div>
</x-layout>
