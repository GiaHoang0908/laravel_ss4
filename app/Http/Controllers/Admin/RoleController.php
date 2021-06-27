<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::paginate(15);
        return view('admin.roles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = [];

        $all = Route::getRoutes();
        foreach ($all as $r) {
            $name = $r->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes))
                array_push($routes, $name);
        }
        return view('admin.roles.create', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $routes = json_encode($request->route);       
        Role::create([
            'name' => $request->name,
            'permission' => $routes,
        ]);
        return redirect()->route('admin.role.index')->with('success', 'add role success');
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
        $model = Role::find($id);
        $permissions = json_decode($model->permission);
       
        $routes = [];
        $all = Route::getRoutes();
        foreach ($all as $r) {
            $name = $r->getName();
            $pos = strpos($name, 'admin');
            if ($pos !== false && !in_array($name, $routes))
                array_push($routes, $name);
        }
        return view('admin.roles.edit', compact('routes', 'model', 'permissions'));
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
        $routes = json_encode($request->route);
        
        $model = Role::find($id);
        $model->update([
            'name' => $request->name,
            'permission' => $routes,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Role::find($id);
        $model->delete();
        return redirect()->back();
    }
}
