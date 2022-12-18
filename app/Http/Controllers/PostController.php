<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Plazo;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autor=User::orderBy('id')->with('posts')->get();
        
        return view('posts.create')
            ->with(array('autor'=> $autor));
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo'=>'required|string|max:255',
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);
      
        $validated=([
            'tipo'=> $request->tipo,
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);

        
        Post::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Posts Creado con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        Post::find($post);
        $autor=DB::table('users')
            ->where('id','=',$post->autor)
            ->get();

        return view('posts.show')
            ->with('post', $post)
            ->with(array('autor'=> $autor));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        Post::find($post);
        
        $autor=User::orderBy('id')->with('posts')->get();
               
        return view('posts.edit')
            ->with('post', $post)
            ->with(array('autor'=> $autor));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         
        $request->validate([
            'tipo'=>'required|string|max:255', 
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);

        
        $validated=([
            'tipo'=> $request->tipo,
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);
           
       
        Post::where('id', $post->id)->update($validated);
        return redirect()->route('posts.show',$post)
            ->with('success','Posts Actualizado con Éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        Post::find($post->id)->delete();
        return redirect()->route('posts.index')
            ->with('sucess', 'Post Eliminado con Éxito');
    }



    /* -------- POST ABRIR PLAZOS INSCRIPCION PREINSCRIPCION -------- */

    /**
     * Abrir Plazos
     *
     * @return \Illuminate\Http\Response
     */
    public function abrirPlazos()
    {
        return view('posts.abrirPlazos');
           
    }

    /**
     * Formulario Crear Post Abrir Plazos Inscripción
     *
     * @return \Illuminate\Http\Response
     */
    public function createInscripcion()
    {
        $autor=User::orderBy('id')->with('posts')->get();
        
        return view('posts.abrir.createInscripcion')
            ->with(array('autor'=> $autor));
   
    }

    /**
     * Guardar Post Abrir Plazos Inscripción in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInscripcion(Request $request)
    {
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);
      
        $validated=([
            'tipo'=> $request->tipo='Abrir Inscripción',
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);

        
        Post::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Post ABRIR INSCRIPCIÓN Creado con Éxito');
    }

  
    /**
     * Show the form for editing Post Abrir Plazos Inscripción.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editInscripcion(Post $post)
    {
        Post::find($post);
        
        $autor=User::orderBy('id')->with('posts')->get();
               
        return view('posts.abrir.editInscripcion')
            ->with('post', $post)
            ->with(array('autor'=> $autor));
    }

    /**
     * Update Post Abrir Plazos Inscripción resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updateInscripcion(Request $request, Post $post)
    {
         
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);

        
        $validated=([
            'tipo'=> $request->tipo='Abrir Inscripción', 
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);
           
       
        Post::where('id', $post->id)->update($validated);
        return redirect()->route('posts.index')
            ->with('success','Posts ABRIR INSCRIPCIÓN Actualizado con Éxito');
    
    }

    /**
     * Formulario Crear Post Abrir Plazos Preinscripción
     *
     * @return \Illuminate\Http\Response
     */
    public function createPreinscripcion()
    {
        $autor=User::orderBy('id')->with('posts')->get();
        
        return view('posts.abrir.createPreinscripcion')
            ->with(array('autor'=> $autor));
   
    }

    /**
     * Guardar Post Abrir Plazos Preincripción in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePreinscripcion(Request $request)
    {
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);
      
        $validated=([
            'tipo'=> $request->tipo="Abrir Preinscripción",
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);

        
        Post::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Posts ABRIR PRE-INSCRIPCIÓN Creado con Éxito');
    }

     
    /**
     * Show the form for editing Post Abrir Plazos Preinscripción.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editPreinscripcion(Post $post)
    {
        Post::find($post);
        
        $autor=User::orderBy('id')->with('posts')->get();
               
        return view('posts.abrir.editPreinscripcion')
            ->with('post', $post)
            ->with(array('autor'=> $autor));
    }

    /**
     * Update Post Abrir Plazos Preinscripción resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatePreinscripcion(Request $request, Post $post)
    {
         
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);

        
        $validated=([
            'tipo'=> $request->tipo="Abrir Preinscripción", 
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);
           
       
        Post::where('id', $post->id)->update($validated);
        return redirect()->route('posts.index')
            ->with('success','Posts ABRIR PRE-INSCRIPCIÓN Actualizado con Éxito');
    
    }



    /**
     * Formulario Crear Post Abrir Plazos Libres
     *
     * @return \Illuminate\Http\Response
     */
    public function createPlazasLibres()
    {
        $autor=User::orderBy('id')->with('posts')->get();
        
        return view('posts.abrir.createPlazasLibres')
            ->with(array('autor'=> $autor));
   
    }

    /**
     * Guardar Post Abrir  PlazasLibres in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePlazasLibres(Request $request)
    {
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);
      
        $validated=([
            'tipo'=> $request->tipo="Abrir Plazas Libres",
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);

        
        Post::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Post ABRIR PLAZAS LIBRES Creado con Éxito');
    }

  
    /**
     * Show the form for editing Post Abrir Plazos Inscripción.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editPlazasLibres(Post $post)
    {
        Post::find($post);
        
        $autor=User::orderBy('id')->with('posts')->get();
               
        return view('posts.abrir.editPlazasLibres')
            ->with('post', $post)
            ->with(array('autor'=> $autor));
    }

    /**
     * Update Post Abrir Plazos Inscripción resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatePlazasLibres(Request $request, Post $post)
    {
         
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);

        
        $validated=([
            'tipo'=> $request->tipo="Abrir Plazas Libres", 
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);
           
       
        Post::where('id', $post->id)->update($validated);
        return redirect()->route('posts.index')
            ->with('success','Posts ABRIR PLAZAS LIBRES Actualizado con Éxito');
    
    }


  
    /* -------- POST CERRAR PLAZOS INSCRIPCION PREINSCRIPCION -------- */

    /**
     * Abrir Plazos
     *
     * @return \Illuminate\Http\Response
     */
    public function cerrarPlazos()
    {
        return view('posts.cerrarPlazos');
           
    }

    /**
     * Formulario Crear Post Abrir Plazos Inscripción
     *
     * @return \Illuminate\Http\Response
     */
    public function createCerrarInscripcion()
    {
        $autor=User::orderBy('id')->with('posts')->get();
        
        return view('posts.cerrar.createCerrarInscripcion')
            ->with(array('autor'=> $autor));
   
    }

    /**
     * Guardar Post Abrir Plazos Inscripción in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCerrarInscripcion(Request $request)
    {
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);
      
        $validated=([
            'tipo'=> $request->tipo='Cerrar Inscripción',
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);

        
        Post::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Post CERRAR INSCRIPCIÓN Creado con Éxito');
    }

  
    /**
     * Show the form for editing Post Abrir Plazos Inscripción.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editCerrarInscripcion(Post $post)
    {
        Post::find($post);
        
        $autor=User::orderBy('id')->with('posts')->get();
               
        return view('posts.cerrar.editCerrarInscripcion')
            ->with('post', $post)
            ->with(array('autor'=> $autor));
    }

    /**
     * Update Post Abrir Plazos Inscripción resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updateCerrarInscripcion(Request $request, Post $post)
    {
         
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);

        
        $validated=([
            'tipo'=> $request->tipo='Cerrar Inscripción', 
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);
           
       
        Post::where('id', $post->id)->update($validated);
        return redirect()->route('posts.index')
            ->with('success','Posts CERRAR INSCRIPCIÓN Actualizado con Éxito');
    
    }

    /**
     * Formulario Crear Post Abrir Plazos Preinscripción
     *
     * @return \Illuminate\Http\Response
     */
    public function createCerrarPreinscripcion()
    {
        $autor=User::orderBy('id')->with('posts')->get();
        
        return view('posts.cerrar.createCerrarPreinscripcion')
            ->with(array('autor'=> $autor));
   
    }

    /**
     * Guardar Post Abrir Plazos Preincripción in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCerrarPreinscripcion(Request $request)
    {
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);
      
        $validated=([
            'tipo'=> $request->tipo="Cerrar Preinscripción",
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);

        
        Post::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Posts CERRAR PRE-INSCRIPCIÓN Creado con Éxito');
    }

     
    /**
     * Show the form for editing Post Abrir Plazos Preinscripción.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editCerrarPreinscripcion(Post $post)
    {
        Post::find($post);
        
        $autor=User::orderBy('id')->with('posts')->get();
               
        return view('posts.cerrar.editCerrarPreinscripcion')
            ->with('post', $post)
            ->with(array('autor'=> $autor));
    }

    /**
     * Update Post Abrir Plazos Preinscripción resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updateCerrarPreinscripcion(Request $request, Post $post)
    {
         
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);

        
        $validated=([
            'tipo'=> $request->tipo="Cerrar Preinscripción", 
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);
           
       
        Post::where('id', $post->id)->update($validated);
        return redirect()->route('posts.index')
            ->with('success','Posts CERRAR PRE-INSCRIPCIÓN Actualizado con Éxito');
    
    }



    /**
     * Formulario Crear Post Abrir Plazos Libres
     *
     * @return \Illuminate\Http\Response
     */
    public function createCerrarPlazasLibres()
    {
        $autor=User::orderBy('id')->with('posts')->get();
        
        return view('posts.cerrar.createCerrarPlazasLibres')
            ->with(array('autor'=> $autor));
   
    }

    /**
     * Guardar Post Abrir  PlazasLibres in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCerrarPlazasLibres(Request $request)
    {
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);
      
        $validated=([
            'tipo'=> $request->tipo="Cerrar Plazas Libres",
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);

        
        Post::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Post CERRAR PLAZAS LIBRES Creado con Éxito');
    }

  
    /**
     * Show the form for editing Post Abrir Plazos Inscripción.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editCerrarPlazasLibres(Post $post)
    {
        Post::find($post);
        
        $autor=User::orderBy('id')->with('posts')->get();
               
        return view('posts.cerrar.editCerrarPlazasLibres')
            ->with('post', $post)
            ->with(array('autor'=> $autor));
    }

    /**
     * Update Post Abrir Plazos Inscripción resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updateCerrarPlazasLibres(Request $request, Post $post)
    {
         
        $request->validate([
            'titulo'=>'required|string|max:65535',      
            'comentario'=>'required|string|max:4294967295',
            'archivado'=>'boolean',
            'autor'=>'required',
        ]);

        
        $validated=([
            'tipo'=> $request->tipo="Cerrar Plazas Libres", 
            'titulo'=> $request->titulo,      
            'comentario'=> $request->comentario,
            'archivado'=>$request->archivado,
            'autor'=> $request->autor=Auth::user()->id,
        ]);
           
       
        Post::where('id', $post->id)->update($validated);
        return redirect()->route('posts.index')
            ->with('success','Posts CERRAR PLAZAS LIBRES Actualizado con Éxito');
    
    }


    /* -------- POST SHOW HOME GUEST -------- */


    /**
     * Abrir Plazos Post Open GEneral
     *
     * @return \Illuminate\Http\Response
     */
    public function indexNews()
    {
       $openPosts=Post::orderBy('created_at','desc') 
       ->whereNull('archivado')
       ->orWhere('archivado', 0)        
       ->get();
       
       $openPlazos=Plazo::orderBy('created_at','desc') 
       ->whereNull('deleted_at')
       ->where('estado',"=", 1)
       ->get();
       
      
      // dd($openPosts);
        
        return view('/home')
            ->with('openPosts', $openPosts)
            ->with('openPlazos', $openPlazos);
           
    }

    /**
     * Display Pons Post Noticias y Avisos.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function showOpenPost(Post $post)
    {
        Post::find($post);  
        
        return view('posts.open.showOpenPost')
            ->with('post', $post);

    }
    
    /**
     * Display Open Post Inscripciones.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function showInscripcionPost(Post $post)
    {
        Post::find($post);    
      
        return view('posts.open.showInscripcionPost', $post)
            ->with('post', $post);
    }

    /**
     * Display Open Post Inscripciones.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function showPreinscripcionPost(Post $post)
    {
        Post::find($post);         
      
        return view('posts.open.showPreinscripcionPost', $post)
            ->with('post', $post);
    }

    /**
     * Display Open Post Inscripciones.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function showPlazasLibresPost(Post $post)
    {
        Post::find($post);         
      
        return view('posts.open.showPlazasLibresPost', $post)
            ->with('post', $post);
    }


}

