$(document).ready(function(){
    $('#mytable').dataTable( {
        "columnDefs": [
        { "orderable": false, "targets": 5 }
        ],
        "language": {
            "decimal": "",
            "emptyTable": "Görüntülenecek kayıt yok",
            "info": "Toplam _TOTAL_ kayıttan _START_ ile _END_ arası gösteriliyor",
            "infoEmpty": "Toplam 0 kayıt",
            "infoFiltered": "(Toplam _MAX_ kayıttan filtrelendi)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Sayfada _MENU_ kayıt göster",
            "loadingRecords": "Yükleniyor...",
            "processing": "Lütfen bekleyin...",
            "search": "Ara:",
            "paginate": {
                "first": "İlk",
                "last": "Son",
                "next": "Sonraki",
                "previous": "Önceki"
            },
            //"aria": {
            //    "sortAscending": ": Sütunu artan sıralamak için etkinleştir",
            //    "sortDescending": ": Sütunu azalan sıralamak için etkinleştir"
            //},
            "zeroRecords": "Kayıt bulunamadı"
        }
    } );
});