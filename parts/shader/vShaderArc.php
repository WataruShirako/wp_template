    <script id="v-shader" type="x-shader/x-vertex">
        varying vec2 vUv;
      uniform float uTime;


      float PI = 3.1415926535897932384626433832795;

      void main(){
          vUv = uv;
          vec3 pos = position;

          // 横方向
          float amp = 0.115; // 振幅
          float freq = 0.015 * uTime; // 振動

          // 縦方向
          float tens = -0.00075 * uTime; // 上下のテンション

          pos.x = pos.x + sin(pos.y * PI  * freq) * amp;
          pos.y = pos.y + (cos(pos.x * PI) * tens);

          gl_Position = projectionMatrix * modelViewMatrix * vec4(pos, 1.0);
      }
    </script>