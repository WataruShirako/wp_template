<script id="f-shader-slide" type="x-shader/x-fragment">
    varying vec2 vUv;

uniform sampler2D currentImage;
uniform sampler2D nextImage;
uniform float dispFactor;
uniform vec2 orig1;
uniform vec2 orig2;
uniform float intensity;

void main() {
    vec2 uv = vUv;

    float maxOffset = 0.015;
    vec2 offsetR = vec2(dispFactor * maxOffset, 0.0);
    vec2 offsetG = vec2(-dispFactor * maxOffset, 0.0);

    vec4 currColorR = texture2D(currentImage, uv + offsetR);
    vec4 currColorG = texture2D(currentImage, uv + offsetG);
    vec4 currColorB = texture2D(currentImage, uv);

    vec2 yOffset = vec2(0.0, (1.0 - dispFactor) * (orig1 * intensity) + dispFactor * (orig2 * intensity));

    vec4 nextColorR = texture2D(nextImage, uv + yOffset + offsetR);
    vec4 nextColorG = texture2D(nextImage, uv + yOffset + offsetG);
    vec4 nextColorB = texture2D(nextImage, uv + yOffset);

    vec4 mixedColor;
    mixedColor.r = mix(currColorR.r, nextColorR.r, dispFactor);
    mixedColor.g = mix(currColorG.g, nextColorG.g, dispFactor);
    mixedColor.b = mix(currColorB.b, nextColorB.b, dispFactor);
    mixedColor.a = 1.0;

    gl_FragColor = mixedColor;
}

    </script>