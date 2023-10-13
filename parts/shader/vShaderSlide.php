    <script id="v-shader-slide" type="x-shader/x-vertex">
        varying vec2 vUv;
        uniform float uTime;
        uniform float shakeIntensity; // 新しいuniform変数

        float PI = 3.1415926535897932384626433832795;

        void main(){
            vUv = uv;
            vec3 pos = position;

            // 横方向
            float amp = 0.007 + shakeIntensity; // 振幅をshakeIntensityで一時的に増やす
            float freq = 0.07 * uTime + shakeIntensity; // 振動数

            // 縦方向
            float tens = -0.001 * uTime - shakeIntensity; // 上下の張り具合

            pos.x = pos.x + sin(pos.y * PI * freq) * amp;
            pos.y = pos.y + (cos(pos.x * PI) * tens);

            gl_Position = projectionMatrix * modelViewMatrix * vec4(pos, 1.0);
        }

    </script>