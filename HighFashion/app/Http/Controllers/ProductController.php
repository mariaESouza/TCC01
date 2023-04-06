<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Products;
use App\Models\Type;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $posts = Products::where('code', 'LIKE', "%$keyword%")
        //     ->orWhere('reference', 'LIKE', "%$keyword%")
        //     ->orWhere('description', 'LIKE', "%$keyword%")
        //     ->latest()->paginate($perPage);
        // } else {
        //     $posts = Products::latest()->paginate($perPage);
        // }
        $result = Products::all();
        return view('showProducts', ['result' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $description = Collection::all(); 
        $result = Type::all();
        return view('showProducts', ['description' => $description,'result' => $result, ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if ($request->hasFile('patch')) {
            $filenamewithExt = $request->file('patch')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('patch')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('patch')->storeAs('public/senai', $fileNameToStore);
            $imagem = 'senai/'.$fileNameToStore; 
        } else {
            $imagem= 'noimage.png';
        }

        $db = new Products;
        $db->code = $request->code;
        $db->reference = $request->reference;
        $db->description = $request->description;
        $db->value = $request->value;
        $db->collection_id = $request->collection_id;
        $db->type_id = $request->type_id;
        $db->patch = $imagem;
        $db->save();
        
        return $this->index();
        
        }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $post = Products::findOrFail($id);

        return view('showProducts', ['result' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Products::find($id);
        $description = Collection::all();
        $types = Products::find($id)->types;
        $collection = Products::find($id)->Collection;
        $result = Type::all();
        return view('editProducts', ['post' => $post, 'types' => $types,'collection' => $collection, 'description' => $description, 'result' => $result]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products,$id)
    {
         
        if ($request->hasFile('patch')) {
            $filenamewithExt = $request->file('patch')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('patch')->getClientoriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('patch')->storeAs('public/senai', $fileNameToStore);
            $imagem = '/senai'.$fileNameToStore; 
        } else {
            $imagem = $request->imagem ;
        }
    
       
        $post = new Products;
        $post->code = $request->code;
        $post->reference = $request->reference;
        $post->description = $request->description;
        $post->value = $request->value;
        $post->collection_id = $request->collection_id;
        $post->type_id = $request->type_id;
        $post->patch = $imagem;
        $post->save();
        $post = Products::findOrFail($id);
        $result = Type::all();
        
        return view('editProducts', ['result' => $result]);
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('dashboard/products')->with('success', 'Prato deletado');
    }

    public function search(Request $request)
    {
        $db = Products::where($request->status) 
        ->get();
        $result = $db->search($request->name);
        return view('index', ['result' => $result]);
        
    }

    public function dashboard(){

        $description = Collection::all(); 
        $result = Type::all();
        return view('dashboard-admin', ['result' => $result, 'description' => $description]);
    }
}