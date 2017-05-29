<?php $__env->startSection('links'); ?>
    <a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
    <a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"> <span class="hidden-xs"> <?php echo app('translator')->get('fields.students'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="container">
        <div class="panel">
            <div class="panel-body">

                <!--Überschrift-->
                <div class="row">
                    <div class="col-xs-8">
                        <h1><?php echo app('translator')->get('content.heading_ag'); ?></h1>
                    </div>
                    <div class="col-xs-4 pull-right top-buffer-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('fields.search'); ?>...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span
                                            class="icon icon-magnifying-glass"></span></button>
                            </span>
                        </div>
                    </div>
                </div>

                <!--1.Zeile-->
                <div class="top-buffer row">
                    <div class="col-xs-4">
                        <?php echo app('translator')->get('content.ag1'); ?>: <span id="AG_anz">x</span>
                    </div>
                    <div class="col-xs-4 pull-right">
                        <button id="hinzufügen" onclick="anhaengen(); update() " type="button"
                                class="btn btn-default btn-sm"><?php echo app('translator')->get('fields.add'); ?> <span class="icon icon-plus"
                                                                                aria-hidden="true"></span></button>
                    </div>
                </div>
                <br>
                <!--AG-Tabelle-->
                    <div class="table-responsive">
                        <table id="AG_Table" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('fields.groupleader'); ?></th>
                                <th><?php echo app('translator')->get('fields.groupname'); ?></th>
                                <th><?php echo app('translator')->get('fields.spots'); ?></th>
                                <th><?php echo app('translator')->get('fields.time'); ?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input class="gl form-control"></td>
                                <td><input class="gn form-control"></td>
                                <td><input class="pl form-control" type="number"></td>
                                <td><input class="zp form-control"></td>
                                <td>
                                    <button type="button" class="löschButton btn btn-default btn-xs form-control"
                                            data-toggle="modal"
                                            data-target="#löschModal"><span
                                                class="icon icon-minus"></span></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                </div>

                <div class="last col-xs-6">
                    <button id="speicher-AG" type="submit" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#speicherModal">
                        <?php echo app('translator')->get('fields.save'); ?>
                    </button>
                </div>
                <div class="col-xs-6">
                    <button onclick="location.href='/admin_AG';" type="reset" class="btn btn-danger">
                        <?php echo app('translator')->get('fields.reset'); ?>
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!--Speicher-Modal-->
    <?php echo $__env->make('modals.acp-save-ag', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <!--Löschen-Modal-->
    <?php echo $__env->make('modals.acp-del-ag', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>