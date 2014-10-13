<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php if($this->menu): ?>
<div class="top-controlls">
    <?php foreach($this->menu as $menu) :?>
    <?php $this->widget(
        'ext.bootstrap.widgets.TbButtonGroup',
        array(
            'buttons' => array($menu),
        )
    ); ?>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<div>
    <?php echo $content; ?>
</div>

<?php $this->endContent(); ?>