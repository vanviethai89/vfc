@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>STT</td>
                <td>Tiêu đề</td>
                <td>Người yêu cầu</td>
                <td>Trạng thái</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($prayers as $prayer)
            <tr>
                <td>1</td>
                <td>{{$prayer->title}}</td>
                <td>{{$prayer->owner_name}}</td>
                <td>{{$prayer->status}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
