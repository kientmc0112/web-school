@extends('client.layouts.main')
@section('title', 'SIS')
@section('css')
    <style>
        .list-post-with-category a {
            color: #fff;
            font-weight: bold;
            font-size: 12px;
            text-decoration: none;
        }
        .list-post-with-category a:hover {
            text-decoration: none
        }
        .left-sidebar {
            width: 197px;
            background: red;
        }
        .category-item {
            height: auto; 
            background: #0d2c6c; 
            display: flex;
            align-items: center;
            padding-left: 10px;
            margin: 5px 0;
            border-radius: 3px;
            cursor: pointer;
            flex-direction: row;
            justify-content: space-between;
            padding-right: 5px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .header-content {
            height: 30px;
            background-image: linear-gradient(180deg, #fefefe, #f3f3f3);
            border-bottom: solid 1px #ddd;
            margin-bottom: 10px;
        }
        .right-content {
            padding: 0;
            margin-top: 5px;
            border: solid 1px #ddd;
        }
        .cate {
            display: flex;
            flex-direction: column;
        }
        .cate .cate__header {
            display: flex;
            flex-direction: row;
        }
        .cate .cate__header .cate__title {
            background: #0d2c6c; 
            height: 30px; 
            width: 200px;
            display: flex;
            padding-left: 5px;
        }
        .cate .cate__header .cate__title label{
            color: #fff;
            font: bold 12px arial;
            display: flex;
            align-items: center;
        }
        .cate .cate__header .cate__bg {
            background-image: url("../../../../images/bg_1111.png");
            height: 30px; 
            width: 100%;
            margin-left: -1px;
        }
        .cate .cate__content {
            padding: 10px;
        }
        .content__item {
            margin: 5px 0;
        }
        .content__item .cate__icon {
            margin-top: -3px;
        }
        .content__item .cate__icon-new {
            margin-top: -10px;
        }
        .content__item .cate__title {
            color: #0d2c6c;
        }
        .content__item .cate__title:hover {
            color: red;
        }
        .post {
            padding: 10px;
        }
        .post .post__title a {
            color: #0d2c6c;
            font-family: Arial,Tahoma,Times New Roman;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
        }
        .post .post__title a:hover {
            color: red;
        }
        .post__content img {
            width: 100%;
            margin-bottom: 10px;
        }
        .post__other {
            margin-left: 10px;
            margin-top: 30px;
        }
        .home_news_category_bar
        {
            float:left;
            background: #dd8d00 repeat-x;
            height: auto;
            width: 85%;
            border-radius: 0 50px 0 0;
            padding-bottom: 5px;
        }
        .home_parent_category
        {
            color: #0d2c6c;
            text-transform: uppercase;
            font-size: 9pt;
            font-weight: bold;
            float: left;
            margin: 8px 13px 0 5px;
            display: inline;
        }
        .home_parent_category:hover
        {
            color: red;
        }
        .home_news_sub_panel
        {
            /*border-bottom: solid 1px #b7402a;*/
            float: left;
            font-size: 8px;
            height: auto;
            margin-left: 4px;
            padding-top: 8px;
            white-space: nowrap;
        }
        .home_news_sub_panel a
        {
            color: #000;
            font-size: 9pt;
        }
        .home_news_sub_panel a:hover
        {
            color: #444;
            font-weight:bold;
        }
    </style>
    <style>
        .ninja-team a {
            transition: all .2s ease-out;
            opacity: 1
        }

        .ninja-team a:hover {
            opacity: .8;
            text-decoration: none
        }

        .ninja-team .top-menu {
            background-color: #363636;
            z-index: 98;
            padding: 0;
            color: #fff;
            font-size: 13px;
            line-height: 15px
        }

        .ninja-team .top-menu ul.menu {
            display: inline-block;
            margin-bottom: 0;
            padding-left: 0
        }

        .ninja-team .top-menu ul.menu li {
            display: inline-block;
            position: relative;
            line-height: 40px
        }

        .ninja-team .top-menu ul.menu li span {
            padding-right: 15px
        }

        .ninja-team .top-menu ul.menu li span:hover {
            cursor: pointer;
            opacity: .8
        }

        .ninja-team .top-menu ul.menu li:hover a,
        .ninja-team .top-menu ul.menu li:hover span {
            color: #e94b00
        }

        .ninja-team .top-menu a {
            color: #fff
        }

        .ninja-team .top-menu a:last-child {
            margin-right: 0
        }

        .ninja-team .top-menu .right-menus a,
        .ninja-team .top-menu .right-menus ul.menu li span {
            padding-left: 15px;
            padding-right: 0
        }

        .ninja-team .top-menu .right-menus a:last-child {
            margin-left: 0
        }

        .ninja-team .top-menu .right-menus .my-account img {
            width: 20px !important;
            height: 20px;
            border-radius: 10px
        }

        .ninja-team .header-area {
            transition: all .6s ease
        }

        .ninja-team .header-area.sticky {
            position: fixed;
            top: 0;
            z-index: 99999;
            width: 100%;
            background: #223771
        }

        .ninja-team .header-area.sticky .main-menu .navbar li:hover>.nav-link:before {
            display: none
        }

        .ninja-team .header-area.sticky .main-menu .navbar .nav-link {
            color: #fff;
            padding: 10px 0
        }

        .ninja-team .header-area.sticky .logo {
            padding: 0
        }

        .ninja-team .header-area.sticky .logo img {
            max-width: 130px
        }

        .ninja-team .header-area.sticky .logo .sticky-logo {
            display: block
        }

        .ninja-team .header-area.sticky .main-menu .navbar .nav-link:hover:before,
        .ninja-team .header-area.sticky .slogan.khoavien tr:last-child {
            display: none
        }

        .ninja-team .header-area .logo {
            display: inline-block
        }

        @media (max-width:991px) {
            .ninja-team .header-area .logo {
            padding: 5px 0
            }
        }

        .ninja-team .header-area .logo img {
            max-height: 79px
        }

        @media (max-width:767px) {
            .ninja-team .header-area .logo img {
            max-width: 130px
            }
        }

        @media (max-width:991px) {

            .ninja-team .header-area .menu-logos,
            .ninja-team .header-area .right-main-menu {
            width: 100%
            }
        }

        .ninja-team .header-area .navbar {
            padding: 0;
            position: relative
        }

        @media (min-width:992px) {
            .ninja-team .header-area .navbar {
            position: static
            }
        }

        @media (max-width:991px) {
            .ninja-team .header-area .main-menu .navbar-collapse {
            max-height: 550px;
            overflow: auto
            }
        }

        .ninja-team .header-area .main-menu ul li {
            white-space: nowrap
        }

        .ninja-team .header-area .main-menu ul li.nav-item {
            margin-right: 10px;
            margin-left: 10px
        }

        .ninja-team .header-area .main-menu ul li.nav-item:last-child {
            margin-right: 0
        }

        .ninja-team .header-area .main-menu ul li.nav-item:first-child {
            margin-left: 0
        }

        .ninja-team .header-area .main-menu ul li.nav-item.has-submenu,
        .ninja-team .header-area .main-menu ul li.nav-item.has-submenu.short-menu {
            position: relative
        }

        @media (min-width:992px) {
            .ninja-team .header-area .main-menu ul li.nav-item.has-submenu {
            position: static
            }
        }

        .ninja-team .header-area .main-menu .navbar .collapse {
            display: none
        }

        @media (max-width:991px) {
            .ninja-team .header-area .main-menu .navbar .navbar-collapse {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            z-index: 999;
            padding: 10px 16px;
            box-shadow: 0 26px 48px 0 rgba(0, 0, 0, .15);
            margin-top: 15px
            }
        }

        .ninja-team .header-area .main-menu .navbar li:hover>.nav-link {
            color: #e94b00;
            font-weight: 700;
            opacity: 1
        }

        .ninja-team .header-area .main-menu .navbar li:hover>.nav-link:before {
            content: "";
            background-color: #e94b00;
            height: 2px;
            width: 100%;
            position: absolute;
            top: 20px;
            left: 0
        }

        @media (max-width:991px) {
            .ninja-team .header-area .main-menu .navbar li:hover>.nav-link:before {
            display: none
            }
        }

        .ninja-team .header-area .main-menu .navbar .nav-link {
            font-size: 15px;
            font-weight: 400;
            display: block;
            position: relative
        }

        .ninja-team .header-area .main-menu .navbar .nav-link.active,
        .ninja-team .header-area .main-menu .navbar .nav-link:hover {
            font-weight: 700;
            color: #e94b00;
            opacity: 1
        }

        .ninja-team .header-area .main-menu .navbar .nav-link.active:before,
        .ninja-team .header-area .main-menu .navbar .nav-link:hover:before {
            content: "";
            background-color: #e94b00;
            height: 2px;
            width: 100%;
            position: absolute;
            top: 20px;
            left: 0
        }

        .ninja-team .header-search {
            position: fixed;
            top: -200px;
            left: 0;
            width: 100%;
            z-index: 97;
            background-color: #e94b00;
            padding: 20px 0;
            transition: all .6s ease
        }

        .ninja-team .header-search .form-control {
            border-radius: 0;
            background-color: rgba(0, 0, 0, .3);
            border: none;
            color: #fff;
            font-weight: 400;
            font-size: 14px;
            padding: 20px 15px;
            outline: none
        }

        .ninja-team .header-search .form-control::placeholder {
            color: #fff
        }

        .ninja-team .header-search .btn-search {
            background-color: rgba(0, 0, 0, .3);
            color: #fff;
            border-radius: 0;
            font-weight: 300;
            font-size: 18px;
            padding: 9px 15px;
            line-height: 20px;
            border: 1px solid #a3340d
        }

        .ninja-team .header-search .btn-search i {
            margin-right: 15px;
            font-size: 20px;
            font-weight: 400
        }

        .ninja-team .header-search .btn-close {
            background-color: rgba(0, 0, 0, .3);
            color: #fff;
            border-radius: 0;
            font-weight: 300;
            font-size: 18px;
            padding: 9px 15px;
            line-height: 20px;
            border: 1px solid #a3340d
        }

        .ninja-team .header-search .btn-close i {
            font-size: 20px;
            font-weight: 400
        }

        @media (max-width:991px) {

            .ninja-team .header-search .btn-close,
            .ninja-team .header-search .btn-search {
            width: 100%;
            text-align: center;
            padding: 9px 6px
            }

            .ninja-team .header-search .btn-search i {
            margin-right: 0
            }
        }

        @media (max-width:767px) {

            .ninja-team .header-search .btn-close,
            .ninja-team .header-search .btn-search {
            width: 100%;
            text-align: center;
            padding: 9px 6px
            }

            .ninja-team .header-search .btn-search i {
            margin-right: 0
            }
        }

        .ninja-team .section {
            padding: 25px 0;
            padding-bottom: 100px;
        }

        .ninja-team .section .container {
            z-index: 2
        }

        .ninja-team .section .section-title h2 {
            font-style: normal;
            font-weight: 700;
            text-transform: uppercase;
            color: #000;
            position: relative;
            z-index: 1
        }

        .ninja-team .section .section-title h1:after,
        .ninja-team .section .section-title h1:before,
        .ninja-team .section .section-title h2:after,
        .ninja-team .section .section-title h2:before,
        .ninja-team .section .section-title h3:after,
        .ninja-team .section .section-title h3:before,
        .ninja-team .section .section-title h4:after,
        .ninja-team .section .section-title h4:before,
        .ninja-team .section .section-title h5:after,
        .ninja-team .section .section-title h5:before {
            position: absolute;
            height: 2px;
            background: #e94b00;
            content: "";
            box-sizing: border-box
        }

        .ninja-team .section .section-title h1:before,
        .ninja-team .section .section-title h2:before,
        .ninja-team .section .section-title h3:before,
        .ninja-team .section .section-title h4:before,
        .ninja-team .section .section-title h5:before {
            left: 46.62%;
            right: 46.78%;
            bottom: 18px;
            box-sizing: border-box
        }

        .ninja-team .section .section-title h1:after,
        .ninja-team .section .section-title h2:after,
        .ninja-team .section .section-title h3:after,
        .ninja-team .section .section-title h4:after,
        .ninja-team .section .section-title h5:after {
            left: 45.23%;
            right: 45.39%;
            bottom: 10px
        }

        @media (max-width:767px) {
            .ninja-team .section .section-title h2 {
            font-size: 18px;
            line-height: 22px
            }
        }

        .ninja-team .section .section-title.style-2 {
            margin-bottom: 30px;
            padding-bottom: 0
        }

        .ninja-team .section .section-title.style-2 h2 {
            text-align: left;
            padding-bottom: 0;
            font-size: 24px;
            line-height: 28px
        }

        .ninja-team .section .section-title.style-2 h1:after,
        .ninja-team .section .section-title.style-2 h1:before,
        .ninja-team .section .section-title.style-2 h2:after,
        .ninja-team .section .section-title.style-2 h2:before,
        .ninja-team .section .section-title.style-2 h3:after,
        .ninja-team .section .section-title.style-2 h3:before,
        .ninja-team .section .section-title.style-2 h4:after,
        .ninja-team .section .section-title.style-2 h4:before,
        .ninja-team .section .section-title.style-2 h5:after,
        .ninja-team .section .section-title.style-2 h5:before {
            display: none
        }

        .ninja-team .section .section-title.style-2 .title-hr {
            width: 100%;
            height: 2px;
            position: relative;
            background-color: #e6e6e6
        }

        .ninja-team .section .section-title.style-2 .title-hr:before {
            content: "";
            position: absolute;
            width: 70px;
            height: 2px;
            top: 0;
            left: 0;
            background-color: #e94b00
        }

        @media (max-width:767px) {
            .ninja-team .section .section-title.style-2 {
            margin-bottom: 15px
            }

            .ninja-team .section .section-title.style-2 h2 {
            font-size: 20px;
            line-height: 22px
            }
        }

        .ninja-team .section .section-content {
            z-index: 1
        }

        .ninja-team .footer .section-social-links {
            background: #e6e6e6;
            padding: 5px 0
        }

        .ninja-team .footer .section-footer-content {
            padding: 40px 0 30px
        }

        .ninja-team .footer .section-footer-content ul li {
            margin-bottom: 15px;
            font-style: normal;
            font-weight: 400;
            font-size: 13px;
            line-height: 14px
        }

        .ninja-team .footer .section-footer-content ul li.border {
            border: 1px solid #585858
        }

        .ninja-team .footer .section-footer-content ul li a:hover {
            color: #e94b00
        }

        .ninja-team .footer .section-footer-content ul li i.fa {
            margin-right: 15px
        }

        .ninja-team .footer .section-copy-right {
            padding: 20px 0 50px;
            background-color: #213671
        }

        .ninja-team .footer .section-copy-right .copy-right-text {
            font-family: Roboto;
            font-style: italic;
            font-weight: 400;
            font-size: 13px;
            color: #fff
        }

        .ninja-team .footer.mainblue .section-footer-content {
            padding-bottom: 10px;
            background: #002b54
        }

        .ninja-team .footer.mainblue .section-footer-content ul a,
        .ninja-team .footer.mainblue .section-footer-content ul li {
            color: #fff
        }

        .ninja-team .footer.mainblue .section-footer-content a:hover {
            color: #e94b00
        }

        .ninja-team .footer.mainblue .footer-logo:after,
        .ninja-team .footer.mainblue .footer-logo:before {
            background-color: #fff
        }

        .ninja-team .footer.mainblue .section-copy-right {
            border-top: none;
            padding-top: 0;
            background: #002b54
        }

        .ninja-team .footer.mainblue .section-copy-right .copy-right-text {
            border-top: 1px solid hsla(0, 0%, 100%, .1);
            padding-top: 30px
        }

        .ninja-team .footer-logo {
            position: relative
        }

        .ninja-team .footer-logo:before {
            content: "";
            width: 3px;
            height: 30px;
            background-color: #000;
            position: absolute;
            top: -40px;
            left: 0
        }

        .ninja-team .footer-logo:after {
            content: "";
            width: 30px;
            height: 3px;
            background-color: #000;
            position: absolute;
            bottom: 0;
            right: 0
        }

        .ninja-team .module-breadcrumb {
            background: #f9f9f9;
            border: 2px solid #fff;
            padding: 10px 0
        }

        .ninja-team .module-breadcrumb .breadcrumb {
            padding: 0;
            background: transparent;
            margin-bottom: 0
        }

        .ninja-team .module-breadcrumb .breadcrumb li {
            margin-right: 25px;
            position: relative
        }

        .ninja-team .module-breadcrumb .breadcrumb li a {
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 16px;
            color: #000
        }

        .ninja-team .module-breadcrumb .breadcrumb li a:hover {
            color: #e94b00
        }

        .ninja-team .module-breadcrumb .breadcrumb li:after {
            content: "/";
            width: 7px;
            height: 7px;
            position: absolute;
            right: -16px;
            top: 0
        }

        .ninja-team .module-breadcrumb .breadcrumb li.active a {
            color: #e94b00
        }

        .ninja-team .module-breadcrumb .breadcrumb li.active:after {
            content: ""
        }

        .ninja-team .select-languages {
            position: relative;
            display: inline-block;
            margin-left: 10px;
            padding: 10px 0
        }

        .ninja-team .select-languages .selected-language {
            border: 1px solid transparent;
            border-radius: 50%
        }

        .ninja-team .select-languages .list-flags {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0
        }

        .ninja-team .select-languages .list-flags li {
            white-space: nowrap;
            padding-bottom: 0;
            display: inline-block;
            padding-right: 5px
        }

        .ninja-team .select-languages .list-flags li:last-child {
            padding-right: 0
        }

        .ninja-team .select-languages .list-flags li a {
            padding-left: 0
        }

        .ninja-team .select-languages .list-flags li a img {
            transition: all .2s ease-out;
            opacity: .4
        }

        .ninja-team .select-languages .list-flags li a.active img,
        .ninja-team .select-languages .list-flags li a:hover img {
            opacity: 1
        }

        .ninja-team .co-cau-to-chuc {
            position: relative;
            width: 100%
        }

        .ninja-team .co-cau-to-chuc .rectangle {
            margin: 0 auto 40px;
            position: relative;
            padding: 20px 5px;
            background-color: #213671;
            color: #fff;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            margin-bottom: 385px;
        }

        .ninja-team .co-cau-to-chuc .rectangle .popover {
            transition: all .2s ease-out;
            opacity: 0;
            position: absolute;
            top: 10px;
            color: #fff;
            background-color: #222;
            padding: 5px;
            white-space: nowrap;
            height: 33px;
            border-radius: 0
        }

        @media (max-width:991px) {
            .ninja-team .co-cau-to-chuc .rectangle .popover {
            display: none
            }
        }

        .ninja-team .co-cau-to-chuc .rectangle:hover .popover {
            opacity: 1;
            top: -30px
        }

        .ninja-team .co-cau-to-chuc .level-1 .rectangle {
            width: 30%
        }

        .ninja-team .co-cau-to-chuc .level-1 .rectangle:before {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 385px;
            background-color: #213671
        }

        .ninja-team .co-cau-to-chuc .level-1.last .rectangle {
            margin-bottom: 100px
        }

        .ninja-team .co-cau-to-chuc .level-1.last .rectangle.cac-phong-ban {
            margin-bottom: 50px;
        }

        .ninja-team .co-cau-to-chuc .level-1.last .rectangle.cac-phong-ban:before {
            height: 50px;
        }

        .ninja-team .co-cau-to-chuc .level-1.last .rectangle:before {
            height: 0
        }

        .ninja-team .co-cau-to-chuc .header-connect {
            height: 54px;
            border-top: 2px solid #213671
        }

        .ninja-team .co-cau-to-chuc .header-connect.khoi-doanh-nghiep {
            position: absolute;
            width: 100%;
            height: 1px;
            top: -54px;
            left: 0
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle {
            width: 100%
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle.bg-white {
            border: 2px solid #213671;
            color: #213671
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle.sub-item {
            background: #e94b00
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle.top-connect:after {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 54px;
            background-color: #213671
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect:before {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 40px;
            background-color: #213671
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.connect-dash:before {
            background: transparent;
            border-left: 2px dashed #213671
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.long-connect:before {
            height: 435px
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.connect-2-level:before {
            height: 0
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle ul {
            padding-left: 10px;
            text-align: left;
            margin-bottom: 0;
            list-style: none;
            width: 100%
        }

        .ninja-team .co-cau-to-chuc .pb-item .rectangle ul li {
            margin-top: 7px;
            margin-bottom: 8px;
            font-size: 13px;
            text-transform: none;
            border-bottom: 1px solid rgba(0, 0, 0, .3)
        }

        .ninja-team .co-cau-to-chuc .absolute-item.dang-cong-doan {
            position: absolute;
            width: 23%;
            top: 0;
            right: 0;
            height: 305px
        }

        .ninja-team .co-cau-to-chuc .absolute-item.ban-dieu-hanh-cac-chuong-trinh {
            position: absolute;
            width: 18%;
            top: 100px;
            right: 15%;
            height: 56px
        }

        .ninja-team .co-cau-to-chuc .absolute-item.to-chuyen-mon-lien-nganh {
            position: absolute;
            width: 18%;
            top: 100px;
            left: 15%;
            height: 56px
        }

        .ninja-team .co-cau-to-chuc .absolute-item.to-tro-ly {
            position: absolute;
            width: 23%;
            top: 320px;
            left: 0;
            height: 54px
        }

        .ninja-team .co-cau-to-chuc .absolute-item.hoi-dong-khoa-hoc-va-dao-tao {
            position: absolute;
            width: 23%;
            top: 0;
            left: 0;
            height: 64px;
        }

        .ninja-team .co-cau-to-chuc .absolute-item.hoi-dong-khoa-hoc-va-dao-tao .rectangle.left-connect:before {
            width: 0;
        }

        .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-xa-hoi-va-nhan-van {
            position: absolute;
            width: 18%;
            top: 325px;
            right: 15%;
            height: 84px;
        }

        .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-quan-li-kinh-te-va-luat {
            position: absolute;
            width: 18%;
            top: 200px;
            left: calc(50% + 18px);
            height: 84px;
        }

        .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-quan-li-kinh-te-va-luat::before {
            width: 74%;
            border-top: 2px dashed #213671;
        }

        .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-tu-nhien-cong-nghe-va-ky-thuat {
            position: absolute;
            width: 18%;
            top: 200px;
            right: 0;
            height: 84px;
        }

        .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-quan-li-kinh-te-va-luat .rectangle.right-connect:before {
            border-top: 2px solid #213671;
            bottom: 38px;
            width: 100%;
        }

        .ninja-team .co-cau-to-chuc .absolute-item .rectangle.bg-white {
            border: 2px solid #213671;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #213671 !important;
            color: #fff;
        }

        .ninja-team .co-cau-to-chuc .absolute-item .rectangle.left-connect:before {
            content: "";
            position: absolute;
            bottom: 25px;
            right: 100%;
            width: 200%;
            height: 2px;
            border-top: 2px solid #213671
        }

        .ninja-team .co-cau-to-chuc .absolute-item.ban-dieu-hanh-cac-chuong-trinh.clone .rectangle.left-connect:before {
            content: "";
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 220px;
            background-color: #213671;
        }


        .ninja-team .co-cau-to-chuc .absolute-item.to-chuyen-mon-lien-nganh .rectangle.left-connect:before {
            content: "";
            position: absolute;
            bottom: 25px;
            left: 100%;
            width: 0;
            height: 2px;
            border-top: 2px solid #213671
        }

        .ninja-team .co-cau-to-chuc .absolute-item .rectangle.right-connect:before {
            content: "";
            position: absolute;
            bottom: 28px;
            left: 100%;
            width: 303px;
            height: 2px;
            /* border-top: 2px dashed #213671 */
        }

        .ninja-team .co-cau-to-chuc .col-8.col-connect-header {
            flex: 0 0 62.666667%;
            max-width: 62.666667%
        }

        .ninja-team .co-cau-to-chuc .col-9.offset-2 {
            margin-left: 12.55%
        }

        @media (min-width:992px) and (max-width:1199px) {
            .ninja-team .co-cau-to-chuc .absolute-item.to-chuyen-mon-lien-nganh .rectangle.left-connect:before {
            width: 0;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-quan-li-kinh-te-va-luat .rectangle.left-connect:before {
            width: 74%;
            border-top: 2px dashed #213671;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.dang-cong-doan {
            top: 0;
            height: 295px
            }

            .ninja-team .co-cau-to-chuc .absolute-item.hoi-dong-khoa-hoc-va-dao-tao {
            top: 0;
            height: 56px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.ban-dieu-hanh-cac-chuong-trinh {
            top: 100px;
            height: 56px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-tro-ly {
            top: 151px;
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.left-connect:before,
            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.right-connect:before {
            bottom: 25px;
            width: 118%
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-quan-li-kinh-te-va-luat .rectangle.right-connect:before {
            width: 74%;
            border-top: 2px solid #213671;
            }

            .ninja-team .co-cau-to-chuc .rectangle {
            font-size: 14px;
            line-height: 16px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle ul li {
            font-size: 12px
            }

            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.left-connect:before,
            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.right-connect:before {
            width: 200%;
            }
        }

        @media (max-width:991px) {
            .ninja-team .co-cau-to-chuc .level-1.last .rectangle.cac-phong-ban {
            margin-bottom: 20px;
            }

            .ninja-team .co-cau-to-chuc .level-1.last .rectangle.cac-phong-ban:before {
            height: 20px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-chuyen-mon-lien-nganh {
            top: 80px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-quan-li-kinh-te-va-luat::before {
            width: 74%;
            border-top: 2px dashed #213671;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-chuyen-mon-lien-nganh .rectangle.left-connect:before {
            width: 118%;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.dang-cong-doan {
            top: 0;
            height: 130px
            }

            .ninja-team .co-cau-to-chuc .absolute-item.hoi-dong-khoa-hoc-va-dao-tao {
            top: 0;
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .absolute-item.ban-dieu-hanh-cac-chuong-trinh {
            top: 80px;
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-tro-ly {
            top: 55px;
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.left-connect:before,
            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.right-connect:before {
            bottom: 14px;
            width: 118%
            }

            .ninja-team .co-cau-to-chuc .rectangle {
            margin: 0 auto 25px;
            padding: 10px 5px;
            font-size: 10px;
            line-height: 13px;
            min-height: 45px;
            margin-bottom: 415px;
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect:before,
            .ninja-team .co-cau-to-chuc .pb-item .rectangle.top-connect:after {
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.connect-2-level:before {
            height: 0
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.long-connect:before {
            height: 180px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle ul li {
            font-size: 5px;
            line-height: 7px;
            margin-bottom: 5px
            }

            .ninja-team .co-cau-to-chuc .header-connect {
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .header-connect.khoi-doanh-nghiep {
            top: -25px
            }

            .ninja-team .co-cau-to-chuc .level-1 .rectangle:before {
            height: 415px
            }

            .ninja-team .co-cau-to-chuc .level-1.last .rectangle {
            margin-bottom: 60px
            }

            .ninja-team .co-cau-to-chuc .level-1.last .rectangle:before {
            height: 0
            }
        }

        @media (max-width:767px) {
            .ninja-team .co-cau-to-chuc .absolute-item.to-chuyen-mon-lien-nganh {
            top: 80px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.dang-cong-doan {
            top: 0;
            height: 120px
            }

            .ninja-team .co-cau-to-chuc .absolute-item.hoi-dong-khoa-hoc-va-dao-tao,
            .ninja-team .co-cau-to-chuc .absolute-item.ban-dieu-hanh-cac-chuong-trinh {
            top: 125px;
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-tro-ly {
            top: 55px;
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.left-connect:before,
            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.right-connect:before {
            bottom: 5px;
            width: 125%
            }

            .ninja-team .co-cau-to-chuc .rectangle {
            margin: 0 auto 15px;
            padding: 3px 5px;
            font-size: 6px;
            line-height: 8px;
            min-height: 25px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.top-connect:after {
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect:before {
            height: 15px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.connect-2-level:before {
            height: 0
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.long-connect:before {
            height: 193px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle ul li {
            font-size: 5px;
            line-height: 7px;
            margin-bottom: 5px
            }

            .ninja-team .co-cau-to-chuc .header-connect {
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .header-connect.khoi-doanh-nghiep {
            top: -25px
            }

            .ninja-team .co-cau-to-chuc .level-1 .rectangle:before {
            height: 16px
            }

            .ninja-team .co-cau-to-chuc .level-1.last .rectangle {
            margin-bottom: 60px
            }

            .ninja-team .co-cau-to-chuc .level-1.last .rectangle:before {
            height: 60px
            }
        }

        @media (max-width:575px) {
            .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-xa-hoi-va-nhan-van {
            height: 50px;
            top: 160px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.ban-dieu-hanh-cac-chuong-trinh.clone .rectangle.left-connect:before {
            height: 90px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-quan-li-kinh-te-va-luat {
            height: 55px;
            top: 90px;
            left: calc(50% + 5px);
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-tu-nhien-cong-nghe-va-ky-thuat {
            height: 55px;
            top: 90px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-lien-nganh-khoa-hoc-quan-li-kinh-te-va-luat .rectangle.right-connect:before {
            bottom: 23px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-chuyen-mon-lien-nganh .rectangle.left-connect:before {
            bottom: 17px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.ban-dieu-hanh-cac-chuong-trinh .rectangle.left-connect:before {
            bottom: 17px;
            width: 118%;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-chuyen-mon-lien-nganh {
            height: 40px;
            top: 40px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.dang-cong-doan {
            top: 0;
            height: 120px
            }

            .ninja-team .co-cau-to-chuc .absolute-item.hoi-dong-khoa-hoc-va-dao-tao {
            top: 0;
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .absolute-item.ban-dieu-hanh-cac-chuong-trinh {
            height: 40px;
            top: 40px;
            }

            .ninja-team .co-cau-to-chuc .absolute-item.to-tro-ly {
            top: 55px;
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.left-connect:before,
            .ninja-team .co-cau-to-chuc .absolute-item .rectangle.right-connect:before {
            bottom: 5px;
            width: 125%
            }

            .ninja-team .co-cau-to-chuc .rectangle {
            margin: 0 auto 15px;
            padding: 3px 5px;
            font-size: 6px;
            line-height: 8px;
            min-height: 25px;
            margin-bottom: 190px;
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.top-connect:after {
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect:before {
            height: 15px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.connect-2-level:before {
            height: 0
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle.bottom-connect.long-connect:before {
            height: 193px
            }

            .ninja-team .co-cau-to-chuc .pb-item .rectangle ul li {
            font-size: 5px;
            line-height: 7px;
            margin-bottom: 5px
            }

            .ninja-team .co-cau-to-chuc .header-connect {
            height: 25px
            }

            .ninja-team .co-cau-to-chuc .header-connect.khoi-doanh-nghiep {
            top: -25px
            }

            .ninja-team .co-cau-to-chuc .level-1 .rectangle:before {
            height: 190px
            }

            .ninja-team .co-cau-to-chuc .level-1.last .rectangle {
            margin-bottom: 60px
            }

            .ninja-team .co-cau-to-chuc .level-1.last .rectangle:before {
            height: 0
            }
        }

        .ninja-team .footer-connect-us-title {
            font-size: 22px;
            font-weight: 700;
            line-height: .96;
            color: #223771;
            margin-bottom: 30px
        }

        @media (max-width:767px) {
            .ninja-team .footer-connect-us-title {
            text-align: center
            }
        }

        .ninja-team .footer-connect-us-info {
            list-style: none;
            margin: 0;
            padding: 0
        }

        .ninja-team .footer-connect-us-info li {
            color: #223771
        }

        .ninja-team .footer-connect-us-info li span {
            display: block;
            font-size: 12px;
            line-height: 1.67;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 10px
        }

        .ninja-team .footer-connect-us-info li span i {
            font-size: 14px
        }

        .ninja-team .footer-connect-us-info li p {
            font-size: 16px;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 0;
            word-break: break-word
        }

        .ninja-team .footer-connect-us-info li p a {
            color: #223771
        }

        @media (max-width:767px) {
            .ninja-team .footer-connect-us-info {
            text-align: center
            }
        }

        @media (min-width:992px) {
            .ninja-team .footer-connect-us-info li {
            padding-right: 40px
            }
        }

        @media (min-width:768px) {
            .ninja-team .footer-connect-us-info {
            display: flex;
            flex-wrap: wrap
            }

            .ninja-team .footer-connect-us-info li {
            width: 33.333333%;
            padding-right: 25px
            }
        }

        .ninja-team ::-webkit-scrollbar {
            width: 8px
        }

        .ninja-team ::-webkit-scrollbar-track {
            background: #eee;
            border-radius: 4px
        }

        .ninja-team ::-webkit-scrollbar-thumb {
            background: #bdbdbd;
            border-radius: 4px
        }

        .ninja-team ::-webkit-scrollbar-thumb:hover {
            background: #999
        }
        .level-2 {
            height: 80px;
        }
    </style>
@endsection

@section('content')
<div class="row" style="padding-top: 20px">
  <div class="col-lg-3 col-md-4 col-sm-12">
    @include('client.layouts.sidebar', ['level' => 0])
  </div>

  <div class="col-lg-9 col-md-8 col-sm-12 p-0" style="margin-top: 5px">
    @if (isset($post))
      <div class="post">
        <div class="post__title">
          <a href="">{{ Session::get('website_language') == 'en' && isset($post->title_en) ? $post->title_en : $post->title }}</a>
          <p>Cập nhật lúc {{ $post->updated_at }} </p>
        </div>
        <div class="post__content">
          <img src="{{ $post->thumbnail_url }}" alt="">
          {!! Session::get('website_language') == 'en' && isset($post->content_en) ? $post->content_en : $post->content !!}
        </div>

        @if (count($similarPosts) > 0)
            <div class="post__other">
            <p>CÁC TIN KHÁC</p>
            <div style="margin-left: 30px">
                @foreach ($similarPosts as $similarPost)
                <div class="content__item">
                    <img class="cate__icon" src="{{ asset('images/next_new_category.png') }}">
                    <a href="{{ route('categories.show', $id) . '?post_id=' . $similarPost->id }}" class="cate__title">
                    {{ Session::get('website_language') == 'en' && isset($similarPost->title_en) ? $similarPost->title_en : $similarPost->title }}
                    </a>
                    <img class="cate__icon-new" src="{{ asset('images/newnew.gif') }}">
                </div>
                @endforeach
            </div>
            </div>
        @endif
      </div>
    @else
      @if (Request::get('child_id') == 13)
        @include('client.components.structure')
      @else
        @foreach ($posts as $post)
          <div class="row post-preview">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="{{ route('categories.show', $id) . '?post_id=' . $post->id }}">
                <img class="w-100 mr-2 border-0 post-preview__img" src="{{ asset($post->thumbnail_url) }}"/>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 post-preview__div">
              <a href="{{ route('categories.show', $id) . '?post_id=' . $post->id }}">
                <h3 class="post-preview__h3">{{ Session::get('website_language') == 'en' && isset($post->title_en) ? $post->title_en : $post->title }}</h3>
                @if (Session::get('website_language') == 'en' && isset($post->content_en))
                    <p class="post-preview__p">{!! Str::limit(strip_tags($post->content_en), $limit = 300, $end = '...') !!}</p>
                @else
                    <p class="post-preview__p">{!! Str::limit(strip_tags($post->content), $limit = 300, $end = '...') !!}</p>
                @endif
                <span class="post-preview__span">By {{ $post->user->name }} | {{ Session::get('website_language') == 'en' && isset($post->category->name_en) ? $post->category->name_en : $post->category->name }}</span>
              </a>
            </div>
          </div>
        @endforeach
        @php $posts = $posts->toArray() @endphp
        @if ($posts['last_page'] > 1)    
          <nav aria-label="navigation" style="margin-top: 20px;">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="{{ $posts['prev_page_url'] !== null ?  $posts['prev_page_url'] : "#"}}" aria-label="Previous">
                <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
                </a>
              </li>
              @for ($i = 1; $i <= $posts["last_page"]; $i++)  
                <li class="page-item {{ $posts["current_page"] === $i ? "active" : "" }}">
                  <a class="page-link" href="{{ route('categories.show', $id) . "?page=" . $i }}">{{ $i }}</a>
                </li>
              @endfor
              <li class="page-item">
                <a class="page-link" href="{{ $posts['next_page_url'] !== null ?  $posts['next_page_url'] : "#"}}" aria-label="Next">
                <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        @endif
      @endif
    @endif
  </div>
</div>
@endsection
@section('js')
  <script>
    function onClickCategory(e) {
      const cateId = e.target.dataset.cate_id;
      const cateChild = document.querySelector('div[data-child="' + cateId +'"]');
      if (cateChild) {    
        if (cateChild.style.display === "none") {
          cateChild.style.display = "block";
          e.target.children[1].innerText = "-";
        } else {
          cateChild.style.display = "none";
          e.target.children[1].innerText = "+";
        }
      }
    }
  </script>
@endsection