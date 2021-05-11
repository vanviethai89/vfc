@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 50rem; margin: auto;">
            <div class="card-body">
                <form method="post" action="{{route('prayer.update')}}">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title', $prayer->title)}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea class="form-control" name="content" id="content" rows="8" required>{{old('content', $prayer->content)}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status-field" class="form-label">Trạng thái</label>
                        <select name="status" id="status-field" class="form-control">
                            @foreach (getListPrayerStatusLabel() as $status => $label)
                                <option value="{{$status}}" {{$status === $prayer->status ? 'selected' : ''}}>{{$label}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 belong-success-status" style="display: none;">
                        <label for="testimonial-field" class="form-label">Lời chứng</label>
                        <textarea name="testimonial" id="testimonial-field" cols="30" rows="5" class="form-control">{{old('testimonial', $prayer->testimonial)}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{route('prayer.index')}}" class="btn">Bỏ qua</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style type="text/css">

</style>
@endpush

@push('scripts')
    <script>
        $(function () {
            $('#status-field').change(function () {
                const val = $(this).val();

                if (val === 'COMPLETED') {
                    $('.belong-success-status').fadeIn();
                } else {
                    $('.belong-success-status').fadeOut();
                }
            });

            $('#status-field').trigger('change');
        });
    </script>
@endpush
