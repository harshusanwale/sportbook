@extends('layout/layouts')

@section('space-work')
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1>View Agent</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li> 
        <li class="breadcrumb-item"><a href="{{route('AgentUsers')}}">Agent list</a></li>
        <li class="breadcrumb-item active">View Agent</li>
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
        {{-- <div class="card-header">
        <h3 class="card-title">View Agent</h3>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
        <form action="{{ route('posteditagent',$agent->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Role</label>
                    <input type="text" class="form-control" id="per_win_loss" placeholder="Role" name="role" value="@if($agent->role == '2'){{ 'Super Agent' }} @elseif($agent->role == '3'){{ 'Master Agent' }} @else{{ 'Agent' }}@endif" readonly>                 
                    @if($errors->has('role'))
                    <span class="text-danger">{{ $errors->first('role') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                <label>First Name/Alias</label>
                <input type="text" class="form-control" id="first_name" placeholder="First Name/Alias" name="first_name" value="{{$agent->name}}" readonly>
                @if($errors->has('first_name'))

                <span class="text-danger">{{ $errors->first('first_name')}}</span>

                @endif
            </div>
            </div>
         
            
        </div>
        <div class="row">
            <div class="col-md-6">
             <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{$agent->email}}" readonly>
                 @if($errors->has('email'))
                     <span class="text-danger">{{ $errors->first('email')}}</span>
                 @endif
             </div>
         </div>
        
         <div class="col-md-6">
            <div class="form-group">
                <label>Percentage of wins and losses </label>
                <input type="number" class="form-control" id="per_win_loss" placeholder="%" name="per_win_loss" value="{{$agent->per_win_loss}}" readonly>
            </div>
           </div>
         </div>

        <div class="row">
                
            <div class="col-md-6">
                <div class="form-group">
                    <label>Telegram ID</label>
                    <input type="text" class="form-control" id="tele_id" placeholder="Telegram ID*" name="tele_id" value="{{$agent->telegram_id}}" readonly>
                    @if($errors->has('tele_id'))
    
                    <span class="text-danger">{{ $errors->first('tele_id')}}</span>
    
                    @endif
                </div>
                </div>

            <div class="col-md-6">
            <div class="form-group">
                <label>Group Telegram ID</label>
                <input type="text" class="form-control" id="group_tele_id" placeholder="Group Telegram ID" name="group_tele_id" value="{{$agent->group_tele_id}}" readonly>
            </div>
           </div>
            
       
              <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            
            <!-- /.col -->

          
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.card-body -->
        <div class="card-footer p-0">
        <div>
        <a href="{{ url()->previous() }}" class="btn btn-block btn-primary" style="float: left; width:100px;">Back</a>
       </div>
        </div>
      </form>
    </div>
    <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

