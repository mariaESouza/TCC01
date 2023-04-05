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
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $posts = Products::where('code', 'LIKE', "%$keyword%")
            ->orWhere('reference', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        } else {
            $posts = Products::latest()->paginate($perPage);
        }
        $result = Type::all();
        return view('showType', ['result' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $description = Collection::all(); 
        $result = Type::all();
        return view('produto', ['result' => $result, 'description' => $description]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if ($request->hasFile('patch')) {
            $filenamewithExt = $request->file('patch')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('patch')->getClientoriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('patch')->storeAs('public/senai', $fileNameToStore);
            $imagem = '/senai'.$fileNameToStore; 
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
        $db->patch = $request->patch;
        $db->save();
        
        }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $post = Products::findOrFail($id);

        return view('showProducts', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Products::findOrFail($id);

        return view('editProducts', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products,$id)
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
    
        $post = Products::findOrFail($id);
        $post->update($requestData);
    
        return redirect('dashboard/products')->with('success', 'Produto atualizado!');
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