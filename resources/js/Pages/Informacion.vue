<script setup>
import { Head, Link, usePage } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { computed } from "vue";

const page = usePage();
const userLogged = computed(() => page.props.auth?.user);
</script>

<template>
    <Head title="Información" />

    <AuthenticatedLayout>
        <div class="max-w-4xl mx-auto py-12 px-6">
            <h1 class="text-3xl font-bold mb-8 text-center">
                ¿Cómo funciona la aplicación?
            </h1>

            <div
                v-if="userLogged"
                class="bg-white rounded-xl shadow p-6 border border-blue-300"
            >
                <p class="mb-4 text-gray-700">
                    Como usuario autenticado, tienes acceso completo a todas las
                    funcionalidades de la aplicación:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>
                        <strong>Jugar partidas:</strong> Selecciona una
                        categoría y responde a una serie de preguntas
                        aleatorias. Tu puntuación se registra automáticamente.
                    </li>
                    <li>
                        <strong>Ranking global:</strong> Consulta cómo te
                        posicionas respecto a otros jugadores. Puedes filtrar
                        por categoría o ver solo tus partidas.
                    </li>
                    <li>
                        <strong>Estadísticas personales:</strong> Visualiza tu
                        progreso, mejores rachas, y tiempos de respuesta.
                    </li>
                    <li>
                        <strong>Gestión de contenido:</strong> Si tienes
                        permisos de administración, podrás añadir o modificar
                        categorías, preguntas y respuestas.
                    </li>
                </ul>
                <div class="mt-6">
                    <Link
                        :href="route('categorias.seleccionar')"
                        class="text-blue-500 hover:text-blue-700 mr-4"
                        >Empezar una partida</Link
                    >
                    <Link
                        :href="route('clasificacion')"
                        class="text-blue-500 hover:text-blue-700"
                        >Ver ranking</Link
                    >
                </div>
            </div>

            <div
                v-else
                class="bg-white rounded-xl shadow p-6 border border-blue-300"
            >
                <p class="mb-4 text-gray-700">
                    Puedes explorar parte del contenido de la aplicación, pero
                    para participar activamente necesitas iniciar sesión o
                    registrarte.
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>
                        <strong>Exploración limitada:</strong> Puedes ver las
                        categorías disponibles, pero no jugar partidas ni
                        acceder al ranking.
                    </li>
                    <li>
                        <strong>Participación completa:</strong> Para registrar
                        tu progreso, acceder a estadísticas o participar en el
                        ranking, debes tener una cuenta.
                    </li>
                </ul>
                <div class="mt-6">
                    <Link
                        :href="route('categorias.seleccionar')"
                        class="text-blue-500 hover:text-blue-700 mr-4"
                        >Empezar una partida</Link
                    >
                    <Link
                        :href="route('login')"
                        class="text-blue-500 hover:text-blue-700 mr-4"
                        >Iniciar sesión</Link
                    >
                    <Link
                        :href="route('register')"
                        class="text-blue-500 hover:text-blue-700"
                        >Registrarse</Link
                    >
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
