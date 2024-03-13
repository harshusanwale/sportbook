@extends('layout/layouts')

@section('space-work')

<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1>Transaction List</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Transaction List</li>
    </ol>
    </div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
    <div class="card">
        @if(Session::has('success'))
             <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ Session::get('success')}}</strong>
                  @php
                  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                  header("Cache-Control: post-check=0, pre-check=0", false);
                  header("Pragma: no-cache");
                  @endphp

            </div>        
         @endif

         @if(Session::has('failed'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('failed')}}</strong>
                @php
                header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");
                @endphp

        </div>        
         @endif

        <div class="card-header">
        <!-- <h3 class="card-title">Transaction List</h3> -->
        <div style="float:right">
        <a href="{{route('addtransaction')}}" class="btn btn-block btn-primary"
         style="float:right;">Add New Transaction</a>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr>
            <th>#</th>
            <th>Player Name</th>
            <th>Agent Name</th>
            <th>Transaction number</th>
            <th>Gross profit</th>
            <th>Net profit</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp <!-- Initialize $i outside the loop -->
            @foreach($tranlist as $list)
                <tr>
                    <td>{{ $i }}</td>                    
                    <td>{{$list->player_name}}</td>
                    <td>{{ $list->agent->name }}</td>
                    <td>{{ $list->trans_number }}</td>
                    <td>{{ '$'.$list->gross_profit }}</td>
                    <td>{{ '$'.$list->net_profit }}</td>
                    <td><button class="btn btn-dark p-2"><a href="{{ route('viewtransaction', [$list->id]) }}" class="text-white" style="color: #FFFFFF;"><i class="fa fa-eye"></i></a></button></td>
                </tr>
                @php $i++; @endphp <!-- Increment $i inside the loop -->
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('other_js')
<!-- <script>

</script> -->

@endsection
