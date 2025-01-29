<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Checkbox from "@/Components/Checkbox.vue";
import { useForm, Head, Link } from "@inertiajs/vue3";
import { computed, ref, onMounted } from "vue";

const props = defineProps({
    categoria_id: String,
    pregunta: { type: Object, default: null },
    respuestas: { type: Array, default: null },
});

const isEditing = computed(() => props.pregunta !== null);

const form = useForm({
    id_categoria: props.categoria_id,
    texto: isEditing.value ? props.pregunta.texto : "",
    tipo: isEditing.value ? props.pregunta.tipo : "",
});

const submitForm = () => {
    if (document.querySelector("#test").checked == true) {
        form.tipo = "test";
    } else if (document.querySelector("#bool").checked == true) {
        form.tipo = "boolean";
    }

    form.post(`/categorias/${props.categoria_id}/preguntas`, {
        onSuccess: (response) => {
            console.log(response);
        },
    });
};
</script>

<template>
    <Head :title="isEditing ? 'Editar pregunta' : 'Crear pregunta'" />

    <AdminLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ isEditing ? "Editar pregunta" : "Crear pregunta" }}
            </h2>
        </template>

        <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-4">
                <form @submit.prevent="submitForm">
                    <div class="grid sm:grid-cols-4 grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <InputLabel for="texto" value="Texto*" />
                            <TextInput
                                id="texto"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.texto"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="col-span-2">
                            <InputLabel for="tipo" value="Tipo*" />
                            <div class="flex mt-3 gap-x-4">
                                <div>
                                    <input
                                        type="radio"
                                        id="test"
                                        value="Test"
                                        name="tipo"
                                        class="mr-2"
                                        required
                                    />
                                    <label for="test">Test</label>
                                </div>
                                <div>
                                    <input
                                        type="radio"
                                        id="bool"
                                        value="Verdadero/Falso"
                                        name="tipo"
                                        class="mr-2"
                                        required
                                    />
                                    <label for="bool">Verdadero / Falso</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-4 gap-x-2">
                        <Link
                            :href="`/categorias/${props.categoria_id}/preguntas`"
                        >
                            <SecondaryButton :disabled="form.processing">
                                Volver
                            </SecondaryButton>
                        </Link>
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Crear
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
