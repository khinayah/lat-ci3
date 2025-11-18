<!-- todolist
1.buatview datatable dengan server side processing
2.buat controller latihan_datatable dengan method index dan get_data
3.endpoint di controller memanggil model untuk mengambil data dengan pagination, sorting, dan searching
4.buat model latihan_datatable_model dengan method untuk query data sesuai kebutuhan datatable
5.integrasikan ajax di view untuk mengambil data dari endpoint controller -->


<?php $this->load->view('dashboard/templates/header'); ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php $this->load->view('dashboard/templates/sidebar'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php $this->load->view('dashboard/templates/navbar'); ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> <?php echo $sub_title; ?></a>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>NIM</th>
                                        <th>Angkatan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php $this->load->view('dashboard/templates/footer'); ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php $this->load->view('dashboard/templates/js'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url('dashboard/Latihan_datatable/get_data') ?>',
                type: 'POST'
            },
            columns: [{
                    data: 'name'
                },
                {
                    data: 'nim'
                },
                {
                    data: 'angkatan'
                }
            ]
        });
    });
</script>