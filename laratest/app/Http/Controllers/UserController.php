<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public static $arrayUser = [
                    ['id'=>1, 'username'=>'alamin', 'password'=>'123', 'email'=>'email@aiub.edu', 'type'=>'admin'],
                    ['id'=>2, 'username'=>'xyz', 'password'=>'223', 'email'=>'xyz@aiub.edu', 'type'=>'admin'],
                    ['id'=>3, 'username'=>'abc', 'password'=>'124453', 'email'=>'abc@aiub.edu', 'type'=>'admin'],
                ];

    public function index(){

    }

    public function create(){
        return view('user.create');
    }

    public function addUser(Request $request){
        array_push(UserController::$arrayUser, $request);
        //var_dump(UserController::$arrayUser);
        //return view('user.userlist')->with('userlist', UserController::$arrayUser);
        return redirect('/user/list');
    }

    public function details($id){
        //var_dump($arrayUser);

        $users = $this->getUserList();
        $user = '';

        foreach($users as $u){
            if($u['id'] == $id){
                $user = $u;
                break;
            }
        }
        //$user= ['id'=>1, 'name'=>'alamin', 'password'=>'123', 'email'=>'aa@aiub.edu','type'=>'user'];
        return view('user.details')->with('user', $user);
    }

    public function edit($id){
        //echo $id;
        $userInfo = null;
        foreach (UserController::$arrayUser as $array) {
            if ($array['id'] == $id) {
                $userInfo = $array;
                break;
            }
        }
        //var_dump($userInfo['email']);
        return view('user.edit', compact('userInfo'));
    }

    public function update(Request $req){
        $i = 0;
        while (!empty(UserController::$arrayUser)){
            if(UserController::$arrayUser[$i]['id'] == $req['id']){
                UserController::$arrayUser[$i]['username'] = $req['username'];
                UserController::$arrayUser[$i]['password'] = $req['password'];
                UserController::$arrayUser[$i]['email'] = $req['email'];
                UserController::$arrayUser[$i]['type'] = $req['type'];
                break;
            }
            $i++;
        }

        //var_dump(UserController::$arrayUser);
        return view('user.userlist')->with('userlist', UserController::$arrayUser);
    }



    public function delete($id){
        /*echo $id;*/
        //$this->destroy($id);
        //return redirect('/user/delete/'.$id);
        return view('user.delete');
    }

    public function destroy($id){
        foreach(UserController::$arrayUser as $key => $item) {
            if ($item['id'] == $id) {
                unset(UserController::$arrayUser[$id]);
            }
        }
        //$this->list();
        return view('user.userlist')->with('userlist', UserController::$arrayUser);
        //return redirect('/user/list');
    }

    public function list(){
        //$users = $this->getUserList();
        /*return view('user.userlist')->with('userlist', $users);*/
        var_dump(UserController::$arrayUser);
        return view('user.userlist')->with('userlist', UserController::$arrayUser);
    }

    public function getUserList(){
        /*return [
            ['id'=>1, 'username'=>'alamin', 'password'=>'123', 'email'=>'email@aiub.edu', 'type'=>'admin'],
            ['id'=>2, 'username'=>'xyz', 'password'=>'223', 'email'=>'xyz@aiub.edu', 'type'=>'admin'],
            ['id'=>3, 'username'=>'abc', 'password'=>'124453', 'email'=>'abc@aiub.edu', 'type'=>'admin'],
        ];*/
        return UserController::$arrayUser;
    }
}
