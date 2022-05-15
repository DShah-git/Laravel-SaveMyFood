@extends('layouts.userloggedin')

@section('loggedincontent')

<style>
    .data-container{
        width:100%;
        padding:1rem 0rem;
        margin-top:4rem;
    }

    .card{
        background-color:rgb(65, 65, 65);
        padding:0.5rem 4rem 0.5rem 1rem ;
        border-radius: 5px;
        cursor:pointer;
        display: flex;
        justify-content: space-between;
        gap:4rem;
        flex-direction:row;
        align-items: center;
        margin-block: 0.5rem;
    }

    .current-view{
        width: 100%;
        background-color:rgb(65, 65, 65);
        padding:1.5rem 2rem 1rem 2rem ;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        flex-direction:column;
        align-items: flex-start;
        margin-block: 0.5rem;
        gap:2rem;
    }

    .display-row{
        display: flex;
        justify-content: space-between;
        flex-direction:row;
        width: 100%;
    }

    .card:hover{
        background-color:rgb(45, 45, 45);
    }

    .food_name{
        font-size: 1.5rem;
        font-weight: 600;
    }
    .meal_name{
        font-size: 1rem;
        font-weight: 500;
    }
    .bar-graph{
        display: flex;
        gap:0px;
        flex-direction:column;
        padding:0.25rem 0.75rem;
        border-right: 2px rgb(33, 33, 33) solid;
    }
    .food-made{
        width: 200px;
        height:15px;
        background-color:limegreen;
        padding:0px 0.5rem;
        font-size:0.75rem;
        border-radius: 3px;
    }
    .food-made-big{
        width: 400px;
        gap:1rem;
        text-align: right;
    }
    .food-wasted-big{
        gap:1rem;
        text-align: right;
    }
    .food-wasted{
        height:15px;
        background-color:red;
        padding:0px 0.5rem;
        border-radius: 3px;
    }

    .flex-custom{
        gap:2rem;
        align-items: center;
        justify-content: space-between;
        flex-direction: row;

    }
</style>

<script>
    function redirectToView(id){
        window.location.href = id
    }
</script>

    <div class="page-m-container">

        <div style="color:white">
            <div class="current-view">
                <div class="display-row">
                    <div >
                        <h1>{{Str::ucfirst( $currentViewData['food_name'])}}</h1>
                    </div>

                    <div>
                        <form action="/delete/{{$id}}" method="post">
                        @csrf
                        <button type="submit"
                        style="background-color:white ; color:black; font-weigth:600; border:none"
                        > Delete</button></form>
                    </div>
                </div>
                <div class="display-row">
                    <div>
                        <div class="d-flex flex-custom">
                            Food Made : {{$currentViewData['quantity_made']}} {{ "( in " . $currentViewData['unit']  . "s )"}}
                            <div class="food-made food-made-big">
                            </div>

                        </div>
                        <div class="d-flex flex-custom ">
                            Food wasted : {{$currentViewData['quantity_wasted']}} {{ "( in " . $currentViewData['unit']  . "s )"}}
                            <div class="food-wasted food-wasted-big" style="width:{{($currentViewData['quantity_wasted']/$currentViewData['quantity_made'])*400 }}px " >
                            </div>

                        </div>
                    </div>
                    <div>
                        <span>You have wasted total of {{$totalWastage}} {{$currentViewData['unit']}} {{$currentViewData['food_name']}}  </span><br>
                        <span>Tip: Try to make {{$makeInMeal}} {{$currentViewData['unit']}} {{$currentViewData['food_name']}} per person next time. </span>
                    </div>
                    <div style="width:100px">
                        <span style="align-items: flex-end;  text-align: right">{{$currentViewData['people']}} people </span><br>
                        <span style="align-items: flex-end;  text-align: right">{{explode(" ",$currentViewData['created_at'])[0]}} </span><br>
                        <span style="text-align: right ; align-items: flex-end;">{{explode(" ",$currentViewData['created_at'])[1]}} </span>
                    </div>

                </div>


            </div>

            <div class="data-container">
                @if (count($sameFoodData)==0)
                    <h4> No other meals with {{Str::ucfirst($currentViewData['food_name'])}} </h4>
                @else
                    <h4> Other meals where you had {{Str::ucfirst($currentViewData['food_name'])}} </h4>
                @endif
                @foreach($sameFoodData as $food)
                <div onclick="redirectToView({{$food['id']}})" class="card" >
                    <div class="food_info">
                        <span class="food_name">{{Str::ucfirst($food['food_name']) }}</span><br>
                        <span class="meal_name">{{Str::ucfirst($food['people']) }} people</span>
                    </div>
                    <div class="bar-graph">
                        <div class="d-flex flex-custom">
                            <div class="food-made">
                            </div>
                            Food Made : {{$food['quantity_made']}} {{ "( in " . $food['unit']  . "s )"}}
                        </div>
                        <div class="d-flex flex-custom ">
                            <div class="food-wasted" style="width:{{($food['quantity_wasted']/$food['quantity_made'])*200 }}px " >
                            </div>
                            Food wasted : {{$food['quantity_wasted']}} {{ "( in " . $food['unit']  . "s )"}}
                        </div>
                    </div>
                    <div class="food_info">
                        <span class="food_name">{{ Str::ucfirst($food['meal_type'])  }}</span><br>
                        <span class="meal_name">{{  Str::ucfirst($food['created_at'])}} </span>
                    </div>
                    <div>
                        <a href="/view/{{($food['id'])}}" style="text-decoration: none; color:inherit; " class="food_name">
                            <img
                            style="height:40px;background-color: rgb(82, 82, 82); padding:0.5rem; border-radius: 50%"
                            src="{{URL(('images/eye.svg'))}}" alt="">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
