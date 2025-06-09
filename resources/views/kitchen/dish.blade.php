@extends('layouts.master')

@section('content')
<div class="card">
              <div class="card-header">
                <a href="dish/create" class="btn btn-success">Create</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Dish ID</th>
                    <th>Dish Name</th>
                    <th>Category</th>
                    <th>Created_up</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach($dishes as $dish)
                        <tr>
                            <td>{{$dish->id}}</td>
                            <td>{{$dish->name}}</td>
                            <td>{{$dish->category->name}}</td>
                            <td>{{$dish->created_at}}</td>
                            <td>
                              <div class="form-row">
                                <a style=" height: 40px; margin-right: 10px;" href="/dish/{{$dish->id}}/edit" class="btn btn-warning">Edit</a>
                                <form action="/dish/{{$dish->id}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button>
                                </form> 
                              </div>

                              <!-- <a href="/dish/{{$dish->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                              <a href="/dish/{{$dish->id}}delete" class="btn btn-danger btn-sm">Delete</a> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
@endsection
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(function () {
    $('#dishes').DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthChange": false,
        "ordering": true,
        "info": true,
    });
});
</script>