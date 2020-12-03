</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span style="font-size: medium">Copyright &copy; @yield('firmaadi') {{date('Y')}}</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Çıkmak istiyor musunuz?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Oturumunuzu sonlandırmak için Çıkış Yap'ı seçiniz.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Vazgeç</button>
    <a class="btn btn-primary" href="{{route('logout')}}">Çıkış Yap</a>
  </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('theme/')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('theme/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('theme/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('theme/')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
{{-- <script src="{{asset('theme/')}}/vendor/chart.js/Chart.min.js"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="{{asset('theme/')}}/js/demo/chart-area-demo.js"></script> --}}
{{-- <script src="{{asset('theme/')}}/js/demo/chart-pie-demo.js"></script> --}}

{{--  @jquery  --}}
@toastr_js
@toastr_render
@yield('js')

<!-- Datatable -->
<script src="{{asset('theme/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('theme/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
  // Call the dataTables jQuery plugin
  $(document).ready(function() {
    $('#dataTable').DataTable({
                //"autoWidth": false,
                //"columnDefs": [
                //    { "width": "30%", "targets": 0 }
                //    { "width": "50", "targets": 2 }
                //],
                //'paging': true,
                //'lengthChange': false,
                //'searching': false,
                //'ordering': true,
                //'info': true,
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
            });
  });
</script>

</body>

</html>