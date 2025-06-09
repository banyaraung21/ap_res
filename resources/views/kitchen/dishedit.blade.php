@extends('layouts.master')

@section('content')
<div class="container-fluid">
<div class="card">
        <div class="bg-primary card-header">
            <h1>Edit Form</h1>

        </div>

        <div class="card-body">

        @if(Session::has('message'))
            <p class="alert alert-info">{{Session::get('message')}}</p>
        @endif

        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <form action="/dish/{{$dish->id}} " method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$dish->name}}">
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" class="form-control">
                        <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}"{{ $dish->category_id == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Image</label><br>
                    <img src="{{ asset('/images/' . $dish->dish_image) }}" width="100" height="100"><br><br>
                    <input type="file" name="dish_image">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
                </form>

        <a href="/dish" class="btn btn-warning" >Back</a>

        </div>
    </div>
</div>
@endsection