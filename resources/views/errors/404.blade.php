@extends("layouts.main")

@section("title", "404")
{{--
@section("scripts")
    <script src="https://cdn.jsdelivr.net/npm/three@0.145.0/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.145.0/examples/js/loaders/GLTFLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.145.0/examples/js/controls/TrackballControls.js"></script>
    <script>
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

        const renderer = new THREE.WebGLRenderer();
        renderer.setSize( window.innerWidth, window.innerHeight );
        renderer.setClearColor(0xffffff);
        document.getElementById("canvas").appendChild( renderer.domElement );

        const controls = new THREE.TrackballControls(camera, renderer.domElement);

        const geometry = new THREE.BoxGeometry( 1, 1, 1 );
        const material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );

        const light = new THREE.AmbientLight(0xffffff, 1);
        scene.add(light);

        camera.position.z = 5;

        function animate() {
            requestAnimationFrame( animate );

            controls.update();
            renderer.render( scene, camera );
        }

        async function load() {
            const loader = new THREE.GLTFLoader();
            await loader.load("/low_poly_computer_with_devices.glb", function(gltf) {
                console.log(gltf.scene);
                scene.add(gltf.scene);
            });
        }

        load();
        animate();
    </script>
@endsection
--}}

@section("content")
    <div class="container">
        <h1>404</h1>
        {{-- <div id="canvas"></div> --}}
    </div>
@endsection
