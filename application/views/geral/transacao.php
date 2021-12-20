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
                        Nova Transação
                    </h6>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                    
                    <!-- Usuário card -->
                    <div class="col-xl-6 col-md-10 mx-auto mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <form action="<?php echo site_url('transacao/salvar'); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="usuario">Usuário</label>
                                        <select name="usuario" id="usuario" class="form-control" required>

                                            <?php foreach($usuarios as $usuario): ?>
                                            <option value="<?php echo $usuario['id']; ?>">
                                                <?php echo $usuario['nome'] . " (" . $usuario['banco'] . ")"; ?> 
                                            </option>
                                            <?php endforeach ?>

                                            <?php if (count($usuarios) == 0): ?>
                                            <option value="">Nenhum usuário encontrado </option>
                                            <?php endif ?>
                                        
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="operacao">Operação</label>
                                        <select name="operacao" id="operacao" class="form-control" required>
                                            <option value="credito">Creditar</option>
                                            <option value="debito" selected>Debitar</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="valor">Valor</label>
                                        <input type="text" name="valor" id="valor" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" name="descricao" id="descricao" class="form-control" required>
                                    </div>

                                    <!-- MENSAGENS -->
                                    <?php if ($this->session->flashdata('msg')): ?>
                                        
                                        <p class="alert alert-<?php echo $this->session->flashdata('msg')['tipo']; ?>"> 
                                            <?php echo $this->session->flashdata('msg')['texto']; ?> 
                                        </p>
                                        
                                    <?php endif ?>

                                    <button type="submit" class="btn btn-success mt-2" id="btn-operacao">
                                        Realizar Operação
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