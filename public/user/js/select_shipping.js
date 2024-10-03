$(document).ready(function () {
    $("#city").change(function () {
        var id_city = $(this).val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: "/select-district-shipping", // Đảm bảo URL này đúng
            method: "POST",
            data: {
                id_city: id_city,
                _token: _token,
            },
            success: function (data) {
                $("#district").html(data);
            },
        });
    });

    $("#district").change(function () {
        var id_district = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "/select-wards-shipping", // Đảm bảo URL này đúng
            method: "POST",
            data: {
                id_district: id_district,
                _token: _token,
            },
            success: function (data) {
                $("#wards").html(data);
            },
        });
    });

    $("#wards").change(function () {
        var id_ward = $(this).val();
        var _token = $('input[name="_token"]').val();
        var id_district = $("#district").val();
        var id_city = $("#city").val();

        $.ajax({
            url: "/get-feeship", // Đảm bảo URL này đúng
            method: "POST",
            data: {
                id_city: id_city,
                id_district: id_district,
                id_ward: id_ward,
                _token: _token,
            },
            success: function (data) {
                var feeshipValue = data.feeship;
                $("#feeship").html(feeshipValue);
                var priceCartText = $("#price_cart").text();
                var priceCartInt = parseInt(priceCartText.replace(/\./g, ""));
                var priceFeeshipInt = parseInt(feeshipValue.replace(/\./g, ""));

                var totalOrder = priceCartInt + priceFeeshipInt;

                $("#displayTotal").html(totalOrder);
            },
        });
    });
});
