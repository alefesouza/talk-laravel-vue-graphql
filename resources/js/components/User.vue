<template>
    <div>
        <h1>Lista de usuários</h1>

        <ApolloQuery
            :query="require('./../graphql/queries/fetchUser.gql')"
            :variables="{ id: userId }"
        >
            <template v-slot="{ result: { loading, error, data } }">
                <!-- Loading -->
                <div v-if="loading" class="loading apollo">Carregando...</div>

                <!-- Error -->
                <div v-else-if="error" class="error apollo">Houve um erro</div>

                <!-- Result -->
                <div v-else-if="data" class="result apollo">
                    <b>Nome:</b> {{ data.user.name }}<br>
                    <b>E-mail:</b> {{ data.user.email }}<br>
                    <b>Empresa:</b> {{ data.user.company.name }}
                </div>
            </template>
        </ApolloQuery>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userId: 1
        };
    },
    mounted() {
        setTimeout(() => {
            this.userId = 2;
        }, 2000);
    },
}
</script>
