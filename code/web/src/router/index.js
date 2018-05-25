import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import ImageContent from '@/views/ImageContent'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'ImageContent',
      component: ImageContent
    }
  ]
})
