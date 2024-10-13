<?php

namespace App\Http\Controllers;

use App\Models\Motorcycles;
use App\Http\Requests\StoreMotorcyclesRequest;
use App\Http\Requests\UpdateMotorcyclesRequest;
use Illuminate\Http\Request;

class MotorcyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motorcycles = Motorcycles::orderBy('created_at', 'desc')->paginate(6);
        return view('motorcycle-list.index', compact('motorcycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('motorcycle-create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'type' => 'required|in:Motor Kopling,Motor Matic,Motor Gigi',
            'number_plate' => 'required|string|max:255',
            'first_kilometer' => 'required|integer|min:0',
            'last_kilometer' => 'required|integer|min:0|gte:first_kilometer',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $motorcycle = new Motorcycles();
        $motorcycle->owner_name = $validated['owner_name'];
        $motorcycle->brand = $validated['brand'];
        $motorcycle->model = $validated['model'];
        $motorcycle->type = $validated['type'];
        $motorcycle->number_plate = $validated['number_plate'];
        $motorcycle->first_kilometer = $validated['first_kilometer'];
        $motorcycle->last_kilometer = $validated['last_kilometer'];


        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('motorcycles'), $fileName);
            $motorcycle->picture = $fileName;
        }

        $motorcycle->save();

        return redirect()->route('motorcycle.create')->with('success', 'Data motor berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $motorcycle = Motorcycles::findOrFail($id);


        $needsService = $this->checkIfServiceNeeded($motorcycle->first_kilometer, $motorcycle->last_kilometer);


        $nextServiceKilometer = $this->predictNextService($motorcycle->last_kilometer);

        return view('motorcycle-show.index', compact('motorcycle', 'needsService', 'nextServiceKilometer'));
    }

    private function checkIfServiceNeeded($firstKilometer, $lastKilometer)
    {
        $kilometerDifference = $lastKilometer - $firstKilometer;


        return $kilometerDifference >= 5000;
    }

    private function predictNextService($lastKilometer)
    {

        $serviceInterval = 5000;


        $nextServiceKilometer = ceil($lastKilometer / $serviceInterval) * $serviceInterval;

        return $nextServiceKilometer;
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motorcycles $motorcycles)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotorcyclesRequest $request, Motorcycles $motorcycles)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motorcycles $motorcycles)
    {
        abort(404);
    }
}
