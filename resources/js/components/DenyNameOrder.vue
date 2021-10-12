<template>
    <div>
        <h1>Deny</h1>
        <input type="text" v-model="message" style="border:1px solid red" />
        <button @click="save" :disabled="message.length === 0">Deny</button>
    </div>
</template>

<script>
export default {
    name: "DenyNameOrder",
    data() {
        return {
            message: ""
        };
    },
    methods: {
        save() {
            axios
                .put(`/api/order/${this.$route.params.id}`, {
                    message: this.message,
                    status: "Отказ"
                })
                .then(response => {
                    alert("success");
                    this.$router.push({ name: "CheckNameOrder" });
                }).catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
