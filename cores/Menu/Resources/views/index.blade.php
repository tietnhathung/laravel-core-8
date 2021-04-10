@extends('layouts.master')

@section('content')
    @csrf
    @include('shared.message')
    <div class="card">
        <div class="card-header">
            <h1 class="h5 m-0">Danh sách menu</h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <button type="button" class="btn btn-danger btn-sm btn-delete-multi" data-ajax-url="{{ route('menu.destroyMany') }}">
                    <i class="fas fa-trash-alt"></i>Xóa
                </button>
                <a href="{{ Utilities::getUrlWithGoBack(route('menu.create')) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-file-alt"></i>Thêm
                </a>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped table-data">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 40px;">
                                <input type="checkbox" class="chk-all" autocomplete="off" />
                            </th>
                            <th>Tên</th>
                            <th>Url</th>
                            <th class="text-center">Target</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center" style="width: 90px;">Vị trí</th>
                            <th class="text-center" style="width: 90px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @each('menu::partials.menu-item', $menuTree, 'item')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.orderUp').on('click', function () {
            item_id = $(this).attr('item-id');
            object_id = $(this).attr('object-id');

            $.ajax({
                type: 'POST',
                url: $(this).attr('abbr-url'),
                data: {
                    id: item_id,
                    objectid: object_id,
                    order: 'up'
                }
            }).done(function (msg) {
                window.location.reload();
            });
        });

        $('.orderDown').on('click', function () {
            item_id = $(this).attr('item-id');
            object_id = $(this).attr('object-id');
            console.log(item_id);

            $.ajax({
                type: 'POST',
                url: $(this).attr('abbr-url'),
                data: {
                    id: item_id,
                    objectid: object_id,
                    order: 'down'
                }
            }).done(function (msg) {
                window.location.reload();
            });
        });

        $('.changeStatusmenu').on('change', function () {
            id = $(this).attr('abbr');
            state = $(this).prop('checked') ? 1 : 0;
            console.log($(this).attr('abbr-url'));
            $.ajax({
                type: 'POST',
                url: $(this).attr('abbr-url'),
                dataType: 'JSON',
                data: {
                    id: id,
                    status: state
                }
            }).done(function (msg) {
                window.location.reload();
            });
        });

    </script>
@endsection
