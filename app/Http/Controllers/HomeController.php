<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Project;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(6);
        return Inertia::render('Home/Index', ['projects' => $projects]);
    }

}
