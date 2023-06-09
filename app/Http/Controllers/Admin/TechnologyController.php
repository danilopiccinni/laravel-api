<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validatorDataForm($request);

        $formData = $request->all();

        $newTechnology = new Technology();

        $newTechnology->name = $formData['name'];
        $newTechnology->description = $formData['description'];
        $newTechnology->color = $formData['color'];
        $newTechnology->slug = Str::slug($formData['name'], '-');

        $newTechnology->save();



        return redirect()->route('admin.technologies.show' , $newTechnology);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
       return view('admin.technologies.edit' , compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $this->validatorDataForm($request);
        
        $formData = $request->all();

        $technology->slug = Str::slug($formData['name'], '-');
        
        $technology->update($formData);

        return redirect()->route('admin.technologies.show' , $technology);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }

    private function validatorDataForm($request) {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'name' => 'required|max:255',
            'description' => 'required',
            'color' => 'nullable'
        ],[
            'name.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'name.max' => 'Il nome deve cotenere massimo :max caratteri',
            'description.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
        ])->validate();

        return $validator;

    }
}
