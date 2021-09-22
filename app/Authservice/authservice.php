<?php
namespace App\Authservice;

use App\Models\Auth\Admin;
use Illuminate\Support\Facades\Hash;

class authservice{
    public function storeData($data){
        $reg=new Admin();
        $reg->name=$data['name'];
        $reg->email=$data['email'];
        $reg->password=Hash::make($data['confirm_password']);
        $reg->save();
    }
}