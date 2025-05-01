@extends('layouts.master')

@section('content')
<div class="card">
              <div class="card-header">
                <a href="dish/create" class="btn btn-success">Create</a>
                <a href="dish/create" class="btn btn-warning ml-auto">Logout</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Dish Name</th>
                    <th>Category</th>
                    <th>Created_up</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach($dishes as $dish)
                        <tr>
                            <td>{{$dish->name}}</td>
                            <td>{{$dish->category->name}}</td>
                            <td>{{$dish->created_at}}</td>
                            <td>
                              <div class="d-flex">
                              <a href="/dish/{{$dish->id}}/edit" class="btn btn-primary btn-sm m-2">Edit</a>

                              <form action="/dish/{{$dish->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this dish?');">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm m-2">Delete</button>
                              </form>
                              </div>

                              <!-- <a href="/dish/{{$dish->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                              <a href="/dish/{{$dish->id}}" class="btn btn-danger btn-sm">Delete</a> -->
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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>