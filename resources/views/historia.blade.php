@include('admin.body.encabezado')


<div class="container">
    <h1 class="text-center mb-3">Nuestra Historia</h1>
    <h5 class="text-center text-muted mb-5">Jugadores formados en la academia que han triunfado internacionalmente</h5>
    <div class="container">
        <div class="row">
            @forelse($jugadoresExtranjeros as $jugador)
            <div class="col-12 mb-4">
                <div class="card h-100 shadow-sm transition">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset($jugador->imagen) }}" class="img-fluid rounded-start"
                                alt="{{ $jugador->nuevo_destino }}"
                                style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $jugador->nuevo_destino }}</h5>
                                <p class="card-text">
                                    <strong>Nacionalidad:</strong> {{ $jugador->nacionalidad }}<br>
                                    <strong>Posición:</strong> {{ $jugador->posicion }}<br>
                                    <strong>Estatura:</strong> {{ $jugador->estatura }} cm<br>
                                    <strong>Edad:</strong> {{ $jugador->edad }} años
                                </p>
                                <div class="card-text descripcion-carrera">
                                    <strong>Descripción de Carrera:</strong> <br>
                                    <span
                                        class="resumen">{{ \Illuminate\Support\Str::limit($jugador->descripcion_carrera, 100, $end='') }}</span>
                                    <span class="completo"
                                        style="display:none;">{{ $jugador->descripcion_carrera }}</span>
                                    <a href="#" class="leer-mas">Leer más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">No hay jugadores para mostrar.</p>
            </div>
            @endforelse
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.leer-mas').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                const descripcion = event.target.closest('.descripcion-carrera');
                descripcion.querySelector('.resumen').style.display = 'none';
                descripcion.querySelector('.completo').style.display = 'block';
                event.target.style.display = 'none';
            });
        });
    });
    </script>

    @section('styles')
    <style>
    .transition {
        transition: transform .2s;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-weight: bold;
        color: #0056b3;
    }

    .card-text {
        font-size: 0.9rem;
    }

    body {
        background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        /* Fondo con gradiente de azul claro */
        animation: gradient-animation 10s ease infinite alternate;
        /* Animación suave del fondo */
        margin: 0;
        padding: 0;
    }
    </style>