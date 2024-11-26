 <?php

    use Illuminate\Support\Facades\Session;

    $id = Session::get('id_customer');
    $name = Session::get('name_customer')
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="{{asset("user/css/base.css")}}">
     <link rel="stylesheet" href="{{asset("user/css/main.css")}}">
     <link rel="stylesheet" href="{{asset("user/css/toastr.css")}}">
     <link rel="stylesheet" href="{{asset("user/css/bootstrap.css")}}">



     <!-- Link font-awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
         integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- Link font-awesome -->
 </head>

 <body>


     <!-- <ul class="header__navbar-user-menu">

 <a href="{{URL::to('/login-index')}}" class="sign-in">Đăng nhập</a>
                                 <a href="{{URL::to('/register-index')}}" class="sign-up">Đăng ký</a>
                                 <a href="{{URL::to('/logout')}}">Đăng xuất</a>
         <li class="header__navbar-user-list-item">
             <a href="{{URL::to('/cart')}}">Giỏ hàng</a>
         </li>
         <li class="header__navbar-user-list-item">
             <a href="">Địa chỉ của tôi</a>
         </li>
         <li class="header__navbar-user-list-item">
             <a href="">Đơn mua</a>
         </li>
         <li class="header__navbar-user-list-item">
             <a href="{{URL::to('/checkout')}}">Checkout</a>
         </li>
         <li class="header__navbar-user-list-item header__navbar-user-logout ">
             <a href="{{URL::to('/logout')}}">Đăng xuất</a>
         </li>
          <a href="{{ URL::to('/logout') }}" class="sign-out">Đăng xuất</a>
     </ul> -->
     <div class="app">
         <header class="header">
             <div class="container-xl" style=" border: 1px solid black;">
                 <!-- header with search -->
                 <div class="header-nav row" style="margin: 0">
                     <div class="col-lg-2 col-md-3 col-sm-5 col-5">
                         <a href="{{URL::to('/')}}" class="header__logo-home">
                             <img class="img-style" src="{{ URL::to('/user/image/logo.png') }}" alt="">
                         </a>
                     </div>
                     <div class="col-lg-8 col-md-5 col-sm-7 col-7">
                         <div class="row d-flex justify-content-between align-items-center">
                             <div class="header__search col-lg-11 col-md-9 col-sm-9 ">
                                 <form action="{{URL::to('/search')}}" method="POST">
                                     {{csrf_field()}}
                                     <div class="header__search-input-warp">
                                         <input type="text" class="header__search-input" name='keywords_search'
                                             placeholder="Nhập để tìm kiếm">
                                     </div>
                                     <button class="header__search-btn" type="submit" name="search">
                                         <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                                         Tìm
                                     </button>
                                 </form>
                             </div>
                             <div class="cart-row col-lg-1 col-md-3 col-sm-3">
                                 <a class="cart-link" href="{{URL::to('/cart')}}"><img
                                         src="{{ URL::to('user/image/shopping-cart.png' ) }}" alt=""></a>
                                 <span id="quantity-cart">
                                 </span>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-2 col-md-4 col-sm-5 p-0">
                         <div class="customer">
                             @if (Session::get('id_customer'))
                             <!-- User is logged in -->
                             <p href="" class="user-customer" onclick="openSidebar()">
                                 <img src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
                                 {{Session::get('name_customer')}}
                             </p>

                             @else
                             <!-- User is not logged in -->
                             <a href="{{ URL::to('/login-index') }}" class="sign-in">Đăng nhập</a>
                             <a href="{{ URL::to('/register-index') }}" class="sign-up">Đăng ký</a>
                             @endif

                         </div>

                     </div>
                 </div>
             </div>
         </header>
         <!-- Overlay -->
         <div id="overlay" class="overlay"></div>

         <!-- sidebar -->
         <div id="sidebar">
             <!-- Nội dung sidebar -->

             <div class="sidebar-header">
                 <a href="" class="user-customer-sidebar" onclick="openSidebar()">
                     <img src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
                     {{Session::get('name_customer')}}
                 </a>
                 <button class="close-sidebar" onclick="closeSidebar()">X</button>
             </div>

             <div class="sidebar-body">
                 <ul class="sidebar-content">
                     <li> <a href="{{ URL::to('/thong-tin-ca-nhan') }}">Thông tin khách hàng</a></li>
                     <li> <a href="{{URL::to('/cart')}}">Giỏ hàng</a></li>
                     <li> <a href="{{URL::to('/checkout')}}">Thanh toán</a></li>
                     <li> <a href="{{ URL::to('/favorite-product') }}">Danh sách yêu thích</a></li>
                     <li> <a href="{{ URL::to('/history-order') }}">Lịch sử mua hàng</a></li>
                     <li> <a href="{{ URL::to('') }}">Cài đặt</a></li>
                     <li> <a href="{{ URL::to('/logout') }}">Đăng xuất</a></li>
                 </ul>
             </div>

         </div>
         <!-- sidebar -->

         <div class="app_container">
             <div class="container-xl" style=" border: 1px solid black;">
                 <div class="nav-sidebar">
                     <ul class="menu">
                         <li class="megamenu"><a href="{{URL::to('/')}}">TRANG CHỦ</a></li>
                         <li class="megamenu">
                             <a href="">ĐIỆN THOẠI</a>
                             <ul class="sub-megamenu">
                                 @foreach ( $brands as $brand )
                                 <li>
                                     <a href="{{URL::to('/brand'.'/'.$brand->brand_id)}}">{{$brand->brand_name}}</a>
                                 </li>
                                 @endforeach
                             </ul>
                         </li>

                         <li class="megamenu"><a href="">BLOG</a></li>
                         <li class="megamenu"><a href="">KHÁC</a></li>
                         <li class="megamenu"><a href="">PHỤ KIỆN</a></li>
                         <li class="megamenu"><a href="">TIN TỨC</a></li>
                     </ul>

                 </div>

                 <div class="content">
                     <div class="home-product">
                         @yield('content')
                     </div>
                 </div>
             </div>
         </div>

         <footer class="footer">
             <div class="container-xl">
                 <div class="row">
                     <div class="col-sm-3">
                         <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                         <ul class="footer-list">
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Trung tâm trợ giúp</a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">TickId Mail</a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Hướng dẫn mua hàng</a>
                             </li>
                         </ul>
                     </div>
                     <div class="col-sm-3">
                         <h3 class="footer__heading">Giới thiệu</h3>
                         <ul class="footer-list">
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Giới thiệu về tickID</a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Tuyển dụng</a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">Điều khoản</a>
                             </li>
                         </ul>
                     </div>

                     <div class="col-sm-3">
                         <h3 class="footer__heading">Theo dõi</h3>
                         <ul class="footer-list">
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">
                                     <i class="footer-item__link-icon fa-brands fa-facebook"></i>
                                     <span>Facebook</span>
                                 </a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">
                                     <i class="footer-item__link-icon fa-brands fa-instagram-square"></i>
                                     <span>Instargram</span>
                                 </a>
                             </li>
                             <li class="footer-item">
                                 <a href="#" class="footer-item__link">
                                     <i class="footer-item__link-icon fa-brands fa-linkedin"></i>
                                     <span>Linkedin</span>
                                 </a>
                             </li>
                         </ul>
                     </div>

                 </div>
             </div>
         </footer>
     </div>




     <script src="{{asset("user/js/jquery-3.6.0.min.js")}}"></script>
     <script src="{{asset("user/js/sweetalert2.js")}}"></script>
     <script src="{{asset("user/js/toastr.js")}}"></script>

     <script>
     // Mở sidebar
     function openSidebar() {
         // Hiển thị sidebar bằng cách đặt left về 0
         document.getElementById('sidebar').style.right = '0';
         // Hiển thị overlay bằng cách thay đổi display thành block
         document.getElementById('overlay').style.display = 'block';
     }
     // Đóng sidebar
     function closeSidebar() {
         // Hiển thị sidebar bằng cách đặt left về 0
         document.getElementById('sidebar').style.right = '-300px';

         // Hiển thị overlay bằng cách thay đổi display thành block
         document.getElementById('overlay').style.display = 'none';
     }

     function toggleView() {
         const tableView = document.getElementById('table-view');
         const cardView = document.getElementById('card-view');
         if (getComputedStyle(tableView).display === 'none') {
             // Hiển thị table-view và ẩn card-view
             tableView.style.display = 'block';
             cardView.style.display = 'none';
         } else {
             // Ẩn table-view và hiển thị card-view
             tableView.style.display = 'none';
             cardView.style.display = 'block';
         }
     }



     document.querySelectorAll('.toggle-btn').forEach(function(link) {
         link.addEventListener('click', function(event) {
             event.preventDefault();
             const ul = link.nextElementSibling;
             ul.classList.toggle('active');
         });
     });

     document.querySelector('.comment-text').addEventListener('focus', function() {
         document.querySelector('.cmt-button').style.display = 'flex';
     })


     document.addEventListener("DOMContentLoaded", function() {
         var imageList = document.getElementById("gallery-product");
         var displayedImage = document.getElementById("image-target");

         // Lấy tất cả hình ảnh trong gallery
         var allImages = imageList.querySelectorAll("img");

         // Kiểm tra xem có hình ảnh nào không và mặc định hiển thị hình ảnh đầu tiên
         if (allImages.length > 0) {
             var firstImage = allImages[0];
             displayedImage.src = firstImage.src; // Hiển thị hình ảnh đầu tiên
             firstImage.classList.add("selected"); // Thêm lớp 'selected' cho hình ảnh đầu tiên
         }

         // Lắng nghe sự kiện nhấp vào các mục trong danh sách ảnh
         imageList.addEventListener("click", function(event) {
             if (event.target.tagName === "IMG") {
                 // Xóa lớp 'selected' khỏi tất cả hình ảnh
                 allImages.forEach(function(img) {
                     img.classList.remove("selected");
                 });

                 // Thêm lớp 'selected' cho hình ảnh được nhấp vào
                 event.target.classList.add("selected");

                 // Lấy đường dẫn của ảnh từ thuộc tính 'src' của hình ảnh được nhấp vào
                 var imageURL = event.target.src;
                 // Hiển thị ảnh được nhấp vào trong vùng hiển thị
                 displayedImage.src = imageURL;
             }
         });

         // Thiết lập các sự kiện cho hiệu ứng zoom ở đây (nếu cần)
         const img = document.getElementById('image-target');
         const mirror = document.querySelector('.mirror');

         img.addEventListener('mousemove', (e) => {
             const rect = img.getBoundingClientRect();
             const x = e.clientX - rect.left;
             const y = e.clientY - rect.top;
             const xPercent = (x / rect.width) * 100;
             const yPercent = (y / rect.height) * 100;

             mirror.style.backgroundSize = `400px 400px`;
             mirror.style.top = `${e.clientY - 50}px`;
             mirror.style.left = `${e.clientX - 50}px`;
             mirror.style.backgroundImage = `url(${img.src})`;
             mirror.style.backgroundPosition = `${xPercent}% ${yPercent}%`;
             mirror.classList.remove("hide");
         });

         img.addEventListener('mouseleave', () => {
             mirror.classList.add("hide");
         });
     });
     </script>


     <script src="{{asset("user/js/select_shipping.js")}}"></script>


     <script>
     $(document).ready(function() {
         //show quantity cart
         show_cart_quantity();

         function show_cart_quantity() {
             $.ajax({
                 url: "{{ url('/count-cart') }}", // Sử dụng URL helper để đảm bảo URL chính xác
                 method: "GET",
                 success: function(data) {
                     $('#quantity-cart').html(data);
                 }
             });
         }


         $('.add-to-cart').click(function() {
             var id = $(this).data('id_product');

             // Lấy thông tin sản phẩm từ các input ẩn trong HTML
             var productData = {
                 cart_product_id: $('.cart_product_id_' + id).val(),
                 cart_product_name: $('.cart_product_name_' + id).val(),
                 cart_product_image: $('.cart_product_image_' + id).val(),
                 cart_product_price: $('.cart_product_price_' + id).val(),
                 cart_product_qty: $('.cart_product_qty_' + id).val(),
                 _token: $('input[name="_token"]').val()
             };

             // Gửi yêu cầu Ajax để thêm sản phẩm vào giỏ hàng
             $.ajax({
                 url: '{{url("/add-cart")}}',
                 method: 'POST',
                 data: productData,
                 success: function(response) {
                     toastr.options = {
                         "positionClass": "toast-bottom-right",
                         "timeOut": "3000"
                     };
                     toastr.success('Đã thêm sản phẩm vào giỏ hàng', '');
                     show_cart_quantity();

                 },
             });
         });


         $('.send-order').click(function() {
             var allValid = true;
             var formData = {};
             var feeshipText = $('#feeship').text();
             var feeshipInt = parseInt(feeshipText.replace(/\./g, ''));
             var _token = $('input[name="_token"]').val();
             var totalOrderText = $('#displayTotal').text();
             var totalOrderInt = parseInt(totalOrderText.replace(/\./g, ''));
             var discounValue = $('#id_coupon').val();
             var note_order = $('#note_order').val();

             $('[data-input-value]').each(function() {
                 var sourceType = $(this).data('input-value');
                 var inputValue = $(this).val();
                 if (!checkErrorInput(sourceType, inputValue)) {
                     allValid = false;
                 }
                 formData[sourceType] = inputValue;
             });

             if (allValid) {
                 formData.feeship = feeshipInt;
                 formData.totalOrder = totalOrderInt;
                 formData.discount = discounValue;
                 formData.note = note_order;
                 formData._token = _token;

                 // Hiển thị popup xác nhận
                 Swal.fire({
                     title: 'Xác nhận thanh toán',
                     text: 'Bạn có chắc chắn muốn gửi đơn hàng?',
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonText: 'Đồng ý',
                     cancelButtonText: 'Hủy'
                 }).then((result) => {
                     if (result.isConfirmed) {
                         // Gửi dữ liệu nếu người dùng xác nhận
                         $.ajax({
                             url: '/order-product',
                             method: 'POST',
                             data: formData,
                             success: function(response) {
                                 if (response.status === 'success') {
                                     Swal.fire('Thành công', response.message,
                                         'success');
                                 }
                             },
                             error: function(xhr, status, error) {
                                 Swal.fire('Lỗi',
                                     'Có lỗi xảy ra khi gửi đơn hàng: ' + error,
                                     'error');
                             }
                         });
                     }
                 });
             }
         });
     });

     // Hàm kiểm tra giá trị của input và hiển thị lỗi
     function checkErrorInput(sourceType, inputValue) {
         var check_error = document.querySelector('[data-check-value="' + sourceType + '"]');

         if (inputValue === "") {
             showLabelError(check_error, 'Vui lòng điền thông tin');
             return false;
         }

         if (sourceType === "phonenumber") {
             var phonePattern = /^(0[3|5|7|8|9])+([0-9]{8})$/;
             if (!phonePattern.test(inputValue)) {
                 showLabelError(check_error, 'Số điện thoại không hợp lệ');
                 return false;
             }
         }

         if (sourceType === 'email_order') {
             var validateEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

             if (!validateEmail.test(inputValue)) {
                 showLabelError(check_error, 'Email không hợp lệ');
                 return false;
             }
         }

         showLabelError(check_error, '', true);
         return true;

     }

     // Hàm gán nội dung thông báo lỗi vào thẻ label
     function showLabelError(label, message, isValid = false) {
         if (isValid) {
             label.style.display = 'none';
         } else {
             label.style.display = 'block';
             label.textContent = message;
         }
     }
     </script>
 </body>

 </html>