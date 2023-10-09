    <script id="v-shader-fv" type="x-shader/x-vertex">
      varying vec2 vUv;
uniform float uTime;
uniform float uAmp;

float PI = 3.1415926535897932384626433832795;

void main(){
    vUv = uv;
    vec3 pos = position;

    // 横方向
    float amp = uAmp;
    float freq = 0.015 * uTime;

    // 縦方向
    float tens = -0.00075 * uTime;

    float sineWave = sin(pos.y * PI  * freq);

    // smoothstep を使って sineWave の動きをイージング
    pos.x = pos.x + smoothstep(-1.0, 3.0, sineWave) * amp;
    pos.y = pos.y + (cos(pos.x * PI) * tens);

    gl_Position = projectionMatrix * modelViewMatrix * vec4(pos, 1.0);
}
    </script>