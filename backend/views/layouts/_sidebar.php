<?php
?>
<aside class="shadow">
    <?php echo \yii\bootstrap4\Nav::widget(
        [
            'options' => [
                'class' => 'd-flex flex-column nav-pills'
            ],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Country list', 'url' => ['/country/index']],
                ['label' => 'Property Details', 'url' => ['/property-details/index']]
            ]
        ])  ?>
</aside>


