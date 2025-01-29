<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    categorias: Array,
});

const categoriaSeleccionada = ref(null);
const form = useForm({
    categoria_id: null,
});

const seleccionarCategoria = (categoria) => {
    categoriaSeleccionada.value = categoria;
    form.categoria_id = categoria.id;
};

const confirmarCategoria = () => {
    form.post(route("partida.iniciar"));
};
</script>

<template>
    <Head title="Selección categoría" />

    <AuthenticatedLayout>
        <div class="py-12 mx-auto max-w-4xl text-center">
            <h1 class="text-3xl font-bold mb-6">Seleccione una Categoría</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full">
                <div
                    v-for="categoria in categorias"
                    :key="categoria.id"
                    @click="seleccionarCategoria(categoria)"
                    class="bg-gray-200 p-4 rounded-lg shadow-lg hover:shadow-xl cursor-pointer transition transform hover:scale-105"
                >
                    <h2 class="text-lg font-semibold">
                        {{ categoria.nombre }}
                    </h2>
                </div>
            </div>
            <p
                v-if="categoriaSeleccionada != null"
                class="mt-6 font-semibold text-lg"
            >
                {{
                    categoriaSeleccionada != null
                        ? categoriaSeleccionada.nombre
                        : ""
                }}
            </p>
            <button
                class="mt-6 px-4 py-2 bg-blue-500 text-white rounded-lg"
                :disabled="!categoriaSeleccionada"
                @click="confirmarCategoria"
            >
                Confirmar Categoría
            </button>
        </div>
    </AuthenticatedLayout>
</template>
