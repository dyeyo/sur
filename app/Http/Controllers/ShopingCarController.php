<?php

namespace App\Http\Controllers;

use App\Models\DetailsShopingCar;
use App\Models\ShopingCar;
use App\Models\User;
use Carbon\Carbon;
use Error;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopingCarController extends Controller
{
    public function index($id)
    {
        $user = User::find(Auth::id());

        $myCar = DetailsShopingCar::with('cars', 'cars.users', 'product', 'product.images')
            ->whereHas('cars', function (Builder $query)  use ($id) {
                $query->where('user_id', $id);
            })->get();
        if (count($myCar) > 0) {
            if ($user->id === $myCar[0]->cars->user_id) {
                return view('shoping-car.index', compact('myCar'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function addShopingCar(Request $request)
    {
        $client = auth()->user()->id;

        // Validar si tiene carrito
        $userCar = ShopingCar::where('user_id', $client)->get();

        // validar si existe el  producto
        if (count($userCar) === 0) {
            // car es metodo creado en el modelo User
            $car = new ShopingCar();
            $car->user_id = $client;
            $car->status = 'Pending'; // Active, pending, Approved, Cancelled, Finished
            $car->order_date = Carbon::now();
            $car->save();
            $this->checkProductIntoCar($request->id);
            $datails_car = new DetailsShopingCar();
            $datails_car->quantity =  $request->quantity ? $request->quantity : 1;
            $datails_car->shoping_car_id = $car->id;
            $datails_car->product_id = $request->id;
            $datails_car->save();
        } else {
            $this->checkProductIntoCar($request->id);
            $datails_car = new DetailsShopingCar();
            $datails_car->quantity =  $request->quantity ? $request->quantity : 1;
            $datails_car->shoping_car_id = $userCar[0]->id;
            $datails_car->product_id = $request->id;
            $datails_car->save();
        }


        $message = 'Tu pedido se ha realizado exitosamente.';
        return response()->json(['success' => $message]);
    }

    public function updateShopingCar(Request $request)
    {
        $update_quantity =  DetailsShopingCar::find($request->id);
        $update_quantity->quantity =  $request->quantity;
        $update_quantity->save();
        $message = 'Tu pedido se ha actualizado exitosamente.';
        return response()->json(['success' => $message]);
    }

    public function destroy(Request $request)
    {
        $idShpingCar = DetailsShopingCar::find($request->id);
        DetailsShopingCar::find($request->id)->delete();
        if (DetailsShopingCar::where('id', $request->id)->count() === 0) {
            ShopingCar::where('id', $idShpingCar->shoping_car_id)->delete();
        }
        return response()->json(['success' => 'El pedido ha sido cancelado.']);
    }

    public function checkProductIntoCar($idProduct)
    {
        $productCar = DetailsShopingCar::where('product_id', $idProduct)->get();
        if (count($productCar) != 0) {
            throw new Error('El producto ya existe en el carrito.');
        }
    }
}
