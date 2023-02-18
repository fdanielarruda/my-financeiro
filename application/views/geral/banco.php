<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <div class="row">
                        <div class="card shadow mb-4 container pt-4 pb-4">
                            <form action="<?php echo site_url('banco/consultar'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="sql">SQL</label>
                                    <textarea id="sql" name="sql" class="form-control" rows="5"><?php if (isset($sql)) echo $sql; ?></textarea>
                                </div>

                                <button id="pesquisar_sql" class="btn btn-primary">Pesquisar</button>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card shadow mb-4 container pt-4 pb-4">
                            <div class="row">
                                <?php foreach ($tabelas as $tabela): ?>
                                    <div class="col-6"> 
                                        <table class="table table-sm">        
                                            <tr class="bg-secondary text-light">
                                                <th><?php echo $tabela['tabela']; ?></th> 
                                            </tr>
                                            
                                            <?php foreach ($tabela['colunas'] as $coluna): ?>
                                                <tr>
                                                    <td><?php echo $coluna; ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </table>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
               
                <?php if (isset($resultados)): ?>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow mb-4 p-4">
                                    <table class="table table-sm">
                                        <tr class="bg-secondary text-light">
                                            <?php foreach ($resultados[0] as $idx => $resultado): ?>
                                                <th><?php echo $idx; ?></th> 
                                            <?php endforeach ?>
                                        </tr>

                                        <?php foreach ($resultados as $resultado): ?>
                                            <tr>
                                                <?php foreach ($resultado as $coluna): ?>
                                                    <td>
                                                        <?php echo $coluna; ?>
                                                    </td>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->