<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Safari Management System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-gray-700">
                
                <!-- System Description -->
                <h3 class="text-lg font-semibold mb-2">About the System</h3>
                <p class="mb-4">
                    The <strong>Safari Management System</strong> is designed to help users efficiently manage safari tours. 
                    This platform allows administrators to add, edit, and delete safari packages while providing users with an easy way to browse and book safaris.
                </p>

                <h3 class="text-lg font-semibold mb-2">Key Features</h3>
                <ul class="list-disc pl-5 space-y-2">
                    <li>✅ Create and manage safari packages with detailed information.</li>
                    <li>✅ View and edit existing safaris with an intuitive interface.</li>
                    <li>✅ Manage bookings and pricing efficiently.</li>
                    <li>✅ User-friendly dashboard for both administrators and Other workers.</li>
                </ul>

                <h3 class="text-lg font-semibold mt-4 mb-2">Get Started</h3>
                <p>
                    Use the navigation menu to explore the system and manage your safari packages. 
                    Click <a href="{{ route('safaris.index') }}" class="text-indigo-600 hover:underline">here</a> to view all available safaris.
                </p>
                
            </div>
        </div>
    </div>
</x-app-layout>
