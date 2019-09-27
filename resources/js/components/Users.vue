<template>
    <div>
        <h1>Lista de usuários</h1>

        <ApolloQuery
            :query="require('./../graphql/queries/fetchUsers.gql')"
        >
            <template v-slot="{ result: { loading, error, data } }">
                <!-- Loading -->
                <div v-if="loading" class="loading apollo">Carregando...</div>

                <!-- Error -->
                <div v-else-if="error" class="error apollo">Houve um erro</div>

                <!-- Result -->
                <div v-else-if="data" class="result apollo">
                    <ul>
                        <li v-for="user in data.users" :key="user.id">
                            <b>Nome:</b> {{ user.name }}<br>
                            <b>E-mail:</b> {{ user.email }}<br>
                            <b>Empresa:</b> {{ user.company.name }}
                        </li>
                    </ul>
                </div>
            </template>
        </ApolloQuery>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
