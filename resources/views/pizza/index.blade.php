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
                {{-- delete this part --}}
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    All Pizza
                    <a href="{{ route('pizza.create') }}">
                        <button class="btn btn-success">Add Pizza</button>
                    </a>
                </div>

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
                                        @if (count($allPizza) > 0)
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
                                            <td><a href="{{ route('pizza.edit', $pizza->id) }}"><button class="btn btn-info">Edit</button></a></td>
                                            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pizza->id }}">Delete</button></td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $pizza->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('pizza.destroy', $pizza->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Confirm Delete
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                            </div>
                                        </tr>
                                        @endforeach
                                        @else
                                        <p>No Pizza added</p>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $allPizza->links() }}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
