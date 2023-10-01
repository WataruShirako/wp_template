<div class="webgl-canvas">
    <canvas id="webgl-canvas" class="webgl-canvas__body"></canvas>
</div>

<footer>

</footer>

<!-- imagePlane用のシェーダー -->
<?php get_template_part("parts/shader/vShaderFv"); ?>
<?php get_template_part("parts/shader/fShaderFv"); ?>

<!-- imagePlane用のシェーダー -->
<?php get_template_part("parts/shader/vShaderArc"); ?>
<?php get_template_part("parts/shader/fShaderArc"); ?>

<!-- slider用のシェーダー -->
<?php get_template_part("parts/shader/vShaderSlide"); ?>
<?php get_template_part("parts/shader/fShaderSlide"); ?>

</body>

</html>