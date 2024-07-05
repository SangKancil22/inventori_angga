<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluarDetail;
use App\Exports\BarangKeluarLaporanExport;

class BarangKeluarLaporanController extends Controller
{
    public function index()
    {

        $barangKeluarDetails = $this->filter();

        return view('pages.barang-keluar.laporan.index', compact('barangKeluarDetails'));
    }

    public function filter()
    {
        $filter['search'] = request()->keyword;
        $filter['date_from'] = request()->from_date;
        $filter['date_to'] = request()->to_date;

        return BarangKeluarDetail::query()
            ->with('barang', 'barangKeluar')
            ->filter($filter)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();
    }
}
