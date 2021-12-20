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
                        Usuários
                    </h6>   
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a class="btn btn-success btn-sm" href="<?php echo site_url('usuario/cadastro'); ?>">
                            Adicionar Usuário
                        </a>
                    </h6>
                </div>
                
                <!-- Card Body -->
                <div class="card-body row">
                    
                    <!-- Usuário card -->
                    <?php foreach($usuarios as $usuario): ?>
                        <?php if ($usuario['saldo'] != 0): ?>
                            <div class="col-xl-3 col-md-6 mb-4 pointer" onclick="window.location = '<?php echo site_url('transacao/historico/' . $usuario['id']); ?>'">
                                <div class="card shadow h-100 py-2 <?php echo $usuario['saldo'] >= 0 ? 'border-left-primary text-primary' : 'border-left-danger text-danger' ?>">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1"> 
                                                    <?php echo $usuario['nome'] . " (" . $usuario['banco'] . ")"; ?> 
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold <?php echo $usuario['saldo'] >= 0 ? 'text-gray-800' : '' ?>">
                                                    R$ <?php echo number_format($usuario['saldo'], 2, '.', ''); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x <?php echo $usuario['saldo'] >= 0 ? 'text-gray-300' : '' ?>"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                    <!-- End Usuário Ca rd -->

                    <!-- Usuário card zerados -->
                    <?php foreach($usuarios as $usuario): ?>
                        <?php if ($usuario['saldo'] == 0): ?>
                            <div class="col-xl-3 col-md-6 mb-4 pointer" onclick="window.location = '<?php echo site_url('transacao/historico/' . $usuario['id']); ?>'">
                                <div class="card shadow h-100 py-2 border-left-secondary">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1"> 
                                                    <?php echo $usuario['nome'] . " (" . $usuario['banco'] . ")"; ?> 
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-secondary">
                                                    R$ <?php echo number_format($usuario['saldo'], 2, '.', ''); ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x <?php echo $usuario['saldo'] >= 0 ? 'text-gray-300' : '' ?>"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                    <!-- End Usuário Ca rd -->

                    <?php if (count($usuarios) == 0): ?>
                    <p class="alert">
                        Nenhum usuário cadastrado
                    </p>
                    <?php endif ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->