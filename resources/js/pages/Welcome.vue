<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Form, Head } from '@inertiajs/vue3';




import { store as aporteStore } from '@/routes/aportes'

</script>

<template>
    <AuthBase
        title="Create an account"
        description="Enter your details below to create your account"
    >
        <Head title="Register" />

        <Form
            v-bind="aporteStore.form()"
            :reset-on-success="['tipo', 'valor']"
            v-slot="{ errors, processing }"
            class="flex flex-col gap-6"
        >
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="data">Data do aporte</Label>
                    <Input
                        id="data"
                        type="date"
                        required
                        autofocus
                        :tabindex="1"
                        name="data"
                        placeholder="Data do aporte"
                    />
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
                    <Input
                        id="ativo"
                        type="text"
                        required
                        :tabindex="3"
                        name="ativo"
                        placeholder="Ativo"
                    />
                </div>

                <div class="grid gap-2">
                    <Label for="tipo">Tipo</Label>
                    <Input
                        id="tipo"
                        type="text"
                        required
                        :tabindex="4"
                        name="tipo"
                        placeholder="Tipo"
                    />
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
