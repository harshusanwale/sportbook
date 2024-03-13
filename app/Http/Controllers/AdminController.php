<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Player;
use Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function agents()
    {
        $users = User::with('roles')->whereIn("role", [2, 3, 4])->get();
        return view('admin.agents', compact('users'));
    }

     public function AddAgent()
     {
     return view("admin.add-agent");
     }

      //Add agent data
      public function PostAddAgent(Request $request)
      {
          $request->validate([
              'first_name' => 'required',
              'tele_id' => 'required|unique:users,telegram_id', // Ensure tele_id is unique in the users table
              'password' => 'required|min:8',
              'role' => 'required',
              'email' => 'required|email|unique:users,email', // Ensure email is unique in the users table
          ]);
      
          $user = new User();
          $user->role = $request->role;
          $user->name = $request->first_name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->telegram_id = $request->tele_id;
          $user->group_tele_id = $request->group_tele_id;
          $user->per_win_loss = $request->per_win_loss;
          $res = $user->save();
      
          if ($res) {
              // Redirect to "AgentUsers" route if agent is successfully added
              return redirect()->route("AgentUsers")->with("success", "Super Agent has been added successfully.");
          } else {
              return redirect()->route("AgentUsers")->with("error", "Failed to add Super Agent.");
          }
      }
      

  
    public function editviewAgent($id)
     {
         $users = User::find($id);
         return view("admin.edit-agent", compact("users"));
     }

     //update  agent  data
     public function UpdateAgent(Request $request, $id)
     {
        $request->validate([
            'first_name' => 'required',
            'tele_id' => 'required|unique:users,telegram_id,'. $id, // Ensure tele_id is unique in the users table
            //'password' => 'required|min:8',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,' . $id, 

        ]);

         $userfind = User::find($id);

         if (empty($userfind)) {
             return back()->with("failed", "Data not found");
         } else {

             if($request->password) {
                 $pass = Hash::make($request->password);
                
             } else {
                $pass = $userfind->password;
              
             }
            
             $userfind->name = $request->first_name;
             $userfind->email = $request->email;
             $userfind->telegram_id = $request->tele_id;
             $userfind->group_tele_id = $request->group_tele_id;
             $userfind->per_win_loss = $request->per_win_loss;
             $userfind->password = $pass;
             $userfind->role = $request->role;
             $userfind->save();

             return redirect()
                 ->route("AgentUsers")
                 ->with("success", "Agent has been updated successfully.");
         }
     }

     // Delete agent
     public function DeleteAgent($id){
         $agent_id = $id;
         // // dd($user_id);
         $deleteUser = User::find($agent_id);
         $res = $deleteUser->delete();
         if ($res == true) {
         return back()->with("success", "Agent has been deleted successfully.");
         }else {
         return back()->with("failed", "Data not deleted.");
         }
     }

      // View Agent
    public function ViewAgent($id)
    {
        $agent = User::find($id);
        return view("admin.view-agent", compact("agent"));
    }


    //Players list
    public function managePlayers()
    {
        $players = Player::get();
        $agents = User::with('roles')->whereIn("role", [2, 3, 4])->get();
        return view('admin.manage-players', compact('players','agents'));
    }
     
    //Show add  player form 
    public function addPlayers()
    {
       $agents = User::with('roles')->whereIn("role", [2, 3, 4])->get();
       return view("admin.add-players",compact('agents'));
    }
     
    // Add player data
     public function postaddPlayer(Request $request)
    {
        $request->validate([
            'password' => "required|min:8",
            'username' => 'required|unique:players,username' // Ensure tele_id is unique in the users table
       
            ]);

        $user = new Player();
        $user->username       = $request->username;
        $user->password       = Hash::make($request->password);
        $user->url            = $request->url;
        $user->ip             = $request->ip;
        $user->credits        = $request->credits;
        $user->max_win        = $request->max_win;
        $user->max_bet        = $request->max_bet;
        $user->agent_id       = $request->agent;
        $user->account_status = $request->account_status;
        $res = $user->save();


        return redirect()
            ->route("managePlayers")
            ->with("success", "Players has been added successfully.");
    }

    // Show Player Edit Form
    public function editviewPlayer($id)
    {
        $player = Player::find($id);
        $agents = User::with('roles')->whereIn("role", [2, 3, 4])->get();
        return view("admin.edit-player", compact("player",'agents'));
    }

    //update  player  data
    public function UpdatePlayer(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:players,username,' . $id, 
            ]);

        $playerfind = Player::find($id);

        if (empty($playerfind)) {
            return back()->with("failed", "Data not found");
        } else {
            if ($request->password) {
                $pass = Hash::make($request->password);
            } else {
                $pass = $playerfind->password;
            }

        $playerfind->username       = $request->username;
        $playerfind->password       = Hash::make($request->password);
        $playerfind->url            = $request->url;
        $playerfind->ip             = $request->ip;
        $playerfind->credits        = $request->credits;
        $playerfind->max_win        = $request->max_win;
        $playerfind->max_bet        = $request->max_bet;
        $playerfind->agent_id       = $request->agent;
        $playerfind->account_status = $request->account_status;
        $playerfind->save();

        return redirect()
            ->route("managePlayers")
            ->with("success", "Players has been updated successfully.");
        }
    }


    // Delete Player
    public function DeletePlayer($id){
        $player_id = $id;
        // // dd($user_id);
        $deletePlayer = Player::find($player_id);
        $res = $deletePlayer->delete();
        if ($res == true) {
        return back()->with("success", "Players has been deleted successfully.");
        }else {
        return back()->with("failed", "Data not deleted.");
        }
    }


    // View Player
    public function ViewPlayer($id)
    {
        $player = Player::find($id);
        $agents = User::with('roles')->whereIn("role", [2, 3, 4])->get();
        return view("admin.view-player", compact("player",'agents'));
    }

     public function manageRole()
     {
         $users = User::where('role','!=',1)->get();
         $roles = Role::all();
         return view('admin.manage-role', compact(['users','roles']));
     }

     public function updateRole(Request $request)
     {
         User::where('id', $request->user_id)->update([
             'role' => $request->role_id
         ]);
         return redirect()->back();
     }


}
