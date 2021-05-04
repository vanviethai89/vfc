@extends('layouts.app')

@section('content')
    <div class="container">
        @can('create', 'App\Models\Prayer')
            <div class="pt-2 pb-4 float-end">
                <a href="{{route('prayer.create')}}" class="btn btn-primary">Tạo mới điểm cầu nguyện</a>
            </div>
        @endcan
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Điểm cầu nguyện</th>
                <th>Người yêu cầu</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($prayers as $prayer)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$prayer->title}}</td>
                    <td>{{$prayer->owner_name}}</td>
                    <td>{{$prayer->created_at->diffForHumans()}}</td>
                    <td>{{prayerStatusToLabel($prayer->status)}}</td>
                    <td>
                        @can('update', $prayer)
                            <a href="{{route('prayer.edit', ['id' => $prayer->id])}}" title="Cập nhật">Edit</a>
                        @endcan

                        @can('delete', $prayer)
                            <a href="#" title="Xoá" class="js-delete" data-url="{{route('prayer.delete', ['id' => $prayer->id])}}">Delete</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.js-delete', function () {
            $('#delete-form').attr('action', $(this).data('url'));
            $('#delete-form').submit();
        });
    </script>
@endpush
