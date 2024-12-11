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
             <div class="container-xl">
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
                             <a href="{{ URL::to('/login-index') }}" class="sign-in-btn">Đăng nhập</a>
                             <a href="{{ URL::to('/register-index') }}" class="sign-up-btn">Đăng ký</a>
                             @endif

                         </div>

                     </div>
                 </div>
             </div>
         </header>
         <!-- Overlay -->
         <div id="overlay" class="overlay" onclick="closeAllOverlay()"></div>

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
                     <li> <a href="{{ URL::to('/wishlist') }}">Danh sách yêu thích</a></li>
                     <li> <a href="{{ URL::to('/history-order') }}">Lịch sử mua hàng</a></li>
                     <li> <a href="{{ URL::to('') }}">Cài đặt</a></li>
                     <li> <a href="{{ URL::to('/logout') }}">Đăng xuất</a></li>
                 </ul>
             </div>

         </div>
         <!-- sidebar -->

         <div class="app_container">
             <div class="container-xl">
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

         function openSpecifications() {
             // Hiển thị overlay bằng cách thay đổi display thành block
             document.getElementById('overlay').style.display = 'block';
             document.getElementById('specifications-popup').style.display = 'block';
         }

         function closeSpecifications() {
             document.getElementById('overlay').style.display = 'none';
             document.getElementById('specifications-popup').style.display = 'none';
         }

         // mở overlay và  review popup
         function openReviewPopup() {
             document.getElementById('overlay').style.display = 'block';
             document.getElementById('review-form-popup').style.display = 'block';
         }
         // đóng overlay và  review popup
         function closeReviewPopup() {
             document.getElementById('overlay').style.display = 'none';
             document.getElementById('review-form-popup').style.display = 'none';

         }

         function openReviewPopup2() {
             document.getElementById('overlay').style.display = 'block';
             document.getElementById('boxReview-popup').style.display = 'block';
         }

         function closeReviewPopup2() {
             document.getElementById('overlay').style.display = 'none';
             document.getElementById('boxReview-popup').style.display = 'none';
         }

         function updateFilter(param, value) {
             let url = new URL(window.location.href);
             if (value === "none") {
                 url.searchParams.delete(param);
             } else {
                 url.searchParams.set(param, value);
             }
             window.location.href = url.toString();
         }
     </script>


     <script src="{{asset("user/js/select_shipping.js")}}"></script>




     <script>
         $(document).ready(function() {


             // tính tổng trung bình sao của 1 sản phẩm
             function averageStart() {
                 var product_id = $('.product_id').val();
                 $.ajax({
                     url: `/average-start/${product_id}`,
                     method: 'GET',
                     success: function(response) {
                         $('.point').html(response.average);
                         const avg_star = parseFloat(response.average);
                         const stars = $('.list-star');
                         stars.empty();
                         for (let i = 1; i <= 5; i++) {
                             if (avg_star >= i) {
                                 stars.append('<i class="fa-solid fa-star"></i>'); // Sao đầy
                             } else if (avg_star >= i - 0.5) {
                                 stars.append(
                                     '<i class="fa-solid fa-star-half-stroke"></i>'); // Sao nửa
                             } else {
                                 stars.append('<i class="fa-regular fa-star"></i>'); // Sao rỗng
                             }
                         }
                         $('.boxReview-score__count').html(response.total_reviews);

                     },
                     error: function(err) {
                         console.error('Lỗi lấy trung bình tổng đánh giá:', err);
                     }
                 });
             };
             averageStart();
             // tính tổng trung bình sao của 1 sản phẩm

             // hàm kiểm tra xem đã thích hay chưa
             function check_favorite() {
                 var product_id = $('.product_id').val();
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                     url: "{{ url('/check-favorite') }}",
                     method: "POST",
                     data: {
                         product_id: product_id,
                         _token: _token
                     },
                     success: function(data) {
                         $('#show-favorite').html(data);
                     },
                     error: function(xhr) {
                         console.log('Có lỗi xáy ra ', xhr.responseText)
                     }
                 });
             };
             check_favorite();


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
             };

             // thực hiện thêm sản phẩm vào giỏ hàng
             $('.add-to-cart').click(function() {
                 var id = $(this).data('id_product');

                 // Lấy thông tin sản phẩm từ các input ẩn trong HTML
                 var productData = {
                     cart_product_id: $('.product_id_' + id).val(),
                     cart_product_name: $('.product_name_' + id).val(),
                     cart_product_image: $('.product_image_' + id).val(),
                     cart_product_price: $('.product_price_' + id).val(),
                     cart_product_qty: $('.product_qty_' + id).val(),
                     cart_product_color: $('.product_color_' + id).val(),
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

             // Lắng nghe sự kiện nhấn nút yêu thích
             $('.toggle-favorite').click(function() {
                 var button = $(this);
                 var product_id = button.data('id_product')
                 let _token = $('input[name="_token"]').val();

                 $.ajax({
                     url: '/favorite-toggle', // Đường dẫn đến route xử lý yêu thích
                     method: 'POST',
                     data: {
                         _token: _token, // CSRF token để bảo vệ yêu cầu
                         product_id: product_id,
                     },
                     success: function(response) {
                         if (response.status === 'error') {
                             alert(response.message);
                         } else if (response.status === 'add') {
                             check_favorite();
                         } else {
                             check_favorite();
                         }
                     },
                     error: function() {
                         alert('Không thể thực hiện yêu cầu!');
                     }
                 });
             });


             // Gửi đơn hàng 
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
                                         'Có lỗi xảy ra khi gửi đơn hàng: ' +
                                         error,
                                         'error');
                                 }
                             });
                         }
                     });
                 }
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


             let rating_point = 0;
             $('.rating-topzonecr-star li').click(function() {
                 // Lấy giá trị rating của nút được click
                 var rating = $(this).data('rating');
                 rating_point = rating;
                 // Đặt tất cả các sao về trạng thái "fa-regular"
                 $('.rating-topzonecr-star li i').removeClass('fa-solid').addClass('fa-regular');

                 //  Đổi trạng thái các sao từ 1 đến nút được click thành "fa-solid"
                 $('.rating-topzonecr-star li').each(function() {
                     if ($(this).data('rating') <= rating) {
                         $(this).find('i').removeClass('fa-regular').addClass('fa-solid');
                     }
                 });
                 //  alert(rating);
             });

             // Gửi nhận xét sản phẩm lên csdl
             $('.send-review').click(function() {

                 var _token = $('input[name="_token"]').val();
                 var allValid = true;
                 var formDataReview = {};
                 var product_id = $('.product_id').val();


                 const spanCheckStar = document.querySelector('.check-star-point');
                 if (rating_point <= 0) {
                     spanCheckStar.style.display = 'block'; // Hiển thị
                     var allValid = false;
                 } else {
                     spanCheckStar.style.display = 'none'; // Ẩn thẻ span
                     var allValid = true;
                 }
                 $('[data-input-value]').each(function() {
                     var sourceType = $(this).data('input-value');
                     var inputValue = $(this).val();
                     if (!checkErrorInput(sourceType, inputValue)) {
                         allValid = false;
                     }
                     formDataReview[sourceType] = inputValue;
                 });

                 if (allValid) {
                     formDataReview.id_product = product_id;
                     formDataReview.rating = rating_point;
                     formDataReview._token = _token;

                     $.ajax({
                         url: '/send-review',
                         method: 'POST',
                         data: formDataReview,
                         success: function(response) {
                             if (response.status === 'error') {
                                 alert(response.message); // Hiển thị thông báo lỗi
                             } else {
                                 averageStart();
                                 getReviews();
                                 rating_point = 0;
                                 $('.rating-topzonecr-star li i').removeClass('fa-solid')
                                     .addClass('fa-regular');
                                 toastr.options = {
                                     "positionClass": "toast-bottom-right",
                                     "timeOut": "3000"
                                 };
                                 toastr.success('Đã thêm sản phẩm vào giỏ hàng', '');
                                 $('#fullname').val("");
                                 $('#phonenumber').val("");
                                 $('#review').val("");
                                 const closeOverlay = document.querySelector('.overlay');
                                 closeOverlay.style.display = "none";
                                 const closePopupReview = document.querySelector(
                                     '.review-form-popup');
                                 closePopupReview.style.display = "none";
                             }
                         },
                         error: function(err) {
                             console.error('Lỗi khi gửi', err);
                         }
                     });
                 }

             });

             function show_quantity_with_star() {
                 var product_id = $('.product_id').val();
                 $.ajax({
                     url: `/count-with-star/${product_id}`,
                     method: 'GET',
                     success: function(response) {
                         // Log the total review count to the console
                         //  console.log('Total Reviews:', response.reviews_total);

                         //  // Loop through the ratings count and log each rating with its count
                         response.ratings_count.forEach(function(item) {

                             var ratingLevel = item.rating;
                             var ratingCount = item.count;
                             var ratingPercent = item.percentage;
                             var ratingElement = $(
                                 `.rating-level[data-rating_level="${ratingLevel}"]`);

                             if (ratingElement.length) {
                                 ratingElement.find('.progress-bar').css('width',
                                     ratingPercent + "%");
                                 ratingElement.find('.rating-count').html(
                                     `${ratingCount} đánh giá`);
                             }

                         });
                     },
                     error: function(xhr, status, error) {
                         console.error('Error fetching review data: ' + error);
                     }
                 });
             };
             show_quantity_with_star();



             function getReviewStarMin(filter, product_id) {
                 const reviewContainer = $('.boxReview-comment');

                 $.ajax({
                     url: '/filter-reviews-min',
                     method: 'GET',
                     data: {
                         filter_start: filter,
                         id_product: product_id,
                     },
                     success: function(data) {
                         if (data.length === 0) {
                             reviewContainer.html('<p>Không có đánh giá nào phù hợp.</p>');
                             return;
                         }

                         let reviewsHtml = '';
                         data.forEach(review => {
                             const stars = Array.from({
                                 length: 5
                             }, (_, i) => i < review.rating ? '★' : '☆').join('');
                             reviewsHtml += `
                    <div class="boxReview-comment-item">
                        <div class="boxReview-comment-item-title">
                            <div class="boxReview-comment-item-block">
                                <div class="box-info-review">
                                    <img class="avt-review-info" src="${review.avatar || '/path/to/default-avatar.png'}" alt="">
                                    <strong>${review.name_customer.name_user}</strong>
                                </div>
                                <div class="box-time-review">
                                    <span class="time">${review.created_at}</span>
                                </div>
                            </div>
                        </div>
                        <div class="boxReview-comment-item-review">
                            <div class="star-rating__review">
                                ${stars}
                            </div>
                            <div class="boxReview-comment-item__cmt">
                                <span>${review.review_text}</span>
                            </div>
                        </div>
                        <hr>
                    </div>`;
                         });
                         reviewContainer.html(reviewsHtml);
                     },
                     error: function(xhr, status, error) {
                         console.error('Lỗi khi gọi Ajax:', error);
                         reviewContainer.html('<p>Không thể tải đánh giá. Vui lòng thử lại sau.</p>');
                     }
                 });
             }


             // Tìm kiếm theo số sao bình luận
             $('.filter-container .filter-item').click(function() {
                 var filter = $(this).data('rating_filter_review');
                 var product_id = $('.product_id').val();
                 //  alert(filter);
                 //  alert(product_id);
                 $('.filter-container .filter-item').removeClass('active');

                 $(this).addClass('active');
                 getReviewStarMin(filter, product_id);
             });


             // lấy các review ra
             function getReviewsMin() {
                 var product_id = $('.product_id').val();
                 $.ajax({
                     url: `/get-review-cmt-min/${product_id}`, // URL lấy dữ liệu
                     method: 'GET',
                     success: function(data) {
                         const reviewContainer = $('.boxReview-comment');
                         reviewContainer.empty(); // Xóa nội dung cũ

                         data.forEach(review => {
                             const stars = Array.from({
                                 length: 5
                             }, (_, i) => i < review.rating ? '★' : '☆').join('');
                             const reviewItem = `
                            <div class="boxReview-comment-item">
                                <div class="boxReview-comment-item-title">
                                    <div class="boxReview-comment-item-block">
                                        <div class="box-info-review">
                                            <img class="avt-review-info" src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
                                            <strong>${review.name_customer.name_user}</strong>
                                        </div>
                                        <div class="box-time-review">
                                            <span class="time">${review.created_at}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="boxReview-comment-item-review">
                                    <div class="star-rating__review">
                                        ${stars}
                                    </div>
                                    <div class="boxReview-comment-item__cmt">
                                        <span>${review.review_text}</span>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        `;
                             reviewContainer.append(reviewItem);
                         });
                     },
                     error: function(err) {
                         console.error('Error fetching reviews:', err);
                     }
                 });
             }
             // Gọi hàm fetchReviews khi cần
             getReviewsMin();
             // lấy các review ra


         });
     </script>
 </body>

 </html>
 </script>
 </body>

 </html>