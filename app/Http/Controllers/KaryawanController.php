<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKaryawanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKaryawanRequest $request)
    {
        $this->validate($request, [
            'nama'              =>  'required',
            'j_kelamin'         =>  'required|in:Laki-laki,Perempuan',
            'no_handphone'      =>  'required',
            'email'             =>  'required|email|unique:karyawans,email',
            'current_salary'    =>  'required',
            'foto'              =>  'required|mimes:jpg,png,jpeg'
        ]);

        $karyawan = Karyawan::create($request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')
                    ->move('fotokaryawan/', $request->file('foto')
                    ->getClientOriginalName());
            $karyawan->foto = $request->file('foto')->getClientOriginalName();
            $karyawan->save();
        }

        if ($karyawan) {
            return redirect()
            ->route('karyawan.index')
            ->with([
                'success' => 'Karyawan Berhasil Ditambahkan'
            ]);
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Karyawan Gagal Ditambahkan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKaryawanRequest  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan)
    {
        $this->validate($request, [
            'nama'              =>  'required',
            'j_kelamin'         =>  'required|in:Laki-laki,Perempuan',
            'no_handphone'      =>  'required',
            'email'             =>  'required',
            'current_salary'    =>  'required',
            'foto'              =>  'required|mimes:jpg,png,jpeg'
        ]);

        $karyawan->update($request->all());

        if ($request->hasFile('foto')) {
            $old = 'fotokaryawan/'.$karyawan->foto;
            if (File::exists($old)) 
            {
                File::delete($old);
            }
            $request->file('foto')
                    ->move('fotokaryawan/', $request->file('foto')
                    ->getClientOriginalName());
            $karyawan->foto = $request->file('foto')->getClientOriginalName();
            $karyawan->save();
        }

        if ($karyawan) {
            return redirect()
            ->route('karyawan.index')
            ->with([
                'success' => 'Karyawan Berhasil Diperbaharui'
            ]);
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Karyawan Gagal Diperbaharui'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        if ($karyawan) {
            return redirect()
            ->route('karyawan.index')
            ->with([
                'success' => 'Data Karyawan Berhasil Dihapus'
            ]);
        } else {
            return redirect()
            ->back()
            ->with([
                'error' => 'Data Karyawan Gagal Dihapus'
            ]);
        }
    }

    public function wordExport($id)
    {
       $karyawan = Karyawan::findOrFail($id);
       $templateProcessor = new TemplateProcessor('word-template/user.docx');
       $templateProcessor->setValue('nama', $karyawan->nama);
       $templateProcessor->setValue('j_kelamin', $karyawan->j_kelamin);
       $templateProcessor->setValue('no_handphone', $karyawan->no_handphone);
       $templateProcessor->setValue('email', $karyawan->email);
       $templateProcessor->setValue('current_salary', $karyawan->current_salary);
       $templateProcessor->setImageValue('foto', array('path' => 'fotokaryawan/'.$karyawan->foto, 
                                                        'width' => 100, 'height' => 100, 'ratio' => true));
       $fileName = $karyawan->nama;
       $templateProcessor->saveAs($fileName. '.docx');

       return response()->download($fileName. '.docx');

    }
}
