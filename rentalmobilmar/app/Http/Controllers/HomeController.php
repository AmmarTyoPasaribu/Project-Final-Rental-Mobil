<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\User;
use App\Models\Bayar;
use App\Models\Driver;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\BayarStoreRequest;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        

        $cars = Car::latest();
        $drivers = Driver::latest();

        if ($request->has('search')) {
            $cars->where('nama_mobil', 'like', '%' . $request->input('search') . '%');
            $drivers->where('nama_driver', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('searcha')) { 
            $cars->where('status', 'like', '%' . $request->input('searcha') . '%');
            $drivers->where('gender', 'like', '%' . $request->input('searcha') . '%');
        }

        $cars = $cars->get();
        $drivers = $drivers->get();
        $bayars = Bayar::latest()->get();
        $users = User::latest()->get();

        return view('frontend.homepage', compact('cars', 'drivers', 'bayars', 'users'));
    }

    public function contact(Car $car){
        $drivers = Driver::latest()->get();
        return view('frontend.contact',compact('car','drivers'));
    }

    public function detail(Car $car){
        $drivers = Driver::latest()->get();
        return view('frontend.detail',compact('car','drivers'));
    }

    public function contactStore(BayarStoreRequest $request)
    {
        if($request->validated()){
            $bukti= $request->file('bukti')->store('assets/bayars', 'public');
            $slug = Str::slug($request->namaku,'-');
            Bayar::create($request->except('bukti') + ['bukti' =>$bukti, 'slug' => $slug]);
        }
        return redirect()->route('homepage')->with([
            'message' => 'Pesanan Anda berhasil dikirim.',
            'alert-type' => 'success'
        ]);
    }
    public function profile()
    {
        return view('frontend.profile');
    }
    public function updateprofile(Request $request)
    {
        $request->validate([
            'name' => "required",
            'email' => "required|email",
            'password' => "nullable|string|min:8|confirmed",
            
        ]);
        
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->filled('password')){
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('homepage')->with([
        'message' => 'profil sukses diedit',
        'alert-type' => 'info'
    ]);
}
}
