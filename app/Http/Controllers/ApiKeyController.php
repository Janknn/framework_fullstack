<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = Auth::user()->apiKeys;
        return Inertia::render('ApiKeys/Index', ['apiKeys' => $apiKeys]);
    }

    public function create()
    {
        return Inertia::render('ApiKeys/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $key = Str::random(40);

        Auth::user()->apiKeys()->create([
            'uuid' => (string) Str::uuid(),
            'name' => $request->name,
            'key' => $key,
        ]);

        return redirect()->route('api-keys.index')->with('success', 'API Key created successfully.');
    }

    public function destroy(ApiKey $apiKey)
    {
        $this->authorize('delete', $apiKey);
        $apiKey->delete();
        return redirect()->route('api-keys.index')->with('success', 'API Key deleted successfully.');
    }
}
