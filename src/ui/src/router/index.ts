import Vue from 'vue'
import VueRouter, { RouteConfig } from 'vue-router'

Vue.use(VueRouter)

const routes: Array<RouteConfig> = [
  {
    path: '/',
    name: 'Home',
    meta: { title: 'SWAPI - Home' }
  },
  {
    path: '/films',
    name: 'Film',
    component: () => import('../views/Film.vue'),
    meta: { title: 'SWAPI - Films' }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title
  next();
});

export default router