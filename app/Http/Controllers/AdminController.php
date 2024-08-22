<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Auth;

class AdminController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle the admin login process
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Check if the user is an admin
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.blogs.index'); // Redirect to the CRUD page
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors(['You do not have admin access.']);
            }
        }
    
        return redirect()->route('admin.login')->withErrors(['Login failed. Please check your credentials.']);
    }

    // Show the admin dashboard
    public function dashboard()
    {
        $blogs = Blog::all();
        return view('admin.dashboard', compact('blogs'));
    }

    // Show all blog posts (index page for CRUD operations)
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    // Show the form to create a new blog post
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    // Store a new blog post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'category_id' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index'); // Redirect to the index page after storing
    }

    // Show the form to edit an existing blog post
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    // Update an existing blog post
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
            'category_id' => '',
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            // Handle file upload
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index'); // Redirect to the index page after updating
    }

    // Delete a blog post
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index'); // Redirect to the index page after deletion
    }
}
