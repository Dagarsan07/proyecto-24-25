<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link, Head } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>
<template>
    <Head title="Inicio" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div
                class="mx-auto max-w-7xl space-y-4 px-4 sm:px-8 text-md sm:text-lg"
            >
                <h2
                    class="text-4xl font-semibold leading-tight text-gray-800 text-center"
                >
                    Bienvenido a hiberTrivia
                </h2>
                <p class="mx-auto max-w-2xl text-center">
                    Pon a prueba tu conocimiento sobre programación y demuestra
                    que eres digno de entrar en la familia hiberus
                </p>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full max-w-4xl md:max-w-6xl mx-auto pt-8"
                >
                    <!-- Bloque: Empezar Partida -->
                    <Link
                        class="bg-blue-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl cursor-pointer transition transform hover:scale-105"
                        :href="route('categorias.seleccionar')"
                    >
                        <h2 class="text-xl font-semibold">Empezar Partida</h2>
                        <p class="mt-2">
                            Pon a prueba tus conocimientos en una nueva partida.
                        </p>
                    </Link>

                    <!-- Bloque: Iniciar Sesión -->
                    <Link
                        class="bg-blue-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl cursor-pointer transition transform hover:scale-105"
                        :href="route('dashboard')"
                    >
                        <h2 class="text-xl font-semibold">Iniciar Sesión</h2>
                        <p class="mt-2">
                            Accede a tu cuenta para continuar jugando y guardar
                            tus avances.
                        </p>
                    </Link>

                    <!-- Bloque: Registrarse -->
                    <Link
                        class="bg-blue-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl cursor-pointer transition transform hover:scale-105"
                        :href="route('dashboard')"
                    >
                        <h2 class="text-xl font-semibold">Registrarse</h2>
                        <p class="mt-2">
                            Crea una cuenta para guardar tus progresos y
                            participar en la clasificación global.
                        </p>
                    </Link>

                    <!-- Bloque: Información -->
                    <Link
                        class="bg-blue-500 text-white p-6 rounded-lg shadow-lg hover:shadow-xl cursor-pointer transition transform hover:scale-105"
                        :href="route('dashboard')"
                    >
                        <h2 class="text-xl font-semibold">Información</h2>
                        <p class="mt-2">
                            Conoce más sobre el funcionamiento de la aplicación
                            y sus diferentes apartados.
                        </p>
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
