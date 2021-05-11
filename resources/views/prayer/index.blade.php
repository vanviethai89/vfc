@extends('layouts.app')

@section('content')
    <div class="container">
        @can('create', 'App\Models\Prayer')
            <div class="pt-2 pb-4 float-end">
                <a href="{{route('prayer.create')}}" class="btn btn-primary">Tạo mới</a>
            </div>
        @endcan
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="text-center">STT</th>
                <th width="50%">Điểm cầu nguyện</th>
                <th class="text-center">Số lần<br>cầu nguyện</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Ngày tạo</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($prayerPaginator->items() as $prayer)
                <tr>
                    <td class="text-center align-middle">{{$loop->iteration}}</td>
                    <td>
                        <div class="cut-text">
                            <a href="#" class="js-detail" data-url="{{route('prayer.show', ['id' => $prayer->id])}}" data-toggle="tooltip" data-title="{{$prayer->title}}">{{$prayer->title}}</a>
                        </div>
                        <p><strong>{{$prayer->title}}</strong></p>
                        <div>
                            {!! $prayer->content_formatted !!}
                        </div>
                    </td>
                    <td class="text-center align-middle">
                        <span class="prayer-number">{{$prayer->total_prayer}}</span>
                        @if ($prayer->status === \App\Models\Prayer::STATUS_COMPLETED && !in_array($prayer->id, session()->get('prayed_ids', [])))
                            <br />
                        <a href="#" class="badge bg-dark js-increase-total-prayer plus-prayer-btn"
                           data-action="{{route('prayer.increase_total_prayer', ['id' => $prayer->id])}}"
                        >
                            +1 cầu nguyện
                        </a>
                        @endif
                    </td>
                    <td class="text-center align-middle">{!!prayerStatusToBadge($prayer->status)!!}</td>
                    <td class="text-center align-middle">{{$prayer->created_at->diffForHumans()}}</td>
                    <td class="text-center align-middle">
                        @can('update', $prayer)
                            <a href="{{route('prayer.edit', ['id' => $prayer->id])}}" title="Cập nhật"><i class="fas fa-edit"></i></a>
                        @endcan

                        @can('delete', $prayer)
                            <a href="#" title="Xoá" class="js-delete ml-2" data-url="{{route('prayer.destroy', ['id' => $prayer->id])}}"><i class="fas fa-trash"></i></a>
                        @endcan

                        @if ($prayer->status === \App\Models\Prayer::STATUS_COMPLETED && $prayer->testimonial)
                            <a href="#" title="Xoá" class="js-delete ml-2" data-url="{{route('prayer.destroy', ['id' => $prayer->id])}}"><i class="fas fa-comment-alt-dots"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $prayerPaginator->links() }}

    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>

    <!-- Modal -->
    <div class="modal fade" id="detail-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail-modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div id="detail-modal-body">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"><i class="fas fa-praying-hands"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.js-delete', function (e) {
            if (!confirm('Bạn chắc chắn muốn xoá ?')) {
                e.preventDefault();
            }
            $('#delete-form').attr('action', $(this).data('url'));
            $('#delete-form').submit();
        });

        $(function() {
            $('.js-detail').click(function(e) {
                Loading.show();
                e.preventDefault();
                const url = $(this).data('url');

                $.get(url, {})
                    .done(function (response) {
                        $('#detail-modal-title').html(response.title);
                        $('#detail-modal-body').html(response.content);
                        $('#detail-modal').modal('show');
                    })
                    .always(function () {
                        Loading.hide();
                    })
                ;
            });

            $('.js-increase-total-prayer').click(function (e) {
                Loading.show();
                e.preventDefault();
                const actionUrl = $(this).data('action');
                const $this = $(this);

                $.post(actionUrl, {})
                    .done(function (response) {
                        var $parent = $this.closest('td');
                        $this.remove();
                        var prayerNumberPlus1 = Number($parent.find('.prayer-number').text()) + 1;
                        $parent.find('.prayer-number').text(prayerNumberPlus1);
                    })
                    .always(function () {
                        Loading.hide();
                    });
            });
        });
    </script>
@endpush
