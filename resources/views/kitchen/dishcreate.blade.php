@extends('layouts.master')

@section('content')
<div class="container-fluid">
<div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Form</h3 class="card-title">
            <a href="/dish" class="btn btn-warning" style="float:right">Back</a>
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
        <form action="/dish/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Image</label><br>
                    <input type="file" name="dish_image">
                </div>


                <button type="submit" class="btn btn-success">Submit</button>
                </form>



        </div>
    </div>
</div>
@endsection