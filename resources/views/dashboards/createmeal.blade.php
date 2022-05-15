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

    .form-group-cus{
        margin-block: 1rem;
    }
</style>

<script>

</script>

    <div class="page-m-container">
        <h2>Lets create a meal</h2>
        <div class="current-view">
            <form class="form" method="POST" action="/createmeal">
                @csrf
                <div class="form-group form-group-cus">
                    <label for="food_name">Enter Food Name</label>
                    <input type="text" class="form-control" id="food_name" name="food_name" aria-describedby="food_name" placeholder="pasta">
                    @error('food_name')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group form-group-cus">
                    <label class="form-label" for="meal_type">Select a meal type </label>
                    <select name="meal_type" id="meal_type" class="form-select" aria-label="Default select example">
                        <option selected>Select a meal type.</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Brunch">Brunch</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Snack">Snack</option>
                        <option value="Dinner">Dinner</option>
                      </select>
                    @error('meal_type')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group form-group-cus">
                    Select a unit : &nbsp;&nbsp;&nbsp;
                    <div class="form-check form-check-inline">
                        <input name="unit" class="form-check-input" type="radio" id="gm" value="gm">
                        <label class="form-check-label" for="gm">gm</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="unit" class="form-check-input" type="radio" id="pcs" value="pcs">
                        <label class="form-check-label" for="pcs">pcs</label>
                    </div>
                    @error('unit')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group form-group-cus">
                    <label for="quantity_made">Enter quantity made</label>
                    <input type="number" class="form-control" id="quantity_made" name="quantity_made" aria-describedby="food_name">
                    @error('quantity_made')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group form-group-cus">
                    <label for="quantity_wasted">Enter quantity wasted</label>
                    <input type="number" class="form-control" id="quantity_wasted" name="quantity_wasted" aria-describedby="food_name" >
                    @error('quantity_wasted')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group form-group-cus">
                    <label for="People">People </label>
                    <input type="number" class="form-control" id="People" name="people" aria-describedby="food_name" >
                    @error('people')
                    <p class="text-danger small">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group form-group-cus">
                    <button type="submit" class="btn"
                        style="color:rgb(59, 59, 59); background-color:whitesmoke;
                        padding: 0.25rem 0.5rem; font-weight: 600"
                    >
                        Save Meal
                    </button>
                </div>


            </form>
        </div>

    </div>

@endsection
