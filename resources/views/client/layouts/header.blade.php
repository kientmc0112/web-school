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

    /* Header */
    .header__nav {
        background-color: var(--blue-vnu);
    }

    .header__nav-list {
        list-style: none;
        text-align: right;
    }

    .header__nav-item {
        display: inline-block;
        margin: 0 3px;
        color: var(--text-white);
        font-size: 1.2rem;
    }

    .header__nav-item a {
        font-size: 1.2rem;
        color: var(--text-white);
        text-decoration: none;
        font-weight: 600;
    }

    .header-with-search{
        display: flex;
        justify-content: space-between;
    }
    .header__logo img {
        width: 400px;
        height: 150px;
    }

    .header__search-lang-list{
        list-style: none;
        text-align: right;
        margin: 20px 0;
    }

    .header__search {
        width: 190px;
        height: 25px;
        border: 1px solid var(--blue-vnu);
    }

    .header__search-item {
        margin: 20px 0;
    }

    .header__search-item p {
        font-size: 1.2rem;
    }

    .header__search input {
        width: 160px;
        height: 100%;
        outline: none;
        border: none;
    }

    .header__search button {
        width: 20px;
        height: 100%;
        padding: 1px;
        font-size: 1.4rem;
        background-color: var(--text-white);
        border: none;
        cursor: pointer;
    }

    .header__navbar {
        text-align: center;
    }
    .header__navbar, .header__subnav{
        list-style-type: none;
    }

    .header__navbar>li {
        display: inline-block;
    }

    .header__navbar li {
        position: relative;
    }

    .header__navbar>li>a {
        color: var(--text-white);
    }

    .header__navbar li a {
        text-decoration: none;
        font-size: 1.5rem;
        font-weight: 600;
        display: block;
        padding: 10px 24px;
    }

    .header__navbar li:hover .header__subnav{
        display: block;
    }

    .header__subnav li:hover a,
    .header__navbar>li:hover>a {
        background-color: var(--yellow-vnu);
        color: var(--text-black);
    }

    .header__subnav {
        display: none;
        position: absolute;
        background-color: var(--text-white);
        width: max-content;
        text-align: left;
    }

    .header__subnav a {
        color: var(--text-black);
    }


    /* Container */
    .container {
        background-color: gray;
        height: 300px;
    }
</style>

<header class="header">
    <nav class="header__nav">
        <div class="grid">
            <ul class="header__nav-list">
                <li class="header__nav-item">
                    <a href="">Email</a>
                </li>
                <li class="header__nav-item">|</li>
                <li class="header__nav-item">
                    <a href="" >E-office</a>
                </li>
                <li class="header__nav-item">|</li>
                <li class="header__nav-item">
                    <a href="" >Thư viện ảnh</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="header-with-search grid">
        <div class="header__logo">
            <img alt="" src="/public/images/VNU-SIS-logo(vns).png">
        </div>

        <div class="header__search-lang">
            <ul class="header__search-lang-list">
                <li class="header__search-item">
                    <img alt="" src="/public/images/en.jpg">
                    <img alt="" src="/public/images/vi.jpg">
                </li>
                <li class="header__search-item">
                    <p>Search | A - Z</p>
                </li>
                <li class="header__search-item">
                    <div class="header__search">
                        <input type="text" placeholder="---Từ khóa ---">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <nav class="header__nav">
        <ul class="header__navbar grid">
            <li><a href="">Trang chủ</a>
                <ul class="header__subnav">
                    <li><a href="">Tin tức | Sự Kiện</a></li>
                    <li><a href="">Tại sao chọn VNU - SIS</a></li>
                    <li><a href="">Cử nhân | Thạc sĩ | Tiến sĩ</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </li>
            <li><a href="">Giới thiệu</a>
                <ul class="header__subnav">
                    <li><a href="">Những dấu mốc trên hành trình phát triển </a></li>
                    <li><a href="">Tầm nhìn, sứ mệnh và giá trị cốt lõi</a></li>
                    <li><a href="">Thông điệp của CNK</a></li>
                    <li><a href="">Cơ cấu tổ chức</a></li>
                    <li><a href="">Tư liệu hình ảnh - video</a></li>
                    <li><a href="">Báo chí nói gì về VNU - SIS</a></li>
                </ul>
            </li>
            <li><a href="">Tuyển sinh</a>
                <ul class="header__subnav">
                    <li><a href="">Cử nhân</a></li>
                    <li><a href="">Thạc sĩ</a></li>
                    <li><a href="">Tiến sĩ</a></li>
                </ul>
            </li>
            <li><a href="">Đào tạo</a>
                <ul class="header__subnav">
                    <li><a href="">Cử nhân</a></li>
                    <li><a href="">Thạc sĩ</a></li>
                    <li><a href="">Tiến sĩ</a></li>
                    <li><a href="">Luận văn - Luận án</a></li>
                    <li><a href="">Công tác sinh viên</a></li>
                </ul>
            </li>
            <li><a href="">Tin tức</a>
                <ul class="header__subnav">
                    <li><a href="">Tin về ĐHQGHN</a></li>
                    <li><a href="">Tin nội bộ</a></li>
                    <li><a href="">Tin chuyên ngành</a></li>
                    <li><a href="">Tin tuyển sinh</a>
                    </li>
                </ul>
            </li>
            <li><a href="">Hợp tác phát triển</a>
                <ul class="header__subnav">
                    <li><a href="">Thông tin hợp tác phát triển</a></li>
                    <li><a href="">Đối tác trong nước và quốc tế</a></li>
                    <li><a href="">Chương trình đào tạo quốc tế</a></li>
                </ul>
            </li>
        </ul>
    </nav>

</header>
