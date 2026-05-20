</div> <!-- container-fluid -->
        </div> <!-- content -->

        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>K1 Grid Painel Administrativo © <?= date('Y') ?> - Todos os direitos reservados.</span>
                </div>
            </div>
        </footer>

    </div> <!-- content-wrapper -->
</div> <!-- wrapper -->

<!-- JS -->
<script src="<?= base_url('assets/sb-admin-2/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/sb-admin-2/js/sb-admin-2.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/utils.js') ?>"></script>
<script src="<?= base_url('assets/plugins/select2/select2.min.js') ?>"></script>

<script>
    function formatDate(date) {
        let d = new Date(date);
        return d.toLocaleDateString('pt-BR');
    }
</script>
</body>
</html>