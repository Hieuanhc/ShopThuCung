<?php
namespace App\Repositories;

use App\Repositories\IUserRepository;
use App\Models\Khachhang;

class UserRepository implements IUserRepository{

    public function allKhachhang(){
        return Khachhang::all();
    }
    public function findKhachhang($id){
        return Khachhang::where('id_kh', $id)->first();
    }
    public function updateKhachhang($data, $id){
        $this->findKhachhang($id)->update($data);
    }

    public function deleteKhachhang($id){
        $customer =  $this->findKhachhang($id);
        if($customer->id_phanquyen != 1){
            $customer->delete();
        }
    }
}