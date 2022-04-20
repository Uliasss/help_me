import Vue from 'vue'
import VueRouter from 'vue-router'
import Halls from "@/pages/Halls";
import Paintings from "@/pages/Paintings";


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'paintings',
    component: Paintings
  },
  {
    path: '/halls',
    name: 'halls',
    component: Halls
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
