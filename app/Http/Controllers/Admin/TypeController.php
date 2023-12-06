<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Functions\Helper;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::orderBy('id','DESC')->paginate(10);
        return view('admin.types.index', compact('types'));
    }

    public function typeProject(){
        $types = Type::all();
        return view('admin.types.type-project', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $exists = Type::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->back()->with('error', 'Tipo già esistente');
        }
        else{
            $new_type = new Type();
            $new_type->name = $request->name;
            $new_type->slug = Helper::generateSlug($request->name, Type::class);
            $new_type->save();
            return redirect()->back()->with('success', 'Tipo creato con successo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:100',
        ],[
            'name.required' => 'Devi inserire il nome della categoria',
            'name.min' => 'Il nome della categoria deve essere minimo 2 caratteri',
            'name.max' => 'Il nome della categoria deve essere massimo 20 caratteri'
        ]);

        // 2.
        $exixts = Type::where('name', $request->name)->first();
        if($exixts){
            return redirect()->back()->with('error', 'Tipo già presente');
        }

        // 3.
        $val_data['slug'] = Helper::generateSlug($request->name, Type::class);

        // 4.
        $type->update($val_data);

        // 5.
        return redirect()->back()->with('success', 'Tipo aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->back()->with('deleted', "Il tipo $type->name è stato eliminato correttamente!");
    }
}
