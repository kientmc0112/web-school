<style>
* {
        padding: 0;
        margin: 0;
        box-sizing: inherit;
    }

    :root{
        --blue-vnu: #0d2c6c;
        --yellow-vnu: #dd8d00;
        --text-white: #fff;
        --text-black: #000;
    }

    html {
        font-size: 62.5%;
        line-height: 1.6rem;
        font-family: 'Open Sans', sans-serif;
        box-sizing: border-box;
    }

    /* Responsive */
    .grid {
        width: 1028px;
        max-width: 100%;
        margin: 0 auto;
    }
    .grid__full-width {
        width: 100%;
    }
    .grid__row {
        display: flex;
        flex-wrap: wrap;
    }

/* Footer */
footer {
    position: absolute;
    bottom: 0;
    width: 100%;
}

/*Start Footer above */
.footer__above {
    background-color: var(--gray-vnu);
    height: 300px;
}

.footer__container{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    flex-direction: row;
}

.footer__content {
    width: 20%;
}

.above h2{
    position: relative;
    color: var(--text-black);
    text-transform: uppercase;
    font-weight: 500;
    margin: 15px 0;
}

.above h2::before{
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 50px;
    height: 2px;
    background: var(--blue-vnu);
}

.above ul li{
    list-style: none;
}
.above ul li a{
    color: var(--text-black);
    text-decoration: none;
    font-weight: 400;
    margin-bottom: 5px;
    display: inline-block;
}
.above ul li a:hover{
    color: var(--blue-vnu);
}

.footer__img {
    margin-top: 50px;
}

.footer__img img {
    width: 50px;
    height: 50px;
    margin: 0 5px;
}
/*End Footer above */

/* Start Footer below */
.footer__below {
    background-color: var(--blue-vnu);
    height: 100px;
}
.footer__logo img {
    width: 90px;
}
.below {
    margin: auto 0;
}

.below ul li {
    text-align: right;
    list-style-type: none;
    color: var(--text-white);
}
/*End Footer below */
</style>

<footer>
        <div class="footer__above">
            <div class="footer__container grid">

                <div class="footer__content above">
                    <h2>Giới thiệu</h2>
                    <ul>
                        <li><a href="#">Giới thiệu về SIS</a></li>
                        <li><a href="#">Tin nghiên cứu khoa học</a></li>
                        <li><a href="#">Cơ cấu tổ chức</a></li>
                        <li><a href="#">Đội ngũ giảng viên</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                    <h2>Tuyển sinh</h2>
                    <ul>
                        <li><a href="#">Tuyển sinh Cử nhân</a></li>
                        <li><a href="#">Tuyển sinh Thạc sĩ</a></li>
                        <li><a href="#">Tuyển sinh Tiến sĩ</a></li>
                    </ul>
                </div>

                <div class="footer__content above">
                    <h2>Tin tức</h2>
                    <ul>
                        <li><a href="#">Tin đào tạo</a></li>
                        <li><a href="#">Chương trình đào tạo</a></li>
                        <li><a href="#">Hoạt động đoàn thể</a></li>
                        <li><a href="#">Tin tổ chức</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                    </ul>
                    <h2>Thông tin hữu ích</h2>
                    <ul>
                        <li><a href="#">Web ĐHQG Hà Nội</a></li>
                        <li><a href="#">Thư viện Đại học Quốc gia HN</a></li>
                        <li><a href="#">Tài nguyên số</a></li>
                        <li><a href="#">Học liệu số</a></li>
                    </ul>
                </div>

                <div class="footer__content above">
                    <h2>Chương trình đào tạo</h2>
                    <ul>
                        <li><a href="#">Giới thiệu hoạt động đào tạo</a></li>
                        <li><a href="#">Chương trình ĐT Cử nhân</a></li>
                        <li><a href="#">Chương trình ĐT Thạc sĩ</a></li>
                        <li><a href="#">Chương trình ĐT Tiến sĩ</a></li>
                    </ul>
                </div>

                <div class="footer__content above">
                    <h2>Nghiên cứu khoa học</h2>
                    <ul>
                        <li><a href="#">Giới thiệu hoạt động NCKH</a></li>
                        <li><a href="#">Nhóm nghiên cứu mạnh</a></li>
                        <li><a href="#">Thống kê</a></li>
                    </ul>

                    <div class="footer__img">
                        <a href=""><img src="{{ url('images/fb.jpg') }}"></a>
                        <a href=""><img src="{{ url('images/yt.png') }}"></a>
                        <a href=""><img src="{{ url('images/em.jpg') }}"></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer__below">
            <div class="footer__container grid">
                <div class="footer__logo">
                    <img alt="" src="{{ url('images/VNU-SIS-logo.png') }}">
                </div>
                <div class="below">
                    <ul>
                        <li>Bản quyền thuộc về Khoa các khoa học liên quan - Đại học Quốc gia Hà Nội</li>
                        <li>Giấy phép số 3994/GP-TTĐT, do Sở Thông tin và Truyền Thông, UBND Thành phố Hà Nội cấp ngày
                            14/12/2015</li>
                        <li>144 đường Xuân Thủy, quận Cầu Giấy, Hà Nội. Tel: (84.24) 37547506 Fax: (84.24) 37546765</li>
                        <li>Email: news_sis@vnu.edu.vn</li>
                        <li>Website: http://sis.edu.vn - http://sis.edu.vn</li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>