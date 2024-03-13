@extends('layout/layouts')

@section('space-work')
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1>View Transaction</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('Dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('transactionlist')}}">Transaction list</a></li>
        <li class="breadcrumb-item active">View Transaction</li>
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
        <!-- <div class="card-header"> -->
        <!-- <h3 class="card-title">Add Transaction</h3> -->
        <!-- </div> -->
        <!-- /.card-header -->
        <div class="card-body">
        <form action="{{ route('postaddtransaction') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Sports Book/Casino name and URL</label>
                <input type="text" class="form-control" id="name_url" placeholder="Name/Url" name="name_url" value="{{ $transdata->website_url }}" readonly>
                @if($errors->has('name_url'))

                <span class="text-danger">{{ $errors->first('name_url')}}</span>

                @endif
            </div>
            </div>
              <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Player name</label>
                <input type="text" class="form-control" id="player_name" placeholder="Player name" name="player_name" value="{{ $transdata->player_name }}" readonly>
                @if($errors->has('player_name'))

                <span class="text-danger">{{ $errors->first('player_name')}}</span>

                @endif
            </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Agent(s) name</label>
                <input type="text" class="form-control" id="agent_id" placeholder="Agent name" name="agent_id" value="{{ $transdata->agent->name }}" readonly>                
            </div>
            @if($errors->has('agent_id'))

            <span class="text-danger">{{ $errors->first('agent_id')}}</span>

            @endif
           </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Bet Date</label>
                <input type="text" class="form-control" id="bet_date" placeholder="dd/mm/yyyy" name="bet_date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{date('d-m-Y', strtotime($transdata->bet_date))  }}" readonly>
            </div>
            @if($errors->has('bet_date'))

            <span class="text-danger">{{ $errors->first('bet_date')}}</span>

            @endif
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Bet Time</label>
                <div class="input-group date" id="timepicker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" id="bet_time" placeholder="Time" name="bet_time" id="bet_time" value="{{ date('h:i A', strtotime($transdata->bet_time)) }})" disabled/>
                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                </div>
            </div>
            @if($errors->has('bet_time'))

            <span class="text-danger">{{ $errors->first('bet_time')}}</span>

            @endif
           </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Game Date</label>
                    <input type="text" class="form-control" id="game_date" placeholder="dd/mm/yyyy" name="game_date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="{{date('d-m-Y', strtotime($transdata->game_date))  }}" readonly>
                    @if($errors->has('game_date'))

                    <span class="text-danger">{{ $errors->first('game_date')}}</span>

                    @endif
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Game Time</label>
                    <div class="input-group date" id="timepicker2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#timepicker2"  placeholder="Time" name="game_time" id="game_time" value="{{ date('h:i A', strtotime($transdata->game_time)) }})" disabled/>
                    <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                </div>
                </div>
                @if($errors->has('game_time'))

                <span class="text-danger">{{ $errors->first('game_time')}}</span>

                @endif
           </div>
           <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Pick</label>
                <input type="text" class="form-control" id="pick" placeholder="Pick" name="pick" value="{{ $transdata->pick}}" readonly>
            </div>
            @if($errors->has('pick'))

            <span class="text-danger">{{ $errors->first('pick')}}</span>

            @endif
           </div>            
            <!-- /.col -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ticket number/Transaction number</label>
                    <input type="text" class="form-control" id="trans_number" placeholder="Ticket number/Transaction number" name="trans_number" value="{{ $transdata->trans_number}}" readonly>
                </div>
                @if($errors->has('trans_number'))

                <span class="text-danger">{{ $errors->first('trans_number')}}</span>

                @endif
           </div>
           <div class="col-md-6">
            <div class="form-group">
                <label>Period</label>
                <input type="text" class="form-control" id="period" placeholder="Period" name="" value="{{ $transdata->period->period_name}}" readonly>
            </div>
            @if($errors->has('period'))

            <span class="text-danger">{{ $errors->first('period')}}</span>

            @endif
           </div>
            <!-- /.col -->
            
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Bet Type</label>
                    <input type="text" class="form-control" id="bet_type" placeholder="" name="Bet Type" value="{{ $transdata->bet_type->bet_name}}" readonly>
                </div>
                @if($errors->has('bet_type'))

                <span class="text-danger">{{ $errors->first('bet_type')}}</span>

                @endif
            </div>
            <div class="col-md-6">            
            <div class="form-group">
                <label>Side</label>
                <div class="d-flex">
                    <div class="form-check mr-3  d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="side" id="side" value="1" {{ $transdata->side == '1' ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="pick_home">Over</label>
                    </div>
                    <div class="form-check  d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="side" id="side" value="2" {{ $transdata->side == '2' ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="pick_home">Under</label>
                    </div>
                </div>
            </div>
            @if($errors->has('side'))

            <span class="text-danger">{{ $errors->first('side')}}</span>

            @endif
           </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Handicap</label>
                    <input type="text" class="form-control" id="handicap" placeholder="Handicap" name="handicap"  value="{{ $transdata->handicap }}" readonly>
                </div>
                @if($errors->has('handicap'))

                <span class="text-danger">{{ $errors->first('handicap')}}</span>

                @endif
           </div>
            <!-- /.col -->            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" id="price" placeholder="$" name="price" value="{{ '$'.$transdata->bet_price }}" readonly>
                </div>
                @if($errors->has('price'))

                <span class="text-danger">{{ $errors->first('price')}}</span>

                @endif
           </div>
            <!-- /.col --> 
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Reference Number</label>
                    <input type="text" class="form-control" id="ref_number" placeholder="Reference Number" name="ref_number" value="{{ $transdata->reference_num }}" readonly>
                </div>
                @if($errors->has('ref_number'))

                <span class="text-danger">{{ $errors->first('ref_number')}}</span>

                @endif
           </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gross Risk</label>
                    <input type="text" class="form-control" id="gross_risk" placeholder="$" name="gross_risk" value="{{ '$'.$transdata->gross_risk }}" readonly> 
                </div>
                @if($errors->has('gross_risk'))

                <span class="text-danger">{{ $errors->first('gross_risk')}}</span>

                @endif
           </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gross Win</label>
                    <input type="text" class="form-control" id="gross_win" placeholder="$" name="gross_win" value="{{ '$'.$transdata->gross_win }}" readonly>
                </div>
                @if($errors->has('gross_win'))

                <span class="text-danger">{{ $errors->first('gross_win')}}</span>

                @endif
           </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Net Risk</label>
                    <input type="text" class="form-control" id="net_risk" placeholder="$" name="net_risk" value="{{ '$'.$transdata->net_risk }}" readonly>
                </div>
                @if($errors->has('net_risk'))

                <span class="text-danger">{{ $errors->first('net_risk')}}</span>

                @endif
           </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Net Win</label>
                    <input type="text" class="form-control" id="net_win" placeholder="$" name="net_win"  value="{{ '$'.$transdata->net_win }}" readonly>
                </div>
                @if($errors->has('net_win'))

                <span class="text-danger">{{ $errors->first('net_win')}}</span>

                @endif
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Gross profit</label>
                    <input type="text" class="form-control" id="gross_profit" placeholder="$" name="gross_profit" value="{{ '$'.$transdata->gross_profit }}" readonly>
                </div>
                @if($errors->has('gross_profit'))

                <span class="text-danger">{{ $errors->first('gross_profit')}}</span>

                @endif
           </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Net Profit</label>
                    <input type="text" class="form-control" id="net_profit" placeholder="$" name="net_profit" value="{{ '$'.$transdata->net_profit }}" readonly>
                </div>
                @if($errors->has('net_profit'))

                <span class="text-danger">{{ $errors->first('net_profit')}}</span>

                @endif
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Result</label>
                    <input type="text" class="form-control" id="result" placeholder="$" name="result"  value="{{ '$'.$transdata->result }}" readonly>
                </div>
                @if($errors->has('result'))

                <span class="text-danger">{{ $errors->first('result')}}</span>

                @endif
           </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Author</label>
                    <input type="Type" class="form-control" id="author" placeholder="Author" name="author"  value="{{ $transdata->author }}" readonly>
                </div>
                @if($errors->has('author'))

                <span class="text-danger">{{ $errors->first('author')}}</span>

                @endif
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Family</label>
                    <input type="text" class="form-control" id="family" placeholder="Family" name="family" value="{{ $transdata->family }}" readonly>
                </div>
                @if($errors->has('family'))

                <span class="text-danger">{{ $errors->first('family')}}</span>

                @endif
           </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" class="form-control" id="type" placeholder="Type" name="type"  value="{{ $transdata->type }}" readonly>
                    @if($errors->has('type'))

                    <span class="text-danger">{{ $errors->first('type')}}</span>

                    @endif
                </div>
           </div>
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

