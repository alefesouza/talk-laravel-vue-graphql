<template>
    <div class="container">
        <ApolloMutation
            :mutation="require('../graphql/mutations/addUser.gql')"
            :variables="{ input }"
            @done="onDone"
        >
            <template v-slot="{ mutate, loading, error }">
                <div>
                    <div>
                        <div>Nome:</div>
                        <input type="text" v-model="input.name">
                    </div>
                    <div>
                        <div>E-mail:</div>
                        <input type="text" v-model="input.email">
                    </div>
                    <div>
                        <div>ID da empresa:</div>
                        <input type="number" v-model="input.company_id">
                    </div>
                </div>

                <button :disabled="loading" @click="mutate()">Salvar</button>
                <p v-if="error">Ocorreu um erro: {{ error }}</p>
            </template>
        </ApolloMutation>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                input: {
                    name: '',
                    email: '',
                    company_id: '',
                }
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onDone() {
                alert('Usuário adicionado com sucesso.');

                this.input = {
                    name: '',
                    email: '',
                    company_id: '',
                }
            }
        }
    }
</script>
