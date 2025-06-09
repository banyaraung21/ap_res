<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body>
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order List</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
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

                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <form action="{{route("order.create")}}" method="post">
                        @csrf
                        <div class="row">
                        @foreach ($dishes as $dish)

                                <div class="col-sm-4">
                                    <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('/images/' . $dish->dish_image) }}" width="100" height="100"><br><br>
                                        <h5 class="card-title">{{$dish->name}}</h5><br>
                                        <input type="number" value="" name="{{$dish->id}}">
                                    </div>
                                    </div>
                                </div>

                        @endforeach

                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
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
                          <td>{{$order->dish->name}}</td>
                          <td>{{$order->order_id}}</td>
                          <td>{{$order->table_id}}</td>
                          <td>{{$order->status}}</td>
                          <td>
                           <a href="" class="btn btn-warning">Serve</a>
                          </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
                   <!-- /.card -->
        </div>
        <!-- /.card -->
         <script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
    
