<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Novo Usuário
                    </h6>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                    
                    <!-- Usuário card -->
                    <div class="col-xl-6 col-md-10 mx-auto mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <form action="<?php echo site_url('usuario/salvar'); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" name="nome" id="nome" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="banco">Banco</label>
                                        <input type="text" name="banco" id="banco" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="valor">Valor Inicial</label>
                                        <input type="number" name="valor" id="valor" class="form-control" value="0" required>
                                    </div>

                                    <!-- MENSAGENS -->
                                    <?php if ($this->session->flashdata('msg')): ?>
                                        
                                        <p class="alert alert-<?php echo $this->session->flashdata('msg')['tipo']; ?>"> 
                                            <?php echo $this->session->flashdata('msg')['texto']; ?> 
                                        </p>
                                        
                                    <?php endif ?>

                                    <button type="submit" class="btn btn-success mt-2">
                                        Cadastrar Usuário
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->