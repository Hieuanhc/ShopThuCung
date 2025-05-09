<?php
namespace App\Repositories;

interface IUserRepository{
    public function allKhachhang();
    public function findKhachhang($id);
    public function updateKhachhang($data, $id);
    public function deleteKhachhang($id);
}