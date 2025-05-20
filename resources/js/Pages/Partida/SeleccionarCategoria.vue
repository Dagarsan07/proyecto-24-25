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
        <div class="py-12 mx-auto max-w-4xl text-center px-8">
            <h1 class="text-3xl font-bold mb-6">Seleccione una Categoría</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full">
                <div
                    v-for="categoria in categorias"
                    :key="categoria.id"
                    @click="seleccionarCategoria(categoria)"
                    :class="[
                        'p-4 rounded-lg shadow-lg cursor-pointer transition transform hover:scale-105',
                        categoriaSeleccionada?.id === categoria.id
                            ? 'bg-blue-100 ring-2 ring-blue-500'
                            : 'bg-gray-200 hover:shadow-xl',
                    ]"
                >
                    <h2 class="text-lg font-semibold">
                        {{ categoria.nombre }}
                    </h2>
                </div>
            </div>
            <button
                class="mt-6 px-4 py-2 bg-blue-500 text-white rounded-lg"
                :disabled="!categoriaSeleccionada"
                @click="confirmarCategoria"
            >
                Comenzar
            </button>
        </div>
    </AuthenticatedLayout>
</template>
