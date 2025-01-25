<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { ref, onMounted } from "vue";
import axios from "axios";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    categorias: Array,
});
console.log(props);
</script>

<template>
    <Head title="Categorias" />

    <AdminLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Categorias
            </h2>
        </template>

        <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <Link href="/categorias/create" class="flex justify-end">
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded mt-4 mr-4"
                    >
                        Crear
                    </button>
                </Link>

                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Código</th>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="categoria in categorias" :key="categoria.id">
                            <td class="border px-4 py-2">
                                {{ categoria.codigo }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ categoria.nombre }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ categoria.descripcion }}
                            </td>
                            <td class="border px-4 py-2 flex justify-center">
                                <Link
                                    :href="`/categories/${categoria.id}/edit`"
                                    class="text-blue-500"
                                    >Editar</Link
                                >
                                <button
                                    @click="eliminarCategoria(categoria.id)"
                                    class="text-red-500 ml-2"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
