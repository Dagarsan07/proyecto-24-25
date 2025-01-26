<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    categorias: Array,
    flash: {
        type: Object,
        default: () => ({}),
    },
});

const showDeleteModal = ref(false);
const form = useForm({
    categoria_id: "",
});

const showModal = (id) => {
    showDeleteModal.value = true;
    form.categoria_id = id;
    console.log(idCategoria.value);
};

const closeModal = () => {
    showDeleteModal.value = false;
    idCategoria.value = "";
};

const eliminarCategoria = () => {
    form.delete(route("categorias.delete", form.categoria_id), {
        onSuccess: (response) => {
            console.log(response);
            showDeleteModal.value = false;
        },
    });
};
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
            <div v-if="flash.success" class="alert alert-success">
                {{ flash.success }}
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-end">
                    <Link href="/categorias/create">
                        <button
                            class="bg-blue-500 hover:bg-blue-600 transition duration-200 ease-in-out text-white px-4 py-2 rounded mt-4 mr-4"
                        >
                            Crear categoría
                        </button>
                    </Link>
                </div>
                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Código</th>
                            <th class="px-4 py-2">Nombre</th>
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
                            <td class="border px-4 py-2 flex justify-center">
                                <Link
                                    :href="`/categorias/${categoria.id}/edit`"
                                    class="text-blue-500 hover:font-bold transition-all duration-150 ease-in-out"
                                    >Editar</Link
                                >
                                <button
                                    @click="showModal(categoria.id)"
                                    class="text-red-500 hover:font-bold transition-all duration-150 ease-in-out ml-2"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Modal :show="showDeleteModal" @close="closeModal">
                    <div class="p-4">
                        <h2 class="text-lg text-gray-900 mb-6">
                            ¿Estás seguro de que quieres eliminar esta
                            categoría?
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Una vez eliminada, todas las preguntas y sus
                            respectivas respuestas serán eliminadas permanente.
                        </p>
                        <div class="flex justify-end gap-4 mt-6">
                            <SecondaryButton @click="closeModal()"
                                >Cancelar</SecondaryButton
                            >
                            <DangerButton @click="eliminarCategoria"
                                >Eliminar</DangerButton
                            >
                        </div>
                    </div>
                </Modal>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}
</style>
