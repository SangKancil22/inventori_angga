<?php

namespace App\Http\Controllers;

use App\Exports\BarangStokLaporanExport;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangStokLaporanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangs = $this->filter();

        // dd($barangs->first()->totalBarangMasuk);

        return view('pages.barang.laporan.stok', compact('barangs'));
    }

    public function filter()
    {
        $filter['search'] = request()->keyword;
        // $filter['date_from'] = request()->from_date;
        // $filter['date_to'] = request()->to_date;

        return Barang::query()
            ->with('barangMasukDetails')
            ->filter($filter)
            // ->orderBy('id', 'desc')
            ->latest()
            ->get();
    }
}
