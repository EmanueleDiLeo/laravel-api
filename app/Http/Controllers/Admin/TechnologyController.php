<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnologyRequest;
use App\Models\Technology;
use App\Functions\Helper;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::orderBy('id')->paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }

    public function projectsTecnologies(Technology $technology){
        return view('admin.technologies.technology-projects', compact('technology'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Inserisci una nuova tecnologia';
        $method = 'POST';
        $route = route('admin.technologies.store');
        $technology = null;
        return view('admin.technologies.create-edit', compact('title','method', 'route', 'technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Helper::generateSlug($form_data['name'], Technology::class);
        $new_technology = Technology::create($form_data);
        return redirect()->route('admin.technologies.show' , $new_technology);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        $title = 'Modifica tecnologia';
        $method = 'PUT';
        $route = route('admin.technologies.update', $technology);
        return view('admin.technologies.create-edit', compact('title','method', 'route', 'technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechnologyRequest $request, Technology $technology)
    {
        $form_data = $request->all();
        if($form_data['name']!= $technology->name){
            $form_data['slug'] = Helper::generateSlug($form_data['name'], Technology::class);
        }else{
            $form_data['slug'] = $technology->slug;
        }
        $technology->update($form_data);
        return redirect()->route('admin.technologies.show', $technology);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('deleted', "La tecnologia $technology->name è stata eliminata correttamente!");
    }
}
