    <div class="btn-group" id="lang">
        <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="lang lang-<?php echo e(app()->getLocale()); ?>"><span class="hidden-xs hidden-sm"><?php echo app('translator')->get('lang.'.app()->getLocale()); ?></span></span> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="/lang/de" class="lang lang-de"> <?php echo app('translator')->get('lang.de'); ?></a></li>
            <li><a href="/lang/en" class="lang lang-en"> <?php echo app('translator')->get('lang.en'); ?></a></li>
        </ul>
    </div>