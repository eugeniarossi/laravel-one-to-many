<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated(); // prende i dati validati
        $project = new Project(); // prende il model di project

        if(isset($data['image'])){ 
            $path_img = Storage::put('uploads', $data['image']);
            $project->image = $path_img;
        }

        $project->fill($data); // filla il model con i dati validati

        // generare slug
        $project->slug = Str::slug($project->title, '-');
        $project->save(); // devo salvare lo slug perchè è guarded

        return redirect()->route('admin.projects.index')->with('message', "Project created successfully");
        // usiamo redirect invece che restituire una view, perchè stiamo facendo un post verso una pagina
        // salva qualcosa ma non restituisvce nulla
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    
    //public function show(string $slug)
    //{
    //    $project = Project::where('slug', $slug)->first(); // se usassi get invece che first otterrei una collection

    // return view('admin.projects.show', compact('project'));
    //}

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated(); // prende i dati validati

        $project->update($data); // aggiorna i dati

        // generare slug
        $project->slug = Str::slug($project->title, '-');

        //gestisco l'immagine
        if (isset($data['image'])) {
            if ($project->image) {
                Storage::delete($project->image);
            }

            $project->image = Storage::put('uploads', $data['image']);
        } else if (empty($data['image'])) {
            if ($project->image) {
                Storage::delete($project->image);
                $project->image = null;
            }
        }

        $project->save(); // devo salvare lo slug perchè è guarded

        return redirect()->route('admin.projects.index')->with('message', "Project $project->title updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $old_title = $project->title; // salvo il titolo per poterlo richiamare nel message
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', "Project $old_title deleted successfully");
    }
}
