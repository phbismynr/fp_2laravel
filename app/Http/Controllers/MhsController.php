<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MhsController extends Controller
{
    public function index(Request $request){
        $daftarMahasiswa = [
            ['nim' => '17090001', 'nama' => 'Siswa 1', 'kelas' => '6A'],
            ['nim' => '17090002', 'nama' => 'Siswa 2', 'kelas' => '6B'],
            ['nim' => '17090003', 'nama' => 'Siswa 3', 'kelas' => '6C'],
            ['nim' => '17090004', 'nama' => 'Siswa 4', 'kelas' => '6D'],
        ];

        if($request->query('kelas')){
            $daftarMahasiswa = array_filter($daftarMahasiswa, function($kelas){
                return $kelas['kelas'] == request()->kelas;
            });
        }
        return view('daftar-mahasiswa', compact('daftarMahasiswa'));
    }
    
    public function show($daftar){
        $daftarMahasiswa = [
            ['nim' => '17090001', 'nama' => 'Siswa 1', 'kelas' => '6A'],
            ['nim' => '17090002', 'nama' => 'Siswa 2', 'kelas' => '6B'],
            ['nim' => '17090003', 'nama' => 'Siswa 3', 'kelas' => '6C'],
            ['nim' => '17090004', 'nama' => 'Siswa 4', 'kelas' => '6D'],
        ];

        if($daftar){
            $daftarMahasiswa = array_filter($daftarMahasiswa, function($kelas){
                return $kelas['kelas'] == request()->segment(count(request()->segments()));
            });
        }
        return view('daftar-mahasiswa', compact('daftarMahasiswa'));
    }
}
