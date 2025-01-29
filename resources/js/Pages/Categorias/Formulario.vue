<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm, Head, Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";

const props = defineProps({
    categoria: { type: Object, default: null },
});

const isEditing = computed(() => props.categoria !== null);

const form = useForm({
    codigo: isEditing.value ? props.categoria.codigo : "",
    nombre: isEditing.value ? props.categoria.nombre : "",
});

const submitForm = () => {
    console.log(isEditing.value);
    if (isEditing.value) {
        console.log("actualizar");
        form.post(route("categorias.update", props.categoria.id));
    } else {
        console.log(isEditing.value);
        form.post(route("categorias.store"));
    }
};
</script>

<template>
    <Head :title="isEditing ? 'Editar categoría' : 'Crear categoría'" />

    <AdminLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ isEditing ? "Editar categoría" : "Crear categoría" }}
            </h2>
        </template>

        <div class="py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-4">
                <form @submit.prevent="submitForm">
                    <div class="grid sm:grid-cols-4 grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <InputLabel for="codigo" value="Código*" />
                            <TextInput
                                id="codigo"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.codigo"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="col-span-2">
                            <InputLabel for="nombre" value="Nombre*" />
                            <TextInput
                                id="nombre"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.nombre"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>
                    </div>

                    <div class="flex justify-center mt-4 gap-x-2">
                        <Link href="/categorias">
                            <SecondaryButton :disabled="form.processing">
                                Volver
                            </SecondaryButton>
                        </Link>
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            {{ isEditing ? "Actualizar" : "Crear" }}
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
