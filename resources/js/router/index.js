import { createRouter, createWebHistory } from "vue-router";

import MainPage from "../components/MainPage";
import CreateNameOrder from "../components/CreateNameOrder.vue";
import CheckNameOrder from "../components/CheckNameOrder.vue";
import DenyNameOrder from "../components/DenyNameOrder.vue";

const routes = [
    {
        path: "/",
        name: "MainPage",
        component: MainPage,
        children: [
            {
                path: "/create",
                name: "CreateNameOrder",
                component: CreateNameOrder
            },
            {
                path: "/check",
                name: "CheckNameOrder",
                component: CheckNameOrder
            },
            {
                path: "/check/:id/deny",
                name: "DenyNameOrder",
                component: DenyNameOrder
            }
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});
export default router;
