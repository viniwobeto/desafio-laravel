<?php

namespace App\Http\Controllers;

use App\Models\Aporte;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $aportesPorMes = Aporte::select(
                DB::raw("strftime('%Y-%m', data_aporte) as mes"),
                DB::raw("SUM(valor) as total")
            )
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

          $aportesPorAtivo = Aporte::select(
                'ativo',
                DB::raw('SUM(valor) as total')
            )
            ->groupBy('ativo')
            ->orderByDesc('total')
            ->get();

        return Inertia::render('Dashboard', [
            'aportesPorMes' => $aportesPorMes,
            'aportesPorAtivo' => $aportesPorAtivo,
        ]);
    }
}
