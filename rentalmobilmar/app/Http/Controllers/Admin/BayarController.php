<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bayar;
use App\Models\Driver;
use App\Models\Car;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BayarStoreRequest;
use App\Http\Requests\Admin\BayarUpdateRequest;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $cars = Car::latest()->get();
        $drivers = Driver::latest()->get();
        $bayars = Bayar::latest()->get();
        return view('admin.bayars.index', compact('bayars','cars','drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bayars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BayarStoreRequest $request)
    {
        
        if($request->validated()){
            $bukti= $request->file('bukti')->store('assets/bayars', 'public');
            $slug = Str::slug($request->namaku,'-');
            Bayar::create($request->except('bukti') + ['bukti' =>$bukti, 'slug' => $slug]);
        }
        return redirect()->route('admin.bayars.index')->with([
            'message' => 'data sukses dibuat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bayar $bayar)
    {
        return view('admin.bayars.edit', compact('bayar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BayarUpdateRequest $request,Bayar $bayar)
    {
        if($request->validated()){
            $slug = Str::slug($request->namaku,'-');
            $bayar->update($request->validated() + ['slug' => $slug]);
    }
    return redirect()->route('admin.bayars.index')->with([
        'message' => 'data sukses diedit',
        'alert-type' => 'info'
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bayar $bayar)
    {
        if($bayar->bukti){
            unlink('storage/' . $bayar->bukti); 
        }
        $bayar->delete();

        return redirect()->back()->with([
            'message'=>'data berhasil dihapus',
            'alert-type'=>'danger'
        ]);
    }

    public function updateImage(Request $request,$bayarId)
    {
        $request->validate([
            'bukti'=>'required|image'
        ]);
        $bayar = Bayar::findOrFail($bayarId);
        if($request->bukti){
            unlink('storage/'. $bayar->bukti);
            $bukti = $request->file('bukti')->store('assets/bayars', 'public');
            $bayar->update(['bukti' => $bukti]);
        }

        return redirect()->back()->with([
            'message'=>'gambar berhasil diedit',
            'alert-type'=>'info'
        ]);
    }

    public function updateStatus(Request $request, $carId)
        {
            $car = Car::findOrFail($carId);
            $newStatus = ($car->status == 'tersedia') ? 'terbooking' : 'tersedia';
            $car->update(['status' => $newStatus]);

            return redirect()->route('admin.bayars.index')->with([
                'message' => 'Status mobil berhasil diubah.',
                'alert-type' => 'success',
            ]);
}
//       public function updateStatusDriver(Request $request, $driverId)
//         {
//             $driver = Driver::findOrFail($driverId);
//             $newGender = ($car->gender == 'tersedia') ? 'terbooking' : 'tersedia';
//             $driver->update(['gender' => $newGender]);

//             return redirect()->route('admin.bayars.index')->with([
//                 'message' => 'Status mobil berhasil diubah.',
//                 'alert-type' => 'success',
//             ]);
// }

public function updateStatusDriver(Request $request, Driver $driver)
{
    $newStatus = ($driver->gender == 'tersedia') ? 'terbooking' : 'tersedia';
    $driver->update(['gender' => $newStatus]);

    return redirect()->back()->with([
        'message' => 'Status driver berhasil diubah.',
        'alert-type' => 'success',
    ]);
}

}

