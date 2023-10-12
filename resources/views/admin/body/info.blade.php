<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="display-4" style="color: #000;">¿Qué obtendrás en JMC Sharks Academy?</h2>
        </div>
        @php
        $icons = ['basketball-ball', 'users', 'dumbbell', 'medal'];
        $titles = ['Entrenamientos Personalizados', 'Comunidad de Jugadores', 'Condición Física', 'Competición y
        Desarrollo'];
        $descriptions = [
        'Recibe entrenamientos personalizados y mejora tus habilidades con nuestro equipo de entrenadores
        profesionales.',
        'Forma parte de una comunidad apasionada por el baloncesto y comparte experiencias y aprendizajes.',
        'Desarrolla tu condición física y mejora tu rendimiento en la cancha con ejercicios y rutinas especializadas.',
        'Participa en competiciones y eventos para poner a prueba tus habilidades y continuar tu desarrollo como
        jugador.'
        ];
        @endphp
        @foreach($icons as $index => $icon)
        <div class="col-md-6 col-lg-3 mt-3">
            <div class="icon-text text-center"
                style="border: 1px solid #e0eafc; border-radius: 10px; padding: 20px; transition: transform .2s; transform-style: preserve-3d;">
                <i class="fas fa-{{ $icon }} fa-2x text-primary"></i>
                <h4 class="mt-2">{{ $titles[$index] }}</h4>
                <p>{{ $descriptions[$index] }}</p>
            </div>
        </div>
        @endforeach
        <div class="col-12 text-center mt-4">
            @guest
            <a href="{{ url('/register') }}" class="btn btn-primary btn-lg">Únete a la Academia</a>
            @endguest
        </div>
    </div>
</div>

<style>
.icon-text:hover {
    transform: scale(1.05) translateY(-10px);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
}
</style>