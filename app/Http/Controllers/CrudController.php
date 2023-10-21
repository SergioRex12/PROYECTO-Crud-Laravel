<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index() {

        $sql = DB::select(" SELECT * from users ");


        return view('welcome')->with("users", $sql);

    }

    public function crear(Request $request) {
        $estado = [];

        try {
            DB::insert(' INSERT INTO users (name, password) values (?, ?) ', [
                $request->txtName,
                $request->txtPassword
            ]);

            $estado = [1, "Usuario agregado con éxito"];
        } catch (\Throwable $th) {
            $estado = [0, "Error al crear el usuario"];
        }
        
        return back()->with("estado", $estado);
    }

    public function editar(Request $request) {

        $estado = [];

        try {
            DB::update(" UPDATE users SET name=?, password=? WHERE id=? ", [
                $request->txtNameEdit,
                $request->txtPasswordEdit,
                $request->txtIdEdit
            ]);

            $estado = [1, "Usuario editado con éxito"];

        } catch (\Throwable $th) {
            $estado = [0, "Error al editar el usuario"];

        }

        return back()->with("estado", $estado);
    }

    public function borrar(Request $request) {
        $estado = [];

        try {
            DB::delete(" DELETE FROM users WHERE id=? ",[
                $request->id
            ]);

            $estado = [1, "Usuario eliminado con éxito"];

        } catch (\Throwable $th) {
            $estado = [0, "Error al eliminar el usuario"];

        }

        return back()->with("estado", $estado);
    }


}
