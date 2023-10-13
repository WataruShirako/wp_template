<script id="f-shader-fv" type="x-shader/x-fragment">
    varying vec2 vUv;
      uniform sampler2D uTexture;
      uniform float uImageAspect;
      uniform float uPlaneAspect;
      uniform float uTime;
      uniform float uOpacity;

      void main(){
        // 画像のアスペクトとプレーンオブジェクトのアスペクトを比較し、短い方に合わせる
        vec2 ratio = vec2(
          min(uPlaneAspect / uImageAspect, 1.0),
          min((1.0 / uPlaneAspect) / (1.0 / uImageAspect), 1.0)
        );

        // 計算結果を用いてテクスチャを中央に配置
        vec2 fixedUv = vec2(
          (vUv.x - 0.5) * ratio.x + 0.5,
          (vUv.y - 0.5) * ratio.y + 0.5
        );

        vec2 offset = vec2(0.0, uTime * 0.0008);
        float r = texture2D(uTexture, fixedUv + offset).r;
        float g = texture2D(uTexture, fixedUv + offset * 0.5).g;
        float b = texture2D(uTexture, fixedUv).b;
        
        // RGBをずらす（オフセットを追加する）
        r = mod(r + 0.0, 1.0); 
        g = mod(g + 0.0, 1.0);
        b = mod(b + 0.0, 1.0); 

        vec3 texture = vec3(r, g, b);

        gl_FragColor = vec4(texture, uOpacity);
      }
    </script>