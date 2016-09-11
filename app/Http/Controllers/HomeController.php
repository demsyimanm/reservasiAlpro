<?php

namespace App\Http\Controllers;
use Request;
use Auth;
use Input;
use App\User;
use App\Admin;
use App\Reservation;
use App\Matakuliah;

class HomeController extends Controller
{
    protected $data = array();
    public function index()
    {   
        $this->data['username'] = "";
        $this->data['password'] = "";
        if(Auth::check())
        {
            $this->data['username'] = Auth::user()->username;
            $this->data['password'] = Auth::user()->password;
        }
        return view('admin.home',$this->data);
    }

    public function login()
    {
        if (Request::isMethod('post'))
        {
            $credentials = Input::only('username','password');
            $this->data['username'] = Input::get('username');
            if (Auth::attempt($credentials,true))
            {
                return view('admin.home',$this->data);
            }
            return view('admin.login');
        }

        else if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                return view('admin.home');
            }

            return view('admin.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin');
    }


    public function administrator()
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                $admins = Admin::orderby('nrp')->get();
                return view('admin.list-admin', compact('admins'));
            }

            return view('admin.login');
        }
    }

    public function tambahAdmin()
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                
                return view('admin.tambah-admin');
            }

            return view('admin.login');
        }
        else
        {
            if (Auth::check())
            {
                $data = Input::all();
                $date = date('Y-m-d',strtotime(str_replace('/','-',$data['tanggal'])));
                Admin::insertGetId(array(
                        'name'          => $data['name'], 
                        'nrp'           => $data['nrp'], 
                        'no_hp'         => $data['nohp'], 
                        'alamat'        => $data['alamat'],
                        'tanggal_lahir' => $date,
                        'email'         => $data['email'],
                        'facebook'      => $data['fb'],
                        'line'          => $data['line'],

                    ));
                return redirect('admin/admin');
            }
            return view('admin.login');
        }
    }

    public function updateAdmin($id)
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                $admin = Admin::find($id);
                return view('admin.update-admin',compact('admin'));
            }

            return view('admin.login');
        }
        else
        {
            if (Auth::check())
            {
                $data = Input::all();
                $date = date('Y-m-d',strtotime(str_replace('/','-',$data['tanggal'])));
                Admin::where('id', $id)->update(array(
                    'name'          => $data['name'], 
                    'nrp'           => $data['nrp'], 
                    'no_hp'         => $data['nohp'], 
                    'alamat'        => $data['alamat'],
                    'tanggal_lahir' => $date,
                    'email'         => $data['email'],
                    'facebook'      => $data['fb'],
                    'line'          => $data['line'],
                ));
                return redirect('admin/admin');
            }
            return view('admin.login');
        }
    }

    public function deleteAdmin($id)
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                Admin::where('id', $id)->delete();
                return redirect('admin/admin');
            }

            return view('admin.login');
        }
    }

    public function reservasi()
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                $reservations = Reservation::get();
                return view('admin.list_reservasi', compact('reservations'));
            }

            return view('admin.login');
        }
    }

    public function prosesReservasi($id)
    {
        $reservation = Reservation::find($id);
        $admins = Admin::get();
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                if ($reservation->penyewaan_lain == "" || $reservation->matkul_id != "" || $reservation->matkul_id != "0")
                    return view('admin.detail_reservasi_tutor', compact('reservation','admins'));
                else if ($reservation->penyewaan_lain != "" || $reservation->matkul_id == "" || $reservation->matkul_id == "0")
                     return view('admin.detail_reservasi_lain', compact('reservation','admins'));
            }

            return view('admin.login');
        }
        else
        {
            if (Auth::check())
            {
                $data = Input::all();
                if ($reservation->penyewaan_lain == "" || $reservation->matkul_id != "" || $reservation->matkul_id != "0")
                {
                    Reservation::where('id', $id)->update(array(
                        'admin_id'      => $data['admin'],
                        'penutor'       => $data['penutor_lain'],
                        'keterangan'    => $data['keterangan'],
                        'status'         => '1'
                    ));
                }
                else if ($reservation->penyewaan_lain != "" || $reservation->matkul_id == "" || $reservation->matkul_id == "0")
                {
                    Reservation::where('id', $id)->update(array(
                        'admin_id'      => $data['admin'],
                        'keterangan'    => $data['keterangan'],
                        'status'         => '1'
                    ));
                }
                return redirect('admin/reservasi');
            }

        }
    }

    public function tolakReservasi($id)
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                Reservation::where('id', $id)->update(array(
                    'status'         => '2'
                ));
                return redirect('admin/reservasi');
            }

            return view('admin.login');
        }
    }

    public function deleteReservasi($id)
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                Reservation::where('id', $id)->delete();
                return redirect('admin/reservasi');
            }

            return view('admin.login');
        }
    }

    public function matkul()
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                $matkuls = Matakuliah::get();
                return view('admin.list_matkul', compact('matkuls'));
            }

            return view('admin.login');
        }
    }

    public function tambahMatkul()
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                
                return view('admin.tambah-matkul');
            }

            return view('admin.login');
        }
        else
        {
            if (Auth::check())
            {
                $data = Input::all();
                Matakuliah::insertGetId(array(
                        'name' => $data['name'], 
                    ));
                return redirect('admin/matkul');
            }
            return view('admin.login');
        }
    }

    public function deleteMatkul($id)
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                Matakuliah::where('id', $id)->delete();
                return redirect('admin/matkul');
            }

            return view('admin.login');
        }
    }

    public function updateMatkul($id)
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                $matkul = Matakuliah::find($id);
                return view('admin.update-matkul',compact('matkul'));
            }

            return view('admin.login');
        }
        else
        {
            if (Auth::check())
            {
                $data = Input::all();
                Matakuliah::where('id', $id)->update(array(
                    'name'          => $data['name'], 
                ));
                return redirect('admin/matkul');
            }
            return view('admin.login');
        }
    }

    public function calendar()
    {
        if (Request::isMethod('get'))
        {
            if (Auth::check())
            {
                $reservations = Reservation::get();
                return view('admin.calendar', compact('reservations'));
            }

            return view('admin.login');
        }
    }

}
