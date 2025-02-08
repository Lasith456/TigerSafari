<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Edit Safari</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">
        <form method="POST" action="{{ route('safaris.update', $safari->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div>
                <x-label for="name" value="Safari Name" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" value="{{ $safari->name }}" autofocus placeholder="Enter safari name"/>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Description Field -->
            <div>
                <x-label for="description" value="Description" />
                <textarea id="description" name="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4">{{ $safari->description }}</textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Price Field -->
            <div>
                <x-label for="price" value="Price (Lkr)" />
                <x-input id="price" class="block w-full mt-1" type="number" name="price" value="{{ $safari->price }}" placeholder="Enter safari price"/>
                @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Date Field -->
            <div>
                <x-label for="date" value="Safari Date" />
                <x-input id="date" class="block w-full mt-1" type="date" name="date" value="{{ $safari->date }}" />
                @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Pickup Location Field -->
            <div>
                <x-label for="pickup_location" value="Pickup Location" />
                <x-input id="pickup_location" class="block w-full mt-1" type="text" name="pickup_location" value="{{ $safari->pickup_location }}"  placeholder="Enter pickup location"/>
                @error('pickup_location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Dropoff Location Field -->
            <div>
                <x-label for="dropoff_location" value="Dropoff Location" />
                <x-input id="dropoff_location" class="block w-full mt-1" type="text" name="dropoff_location" value="{{ $safari->dropoff_location }}" placeholder="Enter dropoff location"/>
                @error('dropoff_location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Contact Number Field -->
            <div>
                <x-label for="contact_number" value="Contact Number" />
                <x-input id="contact_number" class="block w-full mt-1" type="text" name="contact_number" value="{{ $safari->contact_number }}" placeholder="Enter contact number"/>
                @error('contact_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Car Number Field -->
            <div>
                <x-label for="car_number" value="Car Number" />
                <x-input id="car_number" class="block w-full mt-1" type="text" name="car_number" value="{{ $safari->car_number }}" placeholder="Enter car number"/>
                @error('car_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Jeep Number Field -->
            <div>
                <x-label for="jeep_number" value="Jeep Number" />
                <x-input id="jeep_number" class="block w-full mt-1" type="text" name="jeep_number" value="{{ $safari->jeep_number }}"  placeholder="Enter jeep number"/>
                @error('jeep_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Pickup Time Field -->
            <div>
                <x-label for="pickup_time" value="Pickup Time" />
                <x-input id="pickup_time" class="block w-full mt-1" type="time" name="pickup_time" value="{{ $safari->pickup_time }}" />
                @error('pickup_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <x-button class="ml-3 bg-indigo-600 hover:bg-indigo-700">
                    Update Safari
                </x-button>
            </div>
        </form>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mt-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-app-layout>
