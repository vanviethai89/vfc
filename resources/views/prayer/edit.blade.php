@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 50rem; margin: auto;">
            <div class="card-body">
                <form method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title', $prayer->title)}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea class="form-control" name="content" id="content" rows="3" required>{{old('content', $prayer->content)}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select name="status" id="status" class="form-control">
                            @foreach (getListPrayerStatusLabel() as $status => $label)
                                <option value="{{$status}}" {{$status === $prayer->status ? 'selected' : ''}}>{{$label}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style type="text/css">

</style>
@endpush
