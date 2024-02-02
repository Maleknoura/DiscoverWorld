<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Image;
use App\Models\Recit;
use Illuminate\Http\Request;
use DB;

class recitcontroller extends Controller
{
    public function create()
    {

        return view('ajouter');
    }
    public function stati()
    {
        $totalRecits = Recit::count();
        $totalDestinations = Recit::distinct('destination')->count();
        $totalImages = Recit::distinct('image')->count();


        return view('index', compact('Recit', 'Destination', 'Image'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'destinationId' => 'required|numeric',
            'url' => 'required|file',
        ]);


        if ($request->hasFile('url')) {
            $images = [];
            foreach ($request->file('images') as $img)
            $file = $request->file('url');
            
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);


            $newRecit = Recit::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'destinationId' => $data['destinationId'],
            ]);

            if ($request->hasFile('images')) {
                $images = [];
                foreach ($request->file('images') as $img) {
                    $images[] = ['recit_id' => $recit->id, 'Image' => $img->store('images', 'public')];
                }
            $newImage = $newRecit->image()->create([
                'url' => $filename,
            ]);
          
            dd('Data saved successfully!');
        } else {
            dd('No file uploaded!');
        }
    }


    public function filterPosts(Request $request)
    {

        $order = $request->input('order');


        $query = Recit::query();
        $destinations = DB::table('destination')->get();
        $img = DB::table('images')->get();
        $recit = DB::table('recits')->orderBy('created_at')->get();


        if ($order === 'latest') {
            $query->orderBy('id', 'desc');
        } elseif ($order === 'oldest') {
            $query->orderBy('id', 'asc');
        }


        $posts = $query->get();
        return view('welcome', [
            'recits' => $posts,
            'destinations' => $destinations,
            'img' => $img,
            'recit' => $recit,
            'order' => $order,

        ])->render();
    }
    public function filterbydest(Request $request)
    {
        $destinationId = $request->id;
        $query = Recit::query();
        $destinations = DB::table('destination')->get();
        $img = DB::table('images')->get();
        $recit = DB::table('recits')->get();

        if ($destinationId) {
            $query->where('destinationId', $destinationId);
        }

        $posts = $query->get();
        return view('welcome', [
            'recits' => $posts,
            'destinations' => $destinations,
            'img' => $img,
            'recit' => $recit,
        ]);
    }
}
