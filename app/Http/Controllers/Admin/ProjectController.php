<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
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

        $newProject = new Project();

        $newProject->title = $formData['title'];
        $newProject->type_id = $formData['type_id'];
        $newProject->repo = $formData['repo'];
        $newProject->description = $formData['description'];
        $newProject->slug = Str::slug($formData['title'], '-');

        if($request->hasFile('thumb')) {

            $path = Storage::put('project_image', $request->thumb);

            $formData['thumb'] = $path;
        }

        $newProject->thumb = $formData['thumb'];

        $newProject->save();

        if(array_key_exists('technologies', $formData)){
            $newProject->technologies()->attach($formData['technologies']);
        }



        return redirect()->route('admin.projects.show' , $newProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.show', compact('project', 'types', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validatorDataForm($request);

        $formData = $request->all();

        if($request->hasFile('thumb')) {

            Storage::delete($project->thumb);

            $path = Storage::put('project_image', $request->thumb);

            $formData['thumb'] = $path;
        }


        $project->slug = Str::slug($formData['title'], '-');

        
        $project->update($formData);

        if(array_key_exists('technologies', $formData)){
            $project->technologies()->sync($formData['technologies']);
        } else {
            $project->technologies()->detach();
        }


        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }



    public function contact() {
        return view('admin.contact');
    }




    private function validatorDataForm($request) {
        $formData = $request->all();

        $validator = Validator::make($formData, [
            'title' => 'required|max:255',
            'repo' => 'required|max:255',
            'description' => 'required|max:1000',
            'thumb' => 'required|image|max:8000',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id',
        ],[
            'title.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'title.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'title.unique' => 'Questo titolo si riferisce a un progetto gia esistente',
            'repo.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'repo.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'description.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'description.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'languages.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'languages.max' => 'Raggiunta lunghezza massima di caratteri, massimo :max',
            'thumb.required' => 'Questo campo è richiesto, non puoi lasciarlo vuoto',
            'thumb.max' => 'Raggiunta grandezza massima del file, massimo :maxkb',
            'type_id.required.exists' => 'Inserisci una tipologia esistente',
            'technologies.exists' => 'insrisci una tipologia esistente'


        ])->validate();

        return $validator;

    }



}
