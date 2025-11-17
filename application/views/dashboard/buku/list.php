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
                                         <th>Kode Operator</th>
                                         <th>Kode Buku</th>
                                         <th>Kode Jenis Buku</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($get_data as $data) : ?>
                                         <tr>
                                             <td><?php echo $data->kd_operator; ?></td>
                                             <td><?php echo $data->kd_buku; ?></td>
                                             <td><?php echo $data->kd_jns_buku; ?></td>
                                         </tr>
                                     <?php endforeach; ?>
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