@extends('layouts.userloggedin')

@section('loggedincontent')

<style>
    .data-container{
        width:100%;
        padding:1rem 0rem;
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
        margin-bottom: 1rem;
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
        /* /* color: black; */
        font-size:0.75rem;
        border-radius: 3px;
    }
    .food-wasted{
        height:15px;
        background-color:red;
        padding:0px 0.5rem;
        /* color: black;
        font-size:0.75rem; */
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
        window.location.href = "view/"+id
    }

    function createMeal(){
        window.location.href = "createmeal"
    }
</script>

<div class="page-m-container">
    <h3 style="margin-block:1rem;">Hi {{ explode(" ", auth()->user()->name)[0]  }}, Lets monitor your meals.</h3>

    <div style="margin-block: 1rem">
        <button
        onclick="createMeal()"
        style="padding: 0.5rem 1rem;font-size:1.3rem; border-radius: 5px;
                        background-color: rgb(63, 63, 63); color: whitesmoke;
                        border:none">
            Enter a Meal</button>
    </div>

    <div class="data-container">
        @foreach($data as $food)
        <div onclick="redirectToView({{$food['id']}})" class="card" >
            <div class="food_info">
                <span class="food_name">{{Str::ucfirst($food['food_name']) }}</span><br>
                <span class="meal_name">{{Str::ucfirst($food['people']) . ' people' }}</span>
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
@endsection
