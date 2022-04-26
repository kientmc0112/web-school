@extends('portal.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cài đặt</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th width="100">Ảnh</th>
                                <th width="900">Cài đặt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $key => $image)
                            <tr class="odd gradeX">
                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                <td class="text-center">
                                    <img style="width: 300px; max-height: 200px; object-fit: contain"
                                        src="{{ asset($image->image_url) }}">
                                </td>
                                <td>
                                    <form class="w-100" action="{{ route('images.update', $image->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3" style="display: flex; align-items: center">
                                            <div class="col-md-2">
                                                <label>URL</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control" name="link" placeholder="URL ....."
                                                    value="{{ $image->link }}" style="width: 100%; margin-bottom: 10px">
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="display: flex; align-items: center">
                                            <div class="col-md-2">
                                                <label>Tiêu đề</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control" name="title" placeholder="Tiêu đề ....."
                                                    value="{{ $image->title }}" style="width: 100%; margin-bottom: 10px">
                                            </div>
                                        </div>
                                        <div class="row mb-3" style="display: flex; align-items: center">
                                            <div class="col-md-2">
                                                <label>Nội dung</label>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="content" style="width: 100%; margin-bottom: 10px" placeholder="Nội dung .....">{{ $image->content }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row text-right">
                                            <div class="col-md-12">
                                                <button class="btn btn-info" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            "language": {
                "decimal":        "",
                "emptyTable":     "Không có dữ liệu trong bảng",
                "info":           "Hiển thị _START_ đến _END_ trong số _TOTAL_ mục nhập",
                "infoEmpty":      "Hiển thị 0 đến 0 trong số 0 mục nhập",
                "infoFiltered":   "(được lọc từ _MAX_ tổng số mục nhập)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "Hiển thị _MENU_ mục",
                "loadingRecords": "Đang tải...",
                "processing":     "Xử lý...",
                "search":         "Tìm kiếm:",
                "zeroRecords":    "Không tìm thấy kết quả",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Tiếp",
                    "previous":   "Trước"
                },
                "aria": {
                    "sortAscending":  ": kích hoạt để sắp xếp cột tăng dần",
                    "sortDescending": ": kích hoạt để sắp xếp cột giảm dần"
                }
            }
        });
    });
</script>
@endsection