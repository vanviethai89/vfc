@extends('layouts.app')

@section('content')
    <div class="container">
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="owner_name" class="form-label">Người yêu cầu</label>
                <input type="text" class="form-control" name="owner_name" id="owner_name">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="is_high_priority" class="form-check-input" id="is_high_priority">
                <label class="form-check-label" for="exampleCheck1">Khẩn cấp ?</label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng</button>
        </form>
    </div>
@endsection
