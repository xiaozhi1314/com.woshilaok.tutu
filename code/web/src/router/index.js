import Vue from 'vue'
import Router from 'vue-router'
import PhotoAlbum from '@/views/PhotoAlbum'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'router_photoalbum',
      component: PhotoAlbum
    }
  ]
})
