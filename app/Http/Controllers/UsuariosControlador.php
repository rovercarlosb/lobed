<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
class UsuariosControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
     // $peli = new User();
    // $peli->name = 'Carlos Bolivar';
    // $peli->email = 'carlosb20052009@gmail.com';
    // $peli->password = bcrypt('123456');
    // $peli->type = 'admin';
    // $peli->age= '22';
    // $peli->user_id = 1;

        $id1 = \Auth::user()->id;
        $users = User::orderBy('id','ASC')->paginate(5);
        $users1 = User::orderBY('id','ASC')->where('user_id','=', $id1)->paginate(5);
        return view('admin.users.index')->with('users', $users)->with('users1',$users1); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.users.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
        'name' => 'required|min:4|max:120',
        'email' => 'required|unique:users|max:255',
    ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password); 
        $user->user_id = \Auth::user()->id;

        $user->save();
        //dd("Usuario creado");
        
        Flash::success("Se ha registrado al usuario: ".$user->name." de forma exitosa!");
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->fill($request->all());
        //$user->name = $request->name;}}}
        //$user->email = $request->email;
        $user->save();

        Flash::warning('El usuario '.$user->name.' ha sido modificado satisfactoriamente');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //return $id;
        //User::destroy($id);
        $user = User::find($id);
        $user->delete();
        //return $id;
        //$this->user->delete();

        $mensaje = 'El usuario '.$user->name.' ha sido eliminado satisfactoriamente';

      if($request->ajax()){

            return $mensaje;
    
    } 

        Flash::error($mensaje);

      //return redirect()->route('users.index');

    }
}
