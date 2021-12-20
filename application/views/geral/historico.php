<?php
defined('BASEPATH') or exit('No direct script access allowed');
$operacoes['credito'] = "Crédito";
$operacoes['debito'] = "Débito";
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
                        Histórico
                    </h6>    
                    <h6 class="m-0 font-weight-bold text-primary">
                        Saldo: R$ <?php echo number_format($saldo, 2, '.', ''); ?>
                    </h6>
                </div>

                <!-- Card Body -->
                <div class="card-body row">
                    <div class="table-responsive">
                        <table class="table col-xl-9 col-lg-12 mx-auto">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th>Data</th> 
                                </tr>
                            </thead>

                            <tbody>
        
                                <?php foreach($transacoes as $idx => $transacao): ?>
                                <tr>
                                    <td><?php echo $idx + 1; ?></td>
                                    <td class="font-weight-bold <?php echo $transacao['operacao'] == 'credito' ? 'text-success' : 'text-danger' ?>">
                                        R$ <?php echo number_format($transacao['valor'], 2, '.', ''); ?>
                                    </td>
                                    <td><?php echo $transacao['descricao'] ?></td>
                                    <td><?php echo date('H:i:s d/m/Y', strtotime($transacao['datahora'])) ?></td>
                                </tr>
                                <?php endforeach ?>

                                <?php if (count($transacoes) == 0): ?>
                                <tr>
                                    <td colspan="4">Nenhum resultado encontrado</td>
                                </tr>
                                <?php endif ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->