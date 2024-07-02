@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- left-->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                    </ul>

                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ( $errors->all() as $error )
                        <p>{{ $error }}</p>
                            {{ $error }}
                        
                    @endforeach
                </div>
                @endif
            </div>
        </div>


        <!-- right-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                
                <form action="{{ route('pizza.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <label for="name" class="mt-2  mb-1">
                                Pizza Name
                            </label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="ctegory" class="mt-2  mb-1">Category</label>
                            <select name="category" class="form-control" id="">
                                <option value=""></option>
                                <option value="traditional" selected name="category">Traditional Pizza</option>
                                <option value="vegetarian" name="category">Vegetarian Pizza</option>
                                <option value="nonvegetarian" name="category">Non Vagetarian Pizza</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="description" class="mt-2  mb-1">
                                Description
                            </label>
                            <textarea type="text" name="description" id="" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <label class="mt-2  mb-1">
                                Pizza Price
                            </label>
                            <div class="col-md-4">
                                <input type="number" name="small_pizza_price" class="form-control"   placeholder="small pizza price">
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="medium_pizza_price" class="form-control" placeholder="medium pizza price">
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="large_pizza_price" class="form-control" placeholder="large pizza">
                            </div>        
                        </div>
                        <div class="form-group mb-2">
                            <label for="image" class="mt-2  mb-1">Image</label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>
                        <div class="form-group text-center mb-2">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
