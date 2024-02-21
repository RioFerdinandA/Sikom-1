<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataBukuExportView;
use App\Imports\ImportDataBukuClass;







class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtBuku = buku::orderBy('id', 'desc')->paginate(3);
        return view('data_buku.index', compact('dtBuku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);
        Session::flash('penerbit', $request->penerbit);
        Session::flash('tahun_terbit', $request->tahun_terbit);
       
        $request->validate(
            [
                'judul' => 'required',
                'penulis' => 'required',
                'penerbit' => 'required',
                'tahun_terbit' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'penulis.required' => 'Penulis wajib diisi',
                'penerbit.required' => 'Penerbit wajib diisi',
                'tahun_terbit.required' => 'Tahun terbit wajib diisi',
            ],
        );
        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ];
        buku::create($data);
        return redirect()->route ('buku.index')->with('success', 'Data buku berhasil di tambahkan');
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
        $dt = buku::find($id);
        return view('data_buku.edit', compact('dt'));
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
        Session::flash('judul', $request->judul);
        Session::flash('penulis', $request->penulis);
        Session::flash('penerbit', $request->penerbit);
        Session::flash('tahun_terbit', $request->tahun_terbit);

        $request->validate(
            [
                'judul' => 'required',
                'penulis' => 'required',
                'penerbit' => 'required',
                'tahun_terbit' => 'required',
            ],
            [
                'judul.required' => 'Judul wajib diisi',
                'penulis.required' => 'Penulis wajib diisi',
                'penerbit.required' => 'Penerbit wajib diisi',
                'tahun_terbit.required' => 'Tahun terbit wajib diisi',
            ],
        );
        $data = [
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ];
        buku::where('id', $id)->update($data);
        return redirect()->route ('buku.index')->with('success', 'Data buku berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        buku::where('id', $id)->delete();
        return back()->with('success', 'Data buku berhasil di hapus');
    }

    public function export_pdf(Request $request)
    {
        $data = buku::orderBy('judul','asc');
        $data = $data->get();

        // Pass parameters to the export view
        $pdf = PDF::loadview('data_buku.exportPdf', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_buku';
        // Download the Pdf file
        return $pdf->download($filename.'.pdf');
    }

    public function export_excel(Request $request)
    {
        //QUERY
        $data = buku::select('*');
        $data = $data->get();

        // Pass parameters to the export class
        $export = new DataBukuExportView($data);
        
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_buku';
        
        // Download the Excel file
        return Excel::download($export, $filename . '.xlsx');
    }

    public function import_excel(Request $request)
    {
        //DECLARE REQUEST
        $file = $request->file('file');

        //VALIDATION FORM
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        try {
            if($file){
                // IMPORT DATA
                $import = new ImportDataBukuClass;
                Excel::import($import, $file);
                
                // SUCCESS
                $notimportlist="";
                if ($import->listgagal) {
                    $notimportlist.="<hr> Not Register : <br> {$import->listgagal}";
                }
                return back()
                ->with('success', 'Import Data berhasil,<br>
                Size '.$file->getSize().', File extention '.$file->extension().',
                Insert '.$import->insert.' data, Update '.$import->edit.' data,
                Failed '.$import->gagal.' data, <br> '.$notimportlist.'');

            } else {
                // ERROR
                return back()
                ->withInput()
                ->with('error','Gagal memproses!');
            }
            
		}
		catch(Exception $e){
			// ERROR
			return back()
            ->withInput()
            ->with('error','Gagal memproses!');
		}

    }
}