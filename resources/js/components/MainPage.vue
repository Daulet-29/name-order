<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div>
                        <router-link :to="{ name: 'MainPage' }">Home</router-link>
                    </div>
                    <div>
                        <router-link :to="{ name: 'CreateNameOrder' }">Create</router-link>
                    </div>
                    <div>
                        <router-link :to="{ name: 'CheckNameOrder' }">Check</router-link>
                    </div>
                    <router-view />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MainPage"
}
</script>

<style scoped>

</style>
