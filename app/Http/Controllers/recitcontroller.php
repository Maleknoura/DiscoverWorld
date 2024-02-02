<?php
namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Image;
use App\Models\Recit;
    use Illuminate\Http\Request;

    class recitcontroller extends Controller
    {
    public function create(){
        return view('ajouter');
    }
    public function stati()
    {
        $totalRecits = Recit::count();
        $totalDestinations = Recit::distinct('destination')->count();
        $totalImages = Recit::distinct('image')->count();
    
       
        return view('index', compact('Recit', 'Destination', 'Image'));
    }
    public function store (Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'destinationId' => 'required|numeric',
            'url' => 'required|file',
            ]);
            
    
            if ($request->hasFile('url')) {
                $file = $request->file('url');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads', $filename);
                
            
                $newRecit = Recit::create([
                    'title' => $data['title'],
                    'content' => $data['content'],
                    'destinationId' => $data['destinationId'],
                ]);
                
            
                $newImage = $newRecit->image()->create([
                    'url' => $filename,
                ]);

            dd('Data saved successfully!');
        } else {
            dd('No file uploaded!');
        }
    }
    // public function index(Request $request)
    // {
    //     $order = $request->input('order', 'asc');

    //     $recits = Recit::orderBy('created_at', $order)->get();
      

    //     return view('welcome', compact('recits'));
    // }
   
    public function filterPosts(Request $request)
    {
       
        $order = $request->input('order');

        $query = Recit::query();

       

        if ($order === 'latest') {
            $query->orderBy('id', 'desc');
        } elseif ($order === 'oldest') {
            $query->orderBy('id', 'asc');
        }

        $posts = $query->get();

        return view('welcome', ['recits' => $posts])->render();
    }

    }