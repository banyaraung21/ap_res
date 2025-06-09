@extends('layouts.master')

@section('content')
<div class="card">
              <div class="card-header">
                <a href="dish/create" class="btn btn-success">Create</a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                                  @if (session('message'))
                  <div class="alert alert-success">
                      {{ session('message') }}
                  </div>
                  @endif

                  @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Dish Name</th>
                    <th>OrderId</th>
                    <th>TableId</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($order as $order)
                        <tr>
                          <td>{{$order->dish->name}}</td>
                          <td>{{$order->order_id}}</td>
                          <td>{{$order->table_id}}</td>
                          <td>{{$status[$order->status]}}</td>
                          <td>
                            <a href="/order/{{$order->id}}/approve" class="btn btn-warning">Approve</a>
                            <a href="/order/{{$order->id}}/cancel" class="btn btn-danger">Cancle</a>
                            <a href="/order/{{$order->id}}/ready" class="btn btn-success">Ready</a>
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
        "searching" : false,
        "pageLength": 5,
        "lengthChange": false,
        "ordering": false,
        "info": true,
    });
});
</script>