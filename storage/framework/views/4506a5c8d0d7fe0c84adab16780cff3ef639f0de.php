<?php $__env->startSection('links'); ?>
    <a href="/admin" class="btn btn-default btn-sm icon icon-home"><span class="hidden-xs"> Dashboard</span></a>
    <a href="/admin_studenten" class="btn btn-default btn-sm icon icon-users"> <span
                class="hidden-xs"> <?php echo app('translator')->get('fields.students'); ?></span></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="container">
        <div class="panel">
            <div class="panel-body">

                <!--Überschrift-->
                <div class="row">
                    <div class="col-sm-8">
                        <h1><?php echo app('translator')->get('content.heading_ag'); ?></h1>
                    </div>
                    <div class="col-sm-4 pull-right top-buffer-3">
                        <div class="input-group">
                            <input id="AG_search_query" type="text" class="form-control"
                                   placeholder="<?php echo app('translator')->get('fields.search'); ?>...">
                            <span class="input-group-btn">
                                <button id="AG_search_button" class="btn btn-default" type="button"><span
                                            class="icon icon-magnifying-glass"></span></button>
                            </span>
                        </div>
                    </div>
                </div>

                <!--1.Zeile-->
                <div class="top-buffer row">
                    <div class="col-xs-5">
                        <?php echo app('translator')->get('content.ag1'); ?>: <span id="AG_anz"><?php echo e($numberGroups); ?></span>
                    </div>
                    <div class="col-xs-4 pull-right">
                        <button id="hinzufügen" onclick="anhaengen()" type="button"
                                class="btn btn-default btn-sm"><?php echo app('translator')->get('fields.add'); ?> <span class="icon icon-plus"
                                                                                         aria-hidden="true"></span>
                        </button>
                    </div>
                </div>

                <br>

                <!-- Alert für invalide AG-speichern-->
            <?php echo $__env->make('alerts.admin_ag', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Alert für doppelten AG-namen speichern-->
            <?php echo $__env->make('alerts.admin_ag2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!--AG-Tabelle-->
                <form action="/admin_AG_save" method="post" id="AG_form">
                    <?php echo e(csrf_field()); ?>

                </form>
                <div class="table-responsive" id="AG_table">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('fields.groupname'); ?></th>
                            <th><?php echo app('translator')->get('fields.groupleader'); ?></th>
                            <th><?php echo app('translator')->get('fields.spots'); ?></th>
                            <th><?php echo app('translator')->get('fields.time'); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td style="display:none"><input name="id[]" class="id" value="<?php echo e($group->id); ?>"
                                                                form="AG_form"></td>
                                <td><input name="name[]" class="gn form-control" value="<?php echo e($group->name); ?>"
                                           form="AG_form"></td>
                                <td><input name="groupLeader[]" class="gl form-control" value="<?php echo e($group->groupLeader); ?>"
                                           form="AG_form"></td>
                                <td><input name="spots[]" class="pl form-control" type="number"
                                           value="<?php echo e($group->spots); ?>" form="AG_form"></td>
                                <td><input name="date[]" class="zp form-control" value="<?php echo e($group->date); ?>"
                                           form="AG_form"></td>
                                <td>
                                    <button type="button" class="löschButton btn btn-default btn-xs form-control"
                                            data-toggle="modal"
                                            data-target="#löschModal"><span
                                                class="icon icon-minus"></span></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <?php echo app('translator')->get('content.ag2'); ?>
                    </div>
                </div>

                <div class="top-buffer-2 row">
                    <div class="last col-xs-6">
                        <button onclick="checkSave()" type="button" class="btn btn-primary pull-right">
                            <?php echo app('translator')->get('fields.save'); ?>
                        </button>
                    </div>
                    <div class="col-xs-6">
                        <button onclick="location.href='/admin_AG';" type="button" class="btn btn-danger">
                            <?php echo app('translator')->get('fields.reset'); ?>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <?php if($numberRatings!=0): ?>
    <script>
        //alle Buttons deaktivieren
        document.getElementById("hinzufügen").disabled = true;
        var buttons = document.getElementsByClassName("löschButton");
        for(i=0; i<buttons.length;i++){
            buttons[i].disabled = true;
        }

    </script>
    <?php endif; ?>
    <!--Speicher-Modal-->
    <?php echo $__env->make('modals.acp-save-ag', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <!--Löschen-Modal-->
    <?php echo $__env->make('modals.acp-del-ag', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>