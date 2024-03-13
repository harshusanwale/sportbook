@extends('layout/layouts')

@section('space-work')
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1>Edit Agent</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li> 
        <li class="breadcrumb-item"><a href="{{route('AgentUsers')}}">Agent list</a></li>
        <li class="breadcrumb-item active">Edit Agent</li>
    </ol>
    </div>
</div>
</div><!-- /.container-fluid -->
</section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        @if(Session::has('failed'))
        <div class="alert alert-danger alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ Session::get('failed')}}</strong>

        </div>
        @endif
        <div class="card-header">
        <h3 class="card-title">Edit Agent</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form action="{{ route('posteditagent',$users->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Select Role<span class="text-danger">*</span></label>
                    <select class="form-control select2" style="width: 100%;" name="role" >
                    <option value="2" @if($users->role == '2') selected @endif>Super Agent</option>
                    <option value="3" @if($users->role == '3') selected @endif>Master Agent</option>
                    <option value="4" @if($users->role == '4') selected @endif>Agent</option>
                    </select>
                    @if($errors->has('role'))
    
                    <span class="text-danger">{{ $errors->first('role')}}</span>
    
                    @endif
                </div>
               </div>

               <div class="col-md-6">
                <div class="form-group">
                    <label>First Name/Alias<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="first_name" placeholder="First Name/Alias" name="first_name" value="{{$users->name}}">
                    @if($errors->has('first_name'))
    
                    <span class="text-danger">{{ $errors->first('first_name')}}</span>
    
                    @endif
                </div>
                </div>

           
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
           <div class="col-md-6">
            <div class="form-group">
                <label>Email<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{$users->email}}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email')}}</span>
                @endif
            </div>
        </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password')}}</span>
                @endif
            </div>
            </div>
              <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Telegram ID<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tele_id" placeholder="Telegram ID*" name="tele_id" value="{{$users->telegram_id}}">
                    @if($errors->has('tele_id'))
    
                    <span class="text-danger">{{ $errors->first('tele_id')}}</span>
    
                    @endif
                </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Group Telegram ID</label>
                    <input type="text" class="form-control" id="group_tele_id" placeholder="Group Telegram ID" name="group_tele_id" value="{{$users->group_tele_id}}">
                </div>
               </div>
    
            
        </div>

        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Percentage of wins and losses </label>
                <input type="number" class="form-control" id="per_win_loss" placeholder="%" name="per_win_loss" value="{{$users->per_win_loss}}">
            </div>
           </div>
            
        </div>
        <!-- /.row -->
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit"  value="Update Role" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

