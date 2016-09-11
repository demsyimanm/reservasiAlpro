<?php

namespace App\Http\Controllers;
use Request;
use Auth;
use Input;
use App\User;
use App\Reservation;
use App\Matakuliah;

class UserController extends Controller
{

    public function home()
    {
        if (Request::isMethod('get'))
        {
            return view('user.home');
        }
    }

    public function reservasi()
    {
        if (Request::isMethod('post'))
        {
            $data = Input::all();
            $date = date('Y-m-d',strtotime(str_replace('/','-',$data['tanggal'])));
            Reservation::insertGetId(array(
                'nama_pemesan'  => $data['name'], 
                'NRP_pemesan'   => $data['nrp'], 
                'no_hp_pemesan' => $data['nohp'], 
                'matkul_id'     => $data['mataKuliah'],
                'materi'        => $data['materi'],
                'jumlah'        => $data['jumlah'],
                'tanggal'       => $date,
                'jam_mulai'     => $data['jam_mulai'],
                'jam_akhir'     => $data['jam_akhir']

            ));
            return redirect('user/pilih');
        }

        else if (Request::isMethod('get'))
        {
            $reservations = Reservation::where('status','1')->take(10)->orderby('tanggal')->orderby('jam_mulai')->orderby('jam_akhir')->get();
            $matkuls = Matakuliah::orderBy('name')->get();
            return view('user.reservasi', compact('matkuls', 'reservations'));
        }
    }

    public function reservasi_lain()
    {
        if (Request::isMethod('post'))
        {
            $data = Input::all();
            $date = date('Y-m-d',strtotime(str_replace('/','-',$data['tanggal'])));
            Reservation::insertGetId(array(
                'nama_pemesan'  => $data['name'], 
                'NRP_pemesan'   => $data['nrp'], 
                'no_hp_pemesan' => $data['nohp'], 
                'penyewaan_lain'=> $data['keperluan'],
                'jumlah'        => $data['jumlah'],
                'tanggal'       => $date,
                'jam_mulai'     => $data['jam_mulai'],
                'jam_akhir'     => $data['jam_akhir']

            ));
            return redirect('user/pilih');
        }

        else if (Request::isMethod('get'))
        {
            $reservations = Reservation::where('status','1')->take(10)->orderby('tanggal')->orderby('jam_mulai')->orderby('jam_akhir')->get();
            return view('user.reservasi_lain', compact('reservations'));
        }
    }

    public function matkul()
    {
        if (Request::isMethod('get'))
        {
            $matkuls = Matakuliah::orderBy('name')->get();
            return view('user.list_matkul', compact('matkuls'));
        }
    }

    public function pilih_reservasi()
    {
        if (Request::isMethod('get'))
        {
            return view('user.pilih_reservasi');
        }
    }

    public function calendar()
    {
        if (Request::isMethod('get'))
        {
            $reservations = Reservation::get();
            return view('user.calendar', compact('reservations'));
        }
    }
}
