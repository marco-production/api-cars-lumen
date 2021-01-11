<?php

namespace App\Http\Controllers;

use App\Models\MainMake;
use App\Models\Fuel;
use App\Models\Vehicle;
use App\Models\MakeModel;
use App\Models\VehicleType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Make methods */
    public function getMakes()
    {
        //orderBy('id','ASC')->get()
        $make = MainMake::All();
        return response()->json($make,200);
    }

    public function createMake(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:main_makes',
        ]);

        $make = new MainMake();
        $make->name = $request->input('name');
        $make->save();
        return response()->json($make,200);
    }

    public function updateMake(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        $make = MainMake::find($id);
        if($make)
        {
            $make->name = $request->input('name');
            $make->save();
            return response()->json($make, 200);
        }
        else{
            return response()->json(['Message'=>'Make does not exist.'],404);
        }
    }

    public function deleteMake(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $make = MainMake::find($request->input('id'));
        if($make)
        {
            $make->delete();
            return response()->json(['status'=>200,'message'=>'Make removed.'], 200);
        }
        else{
            return response()->json(['status'=>404,'message'=>'Make does not exist.'], 404);
        }
    }

    /* Models methods */
    public function getModels(Request $request)
    {
        $models = MakeModel::with(['make'])->get();
        $make = $request->input('make');

        if ($make) {
            $models = MakeModel::with(['make'])->where('main_make_id',$make)->get();
        }
        return response()->json($models, 200);
    }


    public function createModel(Request $request)
    {
        $this->validate($request, [
            'make' => 'required|integer',
            'name' => 'required|string|unique:make_models',
        ]);

        $make_id = $request->input('make');
        $make = MainMake::find($make_id);

        if ($make) {
            $model = new MakeModel();
            $model->name = $request->input('name');
            $model->main_make_id = $make_id;
            $model->save();
            $model_created = MakeModel::with(['make'])->where('id',$model->id)->first();
            return response()->json($model_created, 200);
        }else{
            return response()->json(['Message'=>'make does not exist.'], 404);
        }
    }

    public function updateModel(Request $request, $id)
    {
        $this->validate($request, [
            'make' => 'required|integer',
            'name' => 'required|string',
        ]);

        $make_id = $request->input('make');
        $make = MainMake::find($make_id);

        if ($make) {
            $model = MakeModel::find($id);
            $model->name = $request->input('name');
            $model->main_make_id = $make_id;
            $model->save();
            $model_updated = MakeModel::with(['make'])->where('id',$model->id)->first();
            return response()->json($model_updated, 200);
        }else{
            return response()->json(['Message'=>'make does not exist.'], 400);
        }
    }

    public function deleteModel(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $model = MakeModel::find($request->input('id'));
        if($model)
        {
            $model->delete();
            return response()->json(['message'=>'Model removed.'], 200);
        }
        else{
            return response()->json(['Message'=>'Model does not exist.'], 404);
        }
            
    }

    /* Fuel methods */
    public function getFuels()
    {
        $fuel = Fuel::All();
        return response()->json($fuel,200);
    }

    public function createFuel(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:fuels',
        ]);

        $fuel = new Fuel();
        $fuel->name = $request->input('name');
        $fuel->save();
        return response()->json($fuel,200);
    }

    public function updateFuel(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:fuels',
        ]);

        $fuel = Fuel::find($id);
        if($fuel)
        {
            $fuel->name = $request->input('name');
            $fuel->save();
            return response()->json($fuel,200);
        }
        else{
            return response()->json(['Message'=>'Fuel does not exist.'],400);
        }
    }

    public function deleteFuel(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $fuel = Fuel::find($request->input('id'));
        if($fuel)
        {
            $fuel->delete();
            return response()->json(['message'=>'Fuel removed.'],200);
        }
        else{
            return response()->json(['Message'=>'Fuel does not exist.'],400);
        }
    }

    /* Vehicle types methods */
    public function getVehicleTypes()
    {
        $vehicleType = VehicleType::All();
        return response()->json($vehicleType,200);
    }

    public function createVehicleType(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:vehicle_types',
        ]);

        $vehicleType = new VehicleType();
        $vehicleType->name = $request->input('name');
        $vehicleType->save();
        return response()->json($vehicleType,200);
    }

    public function updateVehicleType(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        
        $vehicleType = VehicleType::find($id);
        if($vehicleType)
        {
            $vehicleType->name = $request->input('name');
            $vehicleType->save();
            return response()->json($vehicleType,200);
        }
        else{
            return response()->json(['Message'=>'Vehicle type does not exist.'],400);
        }
    }

    public function deleteVehicleType(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $vehicleType = VehicleType::find($request->input('id'));
        if($vehicleType)
        {
            $vehicleType->delete();
            return response()->json(['message'=>'Vehicle type removed.'],200);
        }
        else{
            return response()->json(['Message'=>'Vehicle type does not exist.'],400);
        }
    }

    /* Vehicle methods */
    public function getVehicles()
    {
        $vehicle = Vehicle::with(['fuel','model','vehicleType','make'])->get();
        return response()->json($vehicle,200);
    }

    /* Vehicle methods */
    public function createVehicle(Request $request)
    {
        $this->validate($request, [
            'model_id' => 'required|integer',
            'fuel_id' => 'required|integer',
            'vehicle_type_id' => 'required|integer',
            'year' => 'required|integer|numeric',
            'chassis' => 'nullable',
            'description' => 'nullable',
            'condition' => 'nullable|integer',
            'status' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        $model = $request->input('model_id');
        $current_make = MakeModel::with('make')->where('id',$model)->first();
        $year = $request->input('year');

        $vehicle = new Vehicle();
        $vehicle->make_id = $current_make->make->id;
        $vehicle->model_id = $model;
        $vehicle->fuel_id = $request->input('fuel_id');
        $vehicle->vehicle_type_id = $request->input('vehicle_type_id');
        $vehicle->year = $year;
        $vehicle->chassis = $request->input('chassis');
        $vehicle->condition = $request->input('condition');
        $vehicle->description = $request->input('description');
        $vehicle->status = $request->input('status');
        $vehicle->slug = Str::slug($current_make->make->name.' '.$current_make->name.' '.$year.' '.time());

        if ($request->hasFile('image')) {
            $vehicle->image = $this->saveImage($request->file('image'));
        }

        $vehicle->save();
        return response()->json($vehicle,200);
    }

    public function updateVehicle(Request $request, $id)
    {
        $this->validate($request, [
            'model_id' => 'required|integer',
            'fuel_id' => 'required|integer',
            'vehicle_type_id' => 'required|integer',
            'year' => 'required|integer|numeric',
            'chassis' => 'nullable',
            'description' => 'nullable',
            'condition' => 'nullable|integer',
            'status' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        $model = $request->input('model_id');
        $make = MakeModel::with('make')->where('id',$model)->first();
        $year = $request->input('year');

        if($make){

            $vehicle = Vehicle::find($id);
            $vehicle->model_id = $model;
            $vehicle->fuel_id = $request->input('fuel_id');
            $vehicle->vehicle_type_id = $request->input('vehicle_type_id');
            $vehicle->year = $year;
            $vehicle->chassis = $request->input('chassis');
            $vehicle->condition = $request->input('condition');
            $vehicle->description = $request->input('description');
            $vehicle->status = $request->input('status');

            if($vehicle->model_id != $model){
                $vehicle->slug = Str::slug($make->make->name.' '.$make->name.' '.$year.' '.time());
            }

            if ($request->hasFile('image')) {
                $search = public_path().'/images/'.$vehicle->image;
                \File::delete($search);
                $vehicle->image = $this->saveImage($request->file('image'));
            }

            $vehicle->save();
            return response()->json($vehicle,200);
        }
        else{
            return response()->json(['Message'=>'Model does not exist.'],404);
        }

    }

    public function deleteVehicle(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        $vehicle = Vehicle::find($request->input('id'));

        if($vehicle) {
            \File::delete(base_path('public/images/'), $name);

            $vehicle->delete();
            return response()->json(['message'=>'Vehicle removed.'],200);
        }
        else{
            return response()->json(['Message'=>'Vehicle does not exist.'],400);
        }
    }

    public function saveImage($file)
    {
        /* file:///C:/wamp64/www/cars-lumen/public/images/ */
        $name = time().$file->getClientOriginalName();
        $file->move(base_path('public/images/'), $name);
        //return $name;
        return base_path('public/images/').$name;
    }
}
