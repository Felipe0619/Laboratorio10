<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class apicontroller extends Controller
{
    public function suma($numero1,$numero2){
        $suma = $numero1 + $numero2;
    
        return response()->json(['suma' => $suma]);
    }

    public function multiplicar($numero1, $numero2)
    {
        $suma = $numero1 * $numero2;
        return response()->json(['Multiplicacion' =>$suma]);
    }
    // Mostrar tareas de un usuario específico o del usuario autenticado
}
