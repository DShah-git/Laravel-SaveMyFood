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

</script>

    <div class="page-m-container">
        <div class="current-view">
            <form method="POST" action="/createmeal">

            </form>
        </div>

    </div>

@endsection
