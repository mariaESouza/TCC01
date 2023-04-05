<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $posts = Type::where('code', 'LIKE', "%$keyword%")
        //     ->orWhere('reference', 'LIKE', "%$keyword%")
        //     ->orWhere('description', 'LIKE', "%$keyword%")
        //     ->latest()->paginate($perPage);
        // } else {
        //     $posts = Type::latest()->paginate($perPage);
        // }

        $result = Type::all();
        return view('showType', ['result' => $result]);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = Type::all();
        return view('showType', ['result' => $result]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $db = new Type;
        $db->categories = $request->categories;
        $db->save();
             
        }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Type::findOrFail($id);

        return view('showType',['result' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $post = Type::findOrFail($id);
        
        return view('editType',['result' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
    
        $post = Type::findOrFail($id);
        $post->categories = $request->categories;
        $post->save();
    
        return redirect('dashboard/type')->with('success', 'Tipo atualizado!');
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Type::destroy($id);
        return redirect('dashboard/type')->with('success', 'Tipo deletado');
    }

    public function search(Request $request)
    {
        $db = Type::where($request->status) 
        ->get();
        $result = $db->search($request->name);
        return view('index', ['result' => $result]);
        
    }
}