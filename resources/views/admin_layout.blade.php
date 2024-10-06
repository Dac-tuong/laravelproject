 <?php

    use Illuminate\Support\Facades\Session;

    $name = Session::get('admin_name');
    $id = Session::get('admin_id')
    ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>

     <!-- BOOTSTRAP STYLES-->
     <link href="{{asset('/admin/css/bootstrap.css')}}" rel="stylesheet" />

     <!-- CUSTOM STYLES-->
     <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet" />
     <link href="{{asset('admin/css/custom_table.css')}}" rel="stylesheet" />

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
         integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- GOOGLE FONTS-->
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

 </head>

 <body>
     <div id="wrapper">
         <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <a class="navbar-brand" href="index.html">Binary admin</a>
             </div>
             <div style="color: white; padding: 15px 50px 5px 50px;float: right; font-size: 16px;">
                 <?php
                    if ($name) {
                        echo 'Welcome ' . $name;
                    }
                    ?>
                 <a href="{{URL::to('/logout')}}" class="btn btn-danger square-btn-adjust">Logout</a>
             </div>
         </nav>
         <!-- /. NAV TOP  -->
         <nav class="navbar-default navbar-side" role="navigation">
             <div class="sidebar-collapse">
                 <ul class="nav" id="main-menu">
                     <li class="text-center">
                         <img src="assets/img/find_user.png" class="user-image img-responsive" />
                     </li>
                     <li>
                         <a class="active-menu" href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard fa-3x"></i>
                             Tổng quan</a>
                     </li>

                     <li>
                         <a href="#"><i class="fa fa-sitemap fa-3x"></i> Loại Sản phẩm<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                 <a href="{{URL::to('/add-category-product')}}">Thêm Loại Sản Phẩm</a>
                             </li>
                             <li>
                                 <a href="{{URL::to('/list-category-product')}}">Danh Sách Loại Sản Phẩm</a>
                             </li>

                         </ul>
                     </li>
                     <li>
                         <a href="#"><i class="fa fa-sitemap fa-3x"></i> Thương Hiệu Sản phẩm<span
                                 class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                 <a href="{{URL::to('/add-brand')}}">Thêm Thương Hiệu Sản Phẩm</a>
                             </li>
                             <li>
                                 <a href="{{URL::to('/list-brand')}}">Danh Thương Hiệu Sản Phẩm</a>
                             </li>

                         </ul>
                     </li>
                     <li>
                         <a href="#"><i class="fa fa-sitemap fa-3x"> </i> Sản phẩm<span class="fa arrow"> </span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                 <a href="{{URL::to('/add-product')}}">Thêm Sản Phẩm</a>
                             </li>
                             <li>
                                 <a href="{{URL::to('/list-product')}}">Danh Sách Sản Phẩm</a>
                             </li>

                         </ul>
                     </li>
                     <li>
                         <a href="#"><i class="fa fa-sitemap fa-3x"> </i> Phiếu giảm giá<span class="fa arrow">
                             </span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                 <a href="{{URL::to('/add-discount-code')}}">Thêm phiếu giảm giá</a>
                             </li>
                             <li>
                                 <a href="{{URL::to('/list-coupons')}}">Danh Sách phiếu giảm giá</a>
                             </li>
                         </ul>
                     </li>
                     <li>
                         <a href="#"><i class="fa fa-sitemap fa-3x"> </i> Slide<span class="fa arrow">
                             </span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                 <a href="{{URL::to('/add-slide')}}">Thêm Slide</a>
                             </li>
                             <li>
                                 <a href="#">Danh Sách Slide</a>
                             </li>
                         </ul>
                     </li>
                     <li class="notification">
                         <a href="{{URL::to('/order-view')}}">
                             <i class="fa fa-qrcode fa-3x"></i> Danh sách đơn hàng
                         </a>
                         <span class="badge">3</span>
                     </li>
                     <li class="notification">
                         <a href="{{URL::to('/feeship')}}">
                             <i class="fa fa-qrcode fa-3x"></i>Phí giao hàng
                         </a>
                     </li>
                     <li>
                         <a href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                     </li>
                     <li>
                         <a href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                     </li>
                     <li>
                         <a href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                     </li>
                     <li>
                         <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span
                                 class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                             <li>
                                 <a href="#">Second Level Link</a>
                             </li>
                             <li>
                                 <a href="#">Second Level Link</a>
                             </li>
                             <li>
                                 <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                 <ul class="nav nav-third-level">
                                     <li>
                                         <a href="#">Third Level Link</a>
                                     </li>
                                     <li>
                                         <a href="#">Third Level Link</a>
                                     </li>
                                     <li>
                                         <a href="#">Third Level Link</a>
                                     </li>

                                 </ul>

                             </li>
                         </ul>
                     </li>
                     <li>
                         <a href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                     </li>
                 </ul>

             </div>
         </nav>
         <!-- /. NAV SIDE  -->
         <div id="page-wrapper">
             <div id="page-inner">
                 <div class="row">
                     <div class="col-md-12">
                         @yield('admin_content')
                     </div>
                 </div>

             </div>
             <!-- /. PAGE INNER  -->
         </div>
         <!-- /. PAGE WRAPPER  -->
     </div>


 </body>

 <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
 <!-- JQUERY SCRIPTS -->
 <script src="{{asset('admin/js/jquery-1.10.2.js')}}"></script>
 <!-- BOOTSTRAP SCRIPTS -->
 <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
 <!-- METISMENU SCRIPTS -->
 <script src="{{asset('admin/js/jquery.metisMenu.js')}}"></script>
 <!-- CUSTOM SCRIPTS -->
 <script src="{{asset('admin/js/custom.js')}}"></script>

 <script src="{{asset('admin/js/jquery-3.6.0.min.js')}}"></script>

 <script>
     $(document).ready(function() {


         $('#add-feeship').click(function() {
             var id_province = $('#province').val();
             var _token = $('input[name="_token"]').val();

             $.ajax({
                 url: '/add-feeship',
                 method: 'POST',
                 data: {
                     id_province: id_province,
                     _token: _token
                 },
                 success: function(response) {
                     if (response.exists) {
                         alert('Dữ liệu này đã tồn tại');
                     } else {
                         alert('Thêm phí vận chuyển thành công');
                     }
                 },
                 error: function(xhr, status, error) {
                     alert('Đã có lỗi xảy ra: ' + error);
                 }
             });
         });
     })
 </script>

 <script>
     function removeVietnameseDiacritics(str) {
         return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '').replace(/đ/g, 'd').replace(/Đ/g, 'D');
     }

     function generateRandomString(length) {
         const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
         let result = '';
         const charactersLength = characters.length;
         for (let i = 0; i < length; i++) {
             result += characters.charAt(Math.floor(Math.random() * charactersLength));
         }
         return result;
     }

     document.querySelectorAll('[data-slug-source]').forEach(function(input) {
         input.addEventListener('input', function() {
             var sourceType = this.getAttribute('data-slug-source');
             var title = this.value;
             var slug = removeVietnameseDiacritics(title)
                 .toLowerCase()
                 .replace(/ /g, '-')
                 .replace(/[^\w-]+/g, '')
                 .replace(/--+/g, '-')
                 .replace(/^-+/, '')
                 .replace(/-+$/, '');
             var randomString = generateRandomString(6); // Độ dài chuỗi ngẫu nhiên là 6
             slug += '-' + randomString;
             var targetInput = document.querySelector('[data-slug-target="' + sourceType + '"]');
             if (targetInput) {
                 targetInput.value = slug;
             }
         });
     });
 </script>

 <script>
     document.getElementById('order-form').addEventListener('submit', function(event) {
         var orderStatus = document.getElementById('order-status').value;
         var orderNote = document.getElementById('order-note').value;

         // Kiểm tra nếu order-status là "0" (Đã hủy) và order-note trống
         if (orderStatus == '0' && orderNote.trim() === '') {
             event.preventDefault(); // Ngăn không cho form submit
             alert('Vui lòng nhập ghi chú khi đơn hàng đã bị hủy!');
         }
     });
 </script>

 </html>