<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Safari List</h2>
    </x-slot>

    <!-- Success Message -->
    @if (session('success'))
        <div 
            id="success-message"
            class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md transition-opacity duration-300"
        >
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('success-message').style.display = 'none';
            }, 5000);
        </script>
    @endif

    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
        <div class="flex justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-700">All Safaris</h3>

            <!-- Add Safari Button -->
            <a href="{{ route('safaris.create') }}" 
               class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                + Add Safari
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('safaris.index') }}" class="mb-4">
            <div class="flex items-center space-x-2 mb-4">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search by Name, Date or Contact Number..."
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300 w-full">
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-700">
                    Search
                </button>
            </div>
        </form>

        @if ($safaris->isEmpty())
            <div class="text-center p-6 bg-gray-100 rounded-lg">
                <p class="text-lg text-gray-600">No safaris available. Click "Add Safari" to create a new one.</p>
            </div>
        @else
            <!-- Table with pagination -->
            <div class="w-full overflow-auto">
                <table class="min-w-full border border-gray-300 rounded-lg shadow-md">
                    <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
                        <tr>
                            <th class="px-6 py-3 text-left border-b">Name</th>
                            <th class="px-6 py-3 text-left border-b">Date</th>
                            <th class="px-6 py-3 text-left border-b">Contact Number</th>
                            <th class="px-6 py-3 text-center border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($safaris as $safari)
                            <tr class="hover:bg-gray-100 transition">
                                <!-- Name column with modal trigger -->
                                <td class="border px-6 py-3 text-blue-600 underline cursor-pointer open-modal"
                                    data-modal="modal-{{ $safari->id }}">
                                    {{ $safari->name ?? '-' }}
                                </td>

                                <!-- Date Column -->
                                <td class="border px-6 py-3">{{ $safari->date ?? '-' }}</td>

                                <!-- Contact Number Column -->
                                <td class="border px-6 py-3">{{ $safari->contact_number ?? '-' }}</td>

                                <!-- Action Buttons -->
                                <td class="border px-6 py-3 text-center">
                                    <a href="{{ route('safaris.edit', $safari->id) }}" 
                                       class="px-3 py-1 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('safaris.destroy', $safari->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                            class="px-3 py-1 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Popup -->
                            <div id="modal-{{ $safari->id }}" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white p-6 rounded-lg shadow-md w-1/3 relative">
                                    <h3 class="text-lg font-semibold mb-4">Safari Details</h3>
                                    <p><strong>Name:</strong> {{ $safari->name ?? '-' }}</p>
                                    <p><strong>Description:</strong> {{ $safari->description ?? '-' }}</p>
                                    <p><strong>Price:</strong> Lkr.{{ $safari->price ?? '-' }}</p>
                                    <p><strong>Date:</strong> {{ $safari->date ?? '-' }}</p>
                                    <p><strong>Pickup Location:</strong> {{ $safari->pickup_location ?? '-' }}</p>
                                    <p><strong>Dropoff Location:</strong> {{ $safari->dropoff_location ?? '-' }}</p>
                                    <p><strong>Contact Number:</strong> {{ $safari->contact_number ?? '-' }}</p>
                                    <p><strong>Car Number:</strong> {{ $safari->car_number ?? '-' }}</p>
                                    <p><strong>Jeep Number:</strong> {{ $safari->jeep_number ?? '-' }}</p>
                                    <p><strong>Pickup Time:</strong> {{ $safari->pickup_time ?? '-' }}</p>

                                    <!-- Close Button -->
                                    <button class="close-modal absolute top-2 right-2 px-3 py-1 bg-red-600 text-white rounded-lg shadow hover:bg-red-600"
                                            data-modal="modal-{{ $safari->id }}">
                                        close
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $safaris->appends(['search' => request('search')])->links() }}
            </div>
        @endif
    </div>

    <!-- Vanilla JS to Handle Popup Functionality -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Open Modal
            document.querySelectorAll(".open-modal").forEach(button => {
                button.addEventListener("click", function () {
                    let modalId = this.getAttribute("data-modal");
                    document.getElementById(modalId).classList.remove("hidden");
                });
            });

            // Close Modal
            document.querySelectorAll(".close-modal").forEach(button => {
                button.addEventListener("click", function () {
                    let modalId = this.getAttribute("data-modal");
                    document.getElementById(modalId).classList.add("hidden");
                });
            });

            // Close modal when clicking outside of it
            document.querySelectorAll("[id^=modal-]").forEach(modal => {
                modal.addEventListener("click", function (event) {
                    if (event.target === modal) {
                        modal.classList.add("hidden");
                    }
                });
            });
        });
    </script>

</x-app-layout>
