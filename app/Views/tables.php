
                <?php $this->extend('/dashboard');?>
                <?php $this->section('content');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dt_user" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot> -->
                                        <!-- <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr> -->
                                    <!-- </tfoot> -->
                                    <tbody>
                                     
                                        <tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <?php $this->endSection();?>
