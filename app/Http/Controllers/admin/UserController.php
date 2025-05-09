<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use App\Models\Phanquyen;

use App\Repositories\IUserRepository;

class UserController extends Controller
{

    private $UserRepository;

    public function __construct(IUserRepository $UserRepository) {
        $this->UserRepository = $UserRepository;
    }

    public function index(){
        $Khachhangs = $this->UserRepository->allKhachhang();

        return view('admin.khachhangs.index', ['Khachhangs' => $Khachhangs]);
    }

    public function edit($id){
        $list_phanquyen = Phanquyen::all();
        $khachhang = $this->UserRepository->findKhachhang($id);
        return view('admin.khachhangs.edit', ['khachhang' => $khachhang], ['list_phanquyen' => $list_phanquyen]);
    }

    public function update($id, Request $request){
        $validatedData = $request->validate([
            'id_phanquyen' => 'required',
        ]);
        $this->UserRepository->updateKhachhang($validatedData, $id);

        return redirect()->route('khachhang.index')->with('success', 'Cập nhập khách hàng thành công');
    }

    public function destroy($id){
        $this->UserRepository->deleteKhachhang($id);

        return redirect()->route('khachhang.index')->with('success', 'Xóa khách hàng thành công');
    }

}
