<!-- navigation -->
<div class="navigation">
    <a href="<?php echo base_url(); ?>">home</a>
    <?php  foreach ($options as $parametres) : ?>
        <?php
        $count = count($parametres);
        $i = 0;
        $uri = '';
        $uri = $uri . $parametres["controller"] . "/" . $parametres["method"];
        foreach ($parametres as $parametre) {
            if ($i < $count - 1) {
                //print_r($parametres['method']);
            } else {
                $option = $parametre;
            }
            $i++;
        }
        ?>
        <a href="<?php echo $uri; ?>"><?php echo $option; ?></a>
    <?php endforeach; ?>
</div>