<template>
    <div>
        <h1>Create</h1>
        <input type="text" v-model="name" style="border:1px solid red" />
        <button @click="save" :disabled="name.length === 0">Save</button>
    </div>
</template>

<script>
export default {
    name: "CreateNameOrder",
    data() {
        return {
            name: ""
        };
    },
    methods: {
        save() {
            axios
                .post("/api/order", {
                    name: this.name
                })
                .then(response => {
                    alert("success");
                }).catch(error => {
                    if ("errors" in error.response.data) {
                        let message = "";
                        for (const [column, columnErrors] of Object.entries(error.response.data.errors)) {
                            for (let i = 0; i < columnErrors.length; i++) {
                                message += columnErrors + "; ";
                            }
                            message = column + ": " + message;
                        }
                        if (message) {
                            alert(message);
                        }
                    }
                    console.log(error);
                })
            console.log(this.name);
        }
    }
}
</script>

<style scoped>

</style>
