<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direction = 'asc';
        $projects = Project::orderBy('id', $direction)->paginate(10);
        return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function orderBy($direction)
    {
        $direction = $direction === 'asc' ? 'desc' : 'asc';
        $projects = Project::orderBy('id', $direction)->paginate(10);
        return view('admin.projects.index', compact('projects', 'direction'));
    }

    // public function technologiesProject() {
    //     $technologies = Technology::all();

    //     //incompleto
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_type = Type::all();
        $project_technology = Technology::all();

        return view('admin.projects.create', compact('project_type', 'project_technology'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();

        $form_data['slug'] = Project::generateSlug($form_data['name']);

        if(array_key_exists('image', $form_data)) {

            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

            $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
        }

        $new_project = new Project();

        $new_project->fill($form_data);

        $new_project->save();

        if (array_key_exists('technologies', $form_data)) {
            $new_project->technologies()->attach($form_data['technologies']);
        }

        return redirect()->route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project_type = Type::all();
        return view('admin.projects.show', compact('project', 'project_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project_type = Type::all();
        $project_technology = Technology::all();

        return view('admin.projects.edit', compact('project', 'project_type', 'project_technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();

        if($form_data['name'] !== $project->name){
            $form_data['slug'] = Project::generateSlug($form_data['name']);
        }else{
            $form_data['slug'] = $project->slug;
        }

        if(array_key_exists('image', $form_data)) {

            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

            $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
        }

        if (array_key_exists('technologies', $form_data)) {
            $project->technologies()->sync($form_data['technologies']);
        }else{
            $project->technologies()->detach();
        }

        $project->update(($form_data));

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('deleted', "The Project '$project->name' <- has been succesfully deleted");
    }
}
