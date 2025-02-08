<?php

namespace App\Http\Controllers;

use App\Models\Safari;
use Illuminate\Http\Request;

class SafariController extends Controller
{

    public function index(Request $request)
    {
        // Get search query from request
        $search = $request->input('search');
    
        // Fetch safaris with pagination and filtering
        $safaris = Safari::where('name', 'LIKE', "%{$search}%")
                        ->orWhere('contact_number', 'LIKE', "%{$search}%")
                        ->paginate(10); // Show 10 records per page
    
        // Pass search term and paginated data to the view
        return view('safaris.index', compact('safaris', 'search'));
    }
    
    public function create()
    {
        return view('safaris.create');
    }

    // ✅ Store new safari
    public function store(Request $request)
{
    $request->validate([
        'description' => 'nullable|string',
        'price' => 'nullable|numeric|min:0',
        'date' => 'nullable|date',
        'pickup_location' => 'nullable|string|max:255',
        'dropoff_location' => 'nullable|string|max:255',
        'contact_number' => 'nullable|string|max:20',
        'car_number' => 'nullable|string|max:50',
        'jeep_number' => 'nullable|string|max:50',
        'pickup_time' => 'nullable|date_format:H:i',
    ]);

       // Auto-generate a unique safari name
       $generatedName = 'Safari-' . now()->format('YmdHis') . '-' . mt_rand(1000, 9999);
    
       // Store data in the database
       Safari::create(array_merge($request->all(), ['name' => $generatedName]));
   
       return redirect()->route('safaris.index')->with('success', 'Safari created successfully with auto-generated name: ' . $generatedName);
}

    
    // ✅ Show edit form
    public function edit($id)
    {
        $safari = Safari::findOrFail($id);
        return view('safaris.edit', compact('safari'));
    }

    // ✅ Update safari
    public function update(Request $request, $id)
    {
        $safari = Safari::findOrFail($id);

        $request->validate([
            'description' => 'nullable | string',
            'price' => 'nullable|numeric|min:0',
            'date' => 'nullable|date',
            'pickup_location' => 'nullable|string|max:255',
            'dropoff_location' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'car_number' => 'nullable|string|max:50',
            'jeep_number' => 'nullable|string|max:50',
            'pickup_time' => 'nullable|date_format:H:i',
        ]);

        $safari->update($request->all());

        return redirect()->route('safaris.index')->with('success', 'Safari updated successfully!');
    }

    // ✅ Delete safari
    public function destroy($id)
    {
        $safari = Safari::findOrFail($id);
        $safari->delete();

        return redirect()->route('safaris.index')->with('success', 'Safari deleted successfully!');
    }
}
