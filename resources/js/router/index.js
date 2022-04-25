import { createRouter, createWebHistory } from 'vue-router'

import DashboardIndex from '../components/dashboard/DashboardIndex.vue'
import CompaniesIndex from '../components/companies/CompaniesIndex.vue'
import CompaniesEdit from '../components/companies/CompaniesEdit.vue'
import CategoriesIndex from '../components/categories/CategoriesIndex.vue'
import CategoriesEdit from '../components/categories/CategoriesEdit.vue'

const routes = [
    {
        path: '/home',
        name: 'dashboard.index',
        component: DashboardIndex
    },
    {
        path: '/companies',
        name: 'companies.index',
        component: CompaniesIndex
    },
    {
        path: '/companies/create',
        name: 'companies.create',
        component: CompaniesEdit
    },
   {
        path: '/companies/:id/edit',
        name: 'companies.edit',
        component: CompaniesEdit,
        props: true
    },
    {
        path: '/categories',
        name: 'categories.index',
        component: CategoriesIndex
    },
    {
        path: '/categories/create',
        name: 'categories.create',
        component: CategoriesEdit
    },
   {
        path: '/categories/:id/edit',
        name: 'categories.edit',
        component: CategoriesEdit,
        props: true
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})