<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Form, Head } from '@inertiajs/vue3';
import { store as aporteStore } from '@/routes/aportes'
import { ref } from 'vue'

const successMessage = ref<string | null>(null)

const onSuccess = () => {
    successMessage.value = 'Aporte cadastrado com sucesso!'
}

const onError = () => {
    successMessage.value = null
}

</script>

<template>
    <AuthBase
        title="Aportes financeiros"
        description="Preencha os campos"
    >
        <Head title="Register" />

        <Form
            v-bind="aporteStore.form()"
            :reset-on-success="['data_aporte','ativo','tipo', 'valor']"
            v-slot="{ errors, processing }"
            @success="onSuccess"
            @error="onError"
            class="flex flex-col gap-6"
        >


            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="data_aporte">Data do aporte</Label>
                    <Input
                        id="data_aporte"
                        type="date"
                        required
                        autofocus
                        :tabindex="1"
                        name="data_aporte"
                        placeholder="Data do aporte"
                    />
                                <InputError :message="errors.data_aporte" />

                </div>
                <div class="grid gap-2">
                    <Label for="valor">Valor</Label>
                    <Input
                        id="valor"
                        type="text"
                        required
                        :tabindex="2"
                        name="valor"
                        placeholder="Valor"
                    />
            <InputError :message="errors.valor" />

                </div>

                <div class="grid gap-2">
                    <Label for="ativo">Ativo</Label>

                      <div class="flex items-center gap-6">
        <label class="flex items-center gap-2 cursor-pointer">
            <input
                type="radio"
                name="ativo"
                value="PETR4"
                required
            />
            <span>PETR4</span>
        </label>

        <label class="flex items-center gap-2 cursor-pointer">
            <input
                type="radio"
                name="ativo"
                value="Tesouro Direto"
            />
            <span>Tesouro Direto</span>
        </label>
    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="tipo">Tipo</Label>
                       <div class="flex items-center gap-6">
        <label class="flex items-center gap-2 cursor-pointer">
            <input
                type="radio"
                name="tipo"
                value="Renda fixa"
                required
            />
            <span>Renda fixa</span>
        </label>

        <label class="flex items-center gap-2 cursor-pointer">
            <input
                type="radio"
                name="tipo"
                value="Variável"
            />
            <span>Variável</span>
        </label>
    </div>
                </div>

                <Button
                    type="submit"
                    class="mt-2 w-full"
                    tabindex="5"
                    :disabled="processing"
                    data-test="register-user-button"
                >
                    <Spinner v-if="processing" />
                    Salvar
                </Button>

            </div>


        </Form>
    </AuthBase>
</template>
