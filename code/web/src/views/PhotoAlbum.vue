<template>
  <div class="photoalbum">
    <h2>主题</h2>
    <div class="images row">
        <div class="card image-card" v-for="(item, index) in images" :key="index" @click="showPhotoAlbumClick">
            <img class="card-img-top img-fluid" :src="item.url+index">
            <div class="card-body">
                <h4 class="card-title">{{ item.title }}</h4>
                <p class="card-text">{{ item.desc }}</p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <h2 v-on:click="loadMore">查看更多</h2>
    <br>
    <br>
    <!-- <div class="row justify-content-center">
        <nav aria-label="...">
            <ul class="pagination pagination-lg">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
   </div> -->
   <show-photo-album></show-photo-album>
  </div>
</template>

<script>
import ShowPhotoAlbum from '@/components/ShowPhotoAlbum'
import {mapState, mapGetters, mapActions, mapMutations} from 'vuex'

export default {
  name: 'PhotoAlbum',
  components: {ShowPhotoAlbum},
  data () {
    return {
        showPhotoAlbum: false,
        themeList: ['主题一','主题二','主题三','主题四','主题五',],
        images: [
            { 'url': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'},
        ]
    }
  },
  methods:{
      loadMore(){
          let item = { 'url': 'http://placehold.it/300x200?text=', 'title': 'Jane Doe', 'desc': 'Some example text some example text. Jane Doe is an architect and engineer'};
          for(let i=0; i< 10; i++){
              this.images.push(item);
          }
      },
      showPhotoAlbumClick(){
          this.$store.commit('setIsShow', true);
      }
  },
  mounted(){
      this.loadMore();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .card{
        width:360px;
        margin: 10px 10px;
    }
    .card-img-top{
        background-image: url('~@/assets/default_300x200.png');
    }
</style>
