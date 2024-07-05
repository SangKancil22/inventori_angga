<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Models\BarangMasukDetail;
use App\Exports\BarangMasukLaporanExport;

class BarangMasukLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangMasukDetails = $this->filter();
        // ->paginate();

        return view('pages.barang-masuk.laporan.index', compact('barangMasukDetails'));
    }

    public function filter()
    {
        $filter['search'] = request()->keyword;
        $filter['date_from'] = request()->from_date;
        $filter['date_to'] = request()->to_date;

        return BarangMasukDetail::query()
            ->with('barang', 'barangMasuk')
            ->filter($filter)
            // ->orderBy('tgl_masuk', 'asc')
            ->get();
    }


}
