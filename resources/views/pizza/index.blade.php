@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- left --}}
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
        {{-- right --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-bordered  table-hover border-info">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>

                                            <th scope="col">Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">S.Price</th>
                                            <th scope="col">M.Price</th>
                                            <th scope="col">L.price</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allPizza as $key => $pizza )
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td><img src="{{ Storage::url($pizza->image); }}" width="80" alt="" srcset=""></td>
                                            <td>{{ $pizza->name }}</td>

                                            <td>{{ $pizza->category }}</td>
                                            <td>{{ $pizza->description }}</td>
                                            <td>{{ $pizza->small_pizza_price }}</td>
                                            <td>{{ $pizza->medium_pizza_price }}</td>
                                            <td>{{ $pizza->large_pizza_price }}</td>
                                            <td><button class="btn btn-info">Edit</button></td>
                                            <td><button class="btn btn-danger">Delete</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
