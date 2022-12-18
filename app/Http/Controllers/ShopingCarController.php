<?php

namespace App\Http\Controllers;

use App\Models\DetailsShopingCar;
use App\Models\ShopingCar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopingCarController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => [
    //         'update'
    //     ]]);
    // }

    public function addShopingCar(Request $request)
    {
        // dd($request->quantity);
        // $client = auth()->user();
        // car es metodo creado en el modelo User
        $car = new ShopingCar();
        $car->user_id = 1;
        $car->status = 'Pending'; // Active, pending, Approved, Cancelled, Finished
        $car->order_date = Carbon::now();
        $car->save();

        $datails_car = new DetailsShopingCar();
        $datails_car->quantity = $request->quantity;
        $datails_car->car_id = $car->id;
        $datails_car->product_id = $request->id;
        $datails_car->save();

        $message = 'Tu pedido se ha realizado exitosamente.';
        return response()->json(['success' => $message]);
    }

    public function destroy(ShopingCar $car)
    {
        if ($car->user_id == auth()->user()->id) {

            $car->delete();
        }

        return response()->json(['success' => 'El pedido ha sido cancelado.']);
    }
}
