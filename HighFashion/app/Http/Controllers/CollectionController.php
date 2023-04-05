<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $posts = Collection::where('code', 'LIKE', "%$keyword%")
            ->orWhere('reference', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        } else {
            $posts = Collection::latest()->paginate($perPage);
        }
    
        $result = Collection::all();
        return view('showCollection', ['result' => $result]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = Collection::all();
        return view('showCollection', ['result' => $result]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $db = new Collection;
        $db->description_collection = $request->description_collection;
        $db->save();

        }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $post = Collection::findOrFail($id);

        return view('showCollection',['result' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Collection::findOrFail($id);

        return view('editCollection', ['result' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collection $Collection,$id)
    {
        $requestData = $request->all();   
        if ($request->hasFile('patch')) {
            $filenamewithExt = $request->file('patch')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('patch')->getClientoriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('patch')->storeAs('public/senai', $fileNameToStore);
            $requestData['patch'] = '/senai'.$fileNameToStore; 
        } else {
            $requestData['patch'] = 'noimage.png';
        }
    
        $post = Collection::findOrFail($id);
        $post->update($requestData);
    
        return redirect('dashboard/Collection')->with('success', 'Tipo atualizado!');
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Collection::destroy($id);
        return redirect('dashboard/Collection')->with('success', 'Tipo deletado');
    }

    public function search(Request $request)
    {
        $db = Collection::where($request->status) 
        ->get();
        $result = $db->search($request->name);
        return view('index', ['result' => $result]);
        
    }
}