<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Project;
use Inertia\Inertia;


class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::paginate(10);

        return Inertia::render('Project/Index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return Inertia::render('Project/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'languages_used' => 'required',
            'image_path' => 'required|image|max:1024', // Tamanho máximo de 1MB
        ]);

        $imagePath = $request->file('image_path')->store('public', 'public');

        $project = Project::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'languages_used' => $validatedData['languages_used'],
            'image_path' => $imagePath
        ]);

        return Redirect::route('projects')->with('success', 'Projeto criado.');
    }

    public function edit(Project $project)
    {
        return Inertia::render('Project/Edit', [
            'project' => [
                'id' => $project->id,
                'name' => $project->name,
                'description' => $project->description,
                'languages_used' => $project->languages_used,
                'image_path' => $project->image_path,
            ]
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:50'],
            'description' => 'required',
            'languages_used' => 'required'
        ]);
    
        // Verifique se foi enviada uma nova imagem
        if ($request->photo) {
            // Salve a nova imagem e atualize o caminho no banco de dados
            $imagePath = $request->file('photo')->store('public', 'public');
            $validatedData['photo'] = $imagePath;
        }
        $project->update($validatedData);
    
        return redirect()->route('projects')->with('success', 'Projeto atualizado.');
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects')->with('success', 'Projeto excluido.');
    }
}
