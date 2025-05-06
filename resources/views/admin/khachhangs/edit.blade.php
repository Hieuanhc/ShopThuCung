@extends('admin_layout')
@section('admin_content')
<h1 class="h3 mb-3"><strong>Sửa quyền user</strong></h1>

    <div class="err">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>


    <form method="POST" action="{{ route('khachhang.update', ['khachhang' => $khachhang->id_kh]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">Chọn quyền:</label>
            <select name="id_phanquyen" class="form-select">
                <option value="{{$khachhang->id_phanquyen}}" selected>
                    @if($khachhang->id_phanquyen == 1)
                        {{$khachhang->id_phanquyen}} - admin
                    @elseif ($khachhang->id_phanquyen == 2)
                        {{$khachhang->id_phanquyen}} - user
                    @elseif ($khachhang->id_phanquyen == 3)
                        {{$khachhang->id_phanquyen}} - staff
                    @else
                        <div></div>
                    @endif    
                </option>

                <option disabled>-----------------------</option>

                @foreach ($list_phanquyen as $phanquyen)
                    <option value="{{ $phanquyen->id_phanquyen }}">{{$phanquyen->id_phanquyen}} - {{ $phanquyen->tenquyen }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <input type="submit" class="btn btn-primary" value="Update">
            &nbsp;<a class="btn btn-secondary" href="{{URL::to('/admin/khachhang')}}">Hủy</a>
        </div>
    </form>

@endsection