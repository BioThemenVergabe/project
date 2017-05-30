<?php $__env->startSection('links'); ?>
    <a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
    <a href="/admin_AG" class="btn btn-default btn-sm icon icon-clipboard"><span
                class="hidden-xs"> <?php echo app('translator')->get('fields.ag'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="container">
        <div class="panel">

            <div class="panel-body">
                <!--Überschrift-->
                <div class="row">
                    <div class="col-sm-8">
                        <h1><?php echo app('translator')->get('content.heading_stud'); ?></h1>
                    </div>
                    <div class="col-sm-4 pull-right top-buffer-3">
                        <div class="input-group">
                            <input id="Stud_search_query" type="text" class="form-control"
                                   placeholder="<?php echo app('translator')->get('fields.search'); ?>...">
                            <span class="input-group-btn">
                                <button id="Stud_search_button" class="btn btn-default" type="button"><span
                                            class="icon icon-magnifying-glass"></span></button>
                        </span>
                        </div>
                    </div>
                </div>

                <!--1.Zeile-->
                <div class="top-buffer row">
                    <div class="col-md-8">
                        <?php echo app('translator')->get('content.stud1'); ?>: <?php echo e($numberStudents); ?>

                    </div>
                </div>

                <!--Studenten-Tabelle-->
                <div id="Stud_table" class="top-buffer-2 table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Matr.Nr.</th>
                            <th>Name</th>
                            <th class="">AG</th>
                            <th class="col-xs-4"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td class="id" style="display:none"><?php echo e($student->id); ?></td>
                                <td class="ma"><?php echo e($student->matrnr); ?></td>
                                <td class="na"><?php echo e($student->name . " " . $student->lastname); ?></td>
                                <td class="em" style="display:none"><?php echo e($student->email); ?></td>
                                <?php if(sizeof($student->zugewiesen)>0): ?>
                                    <td class="za"><?php echo e($student->zugewiesen); ?></td>
                                <?php else: ?>
                                    <td class="za">-</td>
                                <?php endif; ?>
                                <td class="bt">
                                    <div class="btn-group pull-right" role="group">
                                        <div class="bearbeitenButton btn btn-info icon icon-edit"><span
                                                    class="hidden-xs"> <?php echo app('translator')->get('fields.edit'); ?></span></div>
                                        <div class="btn btn-danger löschStudentButton icon icon-cross"
                                             data-toggle="modal"
                                             data-target="#löschStudentModal"><span
                                                    class="hidden-xs"> <?php echo app('translator')->get('fields.del'); ?></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div><!--Collapse Studenten-Tabelle-->
            </div>
        </div><!--Collapse panel-->
    </section><!--Collapse container-->


    <!--Löschen-Modal-->
    <?php echo $__env->make('modals.acp-del-student', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>