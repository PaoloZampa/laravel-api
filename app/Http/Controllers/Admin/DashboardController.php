<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class DashboardController extends Controller
{
    public function index()
    {
        $project = Project::orderByDesc("id")->get();
        $type = Type::orderByDesc("id")->get();
        $technology = Technology::orderByDesc("id")->get();
        return view('admin.dashboard', compact('project', 'type', 'technology'));
    }
}
