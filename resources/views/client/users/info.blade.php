@extends('client.layouts.main')
@section('title', 'SIS')
@section('content')
<div id="body" style="margin-top: 30px;">
    <div class=container>
        <div class=content-pad-3x>
            <div class=row>
                <div id=content class=col-md-12>
                    <article class=single-event-content>
                        <div class=member-item>
                            <div class=row>
                                <div class="col-md-4 col-xs-5">
                                    <div class=content-pad>
                                        <div class=item-thumbnail>
                                            <img width=263 height=263
                                                style="object-fit: cover;"
                                                src="{{ isset($user->avatar) ? $user->avatar : "https://iupac.org/wp-content/uploads/2018/05/default-avatar.png" }}"
                                                class="attachment-thumb_263x263 size-thumb_263x263 wp-post-image"
                                                alt srcset sizes
                                                data-sf-original-srcset="http://sis.vnu.edu.vn/wp-content/uploads/2021/11/Picture1-1-263x263.png 263w, http://sis.vnu.edu.vn/wp-content/uploads/2021/11/Picture1-1-150x150.png 150w, http://sis.vnu.edu.vn/wp-content/uploads/2021/11/Picture1-1-50x50.png 50w, http://sis.vnu.edu.vn/wp-content/uploads/2021/11/Picture1-1-80x80.png 80w, http://sis.vnu.edu.vn/wp-content/uploads/2021/11/Picture1-1-100x100.png 100w, http://sis.vnu.edu.vn/wp-content/uploads/2021/11/Picture1-1-255x255.png 255w, http://sis.vnu.edu.vn/wp-content/uploads/2021/11/Picture1-1-300x300.png 300w">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-xs-7">
                                    <div class=content-pad>
                                        <div class=item-content>
                                            <h3 class=item-title>{{ $user->name }}</h3>
                                            <h4 class=small-text>{{ isset($user->position) ? $user->position : "" }}</h4>
                                            <div class="member-tax small-text">
                                                <a href="#"
                                                    class=cat-link>
                                                    {{ $user->level }}
                                                </a>
                                                
                                            </div>
                                            
                                            <p>
                                                Email: {{ $user->email }}
                                            </p>
                                            @if (isset($user->phone))
                                                <p>
                                                    ĐT: {{ $user->phone }}
                                                </p>
                                            @endif
                                            @if (isset($user->date_of_birth))
                                                <p>
                                                    Ngày Sinh: {{ $user->date_of_birth }}
                                                </p>
                                            @endif
                                            @if (isset($user->facebook_link))
                                                <p>
                                                    ĐT: {{ $user->facebook_link }}
                                                </p>
                                            @endif

                                            <ul class="list-inline social-light">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=pure-content>
                            <div class=content-pad>
                                <p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt><strong><b>Học
                                                vấn</b></strong></span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt>Tiến sĩ
                                        – Đại học Rikkyo, Nhật Bản (2005)</span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt><strong><b>Lĩnh
                                                vực nghiên cứu</b></strong></span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt>Di sản
                                        văn hóa phi vật thể</span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt><strong><b>Kinh
                                                nghiệm làm việc</b></strong></span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt>Giám
                                        đốc Đối ngoại, Trưởng ban Thông tin và Nghiên cứu, Ban Tri thức và
                                        Xuất bản, Ban Công nghệ thông tin và quản lý, Trung tâm Thông tin và
                                        Mạng lưới quốc tế về Di sản văn hóa phi vật thể ở Khu vực Châu Á –
                                        Thái Bình Dương dưới sự bảo trợ của UNESCO (ICHCAP) (2011 –
                                        nay)</span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt>Giảng
                                        viên kiêm nhiệm, Đại học Di sản văn hóa quốc gia (National
                                        University of Cultural Heritage) (2007 – nay)</span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt>Giảng
                                        viên, Cao đẳng Khoa học Sức khỏe Daejeon (Daejeon Health Sciences
                                        College), Đại học Yonsei (Yonsei University), Đại học Quốc gia
                                        Kyeongsang (National Kyeongsang University), Đại học Ngoại ngữ
                                        Hankuk&nbsp;(Hankuk University of Foreign Studies)…&nbsp;(2007 –
                                        nay)</span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt>Nghiên
                                        cứu viên, Viện nghiên cứu quốc gia Tokyo về Tài sản văn hóa quốc
                                        (tháng 12/2011 – 01/2012)</span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt>Trưởng
                                        phòng Thông tin và Nghiên cứu, Trung tâm Di sản Văn hóa Phi vật thể
                                        Châu Á – Thái Bình Dương, Quỹ Di sản Văn hóa Hàn Quốc (tháng 11/2006
                                        – tháng 07/2011)</span></p>
                                <p><span style=font-family:arial,helvetica,sans-serif;font-size:14pt>Chuyên
                                        viên, Viện Nghiên cứu di sản văn hóa quốc gia (National Research
                                        Institute of Cultural Heritage) (tháng 05/2003 – tháng
                                        10/2006)</span></p>
                                <p></p>
                            </div>
                        </div>


                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection