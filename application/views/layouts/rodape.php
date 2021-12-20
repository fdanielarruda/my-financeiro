<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Financeiro &copy; <?php echo date('Y'); ?></span>
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
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url("assets/vendor/bootstrap/vendor/jquery/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendor/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url("assets/vendor/bootstrap/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url("assets/vendor/bootstrap/js/sb-admin-2.min.js"); ?>"></script>
    
    <script>
        $('#sidebarToggleTop').click();
        operacao_color();

        $('#operacao').change(function() {
            operacao_color();
        });

        function operacao_color() {
            if ($('#operacao').val() == 'debito') {
                $('#btn-operacao').removeClass('btn-success').addClass('btn-danger');
            } else {
                $('#btn-operacao').addClass('btn-success').removeClass('btn-danger');
            }
        }
    </script>
</body>

</html>