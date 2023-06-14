<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Policies\TechnologyPolicy;
use Illuminate\Support\Str;
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
        $projects = Project::orderByDesc("id")->get();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $technologies = Technology::orderByDesc("id")->get();
        $types = Type::orderByDesc("id")->get();
        return view("admin.projects.create", compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($val_data['name'], '-');
        $val_data["repo"] = Project::linkGenerator($val_data["name"]);
        $img_path = Storage::put("uploads", $val_data["image"]);
        $val_data["image"] = $img_path;
        $new_project = Project::create($val_data);
        if($request["technologies"]){
            $new_project->technologies()->attach($val_data["technologies"]);
        } else {
            $new_project->technologies()->attach([]);
        }
        return to_route('admin.projects.index')->with("added", "repository $request->name successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $projects = Project::orderByDesc("id")->get();
        $types = Type::orderByDesc("id")->get();
        $technologies = Technology::orderByDesc("id")->get();
        return view("admin.projects.show", compact("project", "types", "technologies"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $projects = Project::orderByDesc("id")->get();
        $types = Type::orderByDesc("id")->get();
        $technologies = Technology::orderByDesc("id")->get();
        return view("admin.projects.edit", compact("project", "types", "technologies"));
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
        $val_data = $request->validated();
        $val_data["repo"] = Project::linkGenerator($val_data["name"]);
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            // Save the file in the storage and get its path
            $image_path = Storage::put('uploads', $request->image);
            //dd($image_path);
            $val_data['image'] = $image_path;
        }
        $project->update($val_data);
        if($request["technologies"]){
            $project->technologies()->sync($val_data["technologies"]);
        } else {
            $project->technologies()->sync([]);
        }
        return to_route("admin.projects.show", $project)->with("edited", "repository $request->name successfully edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->image){
            Storage::delete($project->image);
        }
        $project->delete();
        return to_route("admin.projects.index")->with("deleted", "repository $project->name successfully deleted");
    }
}
