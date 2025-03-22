<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PagoController extends Controller
{
    public function index()
    {
        // Obtiene todos los pagos con sus usuarios relacionados
        $pagos = Pago::with('usuario')->orderBy('fecha_pago', 'desc')->get();
        
        // Agrupamos los pagos por mes
        $pagosPorMes = [];
        $totalesPorMes = [];
        $mesesDisponibles = [];
        $totalGeneral = 0;
        
        foreach ($pagos as $pago) {
            $mes = Carbon::parse($pago->fecha_pago)->format('Y-m');
            
            if (!isset($pagosPorMes[$mes])) {
                $pagosPorMes[$mes] = [];
                $totalesPorMes[$mes] = 0;
                $mesesDisponibles[] = $mes;
            }
            
            $pagosPorMes[$mes][] = $pago;
            $totalesPorMes[$mes] += $pago->monto;
            $totalGeneral += $pago->monto;
        }
        
        // Ordenamos los meses de más reciente a más antiguo
        rsort($mesesDisponibles);
        
        // Nombres de los meses en español
        $nombresMeses = [];
        foreach ($mesesDisponibles as $mes) {
            $fecha = Carbon::createFromFormat('Y-m', $mes);
            $nombreMes = $fecha->locale('es')->monthName;
            $nombresMeses[$mes] = ucfirst($nombreMes) . ' ' . $fecha->format('Y');
        }
        
        return view('pagos.index', compact(
            'pagos', 
            'pagosPorMes', 
            'totalesPorMes', 
            'mesesDisponibles', 
            'nombresMeses', 
            'totalGeneral'
        ));
    }

    public function create(Request $request)
    {
        // Captura el usuario_id y precio pasado por la URL
        $usuario_id = $request->input('usuario_id');
        $precio = $request->input('precio');  // Capturamos el precio
        
        // Obtiene todos los usuarios para el formulario de creación de pagos
        $usuarios = Usuario::all();
        
        // Obtenemos la fecha actual
        $fechaActual = Carbon::now()->format('Y-m-d'); // Formato 'Y-m-d' para un input de tipo date
        
        // Pasamos el usuario_id, precio y fecha actual a la vista
        return view('pagos.create', compact('usuarios', 'usuario_id', 'precio', 'fechaActual'));
    }
    
    public function store(Request $request)
    {
        // Valida los datos
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
            'estado' => 'nullable|in:pagado,pendiente',
        ]);
    
        // Crea un nuevo pago
        Pago::create($request->all());
    
        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente');
    }
    
    public function show($id)
    {
        // Obtiene un pago específico por su ID
        $pago = Pago::findOrFail($id);
        return view('pagos.show', compact('pago'));
    }

    public function edit($id)
    {
        // Obtiene el pago por ID y los usuarios para el formulario de edición
        $pago = Pago::findOrFail($id);
        $usuarios = Usuario::all();
        return view('pagos.edit', compact('pago', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        // Valida los datos
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'monto' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
            'estado' => 'nullable|in:pagado,pendiente',
        ]);

        // Encuentra el pago por ID
        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente');
    }

    public function destroy($id)
    {
        // Encuentra el pago por ID y lo elimina
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente');
    }
    
    // Método para búsqueda AJAX (opcional para implementación futura)
    public function search(Request $request)
    {
        $query = $request->input('query');
        $mes = $request->input('mes', 'todos');
        
        $pagosQuery = Pago::with('usuario');
        
        // Filtro por texto de búsqueda
        if (!empty($query)) {
            $pagosQuery->where(function($q) use ($query) {
                $q->whereHas('usuario', function($qu) use ($query) {
                    $qu->where('nombre', 'LIKE', "%{$query}%")
                       ->orWhere('apellido', 'LIKE', "%{$query}%");
                })
                ->orWhere('monto', 'LIKE', "%{$query}%")
                ->orWhere('metodo_pago', 'LIKE', "%{$query}%")
                ->orWhere('id', 'LIKE', "%{$query}%");
            });
        }
        
        // Filtro por mes
        if ($mes !== 'todos') {
            $inicioMes = Carbon::createFromFormat('Y-m', $mes)->startOfMonth();
            $finMes = Carbon::createFromFormat('Y-m', $mes)->endOfMonth();
            
            $pagosQuery->whereBetween('fecha_pago', [$inicioMes, $finMes]);
        }
        
        $pagos = $pagosQuery->orderBy('fecha_pago', 'desc')->get();
        
        // Calcular total
        $total = $pagos->sum('monto');
        
        return response()->json([
            'pagos' => $pagos,
            'total' => $total,
            'count' => $pagos->count()
        ]);
    }
}