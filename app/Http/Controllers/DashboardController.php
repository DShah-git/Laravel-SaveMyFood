<?php

namespace App\Http\Controllers;

use App\Models\FoodTracker;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Constraint\Count;

class DashboardController extends Controller
{
    //
    public function home(){

        if(!Auth::check()){
            return redirect('/login')->with('message', 'You are not logged in');
        }
        $user = Auth::user();
        $user_id = $user['id'];
        $food_tracker = FoodTracker::where('user_id',$user_id)->get();
        return view('dashboards.home',['data'=>$food_tracker]);
    }

    public function view($id){
        if(!Auth::check()){
            return redirect('/login')->with('message', 'You are not logged in');
        }
        $user = Auth::user();
        $user_id = $user['id'];

        $currentViewData = FoodTracker::find($id);

        $sameFoodData = FoodTracker::where('food_name',$currentViewData['food_name'])->Where('user_id',$user_id)->get();

        $totalWastage = 0;
        $totalMade = 0;

        $count =0;

        foreach($sameFoodData as $index=>$food){
            if($food['id']==$id){
                unset($sameFoodData[$index]);
            }

            $totalWastage += $food['quantity_wasted'];
            $totalMade+= $food['quantity_made'];
            $count+=$food['people'];
        }

        $makeInMeal = round(($totalMade-$totalWastage)/$count,0);


        return view('dashboards.indiv-view',['currentViewData'=>$currentViewData , 'sameFoodData'=>$sameFoodData,'totalWastage'=>$totalWastage,'makeInMeal'=>$makeInMeal,'id'=>$id]);
    }

    public function createMealView(){
        if(!Auth::check()){
            return redirect('/login')->with('message', 'You are not logged in');
        }

        return view('dashboards.createmeal');

    }

    public function saveMeal(Request $request){
        // ddd($request);

        $validor = Validator::make($request->all(),[
            'food_name'=>'required',
            'quantity_made'=>'required',
            'quantity_wasted'=>'required',
            'unit'=>'required',
            'meal_type'=>'required',
            'people'=>'required'
        ]);

        if($validor->fails()){
            return redirect('/createmeal')->withErrors($validor)->withInput();
        }

        $mealToSave = [
            'food_name'=>$request['food_name'],
            'quantity_made'=>$request['quantity_made'],
            'quantity_wasted'=>$request['quantity_wasted'],
            'unit'=>$request['unit'],
            'meal_type'=>$request['meal_type'],
            'people'=>$request['people'],
            'user_id'=>auth()->user()->id
        ];

        $food_tracker = FoodTracker::create($mealToSave);

        if(!$food_tracker){
            return redirect('/create_meal')->with('error','Something went wrong!, Please Try Again!');
        }

        return redirect('/home');

    }

    public function delete($id){
       $meal = FoodTracker::find($id);
       $meal->delete();
       return redirect('/home')->with('success','Deleted');

    }

}
