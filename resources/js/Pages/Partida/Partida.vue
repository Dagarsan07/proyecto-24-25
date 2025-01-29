<script setup>
import { Head, useForm, usePage } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { computed, onMounted, onUnmounted, ref } from "vue";

const props = defineProps({
    categoria: Object,
    preguntas: Array,
});

props.preguntas.forEach((pregunta) => {
    pregunta.respuestas = pregunta.respuestas.sort(() => Math.random() - 0.5);
});

const tiempoJugado = ref(0);
let intervalo;

onMounted(() => {
    intervalo = setInterval(() => {
        tiempoJugado.value++;
    }, 1000);
});

onUnmounted(() => clearInterval(intervalo));

const tiempoFormateado = computed(() => {
    const minutos = Math.floor(tiempoJugado.value / 60);
    const segundos = tiempoJugado.value % 60;
    return `${String(minutos).padStart(2, "0")}:${String(segundos).padStart(
        2,
        "0"
    )}`;
});

const auth = usePage().props.auth;
const isLogged = computed(() => {
    return !!page.props.auth.user;
});

// Estado de la pregunta actual
const preguntaActual = ref(0);
const respondida = ref(false);
const esCorrecta = ref(false);
const cantAciertos = ref(0);
const rachaActual = ref(0);
const rachaMaxima = ref(0);
const puntaje = computed(
    () => cantAciertos.value * 100 + rachaMaxima.value * 50
);

const seleccionarRespuesta = (respuesta) => {
    respondida.value = true;
    esCorrecta.value = respuesta.es_correcta;
    if (esCorrecta.value) {
        rachaActual.value++;
        cantAciertos.value++;

        if (rachaActual.value > rachaMaxima.value) {
            rachaMaxima.value = rachaActual.value;
        }
    } else {
        rachaActual.value = 0;
    }

    if (preguntaActual.value + 1 === props.preguntas.length) {
        clearInterval(intervalo);
    }
};

const siguientePregunta = () => {
    respondida.value = false;
    esCorrecta.value = false;
    preguntaActual.value++;
};

const finalizarPartida = () => {
    if (isLogged) {
        const form = useForm({
            id_user: auth.user.id,
            id_categoria: props.categoria.id,
            puntuacion: puntaje.value,
            tiempo: `00:${tiempoFormateado.value}`,
        });
        console.log(form);
        form.post(route("partida.store"));
    }
};
</script>
<template>
    <Head title="Partida" />

    <AuthenticatedLayout>
        <div class="py-12 mx-auto max-w-5xl text-center">
            <div v-if="preguntaActual < preguntas.length">
                <h1 class="text-2xl font-bold mb-6">
                    {{ categoria.nombre + " - " + tiempoFormateado }}
                </h1>
                <h2 class="text-xl font-semibold mb-4">
                    Pregunta {{ preguntaActual + 1 }} de {{ preguntas.length }}
                </h2>

                <div
                    class="w-full max-w-2xl sm:max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md"
                >
                    <h3 class="text-lg font-bold">
                        {{ preguntas[preguntaActual].texto }}
                    </h3>
                    <div class="mt-4">
                        <button
                            v-for="respuesta in preguntas[preguntaActual]
                                .respuestas"
                            :key="respuesta.id"
                            class="block border-2 w-full text-left bg-gray-200 p-3 rounded-lg mb-2 hover:bg-gray-300"
                            :class="
                                respondida
                                    ? !esCorrecta
                                        ? respuesta.es_correcta
                                            ? 'border-green-600'
                                            : 'border-red-600'
                                        : respuesta.es_correcta
                                        ? 'border-green-600'
                                        : 'border-transparent'
                                    : 'border-transparent'
                            "
                            @click="seleccionarRespuesta(respuesta)"
                            :disabled="respondida"
                        >
                            {{ respuesta.texto }}
                        </button>
                    </div>
                </div>

                <p
                    v-if="respondida"
                    class="my-4 font-semibold"
                    :class="esCorrecta ? 'text-green-600' : 'text-red-600'"
                >
                    {{
                        esCorrecta
                            ? "¡Respuesta Correcta!"
                            : "Respuesta Incorrecta"
                    }}
                </p>

                <button
                    v-if="respondida && preguntaActual < preguntas.length - 1"
                    @click="siguientePregunta"
                    class="mt-6 px-4 py-2 bg-blue-600 text-white rounded-lg"
                >
                    Siguiente Pregunta
                </button>
                <div
                    v-if="respondida && preguntaActual === preguntas.length - 1"
                >
                    <h1 class="text-2xl font-bold mb-6">
                        ¡Partida Finalizada!
                    </h1>
                    <p class="text-lg">
                        Has obtenido <strong>{{ puntaje }}</strong> puntos.
                        <strong>{{
                            cantAciertos + "/" + preguntas.length
                        }}</strong>
                        aciertos. Racha de aciertos más alta:
                        <strong>{{ rachaMaxima }}</strong>
                    </p>
                </div>
                <button
                    v-if="respondida && preguntaActual === preguntas.length - 1"
                    @click="finalizarPartida"
                    class="mt-6 px-4 py-2 bg-green-500 text-white rounded-lg"
                >
                    Ir a inicio
                </button>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
