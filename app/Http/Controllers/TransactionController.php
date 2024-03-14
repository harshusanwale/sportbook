<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Bet_type;
use App\Models\Player;
use App\Models\Period;
use App\Models\User;

class TransactionController extends Controller
{
    //Transaction list
    public function transactoin()
    {
        $players = Player::all();
        $tranlist = Transaction::with('agent','player')->get(); 
        return view('admin.transaction.transaction-list', compact('tranlist'));
    }

    //Add Transaction form
    public function Addtransactoin()
    {
        $periods = Period::get();
        $agent= User::with('roles')->where("role",'4')->get();
        $bet_types = Bet_type::get(); 
        $players =    Player::get(); 
        return view('admin.transaction.add-transaction',compact('periods','agent','bet_types','players'));
    }

    //Add Transaction Data
    public function PostAddtransactoin(Request $request)
    {
        $request->validate(
            [
                "name_url"    => "required",
                "player_name" => "required",
                "agent_id"    => "required",
                "bet_date"    => "required",
                "bet_time" => "required",
                "game_date" => "required",
                "game_time" => "required",
                "pick" => "required",
                "trans_number" => "required",
                "period" => "required",
                "bet_type" => "required",
                "side" => "required",
                "handicap" => "required",
                "price" => "required",
                "ref_number" => "required",
                "gross_risk" => "required",
                "gross_win" => "required",
                "net_risk" => "required",
                "net_win" => "required",
                "gross_profit" => "required",
                "net_profit" => "required",
                "result" => "required",
                "author" => "required",
                "family" => "required",
                "type"   => "required",
            ],
            [
                "name_url"         => "The name and url field is required.",
                "player_name"      => "The player name field is required.",
                "agent_id"         => "The agent name field is required.",
                "bet_date"         => "The bet date field is required.",
                "bet_time"         => "The bet time field is required.",
                "game_date"        => "The game date field is required.",
                "game_time"        => "The game time field is required.",
                "pick"             => "The pick field is required.",
                "trans_number"     => "The transaction number field is required.",
                "period"           => "The period field is required.",
                "bet_type"         => "The transaction number field is required.",
                "side"             => "The side field is required.",
                "handicap"         => "The handicap is required.",
                "price"            => "The price field is required.",
                "ref_number"       => "The reference number field is required.",
                "gross_risk"       => "The groess risk field is required.",
                "gross_win"       => "The gross win field is required.",
                "net_risk"        => "The net risk field is required.",
                "net_win"         => "The net win field is required.",
                "gross_profit"    => "The gross profit field is required.",
                "net_profit"      => "The net profit field is required.",
                "result"          => "The result field is required.",
                "author"          => "The author field is required.",
                "family"          => "The family field is required.",
                "type"             => "The type field is required.",
            ]
        );

        $bet_date = date('Y-m-d', strtotime($request->bet_date));
        $game_date = date('Y-m-d', strtotime($request->game_date));
        $bet_time = date('H:i:s', strtotime($request->bet_time));
        $game_time = date('H:i:s', strtotime($request->game_time));

        $transaction = new Transaction();
        $transaction->website_url    = $request->name_url;
        $transaction->player_name    = $request->player_name;
        $transaction->agent_id       = $request->agent_id;
        $transaction->bet_date       =  $bet_date ;
        $transaction->bet_time       = $bet_time;
        $transaction->game_date      =  $game_date;
        $transaction->game_time      =  $game_time;
        $transaction->trans_number   = $request->trans_number;
        $transaction->pick           = $request->pick;
        $transaction->period_id      = $request->period ;
        $transaction->bet_type_id    = $request->bet_type;
        $transaction->side           = $request->side;
        $transaction->handicap       = $request->handicap;
        $transaction->bet_price      = $request->price;
        $transaction->reference_num  = $request->ref_number;
        $transaction->gross_risk     = $request->gross_risk;
        $transaction->gross_win      = $request->gross_win ;
        $transaction->net_risk       = $request->net_risk;
        $transaction->net_win        = $request->net_win;
        $transaction->gross_profit   = $request->gross_profit;
        $transaction->net_profit     = $request->net_profit ;
        $transaction->result         = $request->result;
        $transaction->author         = $request->author;
        $transaction->family         = $request->family;
        $transaction->type           = $request->type;
        $transaction->save();

        return redirect()
                 ->route("transactionlist")
                 ->with("success", "Transaction has been added successfully.");
    }

    //Add Transaction form
    public function Viewtransactoin($id)
    {
        $transdata = Transaction::where('id',$id)->with('agent','period','bet_type','player')->first();
        return view('admin.transaction.view-transaction',compact('transdata'));
    }

    //Edit Transaction form
    public function Edittransactoin($id)
    {
        $periods = Period::get();
        $agent= User::with('roles')->where("role",'4')->get();
        $bet_types = Bet_type::get(); 
        $players =    Player::get(); 
        $edittransdata = Transaction::where('id',$id)->with('agent','period','bet_type','player')->first();
        return view('admin.transaction.edit-transaction',compact('edittransdata','periods','agent','bet_types','players'));
    }

    //update Transaction Data
    public function PostEdittransactoin(Request $request,$id)
    {
        $request->validate(
            [
                "name_url"    => "required",
                "player_name" => "required",
                "agent_id"    => "required",
                "bet_date"    => "required",
                "bet_time" => "required",
                "game_date" => "required",
                "game_time" => "required",
                "pick" => "required",
                "trans_number" => "required",
                "period" => "required",
                "bet_type" => "required",
                "side" => "required",
                "handicap" => "required",
                "price" => "required",
                "ref_number" => "required",
                "gross_risk" => "required",
                "gross_win" => "required",
                "net_risk" => "required",
                "net_win" => "required",
                "gross_profit" => "required",
                "net_profit" => "required",
                "result" => "required",
                "author" => "required",
                "family" => "required",
                "type"   => "required",
            ],
            [
                "name_url"         => "The name and url field is required.",
                "player_name"      => "The player name field is required.",
                "agent_id"         => "The agent name field is required.",
                "bet_date"         => "The bet date field is required.",
                "bet_time"         => "The bet time field is required.",
                "game_date"        => "The game date field is required.",
                "game_time"        => "The game time field is required.",
                "pick"             => "The pick field is required.",
                "trans_number"     => "The transaction number field is required.",
                "period"           => "The period field is required.",
                "bet_type"         => "The transaction number field is required.",
                "side"             => "The side field is required.",
                "handicap"         => "The handicap is required.",
                "price"            => "The price field is required.",
                "ref_number"       => "The reference number field is required.",
                "gross_risk"       => "The groess risk field is required.",
                "gross_win"       => "The gross win field is required.",
                "net_risk"        => "The net risk field is required.",
                "net_win"         => "The net win field is required.",
                "gross_profit"    => "The gross profit field is required.",
                "net_profit"      => "The net profit field is required.",
                "result"          => "The result field is required.",
                "author"          => "The author field is required.",
                "family"          => "The family field is required.",
                "type"             => "The type field is required.",
            ]
        );

        $datafind = Transaction::find($id);
        if (empty($datafind)) {
         return back()->with("failed", "Data not found");
        }else{

            $bet_date = date('Y-m-d', strtotime($request->bet_date));
            $game_date = date('Y-m-d', strtotime($request->game_date));
            $bet_time = date('H:i:s', strtotime($request->bet_time));
            $game_time = date('H:i:s', strtotime($request->game_time));
            $datafind->website_url    = $request->name_url;
            $datafind->player_name    = $request->player_name;
            $datafind->agent_id       = $request->agent_id;
            $datafind->bet_date       =  $bet_date ;
            $datafind->bet_time       = $bet_time;
            $datafind->game_date      =  $game_date;
            $datafind->game_time      =  $game_time;
            $datafind->trans_number   = $request->trans_number;
            $datafind->pick           = $request->pick;
            $datafind->period_id      = $request->period ;
            $datafind->bet_type_id    = $request->bet_type;
            $datafind->side           = $request->side;
            $datafind->handicap       = $request->handicap;
            $datafind->bet_price      = $request->price;
            $datafind->reference_num  = $request->ref_number;
            $datafind->gross_risk     = $request->gross_risk;
            $datafind->gross_win      = $request->gross_win ;
            $datafind->net_risk       = $request->net_risk;
            $datafind->net_win        = $request->net_win;
            $datafind->gross_profit   = $request->gross_profit;
            $datafind->net_profit     = $request->net_profit ;
            $datafind->result         = $request->result;
            $datafind->author         = $request->author;
            $datafind->family         = $request->family;
            $datafind->type           = $request->type;

            $datafind->save();

            return redirect()
                ->route("transactionlist")
                ->with("success", "Transaction has been updated successfully.");

        }

        
    }

    // Delete Transaction data
    public function DeleteTransaction($id)
    {
        $trans_id = $id;
        $deleteTran = Transaction::find($trans_id);
        $res = $deleteTran->delete();
        if ($res == true) {
            return back()->with("success", "Trabsaction has been deleted successfully.");
        } else {
            return back()->with("failed", "Data not deleted.");
        }
    }





    



}
