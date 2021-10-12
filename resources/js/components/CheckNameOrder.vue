<template>
    <div>
        <h1>CheckNameOrder</h1>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Message
                        </th>
                        <th>
                            Status date
                        </th>
                        <th>
                            Created at
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <template v-if="loading">
                        <tr>
                            <td colspan="7" style="text-align: center">
                                <small>
                                    Loading
                                </small>
                            </td>
                        </tr>
                    </template>
                    <template v-else>
                        <template v-if="items.length === 0">
                            <tr>
                                <td colspan="7" style="text-align: center">
                                    <small>
                                        No data
                                    </small>
                                </td>
                            </tr>
                        </template>
                        <template v-else>
                            <tr
                                v-for="(item, itemIndex) in items"
                                :key="itemIndex"
                            >
                                <td>
                                    {{ item.id }}
                                </td>
                                <td>
                                    {{ item.name }}
                                </td>
                                <td>
                                    {{ item.status }}
                                </td>
                                <td>
                                    {{ item.message }}
                                </td>
                                <td>
                                    <div v-if="item.status !== 'В работе'">
                                        {{ item["updated_at"] }}
                                    </div>
                                </td>
                                <td>
                                    {{ item["created_at"] }}
                                </td>
                                <td>
                                    <div v-if="item.status === 'В работе'">
                                        <div>
                                            <button @click="approve(item)">Approve</button>
                                        </div>
                                        <div>
                                            <button @click="$router.push({ name: 'DenyNameOrder', params: {id: item.id} })">Deny</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "CheckNameOrder",
    data() {
        return {
            items: [],
            loading: false
        }
    },
    methods: {
        approve(item) {
            axios
                .put(`/api/order/${item.id}`, {
                    message: "Одобрено",
                    status: "Одобрено"
                })
                .then(response => {
                    this.loadData();
                    alert("success");
                }).catch(error => {
                console.log(error);
            });
        },
        loadData() {
            this.loading = true;
            axios
                .get("/api/order")
                .then(response => {
                    this.items = response.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log(error);
                    this.loading = false;
                })
        }
    },
    mounted() {
        this.loadData();
    }
}
</script>

<style scoped>
table, th, td {
    border: 1px solid #000;
}
table {
    width: 100%;
    border-collapse: collapse;
}
table tr td,
table tr th {
    padding: 3px 5px;
}
</style>
