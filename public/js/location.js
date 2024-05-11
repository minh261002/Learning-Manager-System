$(document).ready(function () {
    $('#province').on('change', function () {
        let province_code = $(this).val();
        $.ajax({
            url: "/location/districts/" + province_code,
            method: 'GET',
            success: function (data) {
                let html = '<option value="">Chọn Quận / Huyện</option>';
                data.forEach(function (district) {
                    html += `
                <option value="${district.code}">${district.name}</option>
            `;
                });
                $('#district').html(html);
            }
        });
    });

    $('#district').on('change', function () {
        let district_code = $(this).val();
        $.ajax({
            url: "/location/wards/" + district_code,
            method: 'GET',
            success: function (data) {
                let html = '<option value="">Chọn Phường / Xã</option>';
                data.forEach(function (ward) {
                    html += `
                <option value="${ward.code}">${ward.name}</option>
            `;
                });
                $('#ward').html(html);
            }
        });
    });
});
