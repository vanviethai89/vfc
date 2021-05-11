@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 50rem; margin: auto;">
            <div class="card-body">
                <form method="post" action="{{route('prayer.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea class="form-control" name="content" id="content" rows="8" required>{{old('content')}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style type="text/css">

</style>
@endpush
