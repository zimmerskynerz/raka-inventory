<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".open_modal").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "update_user.php",
                type: "GET",
                data: {
                    username: m,
                },
                success: function(ajaxData) {
                    $("#editUsrModal").html(ajaxData);
                    $("#editUsrModal").modal('show', {
                        backdrop: 'true'
                    });
                }
            });
        });
    });
</script>