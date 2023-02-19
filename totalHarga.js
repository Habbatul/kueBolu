var harga = 0;
var jumlah = 0;
var total = 0;
$(document).ready(function() {
    $("#jumlah, #kue").on('change input', function() {
        var harga = $('#kue').val().split('_')||0;
        var jumlah = $("#jumlah").val();

        var total = parseInt(harga) * parseInt(jumlah);
        $("#total_harga").val(total);
    });
});
