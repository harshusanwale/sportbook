@extends('layout/layouts')

@section('form_js')
<script>
// $(document).ready(function () {
//     $('#submitFormBtn').click(function (event) {
//         event.preventDefault(); // Prevent default form submission
//         $.ajax({
//             type: 'POST',
//             url: $('#addAgentForm').attr('action'),
//             data: $('#addAgentForm').serialize(),
//             success: function (response) {
//                 console.log(response);
//                 // Redirect or show success message
//             },
//             error: function (xhr, status, error) {
//                 var errors = xhr.responseJSON.errors;
//                 // Clear previous error messages
//                 $('.text-danger').text('');
//                 // Display error messages next to respective fields
//                 $.each(errors, function (key, value) {
//                     $('#' + key).closest('.form-group').find('.text-danger').text(value[0]);
//                 });
//             }
//         });
//     });

//        // Event listener to clear error messages when user starts typing
//        $('#addAgentForm input').on('input', function () {
//         var fieldName = $(this).attr('name');
//         $(this).closest('.form-group').find('.text-danger').text('');
//     });

// });


</script>
@endsection

@section('space-work')
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1>Add Agent</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
         <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('AgentUsers')}}">Agent list</a></li>
        <li class="breadcrumb-item active">Add Agent</li>
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
        {{-- <div class="card-header">
        <h3 class="card-title">Add Agent</h3>
        </div> --}}
        <!-- /.card-header -->
    <div class="card-body">
        <form id="addAgentForm" action="{{ route('postaddsuperagent') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select Agent Role<span class="text-danger">*</span></label>
                        <select class="form-control select2" style="width: 100%;" name="role">
                            <option value="">Select role</option>
                            <option value="2">Super Agent</option>
                            <option value="3">Master Agent</option>
                            <option value="4">Agent</option>
                        </select>
                        @if($errors->has('role'))
                            <span class="text-danger">{{ $errors->first('role')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name/Alias<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="first_name" placeholder="First Name/Alias" name="first_name">
                        @if($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name')}}</span>
                        @endif
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password')}}</span>
                        @endif
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telegram ID<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tele_id" placeholder="Telegram ID" name="tele_id">
                        @if($errors->has('tele_id'))
                            <span class="text-danger">{{ $errors->first('tele_id')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Group Telegram ID</label>
                        <input type="text" class="form-control" id="group_tele_id" placeholder="Group Telegram ID" name="group_tele_id">
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Percentage of wins and losses </label>
                        <input type="number" class="form-control" id="per_win_loss" placeholder="Percentage of wins and losses" name="per_win_loss">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" id="submitFormBtn" class="btn btn-primary">Submit</button>
            </div>
        </form>
        
    </div>
    <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
