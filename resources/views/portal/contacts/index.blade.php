@extends('portal.layouts.main')
@section('title', 'Post')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách</h1>
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
                                <th>#</th>
                                <th width="100">Họ và tên</th>
                                <th width="100">Email</th>
                                <th width="100">Số điện thoại</th>
                                <th width="150">Tiêu đề</th>
                                <th width="300">Nội dung</th>
                                @if ($status != 0)
                                    <th width="300">Ghi chú</th>
                                @endif
                                <th width="100">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $key => $contact)
                            <tr class="odd gradeX">
                                <td style="text-align: center;">{{ $key + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->telephone }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->content }}</td>
                                @if ($status != 0)
                                    <td>{{ $contact->note }}</td>
                                @endif
                                <td class="text-center d-flex">
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
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
