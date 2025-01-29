<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    categoria_id: Number,
    preguntas: Array,
    flash: {
        type: Object,
        default: () => ({}),
    },
});
console.log(props.categoria_id);

const showDeleteModal = ref(false);
const form = useForm({
    pregunta_id: "",
});

const showModal = (id) => {
    showDeleteModal.value = true;
    form.pregunta_id = id;
};

const closeModal = () => {
    showDeleteModal.value = false;
    form.pregunta_id = "";
};

const eliminarPregunta = () => {
    form.delete(route("preguntas.delete", form.pregunta_id), {
        onSuccess: (response) => {
            console.log(response);
            showDeleteModal.value = false;
        },
    });
};
</script>

<template>
    <Head title="Preguntas" />

    <AdminLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Preguntas
            </h2>
        </template>

        <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div v-if="flash.success" class="alert alert-success">
                {{ flash.success }}
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-between">
                    <Link href="/categorias" class="mt-4 ml-4">
                        <SecondaryButton> Volver </SecondaryButton>
                    </Link>
                    <Link
                        :href="`/categorias/${props.categoria_id}/preguntas/create`"
                    >
                        <button
                            class="bg-blue-500 hover:bg-blue-600 transition duration-200 ease-in-out text-white px-4 py-2 rounded mt-4 mr-4"
                        >
                            Agregar pregunta
                        </button>
                    </Link>
                </div>
                <table
                    class="table-auto w-full mt-4"
                    v-if="props.preguntas.length > 0"
                >
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Texto</th>
                            <th class="px-4 py-2">Tipo</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pregunta in preguntas" :key="pregunta.id">
                            <td class="border px-4 py-2">
                                {{ pregunta.texto }}
                            </td>
                            <td class="border px-4 py-2">
                                {{
                                    pregunta.tipo == "test"
                                        ? "Test"
                                        : "Verdadero / Falso"
                                }}
                            </td>
                            <td class="border px-4 py-2 flex justify-center">
                                <Link
                                    :href="`/categorias/${props.categoria_id}/preguntas/${pregunta.id}/edit`"
                                    class="text-blue-500 hover:font-bold transition-all duration-150 ease-in-out ml-2"
                                    >Gestionar respuestas</Link
                                >
                                <button
                                    @click="showModal(pregunta.id)"
                                    class="text-red-500 hover:font-bold transition-all duration-150 ease-in-out ml-2"
                                >
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else class="alert alert-error mt-4 mx-4">
                    No existen preguntas para esta categoria
                </div>
                <Modal :show="showDeleteModal" @close="closeModal">
                    <div class="p-4">
                        <h2 class="text-lg text-gray-900 mb-6">
                            ¿Estás seguro de que quieres eliminar esta pregunta?
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Una vez eliminada junto a sus respectivas
                            respuestas, no se podrá recuperar.
                        </p>
                        <div class="flex justify-end gap-4 mt-6">
                            <SecondaryButton @click="closeModal()"
                                >Cancelar</SecondaryButton
                            >
                            <DangerButton @click="eliminarPregunta"
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
.alert-error {
    color: #571515;
    background-color: #edd4d4;
    border-color: #e6c3c3;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}
</style>
