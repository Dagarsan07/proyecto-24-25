<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";

const props = defineProps({
    canDelete: Boolean,
});
console.log(props.canDelete);

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route("profile.destroy"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.clearErrors();
    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Borrar cuenta</h2>

            <p class="my-1 text-sm text-gray-600">
                Una su cuenta sea eliminada, todos sus recursos y datos serán
                eliminados permanentemente. Antes de eliminar su cuenta,
                asegurese de descargar cualquier dato o información que desee
                conservar.
            </p>
            <span
                v-if="props.canDelete != null && !props.canDelete"
                class="text-sm font-bold text-red-600"
                >No puede eliminar su cuenta debido a que es el único usuario
                con rol Super Administrador</span
            >
        </header>

        <DangerButton
            @click="confirmUserDeletion"
            :disabled="props.canDelete != null && !props.canDelete"
            :class="
                props.canDelete != null && !props.canDelete
                    ? 'bg-red-400'
                    : 'bg-red-600'
            "
            >Eliminar cuenta</DangerButton
        >

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    ¿Está seguro de que quiere eliminar su cuenta?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Una su cuenta sea eliminada, todos sus recursos y datos
                    serán eliminados permanentemente. Por favor introduzca su
                    contraseña para confirmar que desea eliminar permanentemente
                    su cuenta.
                </p>

                <div class="mt-6">
                    <InputLabel
                        for="password"
                        value="Contraseña"
                        class="sr-only"
                    />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Cancelar
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Eliminar cuenta
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
